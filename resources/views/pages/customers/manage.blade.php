@extends('layouts.app')
@section('title')
    customer-manage
@endsection
@section('style')
    <style>
        #customer-datatable_filter {
            margin-right: 60px;
        }
    </style>
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" id="custom-header">Manage Customer</h4>
                        @can('customer-create')
                            <a href="{{ route('customer-add-index') }}" id="custom-button"
                                class="btn btn-sm btn-secondary">New</a>
                        @endcan
                        <table id="customer-datatable" class="table table-bordered table-striped">
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
                                        <td>{{ $list->cust_business_name ?? '' }}<br />
                                            <?php $domain = \App\Models\CustDomain::where('cust_id', $list->id)->count(); ?>
                                            @if ($domain)
                                                <span class="right badge badge-info" title="Domain"><a
                                                        href="{{ route('customer-add-index', ['cust_id' => $list->id ?? '']) . '#domain' }}"
                                                        style="color: white">Domain ({{ $domain }}) </a></span>
                                            @endif
                                            <?php $marketing = \App\Models\CustMarketing::where('cust_id', $list->id)->count(); ?>
                                            @if ($marketing)
                                                <span class="right badge badge-warning" title="Marketing"><a
                                                        href="{{ route('customer-add-index', ['cust_id' => $list->id ?? '']) . '#marketing' }}"
                                                        style="color: black">Marketing ({{ $marketing }}) </a></span>
                                            @endif
                                            <?php $support = \App\Models\CustSupport::where('cust_id', $list->id)->count(); ?>
                                            @if ($support)
                                                <span class="right badge badge-danger" title="Support"><a
                                                        href="{{ route('customer-add-index', ['cust_id' => $list->id ?? '']) . '#support' }}"
                                                        style="color: white">Support ({{ $support }}) </a></span>
                                            @endif
                                            <?php $hosting = \App\Models\CustSubscription::where('cust_id', $list->id)->count(); ?>
                                            @if ($hosting)
                                                <span class="right badge badge-success" title="Hosting"><a
                                                        href="{{ route('customer-add-index', ['cust_id' => $list->id ?? '']) . '#hosting' }}"
                                                        style="color: white">Hosting ({{ $hosting }}) </a></span>
                                            @endif
                                        </td>
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
            $("#customer-datatable").DataTable({
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
