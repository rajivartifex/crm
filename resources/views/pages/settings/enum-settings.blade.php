@extends('layouts.app')
@section('title')
    Enum Settings
@endsection
@section('style')
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>General Settings</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
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
                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                            href="#business-category" role="tab"
                                            aria-controls="custom-tabs-business-category" aria-selected="true">Category</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-home-tab" data-toggle="pill"
                                            href="#payment-type" role="tab" aria-controls="custom-tabs-one-home"
                                            aria-selected="true">Payment Type</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-home-tab" data-toggle="pill"
                                            href="#solution-type" role="tab" aria-controls="custom-tabs-solution-type"
                                            aria-selected="false">Solution Type</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-home-tab" data-toggle="pill"
                                            href="#payment-mode" role="tab" aria-controls="custom-tabs-payment-mode"
                                            aria-selected="false">Payment Mode</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-home-tab" data-toggle="pill"
                                            href="#marketing-type" role="tab" aria-controls="custom-tabs-marketing-type"
                                            aria-selected="false">Marketing Type</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="business-category" role="tabpanel"
                                        aria-labelledby="custom-tabs-business-category">
                                        @include('pages.settings.category-tbl')
                                    </div>
                                    <div class="tab-pane fade" id="payment-type" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-home-tab">
                                        @include('pages.settings.payment-tbl')
                                    </div>
                                    <div class="tab-pane fade" id="solution-type" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-solution-type-tab">
                                        @include('pages.settings.solution-tbl')
                                    </div>
                                    <div class="tab-pane fade" id="payment-mode" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-payment-mode-tab">
                                        @include('pages.settings.paymentmode-tbl')
                                    </div>
                                    <div class="tab-pane fade" id="marketing-type" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-marketing-type-tab">
                                        @include('pages.settings.marketing-tbl')
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
@section('script')
@endsection
@section('bottom-js')
    @include('pages.settings.script')
@endsection
