@extends('layouts.app')
@section('title')
Profile Update
@endsection
@section('style')
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>Profile Update</h4>
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
        <h3 class="card-title">Profile Update</h3>
    </div>
    <form method="post" action="{{route('profile-store')}}">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control form-control-sm" name="name" value="{{$user->name ?? ''}}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control form-control-sm" name="email" value="{{$user->email ?? ''}}">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <a href="{{route('password-reset')}}" style="color: #7367f0">Click here to reset password</a>
                    </div>
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
@endsection
@section('bottom-js')
@endsection
