@extends('layouts.app')
@section('title')
    @if (!empty($role))
        Role Edit: {{ $role->id }}
    @else
        New Role
    @endif
@endsection
@section('style')
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>
                        @if (!empty($role))
                            Role Edit: {{ $role->id }}
                        @else
                            New Role
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
                @if (!empty($role))
                    Role Edit
                @else
                    New Role
                @endif
            </h3>
        </div>
        <form class="roles-form">
            <input type="hidden" name="ff[role_id]" value="{{ $role->id ?? '' }}" />
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control form-control-sm" name="name"
                                value="{{ $role->name ?? '' }}">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group float-right">
                            <a id="checkAll" class="btn btn-secondary btn-sm">Check All</a> &nbsp; &nbsp;
                            <a id="uncheckAll" class="btn btn-secondary btn-sm">Uncheck All</a>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <h5>Permission</h5>
                            <div class="checkbox-list">
                                @if (!empty($rolePermissions))
                                    @foreach ($permission as $value)
                                        <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                            {{ $value->name }}</label>
                                        <br />
                                    @endforeach
                                @else
                                    @foreach ($permission as $value)
                                        <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                                            {{ $value->name }}</label>
                                        <br />
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
                <a href="{{ route('customer-add-index', ['cust_id' => $customer->id ?? '']) }}"
                    class="btn btn-default btn-sm">Back</a>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#checkAll').click(function() {
                $('input:checkbox.name').prop('checked', true);
            });

            $('#uncheckAll').click(function() {
                $('input:checkbox.name').prop('checked', false);
            });
        });
    </script>
@endsection
@section('bottom-js')
    @include('pages.roles.script')
@endsection
