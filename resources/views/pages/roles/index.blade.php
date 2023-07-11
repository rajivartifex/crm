@extends('layouts.app')
@section('title')
    user-manage
@endsection
@section('style')
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>Roles</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="card card-primary">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Roles</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{ route('roles.create') }}" class="btn btn-sm btn-secondary" type="button">Create Role</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="roles-tbl" class="table table-bordered table-striped" style="font-size: 14px !important;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles  as $key => $role)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item btn-sm" href="{{ route('roles.edit',$role->id) }}"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Edit</a>
                                        <button class="dropdown-item btn-delete btn-sm" data-redirect-url="{{route('roles-delete')}}" data-id="{{$role->id}}"><i class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true"> </i> Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(function () {
        $("#roles-tbl").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
        });
    });

    $(document).on('click', '.btn-delete',function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-redirect-url');
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function (e) {
            if(e.isConfirmed){
                $.ajax({
                    type: "post",
                    url: url,
                    data: { id: id, _token: '{{csrf_token()}}'},
                    success: function(data){
                        Swal.fire(
                            'Deleted!',
                            'Deleted successfully!',
                            'success'
                            )
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                    }
                });
            }
        })
    });
</script>
@endsection
