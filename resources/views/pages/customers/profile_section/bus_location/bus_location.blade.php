@extends('layouts.app')
@section('title')
    {{ $location ? 'Edit Business Location' : 'Add Business Location' }}
@endsection
@section('style')
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>C{{ $customer->id ?? '' }} | Business Location | {{ $location ? 'Edit' : 'Add' }}</h4>
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
            <h3 class="card-title">Business Location</h3>
        </div>
        <form class="business-location-form">
            <input type="hidden" name="ff[cust_id]" value="{{ $customer->id ?? '' }}" />
            <input type="hidden" name="ff[loc_id]" value="{{ $location->id ?? '' }}" />
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group autocomplete-container">
                            <label for="exampleInputEmail1">Location *</label>
                            <input type="text" class="form-control form-control-sm location" id="autocomplete"
                                name="ff[cust_location_name]" value="{{ $location->cust_location_name ?? '' }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Address Line 1 *</label>
                            <input type="text" class="form-control form-control-sm" id="address1"
                                name="ff[cust_location_add1]" value="{{ $location->cust_location_add1 ?? '' }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Address Line 2 *</label>
                            <input type="text" class="form-control form-control-sm" id="address2"
                                name="ff[cust_location_add2]" value="{{ $location->cust_location_add2 ?? '' }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Suburb</label>
                            <input type="text" class="form-control form-control-sm" id="suburb"
                                name="ff[cust_location_suburb]" value="{{ $location->cust_location_suburb ?? '' }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">State</label>
                            <input type="text" class="form-control form-control-sm" id="state"
                                name="ff[cust_location_state]" value="{{ $location->cust_location_state ?? '' }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Postcode</label>
                            <input type="text" class="form-control form-control-sm" id="postcode"
                                name="ff[cust_location_postcode]" value="{{ $location->cust_location_postcode ?? '' }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Country</label>
                            <input type="text" class="form-control form-control-sm" id="country"
                                name="ff[cust_location_country]" value="{{ $location->cust_location_country ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
                <a href="{{ route('customer-add-index', ['cust_id' => $customer->id ?? '']) }}"
                    class="btn btn-default btn-sm">Back</a>
            </div>
        </form>
    </div>
    <div id="map" style="width: 100%; height: 400px;"></div>
@endsection
@section('script')
    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key=AIzaSyDHgoyPtj7Z1Yvbit75Z4DqbBkknQCmTjg&libraries=places"></script>
@endsection
@section('bottom-js')
    @include('pages.customers.profile_section.bus_location.script')
@endsection
