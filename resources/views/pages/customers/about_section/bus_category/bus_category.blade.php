@extends('layouts.app')
@section('title')
    Add/Edit Business Category
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
                <h4>Customer Name Id / Business Category Add/Edit</h4>
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
        <h3 class="card-title">Business Category</h3>
    </div>
    <form class="business-category-form">
        <input type="hidden" name="ff[cust_id]" value="{{$customer->id ?? ''}}" />
        <input type="hidden" name="ff[cat_id]" value="{{$custCategory->id ?? ''}}" />
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Business Category</label>
                        <select class="form-control select2" style="width: 100%;" name="ff[categories_id]">
                            @foreach ($categories as $category)
                                <option value="{{$category->id ?? ''}}" {{$custCategory ? ($custCategory->categories_id == $category->id ? 'selected' : '') : ''}}>{{$category->cat_name ?? ''}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @if($custCategory)
                    @foreach($service_tags as $key => $tag)
                        <div class="col-sm-12">
                            <div class="row service_tag_wrapper">
                                <input type="hidden" name="ff[service_tag_id]" class="service_tag_id" value="{{$tag->id}}" />
                                <div class="col-sm-11">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Service Tag</span>
                                            </div>
                                            <input type="text" class="form-control" name="ff[service_tag]" value="{{$tag->service_tag}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <input type="hidden" class="st_delete" name="st_delete">
                                        <button type="button" class="btn btn-sm btn-danger" data-id="{{ $tag->id }}" onclick="$(this).specialDelete();"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="col-sm-12">
                    <div class="service_tag_dynamic"></div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <a class="btn-sm btn btn-primary add_service_tag_btn float-right"><i class="fas fa-plus"></i>  Service Tag</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn-sm btn btn-primary">Submit</button>
            <a href="{{route('customer-add-index',['cust_id' => $customer->id])}}" class="btn-sm btn btn-secondary">Back</a>
        </div>
    </form>
</div>
@endsection
@section('script')
<!-- Select2 -->
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
@include('pages.customers.about_section.bus_category.script')
@endsection
