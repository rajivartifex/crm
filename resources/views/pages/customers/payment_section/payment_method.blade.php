@extends('layouts.app')
@section('title')
    Add/Edit Payment Methods Accepted
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
                <h4>C{{$customer->id ?? ''}} | Payment Methods Accepted | {{$custPayment ? 'Edit' : 'Add'}}</h4>
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
        <h3 class="card-title">Payment Methods Accepted</h3>
    </div>
    <form class="business-payment-form">
        <input type="hidden" name="ff[cust_id]" value="{{$customer->id ?? ''}}" />
        <input type="hidden" name="ff[pay_id]" value="{{$custPayment->id ?? ''}}" />
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Payments Methods</label>
                        <select class="select2" multiple="multiple" name="ff[cust_payment_id][]" data-placeholder="Select a Payment" style="width: 100%;">
                            @foreach($payments as $pay)
                                <option value="{{$pay->id ?? ''}}" {{$custPayment ? (in_array($pay->id, $custPayment->cust_payment_id) ? 'selected' : '') : ''}}>{{$pay->payment ?? ''}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
            <a href="{{route('customer-add-index',['cust_id' => $customer->id])}}" class="btn btn-default btn-sm">Back</a>
        </div>
    </form>
</div>
@endsection
@section('script')
<!-- Select2 -->
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
@include('pages.customers.payment_section.script')
@endsection
