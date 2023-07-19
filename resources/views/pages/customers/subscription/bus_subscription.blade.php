@extends('layouts.app')
@section('title')
    Add/Edit Hosting Subscription
@endsection
@section('style')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>C{{$customer->id ?? ''}} | Hosting Subscription | {{$custSub ? 'Edit' : 'Add'}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Hosting Subscription</h3>
    </div>
    <form class="business-subscription-form">
        <input type="hidden" name="ff[cust_id]" value="{{$customer->id ?? ''}}" />
        <input type="hidden" name="ff[sub_id]" value="{{$custSub->id ?? ''}}" />
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Website Name</label>
                        <input type="text" class="form-control form-control-sm" name="ff[cust_sub_website_name]" value="{{$custSub->cust_sub_website_name ?? ''}}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Domain Name</label>
                        <input type="text" class="form-control form-control-sm" name="ff[cust_sub_domain_name]" value="{{$custSub->cust_sub_domain_name ?? ''}}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Solution Type</label>
                        <select class="form-control form-control-sm select2" name="ff[cust_sub_solution_id]">
                            @foreach($solutionType as $type)
                            <option value="{{$type->id}}" {{$custSub ? ($custSub->cust_sub_solution_id == $type->id ? 'selected' : '') : ''}}>{{$type->type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Plan</label>
                        <input type="text" class="form-control form-control-sm" name="ff[cust_sub_plan]" value="{{$custSub->cust_sub_plan ?? ''}}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pricing</label>
                        <input type="text" class="form-control form-control-sm" name="ff[cust_sub_pricing]" value="{{$custSub->cust_sub_pricing ?? ''}}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Payment Mode</label>
                        <select class="form-control form-control-sm select2" name="ff[cust_sub_payment_mode_id]">
                            @foreach($paymentMode as $mode)
                            <option value="{{$mode->id}}" {{$custSub ? ($custSub->cust_sub_payment_mode_id == $mode->id ? 'selected' : '') : ''}}>{{$mode->type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Start Date</label>
                        <input type="date" class="form-control form-control-sm" name="ff[cust_sub_renewal_date]" value="{{$custSub->cust_sub_renewal_date ?? ''}}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Renewal Date</label>
                        <input type="date" class="form-control form-control-sm" name="ff[cust_sub_start_date]" value="{{$custSub->cust_sub_start_date ?? ''}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
            <a href="{{route('customer-add-index',['cust_id' => $customer->id ?? ''])}}" class="btn btn-default btn-sm">Back</a>
        </div>
    </form>
</div>
@endsection
@section('script')
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
@include('pages.customers.subscription.script')
@endsection
