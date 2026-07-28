function ShowAdmins(res) {
    tableInstance = new GenerateTable({
        tableId: '#data-table',
        data: res.data,
        tbody: ['title','details','icon'],
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
    // Render The Table Heads
    renderTableHead([
        { label: 'SL:', type: 'rowsPerPage', options: [15, 30, 50, 100, 500] },
        { label: 'Title', key: 'title' },
        { label: 'Details', key: 'details' },
        { label: 'Icon', key: 'icon' },
        { label: 'Action', type: 'button' }
    ]);


    // Load Data on Hard Reload
    ReloadData('services', ShowAdmins);
    

    // Add Modal Open Functionality
    AddModalFunctionality("#title");


    // Insert Ajax
    InsertAjax('services', {}, function() {
        $('#title').focus();
    });


    // Edit Ajax
    EditAjax(EditFormInputValue);


    // Update Ajax
    UpdateAjax('services');
    

    // Delete Ajax
    DeleteAjax('services');


    // Additional Edit Functionality
    function EditFormInputValue(item){
        $('#id').val(item.id);
        $('#updateTitle').val(item.title);
        $('#updateDetails').val(item.details);
        $('#updateIcon').val(item.icon);

        $('#updateTitle').focus();
    }; // End Method


    $('.iconpicker').iconpicker({
        placement: 'right'
    });
});