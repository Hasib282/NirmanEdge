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
                {{-- Designation  --}}
                <div class="c-6">
                    <div class="form-input-group">
                        <label for="updateDesignation">Designation <span class="required" title="Required">*</span></label>
                        <input type="text" name="designation" class="form-input" id="updateDesignation">
                        <span class="error" id="update_designation_error"></span>
                    </div>
                </div>
                {{-- Management Post  --}}
                <div class="c-6">
                    <div class="form-input-group">
                        <label for="updateManagement_post">Management Post <span class="required" title="Required">*</span></label>
                        <input type="text" name="management_post" class="form-input" id="updateManagement_post">
                        <span class="error" id="update_management_post_error"></span>
                    </div>
                </div>
                {{-- Team Category --}}
                <div class="c-6">
                    <div class="form-input-group">
                        <label for="updateTeam_category">Project Type <span class="required" title="Required">*</span></label>
                        <input type="text" name="team_category" class="form-input" id="updateTeam_category" autocomplete="off"><hr>
                        <div id="update-team_category"></div>
                        <span class="error" id="update_team_category_error"></span>
                    </div>
                </div>
                {{-- details  --}}
                <div class="c-12">
                    <div class="form-input-group">
                        <label for="updateDetail">Extra Details <span class="required" title="Required">*</span></label>
                        <textarea name="details" id="updateDetail" cols="30" rows="50" class="form-input"></textarea>
                        <span class="error" id="update_details_error"></span>
                    </div>
                </div>
                {{-- image --}}
                <div class="c-6">
                    <div class="form-input-group">
                        <label for="updateImage">Image</label>
                        <input type="file" name="image" id="updateImage" class="form-input">
                        <span class="error" id="update_image_error"></span>
                        <img src="/storage/tsbd.png" alt="Selected Image" id="updatePreviewImage" style="width:150px; height:150px;">
                    </div>
                </div>
            </div>
            <div class="center">
                <button type="submit" class="btn-blue" id="Update">Update</button>
            </div>
        </form>
    </div>
</div>