@extends('layouts.app')
@section('title')
    Add/Edit Social Media
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
                <h4>Customer Name Id / Social Media Add/Edit</h4>
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
        <h3 class="card-title">Social Media</h3>
    </div>
    <form>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Payments Methods</label>
                        <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                            <option>Alabama</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-secondary">Submit</button>
            <button type="#" class="btn btn-default">Back</button>
        </div>
    </form>
</div>
@endsection
@section('script')
<!-- Select2 -->
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    $(document).ready(function(){
        //Initialize Select2 Elements
        $('.select2').select2()
    });
</script>
@endsection
