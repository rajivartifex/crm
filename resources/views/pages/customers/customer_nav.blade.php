@extends('layouts.app')
@section('title')
    Customer Detail
@endsection
@section('style')
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Customer Detail</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <b>Business Name:</b> {{ $customer->cust_business_name ?? '' }}
                        </div>
                        <hr>
                        <div class="col-sm-6">
                            <b> Business Country:</b> {{ $customer->cust_business_country ?? '' }}
                        </div>
                        <hr>
                        <div class="col-sm-6">
                            <b>Business Telephone:</b> {{ $customer->cust_business_telephone ?? '' }}
                        </div>
                        <div class="col-sm-6">
                            <b>Business Website:</b> {{ $customer->cust_business_website ?? '' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs top-one" id="custom-tabs-one-tab" role="tablist">
                                    @if ($customer)
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-one-services-tab" data-toggle="pill"
                                                href="#services" role="tab" aria-controls="services"
                                                aria-selected="true">Services</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-custdetails-tab" data-toggle="pill"
                                                href="#custdetails" role="tab" aria-controls="custdetails"
                                                aria-selected="true">Customer
                                                Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-log-tab" data-toggle="pill"
                                                href="#log" role="tab" aria-controls="log"
                                                aria-selected="false">Log</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="services" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-services-tab">
                                        @include('pages.customers.services.service')
                                    </div>
                                    <div class="tab-pane fade" id="custdetails" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-custdetails-tab">
                                        @include('pages.customers.custdetails.custdetail')
                                    </div>
                                    <div class="tab-pane fade" id="log" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-log-tab">
                                        @can('log-list')
                                            @include('pages.customers.logs.log')
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('bottom-js')
    <script>

    </script>
@endsection
