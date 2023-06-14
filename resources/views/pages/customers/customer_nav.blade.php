@extends('layouts.app')
@section('title')
    Customer Detail
@endsection
@section('style')
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Customer Detail</h5><br /><hr>
                <div class="row">
                    <div class="col-sm-6">
                        Business Name: {{$customer->cust_business_name ?? ''}}
                    </div>
                    <div class="col-sm-6">
                        Country this business is based in: {{$customer->cust_business_country ?? ''}}
                    </div>
                    <div class="col-sm-6">
                        Business Telephone: {{$customer->cust_business_telephone ?? ''}}
                    </div>
                    <div class="col-sm-6">
                        Business Website: {{$customer->cust_business_website ?? ''}}
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
                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Payment</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Social Media</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                        @include('pages.customers.profile_section.profle')
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                        @include('pages.customers.about_section.about')
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                                        @include('pages.customers.payment_section.payment')
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                                        @include('pages.customers.web_section.web_tbl')
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

