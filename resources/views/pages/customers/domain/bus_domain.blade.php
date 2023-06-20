@extends('layouts.app')
@section('title')
    Add/Edit Domain
@endsection
@section('style')
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>C{{$customer->id ?? ''}} | Domain | {{$custDomain ? 'Edit' : 'Add'}}</h4>
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
        <h3 class="card-title">Description</h3>
    </div>
    <form class="business-domain-form">
        <input type="hidden" name="ff[cust_id]" value="{{$customer->id ?? ''}}" />
        <input type="hidden" name="ff[dom_id]" value="{{$custDomain->id ?? ''}}" />
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Domain Name</label>
                        <input type="text" class="form-control form-control-sm" name="ff[cust_domain_name]" value="{{$custDomain->cust_domain_name ?? ''}}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Start Date</label>
                        <input type="date" class="form-control form-control-sm" name="ff[cust_domain_start_date]" value="{{$custDomain->cust_domain_start_date ?? ''}}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Renewal Date</label>
                        <input type="date" class="form-control form-control-sm" name="ff[cust_domain_renewal_date]" value="{{$custDomain->cust_domain_renewal_date ?? ''}}">
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
@include('pages.customers.domain.script')
@endsection
