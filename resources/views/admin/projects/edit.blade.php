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
                {{-- name --}}
                <div class="c-6">
                    <div class="form-input-group">
                        <label for="updateName">{{ $name }} Name <span class="required" title="Required">*</span></label>
                        <input type="text" name="name" class="form-input" id="updateName">
                        <span class="error" id="update_name_error"></span>
                    </div>
                </div>
                {{-- client  --}}
                <div class="c-6">
                    <div class="form-input-group">
                        <label for="updateClient">Client <span class="required" title="Required">*</span></label>
                        <input type="text" name="client" class="form-input" id="updateClient">
                        <span class="error" id="update_client_error"></span>
                    </div>
                </div>
                {{-- location  --}}
                <div class="c-12">
                    <div class="form-input-group">
                        <label for="updateLocation">Location <span class="required" title="Required">*</span></label>
                        <textarea name="location" id="updateLocation" cols="30" rows="10" class="form-input"></textarea>
                        <span class="error" id="update_location_error"></span>
                    </div>
                </div>
                {{-- project-type --}}
                <div class="c-4">
                    <div class="form-input-group">
                        <label for="updateProject_type">Project Type <span class="required" title="Required">*</span></label>
                        <input type="text" name="project_type" class="form-input" id="updateProject_type" autocomplete="off"><hr>
                        <div id="update-project_type"></div>
                        <span class="error" id="update_project_type_error"></span>
                    </div>
                </div>
                {{-- year  --}}
                <div class="c-4">
                    <div class="form-input-group">
                        <label for = "updateYear">Year <span class="required" title="Required">*</span></label>
                        <input type="number" name="year" id="updateYear" class="form-input">
                        <span class="error" id="update_year_error"></span>
                    </div>
                </div>
                {{-- status  --}}
                <div class="c-4">
                    <div class="form-input-group">
                        <label for="updateStatus">Status <span class="required" title="Required">*</span></label>
                        <select name="status" id="updateStatus">
                            <option value="1">Proposed</option>
                            <option value="2">Under Construction</option>
                            <option value="3">Completed</option>
                        </select>
                        <span class="error" id="update_status_error"></span>
                    </div>
                </div>
                {{-- details  --}}
                <div class="c-12">
                    <div class="form-input-group">
                        <label for="updateDetail">Extra Details <span class="required" title="Required">*</span></label>
                        <textarea name="details" id="updateDetail" cols="30" rows="10" class="form-input"></textarea>
                        <span class="error" id="update_details_error"></span>
                    </div>
                </div>
                {{-- image --}}
                <div class="c-6">
                    <div class="form-input-group">
                        <label for="updateImage">Image</label>
                        <input type="file" name="images[]" id="updateImage" class="form-input" multiple>
                        <span class="error" id="update_images_error"></span>
                        {{-- <img src="/storage/tsbd.png" alt="Selected Image" id="previewImage" style="width:150px; height:150px;"> --}}
                    </div>
                </div>
                <div class="c-12">
                    <h2>New Images:</h2>
                    <div id="newImagePreview"></div>
                    <h2>Previous Images:</h2>
                    <div id="oldImagePreview"></div>
                </div>
            </div>
            <div class="center">
                <button type="submit" class="btn-blue" id="Update">Update</button>
            </div>
        </form>
    </div>
</div>