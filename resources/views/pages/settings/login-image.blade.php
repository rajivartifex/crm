@extends('layouts.app')
@section('title')
    Login Background Image
@endsection
@section('style')
    <style>
        #previewImage {
            width: 150px;
            height: 100px;
        }

        #existingpreviewImage {
            width: 150px;
            height: 100px;
        }
    </style>
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Login Background Image</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Login Background Image</h3>
        </div>
        <form action="{{ route('login-image-upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" class="loginImageId" value="{{ $login_image->id ?? 0 }}" />
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="file" class="form-control" name="login_image" accept="image/*" id="uploadFile">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div id="imagePreview" style="display: none;">
                            <img id="previewImage" src="#" alt="Uploaded Image">
                        </div>
                        @if (isset($login_image))
                            <div id="existingImagePreview" style="display: none;">
                                <img id="existingpreviewImage" src="{{ asset('login_image/' . $login_image->login_image) }}"
                                    alt="Existing Image">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
                {{-- <a href="{{route('customer-add-index',['cust_id' => $customer->id ?? ''])}}" class="btn btn-default btn-sm">Back</a> --}}
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var id$ = $(".loginImageId").val();

            if (id$) {
                $('#existingImagePreview').show();
            }

            $('#uploadFile').change(function(e) {
                var file = e.target.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#previewImage').attr('src', e.target.result);
                        $('#imagePreview').show();
                        $('#existingImagePreview').hide();
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
@section('bottom-js')
@endsection
