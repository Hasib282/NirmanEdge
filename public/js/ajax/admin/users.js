function ShowAdmins(res) {
    tableInstance = new GenerateTable({
        tableId: '#data-table',
        data: res.data,
        tbody: ['name','email'],
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
        { label: 'Name', key: 'name' },
        { label: 'Email', key: 'email' },
        { label: 'Action', type: 'button' }
    ]);


    // Load Data on Hard Reload
    ReloadData('users', ShowAdmins);
    

    // Add Modal Open Functionality
    AddModalFunctionality("#name");


    // Insert Ajax
    InsertAjax('users', {}, function() {
        $('#name').focus();
    });


    // Edit Ajax
    EditAjax(EditFormInputValue);


    // Update Ajax
    UpdateAjax('users');
    

    // Delete Ajax
    DeleteAjax('users');


    // Additional Edit Functionality
    function EditFormInputValue(item){
        $('#id').val(item.id);
        $('#updateName').val(item.name);
        $('#updateEmail').val(item.email);

        $('#updateName').focus();
    }; // End Method
});