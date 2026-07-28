<div id="editModal" class="modal-container">
    <div class="modal-subject" style="width: 80%;">
        <div class="modal-heading banner">
            <div class="center">
                <h3 class="card-title">Edit {{ $name }}</h3>
                <span class="close-modal" data-modal-id="editModal">&times;</span>
            </div>
        </div>

        <!-- form start -->
        <form id="EditForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="rows">
                {{-- id  --}}
                <input type="hidden" name="id" id="id">
                {{-- title --}}
                <div class="c-6">
                    <div class="form-input-group">
                        <label for="updateTitle">{{ $name }} Name <span class="required" title="Required">*</span></label>
                        <input type="text" name="title" class="form-input" id="updateTitle">
                        <span class="error" id="update_title_error"></span>
                    </div>
                </div>
                {{-- details  --}}
                <div class="c-6">
                    <div class="form-input-group">
                        <label for="updateDetails">Details <span class="required" title="Required">*</span></label>
                        <textarea name="details" id="updateDetails" cols="30" rows="10" class="form-input"></textarea>
                        {{-- <input type="text" name="email"  id="updateEmail"> --}}
                        <span class="error" id="update_details_error"></span>
                    </div>
                </div>
                {{-- icon  --}}
                <div class="c-6">
                    <div class="form-input-group">
                        <label for="updateIcon">Icon <span class="required" title="Required">*</span></label>
                        <input type="icon" name="icon" id="updateIcon" class="form-input iconpicker">
                        <span class="error" id="update_icon_error"></span>
                    </div>
                </div>
            </div>
            <div class="center">
                <button type="submit" class="btn-blue" id="Update">Update</button>
            </div>
        </form>
    </div>
</div>