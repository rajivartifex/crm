@extends('layouts.app')
@section('title')
    Add/Edit Description
@endsection
@section('style')
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>C{{$customer->id ?? ''}} | Description | {{$custDesc ? 'Edit' : 'Add'}}</h4>
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
    <form class="business-description-form">
        <input type="hidden" name="ff[cust_id]" value="{{$customer->id ?? ''}}" />
        <input type="hidden" name="ff[desc_id]" value="{{$custDesc->id ?? ''}}" />
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Short Description</label>
                        <textarea class="form-control" name="ff[cust_short_desc]">{{$custDesc->cust_short_desc ?? ''}}</textarea>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Long Description</label>
                        <textarea class="form-control" name="ff[cust_long_desc]">{{$custDesc->cust_long_desc ?? ''}}</textarea>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alternate Description</label>
                        <textarea class="form-control" name="ff[cust_alter_desc]">{{$custDesc->cust_alter_desc ?? ''}}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm business-description-submit">Submit</button>
            <a href="{{route('customer-add-index',['cust_id' => $customer->id ?? ''])}}" class="btn btn-secondary btn-sm">Back</a>
        </div>
    </form>
</div>
@endsection
@section('script')
@include('pages.customers.about_section.description.script')
@endsection
