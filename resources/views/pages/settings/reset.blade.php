@extends('layouts.app')
@section('title')
Password Reset
@endsection
@section('style')
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            {{-- <div class="col-sm-6">
                <h4>Profile Update</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                </ol>
            </div> --}}
        </div>
    </div>
</section>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Password Reset</h3>
    </div>
    <form method="post" action="{{route('change-password')}}">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Old Password</label>
                        <input type="password" class="form-control form-control-sm" name="old_password">
                        @if ($errors->has('old_password'))
                            <div class="error" style="color:red;">
                                {{ $errors->first('old_password') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">New Password</label>
                        <input type="password" class="form-control form-control-sm" name="new_password">
                        @if ($errors->has('new_password'))
                            <div class="error" style="color:red;">
                                {{ $errors->first('new_password') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Confirm Password</label>
                        <input type="password" class="form-control form-control-sm" name="new_confirm_password">
                        @if ($errors->has('new_confirm_password'))
                            <div class="error" style="color:red;">
                                {{ $errors->first('new_confirm_password') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
            <a href="{{route('profile-update')}}" class="btn btn-default btn-sm">Back</a>
        </div>
    </form>
</div>
@endsection
@section('script')
@endsection
@section('bottom-js')
@endsection
