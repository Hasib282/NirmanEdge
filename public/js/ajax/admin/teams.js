function ShowTeams(res) {
    tableInstance = new GenerateTable({
        tableId: '#data-table',
        data: res.data,
        tbody: ['name','designation','management_post','category.name','details', {key:'image', type: 'image'}],
        actions: (row) => {
            let buttons = `
                <button data-modal-id="editModal" id="edit" data-id="${row.id}"><i class="fas fa-edit"></i></button>
                <button data-id="${row.id}" id="delete"><i class="fas fa-trash"></i></button>
            `;
            
            return buttons;
        }
    });
}



$(document).ready(function () {
    let removedImages = [];

    // Render The Table Heads
    renderTableHead([
        { label: 'SL:', type: 'rowsPerPage', options: [15, 30, 50, 100, 500] },
        { label: 'Member Name', key: 'name' },
        { label: 'Designation', key: 'designation' },
        { label: 'Management Post', key: 'management_post' },
        { label: 'Category', key: 'category.name' },
        { label: 'Details', key: 'details' },
        { label: 'Image' },
        { label: 'Action', type: 'button' }
    ]);


    // Load Data on Hard Reload
    ReloadData('teams', ShowTeams);
    

    // Add Modal Open Functionality
    AddModalFunctionality("#name", function(){
        $('#team_category').removeAttr('data-id');
    });


    // Insert Ajax
    InsertAjax('teams', {category_id: { selector: '#team_category', attribute: 'data-id' }}, function() {
        $('#name').focus();
        $('#team_category').removeAttr('data-id');
    });


    // Edit Ajax
    EditAjax(EditFormInputValue);


    // Update Ajax
    UpdateAjax('teams', {category_id: { selector: '#updateTeam_category', attribute: 'data-id' }});
    
-
    // Delete Ajax
    DeleteAjax('teams');


    // Additional Edit Functionality
    function EditFormInputValue(item){
        $('#updateTeam_category').removeAttr('data-id');

        $('#id').val(item.id);
        $('#updateName').val(item.name);
        $('#updateDesignation').val(item.designation);
        $('#updateManagement_post').val(item.management_post);
        $('#updateTeam_category').val(item.category.name);
        $('#updateTeam_category').attr('data-id', item.category.id);
        $('#updateDetail').val(item.details);

        $('#updatePreviewImage').attr('src',`${apiUrl.replace('/api', '')}/storage/${item.image ? item.image : 'male.png'}?${new Date().getTime()} `).show();

        $('#updateName').focus();
    }; // End Method


    


    // Remove old image
    $(document).on('click','.remove-old',function(){
        let parent = $(this).closest('.image-box');
        removedImages.push(parent.data('name'));
        $('#removed_images').val(JSON.stringify(removedImages));
        parent.remove();

        console.log(removedImages)
    });


    $('#image').on('change',function(){

        $('#selectImagePreview').empty();

        let files = this.files;

        for(let i=0;i<files.length;i++){

            let reader = new FileReader();

            reader.onload=function(e){

                $('#selectImagePreview').append(`
                    <div class="image-box new-image">

                        <img src="${e.target.result}">

                        <button type="button" class="remove-new">&times;</button>

                    </div>
                `);

            }

            reader.readAsDataURL(files[i]);

        }

    });
    
    $('#updateImage').on('change',function(){
        $('#newImagePreview').empty();

        let files = this.files;

        for(let i=0;i<files.length;i++){

            let reader = new FileReader();

            reader.onload=function(e){

                $('#newImagePreview').append(`
                    <div class="image-box new-image">

                        <img src="${e.target.result}">

                        <button type="button" class="remove-new">&times;</button>

                    </div>
                `);

            }

            reader.readAsDataURL(files[i]);

        }

    });

    $(document).on('click','.remove-new',function(){
        $(this).closest('.image-box').remove();
    });
});