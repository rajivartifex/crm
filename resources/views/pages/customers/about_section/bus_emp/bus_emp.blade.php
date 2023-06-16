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
                <h4>C{{$customer->id ?? ''}} | No Of Employees | {{$custEmp ? 'Edit' : 'Add'}}</h4>
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
        <h3 class="card-title">No Of Employees</h3>
    </div>
    <form class="business-emp-form">
        <input type="hidden" name="ff[cust_id]" value="{{$customer->id ?? ''}}" />
        <input type="hidden" name="ff[emp_id]" value="{{$custEmp->id ?? ''}}" />
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">No Of Employees</label>
                        <input type="text" class="form-control form-control-sm" name="ff[cust_of_emps]" value="{{$custEmp->cust_of_emps	?? ''}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm business-emp-submit">Submit</button>
            <a href="{{route('customer-add-index',['cust_id' => $customer->id])}}" class="btn btn-secondary btn-sm">Back</a>
        </div>
    </form>
</div>
@endsection
@section('script')
@include('pages.customers.about_section.bus_emp.script')
@endsection
