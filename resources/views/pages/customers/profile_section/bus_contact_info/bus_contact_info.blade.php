@extends('layouts.app')
@section('title')
    Add/Edit Business Identity
@endsection
@section('style')
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>C{{$customer->id ?? ''}} | Business Location Contact Info | {{$custConInfo ? 'Edit' : 'Add'}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{-- <li class="breadcrumb-item"><a href="#" class="btn btn-sm btn-primary">Back</a></li> --}}
                    {{-- <li class="breadcrumb-item active">DataTables</li> --}}
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Business Location Contact Info</h3>
    </div>
    <form class="business-contact-info-form">
        <input type="hidden" name="ff[contact_id]" value="{{$custConInfo->contact->id ?? ''}}" />
        <input type="hidden" name="ff[cust_id]" value="{{$customer->id ?? ''}}" />
        <input type="hidden" name="ff[cust_con_id]" value="{{$custConInfo->id ?? ''}}" />
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Business Location Contact First Name</label>
                        <input type="text" class="form-control form-control-sm" name="ff[con_first_name]" value="{{$custConInfo->contact->con_first_name ?? ''}}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Business Location Contact Last Name</label>
                        <input type="text" class="form-control form-control-sm" name="ff[con_last_name]" value="{{$custConInfo->contact->con_last_name ?? ''}}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Business Location Contact Email</label>
                        <input type="text" class="form-control form-control-sm" name="ff[con_email]" value="{{$custConInfo->contact->con_email ?? ''}}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mobile Telephone Number</label>
                        <input type="text" class="form-control form-control-sm" name="ff[con_telephone]" value="{{$custConInfo->contact->con_telephone ?? ''}}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Business Fax Number</label>
                        <input type="text" class="form-control form-control-sm" name="ff[con_fax]" value="{{$custConInfo->contact->con_fax ?? ''}}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Opening/Formation Date</label>
                        <input type="date" class="form-control form-control-sm" name="ff[con_date]" value="{{$custConInfo->contact->con_date ?? ''}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary business-contact-info-submit">Submit</button>
            <a href="{{route('customer-add-index',['cust_id' => $customer->id])}}" type="button" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
@endsection
@section('script')
@endsection
@section('bottom-js')
@include('pages.customers.profile_section.bus_contact_info.script')
@endsection
