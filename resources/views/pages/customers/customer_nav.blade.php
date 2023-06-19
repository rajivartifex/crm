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
                        <b>Business Name:</b> {{$customer->cust_business_name ?? ''}}
                    </div>
                    <hr>
                    <div class="col-sm-6">
                        <b> Business Country:</b> {{$customer->cust_business_country ?? ''}}
                    </div>
                    <hr>
                    <div class="col-sm-6">
                        <b>Business Telephone:</b> {{$customer->cust_business_telephone ?? ''}}
                    </div>
                    <div class="col-sm-6">
                        <b>Business Website:</b> {{$customer->cust_business_website ?? ''}}
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
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#cust-profile" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Profile</a>
                                    </li>
                                    @if($customer)
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#cust-about" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#cust-payment" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Payment</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#cust-web" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Social Media</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#cust-domain" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Domain</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#cust-subscription" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Hosting Subscription</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#cust-marketing" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Marketing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#cust-support" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Support</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="cust-profile" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                        @include('pages.customers.profile_section.profle')
                                    </div>
                                    <div class="tab-pane fade" id="cust-about" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                        @include('pages.customers.about_section.about')
                                    </div>
                                    <div class="tab-pane fade" id="cust-payment" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                                        @include('pages.customers.payment_section.payment')
                                    </div>
                                    <div class="tab-pane fade" id="cust-web" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                                        @include('pages.customers.web_section.web_tbl')
                                    </div>
                                    <div class="tab-pane fade" id="cust-domain" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                                        @include('pages.customers.domain.bus_domain_tbl')
                                    </div>
                                    <div class="tab-pane fade" id="cust-subscription" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                                        @include('pages.customers.subscription.bus_subscription_tbl')
                                    </div>
                                    <div class="tab-pane fade" id="cust-marketing" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                                        @include('pages.customers.marketing.bus_marketing_tbl')
                                    </div>
                                    <div class="tab-pane fade" id="cust-support" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                                        @include('pages.customers.support.bus_support_tbl')
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

