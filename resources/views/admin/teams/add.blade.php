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
                {{-- designation  --}}
                <div class="c-6">
                    <div class="form-input-group">
                        <label for = "designation">Designation Name <span class="required" title="Required">*</span></label>
                        <input type="designation" name="designation" id="designation" class="form-input">
                        <span class="error" id="designation_error"></span>
                    </div>
                </div>
                {{-- Management Post  --}}
                <div class="c-6">
                    <div class="form-input-group">
                        <label for = "management_post">Management Post <span class="required" title="Required">*</span></label>
                        <input type="management_post" name="management_post" id="management_post" class="form-input">
                        <span class="error" id="management_post_error"></span>
                    </div>
                </div>
                {{-- Team Category --}}
                <div class="c-6">
                    <div class="form-input-group">
                        <label for="team_category">Team Category <span class="required" title="Required">*</span></label>
                        <input type="text" name="team_category" class="form-input" id="team_category" autocomplete="off"><hr>
                        <div id="team_category-list"></div>
                        <span class="error" id="team_category_error"></span>
                    </div>
                </div>
                {{-- details  --}}
                <div class="c-12">
                    <div class="form-input-group">
                        <label for="detail">Details <span class="required" title="Required">*</span></label>
                        <textarea name="detail" id="detail" cols="30" rows="50" class="form-input"></textarea>
                        <span class="error" id="detail_error"></span>
                    </div>
                </div>
                {{-- image --}}
                <div class="c-6">
                    <div class="form-input-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-input">
                        <span class="error" id="image_error"></span>
                        <img src="/images/male.png" alt="Selected Image" id="previewImage"style="width:150px; height:150px;">
                    </div>
                </div>
            </div>

            <div class="center">
                <button type="submit" class="btn-blue" id="Insert">Submit</button>
            </div>
        </form>
    </div>
</div>