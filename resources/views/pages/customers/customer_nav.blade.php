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
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
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
                                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                            @can('domain-list')
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="custom-tabs-two-domain-tab"
                                                        data-toggle="pill" href="#cust-domain" role="tab"
                                                        aria-controls="cust-domain" aria-selected="false">Domain</a>
                                                </li>
                                            @endcan
                                            @can('hosting-subscription-list')
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-two-subscription-tab" data-toggle="pill"
                                                        href="#cust-subscription" role="tab"
                                                        aria-controls="cust-subscription" aria-selected="false">Hosting
                                                        Subscription</a>
                                                </li>
                                            @endcan
                                            @can('marketing-list')
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-two-marketing-tab" data-toggle="pill"
                                                        href="#cust-marketing" role="tab" aria-controls="cust-marketing"
                                                        aria-selected="false">Marketing</a>
                                                </li>
                                            @endcan
                                            @can('support-list')
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-two-support-tab" data-toggle="pill"
                                                        href="#cust-support" role="tab" aria-controls="cust-support"
                                                        aria-selected="false">Support</a>
                                                </li>
                                            @endcan
                                        </ul>
                                        <div class="tab-content" id="custom-tabs-two-tabContent">
                                            @can('domain-list')
                                                <div class="tab-pane fade show active" id="cust-domain" role="tabpanel"
                                                    aria-labelledby="custom-tabs-two-domain-tab">
                                                    @include('pages.customers.domain.bus_domain_tbl')
                                                </div>
                                            @endcan
                                            @can('hosting-subscription-list')
                                                <div class="tab-pane fade" id="cust-subscription" role="tabpanel"
                                                    aria-labelledby="custom-tabs-two-subscription-tab">
                                                    @include('pages.customers.subscription.bus_subscription_tbl')
                                                </div>
                                            @endcan
                                            @can('marketing-list')
                                                <div class="tab-pane fade" id="cust-marketing" role="tabpanel"
                                                    aria-labelledby="custom-tabs-two-marketing-tab">
                                                    @include('pages.customers.marketing.bus_marketing_tbl')
                                                </div>
                                            @endcan
                                            @can('support-list')
                                                <div class="tab-pane fade" id="cust-support" role="tabpanel"
                                                    aria-labelledby="custom-tabs-two-support-tab">
                                                    @include('pages.customers.support.bus_support_tbl')
                                                </div>
                                            @endcan
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custdetails" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-custdetails-tab">
                                        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                                                    href="#cust-profile" role="tab" aria-controls="cust-profile"
                                                    aria-selected="true">Profile</a>
                                            </li>
                                            @if ($customer)
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-three-about-tab"
                                                        data-toggle="pill" href="#cust-about" role="tab"
                                                        aria-controls="cust-about" aria-selected="false">About</a>
                                                </li>
                                                @can('working-hours-list')
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="custom-tabs-three-working-hours-tab"
                                                            data-toggle="pill" href="#cust-working-hours" role="tab"
                                                            aria-controls="cust-working-hours" aria-selected="false">Working
                                                            Hours</a>
                                                    </li>
                                                @endcan
                                                @can('payment-accepted-list')
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="custom-tabs-three-payment-tab"
                                                            data-toggle="pill" href="#cust-payment" role="tab"
                                                            aria-controls="cust-payment" aria-selected="false">Payment</a>
                                                    </li>
                                                @endcan
                                                @can('social-media-list')
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="custom-tabs-three-web-tab" data-toggle="pill"
                                                            href="#cust-web" role="tab" aria-controls="cust-web"
                                                            aria-selected="false">Social Media</a>
                                                    </li>
                                                @endcan
                                            @endif
                                        </ul>
                                        <div class="tab-content" id="custom-tabs-three-tabContent">
                                            <div class="tab-pane fade" id="cust-profile" role="tabpanel"
                                                aria-labelledby="custom-tabs-three-profile-tab">
                                                @include('pages.customers.profile_section.profle')
                                            </div>
                                            <div class="tab-pane fade" id="cust-about" role="tabpanel"
                                                aria-labelledby="custom-tabs-three-about-tab">
                                                @include('pages.customers.about_section.about')
                                            </div>
                                            @can('working-hours-list')
                                                <div class="tab-pane fade" id="cust-working-hours" role="tabpanel"
                                                    aria-labelledby="custom-tabs-three-working-hours-tab">
                                                    @include('pages.customers.working_hours.index')
                                                </div>
                                            @endcan
                                            @can('payment-accepted-list')
                                                <div class="tab-pane fade" id="cust-payment" role="tabpanel"
                                                    aria-labelledby="custom-tabs-three-payment-tab">
                                                    @include('pages.customers.payment_section.payment')
                                                </div>
                                            @endcan
                                            @can('social-media-list')
                                                <div class="tab-pane fade" id="cust-web" role="tabpanel"
                                                    aria-labelledby="custom-tabs-three-web-tab">
                                                    @include('pages.customers.web_section.web_tbl')
                                                </div>
                                            @endcan
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="log" role="tabpanel"
                                        aria-labelledby="custom-tabs-two-log-tab">
                                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                            @can('log-list')
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-four-log-tab" data-toggle="pill"
                                                        href="#cust-log" role="tab" aria-controls="cust-log"
                                                        aria-selected="false">Log</a>
                                                </li>
                                            @endcan
                                        </ul>
                                        <div class="tab-content" id="custom-tabs-four-tabContent">
                                            @can('log-list')
                                                <div class="tab-pane fade" id="cust-log" role="tabpanel"
                                                    aria-labelledby="custom-tabs-four-log-tab">
                                                    @include('pages.customers.logs.log')
                                                </div>
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
    </div>
@endsection
@section('bottom-js')
@endsection
