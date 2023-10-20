@extends('layouts.app')
@section('title')
    Customer Report
@endsection
@section('style')
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Customer Report</h1>
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
                                    <th>Service Name</th>
                                    <th>Type</th>
                                    <th>Renewal Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($combined_reports_rec as $key => $list)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $list->cust_business_name ?? '' }}</td>
                                        <td>{{ $list->cust_domain_name ?? ($list->cust_sub_website_name ?? ($list->cust_mark_domain_name ?? ($list->cust_sup_product_name ?? ''))) }}
                                        </td>
                                        <td>{{ $list->type ?? '' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($list->cust_domain_renewal_date ?? ($list->cust_sub_renewal_date ?? ($list->cust_mark_renewal_date ?? ($list->cust_sup_renewal_date ?? ''))))->format('d-m-Y') }}
                                        </td>
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
    </script>
@endsection
