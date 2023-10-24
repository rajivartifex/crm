@extends('layouts.app')
@section('title')
    Customer Report
@endsection
@section('style')
    <style>
        #customer-report-tbl_filter {
            margin-right: 80px;
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
                        <h4 class="card-title" id="custom-header">Customer Report</h4>
                        <a href="{{ route('customer-report-export') }}" id="custom-button"
                            class="btn btn-sm btn-secondary">Export</a>
                        <table id="customer-report-tbl" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Service</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Renewal Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($combined_reports_rec as $key => $list)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><a
                                                href="{{ route('customer-add-index', ['cust_id' => $list->cust_id ?? '']) }}">{{ $list->cust_business_name ?? '' }}</a>
                                        </td>
                                        <td>{{ $list->service ?? '' }}</td>
                                        <td>{{ $list->domain_name ?? '' }}
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
            $("#customer-report-tbl").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            });
        });
    </script>
@endsection
