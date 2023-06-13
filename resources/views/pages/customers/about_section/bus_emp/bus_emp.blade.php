@extends('layouts.app')
@section('title')
    Add/Edit No Of Employees
@endsection
@section('style')
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>Customer Name Id / No Of Employees Add/Edit</h4>
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
        <h3 class="card-title">No Of Employees</h3>
    </div>
    <form>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">No Of Employees</label>
                        <input type="text" class="form-control form-control-sm" id="exampleInputEmail1">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="#" class="btn btn-secondary">Back</button>
        </div>
    </form>
</div>
@endsection
@section('script')
@endsection
