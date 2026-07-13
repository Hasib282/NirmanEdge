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
                {{-- email  --}}
                <div class="c-6">
                    <div class="form-input-group">
                        <label for="email">Email <span class="required" title="Required">*</span></label>
                        <input type="text" name="email" class="form-input" id="email">
                        <span class="error" id="email_error"></span>
                    </div>
                </div>
                {{-- password  --}}
                <div class="c-6">
                    <div class="form-input-group">
                        <label for = "password">Password <span class="required" title="Required">*</span></label>
                        <input type="password" name="password" id="password" class="form-input">
                        <span class="error" id="password_error"></span>
                    </div>
                </div>
                {{-- confirm Password  --}}
                <div class="c-6">
                    <div class="form-input-group">
                        <label for = "password_confirmation">Confirm Password <span class="required" title="Required">*</span></label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-input">
                        <span class="error" id="password_confirmation_error"></span>
                    </div>
                </div>
            </div>

            <div class="center">
                <button type="submit" class="btn-blue" id="Insert">Submit</button>
            </div>
        </form>
    </div>
</div>