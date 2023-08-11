@extends('layouts.app')
@section('title')
    Category
@endsection
@section('style')
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4> Category</h4>
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
            <h3 class="card-title"> Category</h3>
        </div>
        <form class="category-modal-form">
            <input type="hidden" name="category_id" value="{{ $category->id ?? '' }}" />
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input class="form-control" type="text" name="cat_name"
                                value="{{ $category->cat_name ?? '' }}" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
                <a href="{{ route('enum-index') }}" class="btn btn-default btn-sm">Back</a>
            </div>
        </form>
    </div>
@endsection
@section('script')
    @include('pages.settings.script')
@endsection
