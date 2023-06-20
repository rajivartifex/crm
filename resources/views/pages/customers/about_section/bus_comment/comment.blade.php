@extends('layouts.app')
@section('title')
    Add/Edit Comment
@endsection
@section('style')
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>C{{$customer->id ?? ''}} | Comment | {{$custComment ? 'Edit' : 'Add'}}</h4>
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
        <h3 class="card-title">Comment</h3>
    </div>
    <form class="business-comment-form">
        <input type="hidden" name="ff[cust_id]" value="{{$customer->id ?? ''}}" />
        <input type="hidden" name="ff[c_id]" value="{{$custComment->id ?? ''}}" />
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Comment</label>
                        <textarea class="form-control" name="ff[comment]">{{$custComment->comment ?? ''}}</textarea>
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
@include('pages.customers.about_section.bus_comment.script')
@endsection
