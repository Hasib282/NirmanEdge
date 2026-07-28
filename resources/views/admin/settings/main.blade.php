@extends('layouts.admin.layout')
@section('main-content')
    <div class="modal-heading banner">
        <div class="center">
            <h3>{{ $name }}</h3>
        </div>
    </div>

    <!-- form start -->
    <form id="SettingsForm" action="{{ route('settings.store') }}" method="post" style="padding: 0 15px">
        @csrf
        <div class="rows">
            {{-- title --}}
            <div class="c-6">
                <div class="form-input-group">
                    <label for="title">Title <span class="required" title="Required">*</span></label>
                    <input type="text" name="title" class="form-input" id="title" value="{{ $data->title }}">
                    <span class="error" id="title_error"></span>
                </div>
            </div>
            {{-- name --}}
            <div class="c-6">
                <div class="form-input-group">
                    <label for="name">Company Name <span class="required" title="Required">*</span></label>
                    <input type="text" name="name" class="form-input" id="name" value="{{ $data->name }}">
                    <span class="error" id="name_error"></span>
                </div>
            </div>
            {{-- Phone1 --}}
            <div class="c-6">
                <div class="form-input-group">
                    <label for="phone1">Phone 1 <span class="required" title="Required">*</span></label>
                    <input type="text" name="phone1" class="form-input" id="phone1" value="{{ $data->phone1 }}">
                    <span class="error" id="phone1_error"></span>
                </div>
            </div>
            {{-- Phone2 --}}
            <div class="c-6">
                <div class="form-input-group">
                    <label for="phone2">Phone 2 <span class="required" title="Required">*</span></label>
                    <input type="text" name="phone2" class="form-input" id="phone2" value="{{ $data->phone2 }}">
                    <span class="error" id="phone2_error"></span>
                </div>
            </div>
            {{-- email1 --}}
            <div class="c-6">
                <div class="form-input-group">
                    <label for="email1">Email 1 <span class="required" title="Required">*</span></label>
                    <input type="text" name="email1" class="form-input" id="email1" value="{{ $data->email1 }}">
                    <span class="error" id="email1_error"></span>
                </div>
            </div>
            {{-- email2 --}}
            <div class="c-6">
                <div class="form-input-group">
                    <label for="email2">Email 2 <span class="required" title="Required">*</span></label>
                    <input type="text" name="email2" class="form-input" id="email2" value="{{ $data->email2 }}">
                    <span class="error" id="email2_error"></span>
                </div>
            </div>
            {{-- address  --}}
            <div class="c-12">
                <div class="form-input-group">
                    <label for="address">Address <span class="required" title="Required">*</span></label>
                    <textarea name="address" id="address" cols="30" rows="10" class="form-input"> {{ $data->address }}</textarea>
                    <span class="error" id="address_error"></span>
                </div>
            </div>
            {{-- logo --}}
            <div class="c-6">
                <div class="form-input-group">
                    <label for="logo">logo</label>
                    <input type="file" name="logo" id="logo" class="form-input">
                    <span class="error" id="logo_error"></span>
                    
                </div>
            </div>
            <div class="c-6">
                <img src="/storage/{{$data->logo}}" alt="Selected Logo" id="previewImage"style="width:250px; height:100px;">
            </div>
            {{-- develop  --}}
            <input type="hidden" name="develop" id="develop" value="{{ $data->develop }}">
        </div>

        <div class="center">
            <button type="submit" id="Insert" class="btn-blue">Submit</button>
        </div>
    </form>


    <!-- ajax part start from here -->
    <script>
        $(document).ready(function () {
            $(document).off('submit', '#SettingsForm').on('submit', '#SettingsForm', function (e) {
                e.preventDefault();
                let formData = new FormData(this);
                
                $('#Insert').prop('disabled', true);
                requestMethod = "POST";

                $.ajax({
                    url: `${apiUrl}/settings`,
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: formData,
                    success: function (res) {
                        if (res.status) {
                            $('#SettingsForm')[0].reset();

                            toastr.success(res.message, 'Added!');

                            location.reload();
                        }
                    },
                    complete: function () {
                        $('#Insert').prop('disabled', false);
                    },
                });
            });
        });
    </script>
@endsection