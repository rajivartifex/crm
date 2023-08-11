@extends('layouts.app')
@section('title')
    @if (!empty($user))
        User Edit: {{ $user->id }}
    @else
        New User
    @endif
@endsection
@section('style')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>
                        @if (!empty($user))
                            User Edit: {{ $user->id }}
                        @else
                            New User
                        @endif
                    </h4>
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
            <h3 class="card-title">
                @if (!empty($user))
                    User Edit
                @else
                    New User
                @endif
            </h3>
        </div>
        <form class="users-form">
            <input type="hidden" name="ff[user_id]" value="{{ $user->id ?? '' }}" />
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control form-control-sm" name="name"
                                value="{{ $user->name ?? '' }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control form-control-sm" name="email"
                                value="{{ $user->email ?? '' }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" class="form-control form-control-sm" name="password"
                                value="{{ $user->password ?? '' }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Role</label>
                            @if (!empty($roles) && !empty($userRole))
                                {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control select2', 'multiple']) !!}
                            @else
                                {!! Form::select('roles[]', $roles, [], ['class' => 'form-control select2', 'multiple']) !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
                <a href="{{ route('users.index') }}" class="btn btn-default btn-sm">Back</a>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <!-- Select2 -->
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
@endsection
@section('bottom-js')
    @include('pages.manage-users.script')
@endsection
