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
                {{-- name --}}
                <div class="c-6">
                    <div class="form-input-group">
                        <label for="name">{{ $name }} Name <span class="required" title="Required">*</span></label>
                        <input type="text" name="name" class="form-input" id="name">
                        <span class="error" id="name_error"></span>
                    </div>
                </div>
                {{-- client  --}}
                <div class="c-6">
                    <div class="form-input-group">
                        <label for = "client">Client Name <span class="required" title="Required">*</span></label>
                        <input type="client" name="client" id="client" class="form-input">
                        <span class="error" id="client_error"></span>
                    </div>
                </div>
                {{-- location  --}}
                <div class="c-12">
                    <div class="form-input-group">
                        <label for="location">Location <span class="required" title="Required">*</span></label>
                        <textarea name="location" id="location" cols="30" rows="10" class="form-input"></textarea>
                        <span class="error" id="location_error"></span>
                    </div>
                </div>
                {{-- project-type --}}
                <div class="c-4">
                    <div class="form-input-group">
                        <label for="project_type">Project Type <span class="required" title="Required">*</span></label>
                        <input type="text" name="project_type" class="form-input" id="project_type" autocomplete="off"><hr>
                        <div id="project_type-list"></div>
                        <span class="error" id="project_type_error"></span>
                    </div>
                </div>
                {{-- year  --}}
                <div class="c-4">
                    <div class="form-input-group">
                        <label for = "year">Year <span class="required" title="Required">*</span></label>
                        <input type="number" name="year" id="year" class="form-input">
                        <span class="error" id="year_error"></span>
                    </div>
                </div>
                {{-- status  --}}
                <div class="c-4">
                    <div class="form-input-group">
                        <label for="status">Status <span class="required" title="Required">*</span></label>
                        <select name="status" id="status">
                            <option value="1">Proposed</option>
                            <option value="2">Under Construction</option>
                            <option value="3">Completed</option>
                        </select>
                        <span class="error" id="status_error"></span>
                    </div>
                </div>
                {{-- details  --}}
                <div class="c-12">
                    <div class="form-input-group">
                        <label for="detail">Details <span class="required" title="Required">*</span></label>
                        <textarea name="details" id="detail" cols="30" rows="10" class="form-input"></textarea>
                        <span class="error" id="details_error"></span>
                    </div>
                </div>
                {{-- image --}}
                <div class="c-6">
                    <div class="form-input-group">
                        <label for="image">Image</label>
                        <input type="file" name="images[]" id="image" class="form-input" multiple>
                        <span class="error" id="images_error"></span>
                    </div>
                </div>
                <div class="c-6">
                    <h2>Preview Images:</h2>
                    <div id="selectImagePreview"></div>
                </div>
            </div>

            <div class="center">
                <button type="submit" class="btn-blue" id="Insert">Submit</button>
            </div>
        </form>
    </div>
</div>