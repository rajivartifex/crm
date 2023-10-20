@extends('layouts.app')
@section('title')
    customer-manage
@endsection
@section('style')
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage customer</h1>
                </div>
                <div class="col-sm-6">
                    @can('customer-create')
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('customer-add-index') }}"
                                    class="btn btn-sm btn-secondary">New</a></li>
                            {{-- <li class="breadcrumb-item active">DataTables</li> --}}
                        </ol>
                    @endcan
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                    <h3 class="card-title">Manage customers</h3>
                </div> --}}
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Customer Telephone</th>
                                    <th>Customer Email</th>
                                    @canany(['business-identity-edit', 'customer-delete'])
                                        <th>Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customer as $key => $list)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $list->cust_business_name ?? '' }}</td>
                                        <td>{{ $list->cust_business_telephone ?? '' }}</td>
                                        <td>{{ $list->cust_business_email ?? '' }}</td>
                                        @canany(['business-identity-edit', 'customer-delete'])
                                            <td>
                                                <div class="btn-group float-right">
                                                    @can('business-identity-edit')
                                                        <a href="{{ route('customer-add-index', ['cust_id' => $list->id ?? '']) }}"
                                                            class="btn btn-secondary btn-sm">Edit</a>
                                                    @endcan
                                                    <button type="button"
                                                        class="btn btn-sm btn-secondary dropdown-toggle dropdown-icon"
                                                        data-toggle="dropdown">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        @can('business-identity-edit')
                                                            <a class="dropdown-item btn-sm"
                                                                href="{{ route('customer-add-index', ['cust_id' => $list->id ?? '']) }}"><i
                                                                    class="nav-icon i-Close-Window font-weight-bold"
                                                                    aria-hidden="true"> </i> Edit</a>
                                                        @endcan
                                                        @can('customer-delete')
                                                            <button class="dropdown-item btn-delete btn-sm"
                                                                data-redirect-url="{{ route('customer-delete') }}"
                                                                data-id="{{ $list->id }}"><i
                                                                    class="nav-icon i-Close-Window font-weight-bold"
                                                                    aria-hidden="true"> </i> Delete</button>
                                                        @endcan
                                                    </div>
                                                </div>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('bottom-js')
    <script>
        $(function() {
            $("#example1").DataTable({
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
