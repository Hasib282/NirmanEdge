function ShowProjects(res) {
    tableInstance = new GenerateTable({
        tableId: '#data-table',
        data: res.data,
        tbody: ['name','client','location','type.title','year'],
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
        { label: 'Project Name', key: 'name' },
        { label: 'Client', key: 'client' },
        { label: 'Location', key: 'location' },
        { label: 'Type', key: 'type.title' },
        { label: 'Year', key: 'year' },
        { label: 'Action', type: 'button' }
    ]);


    // Load Data on Hard Reload
    ReloadData('projects', ShowProjects);
    

    // Add Modal Open Functionality
    AddModalFunctionality("#name", function(){
        $('#project_type').removeAttr('data-id');
    });


    // Insert Ajax
    InsertAjax('projects', {type_id: { selector: '#project_type', attribute: 'data-id' }}, function() {
        $('#name').focus();
        $('#project_type').removeAttr('data-id');
        $('#selectImagePreview').empty();
    });


    // Edit Ajax
    EditAjax(EditFormInputValue);


    // Update Ajax
    UpdateAjax('projects', {removed_images: () => JSON.stringify(removedImages), type_id: { selector: '#updateProject_type', attribute: 'data-id' }});
    
-
    // Delete Ajax
    DeleteAjax('projects');


    // Additional Edit Functionality
    function EditFormInputValue(item){
        $('#updateProject_type').removeAttr('data-id');

        $('#id').val(item.id);
        $('#updateName').val(item.name);
        $('#updateClient').val(item.client);
        $('#updateLocation').val(item.location);
        $('#updateProject_type').val(item.type.title);
        $('#updateProject_type').attr('data-id', item.type.id);
        $('#updateYear').val(item.year);
        $('#updateStatus').val(item.status);
        $('#updateDetail').val(item.details);

        $('#newImagePreview').empty();
        $('#oldImagePreview').empty();
        $.each(item.image, function(index, pic) {

            $('#oldImagePreview').append(`
                <div class="image-box" data-name="${pic}">
                    <img src="/projects/${pic}" alt="" height="150px" width="150px">
                    <button type="button" class="remove-old">&times;</button>
                </div>
            `);

        });

        removedImages = [];
        

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