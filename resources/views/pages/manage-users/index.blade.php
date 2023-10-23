@extends('layouts.app')
@section('title')
    User Manage
@endsection
@section('style')
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

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

                <div class="card-body">
                    <h4 class="card-title" id="custom-header">Manage Users</h4>
                    <a href="{{ route('users.create') }}" id="custom-button" class="btn btn-sm btn-secondary">New</a>
                    <table id="users-tbl" class="table table-bordered table-striped" style="font-size: 14px !important;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="btn btn-secondary btn-sm">Edit</a>
                                            <button type="button"
                                                class="btn btn-sm btn-secondary dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item btn-sm"
                                                    href="{{ route('users.edit', $user->id) }}"><i
                                                        class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true">
                                                    </i> Edit</a>
                                                <button class="dropdown-item btn-delete btn-sm"
                                                    data-redirect-url="{{ route('users-delete') }}"
                                                    data-id="{{ $user->id }}"><i
                                                        class="nav-icon i-Close-Window font-weight-bold" aria-hidden="true">
                                                    </i> Delete</button>
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
        $(function() {
            $("#users-tbl").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            });
        });

        $(document).on('click', '.btn-delete', function(e) {
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
            }).then(function(e) {
                if (e.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: url,
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            Swal.fire(
                                'Deleted!',
                                'Deleted successfully!',
                                'success'
                            )
                            setTimeout(function() {
                                location.reload(true);
                            }, 2000);
                        }
                    });
                }
            })
        });
    </script>
@endsection
