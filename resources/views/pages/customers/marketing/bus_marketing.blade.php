@extends('layouts.app')
@section('title')
    Add/Edit Marketing
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
                <h4>C{{$customer->id ?? ''}} | Marketing | {{$custMarketing ? 'Edit' : 'Add'}}</h4>
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
        <h3 class="card-title">Marketing</h3>
    </div>
    <form class="business-marketing-form">
        <input type="hidden" name="ff[cust_id]" value="{{$customer->id ?? ''}}" />
        <input type="hidden" name="ff[mk_id]" value="{{$custMarketing->id ?? ''}}" />
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Domain Name</label>
                        <input type="text" class="form-control form-control-sm" name="ff[cust_mark_domain_name]" value="{{$custMarketing->cust_mark_domain_name ?? ''}}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Marketing Type</label>
                        <select class="form-control form-control-sm select2" name="ff[cust_mark_type_id]">
                            @foreach($marketingType as $type)
                            <option value="{{$type->id}}" {{$custMarketing ? ($custMarketing->cust_mark_type_id == $type->id ? 'selected' : '') : ''}}>{{$type->type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Start Date</label>
                        <input type="date" class="form-control form-control-sm" name="ff[cust_mark_start_date]" value="{{$custMarketing->cust_mark_start_date ?? ''}}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Renewal Date</label>
                        <input type="date" class="form-control form-control-sm" name="ff[cust_mark_renewal_date]" value="{{$custMarketing->cust_mark_renewal_date ?? ''}}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Plan</label>
                        <input type="text" class="form-control form-control-sm" name="ff[cust_mark_plan]" value="{{$custMarketing->cust_mark_plan ?? ''}}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pricing</label>
                        <input type="text" class="form-control form-control-sm" name="ff[cust_mark_pricing]" value="{{$custMarketing->cust_mark_pricing ?? ''}}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Payment Type</label>
                        <select class="form-control form-control-sm select2" name="ff[cust_mark_payment_mode_id]">
                            @foreach($paymentMode as $mode)
                            <option value="{{$mode->id}}" {{$custMarketing ? ($custMarketing->cust_mark_payment_mode_id == $mode->id ? 'selected' : '') : ''}}>{{$mode->type}}</option>
                            @endforeach
                        </select>
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
@include('pages.customers.marketing.script')
@endsection
