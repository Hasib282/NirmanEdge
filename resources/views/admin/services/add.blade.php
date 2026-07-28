<div id="addModal" class="modal-container">
    <div class="modal-subject" style="width: 80%;">
        <div class="modal-heading banner">
            <div class="center">
                <h3>Add {{ $name }}</h3>
                <span class="close-modal" data-modal-id="addModal">&times;</span>
            </div>
        </div>
        <!-- form start -->
        <form id="AddForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="rows">
                {{-- title --}}
                <div class="c-6">
                    <div class="form-input-group">
                        <label for="title">{{ $name }} Title <span class="required" title="Required">*</span></label>
                        <input type="text" name="title" class="form-input" id="title">
                        <span class="error" id="title_error"></span>
                    </div>
                </div>
                {{-- details  --}}
                <div class="c-6">
                    <div class="form-input-group">
                        <label for="detail">Details <span class="required" title="Required">*</span></label>
                        <textarea name="details" id="detail" cols="30" rows="10" class="form-input"></textarea>
                        <span class="error" id="details_error"></span>
                    </div>
                </div>
                {{-- icon  --}}
                <div class="c-6">
                    <div class="form-input-group">
                        <label for="icon">Icon <span class="required" title="Required">*</span></label>
                        <input type="icon" name="icon" id="icon" class="form-input iconpicker">
                        <span class="error" id="icon_error"></span>
                    </div>
                </div>
            </div>

            <div class="center">
                <button type="submit" class="btn-blue" id="Insert">Submit</button>
            </div>
        </form>
    </div>
</div>