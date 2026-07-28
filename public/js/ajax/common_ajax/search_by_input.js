let timeoutId = null;
// Search By Input Function For Searching in Input
function SearchByInput(link, getData, targetInput, targetUl, targetList, tableData = undefined, targetTable="", AdditionalEvent = undefined, RemoveData = undefined) {
    let keyDownProcessed = false;
    // Keydown Event
    $(document).off('keydown', targetInput).on('keydown', targetInput, function (e) {
        keyDownProcessed = true;
        setTimeout(() => {
            let data = getData($(this));
            KeyDown(e, link, data, targetUl, targetList, targetInput, AdditionalEvent, RemoveData);
            $(targetTable).html('');
        }, 0);
    });



    // List Keypup Event
    $(document).off('keydown', `${targetList}`).on('keydown', `${targetList}`, function (e) {
        // Skip the list keyup event if input keydown was processed
        if (keyDownProcessed) {
            keyDownProcessed = false; // Reset the flag
            return;
        }

        ListKeyUp(e, targetUl, targetList, targetInput, AdditionalEvent);
    });



    // Focus Event
    $(document).off('focus', targetInput).on('focus', targetInput, function (e) {
        let data = getData($(this));
        let id = $(this).attr('data-id');
        if(id == undefined) {
            GetInputList(link, data, targetUl);
        }
        else{
            if (typeof tableData === "function") {
                tableData(id);
            }
        }
    });



    // Focous out event
    $(document).off('focusout', targetInput).on('focusout', targetInput, function (e) {
        let id = $(this).attr('data-id');
        if(id == undefined){
            $(document).on('click', function (e){
                if($(e.target).attr('tabindex') == undefined){
                    $(targetUl).html('');
                }
            });
        }
    });


    // Company List Click Event
    $(document).off('click', `${targetList}`).on('click', `${targetList}`, function () {
        let value = $(this).text();
        let id = $(this).data('id');
        
        $(targetInput).val(value);
        $(targetInput).attr('data-id', id);
        $(targetUl).html('');

        // Additional Events If Needed
        if (typeof AdditionalEvent === "function") {
            AdditionalEvent(targetInput, $(this));
        }
        
        $(targetInput).focus();
    });
}





// Keydown Event Function Start
function KeyDown(e, link, data, targetUl, targetList, targetInput, AdditionalEvent, RemoveData){
    let key = e.key;
    let list = $(`${targetList}`);
    
    if (key === 'Enter') { // Enter Key
        e.preventDefault();
    }
    else if (key === 'Tab') { // Tab key
        $(targetUl).html('');
    }
    else if ((key.length === 1 && key.match(/^[a-zA-Z0-9]$/)) || key === "Backspace" || key === 'Space'){
        $(targetInput).removeAttr('data-id');

        // Remove Input Data Events If Needed
        if (typeof RemoveData === "function") {
            RemoveData(targetInput);
        }
        
        if (timeoutId) {
            clearTimeout(timeoutId);
        }

        // Set a new timeout for the GetInputList call
        timeoutId = setTimeout(() => {
            GetInputList(link, data, targetUl);
        }, 800);
    }
    if (list.length > 0) {
        if (key === 'ArrowDown') {
            e.preventDefault();
            UpdateInput(list, 0, targetInput, AdditionalEvent);
        } 
        else if (key === 'ArrowUp') {
            e.preventDefault();
            UpdateInput(list, list.length - 1, targetInput, AdditionalEvent);
        }
    }
} // Keydown Event Function End




// List Keyup Event Function Start
function ListKeyUp(e, targetUl, targetList, targetInput, AdditionalEvent) {
    e.preventDefault();
    let key = e.key;
    let list = $(`${targetList}`);
    let focused = $(`${targetList}:focus`);
    let nextIndex, prevIndex;

    if (key === 'ArrowDown') {
        nextIndex = (focused.index() + 1) % list.length;
        UpdateInput(list, nextIndex, targetInput, AdditionalEvent);
    } 
    else if (key === 'ArrowUp') {
        prevIndex = (focused.index() - 1) % list.length;
        UpdateInput(list, prevIndex, targetInput, AdditionalEvent);
    }
    else if (key === 'Enter') {
        $(targetUl).html('');
        $(targetInput).focus();
    }
}



// Update The Input Value When Focusing on Lists
function UpdateInput(list, index, targetInput, AdditionalEvent) {
    let item = list.eq(index);
    item.focus();
    $(targetInput).val(item.text());
    $(targetInput).attr("data-id", item.data('id'));
    
    // Additional Events If Needed
    if (typeof AdditionalEvent === "function") {
        AdditionalEvent(targetInput, item);
    }
}





$(document).ready(function () {
    /////////////// ------------------ Search Company by name and add value to input ajax part start ---------------- /////////////////////////////
    // Company Input Search
    SearchByInput(
        'projects/type/get', 

        function ($input) {
            return {
                type: $input.val(),
            };
        }, 

        '#project_type', 

        '#project_type-list',

        '#project_type-list li',
    );


    // Update Company Input Search
    SearchByInput(
        'projects/type/get', 

        function ($input) {
            return {
                type: $input.val(),
            };
        }, 

        '#updateProject_type', 

        '#update-project_type',

        '#update-project_type li',
    );
    
    
    /////////////// ------------------ Search Company by name and add value to input ajax part start ---------------- /////////////////////////////
    // Company Input Search
    SearchByInput(
        'teams/category/get', 

        function ($input) {
            return {
                category: $input.val(),
            };
        }, 

        '#team_category', 

        '#team_category-list',

        '#team_category-list li',
    );


    // Update Company Input Search
    SearchByInput(
        'teams/category/get', 

        function ($input) {
            return {
                category: $input.val(),
            };
        }, 

        '#updateTeam_category', 

        '#update-team_category',

        '#update-team_category li',
    );

});