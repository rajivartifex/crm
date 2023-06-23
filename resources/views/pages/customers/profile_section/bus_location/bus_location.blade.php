@extends('layouts.app')
@section('title')
    Add/Edit Business Location
@endsection
@section('style')
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>Customer Name Id / Business Location Add/Edit</h4>
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
    <form>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Location *</label>
                        <input type="text" class="form-control form-control-sm location" id="location" name="location">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group" id="latitudeArea">
                        <label for="exampleInputPassword1">Address Line 1 *</label>
                        <input type="text" class="form-control form-control-sm" id="latitude">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group" id="longtitudeArea">
                        <label for="exampleInputPassword1">Address Line 2 *</label>
                        <input type="text" class="form-control form-control-sm" id="longitude">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Suburb</label>
                        <input type="text" class="form-control form-control-sm" id="exampleInputPassword1">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">State</label>
                        <input type="text" class="form-control form-control-sm" id="exampleInputPassword1">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Postcode</label>
                        <input type="text" class="form-control form-control-sm" id="exampleInputPassword1">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Country</label>
                        <input type="text" class="form-control form-control-sm" id="exampleInputPassword1">
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
<div id="map" style="width: 100%; height: 400px;"></div>
@endsection
@section('script')
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDHgoyPtj7Z1Yvbit75Z4DqbBkknQCmTjg&libraries=places" ></script>
<script>
$(document).ready(function () {
    $("#latitudeArea").addClass("d-none");
    $("#longtitudeArea").addClass("d-none");
});

google.maps.event.addDomListener(window, 'load', initialize);
function initialize() {
    var input = document.getElementById('location');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function () {
        var place = autocomplete.getPlace();
        $('#latitude').val(place.geometry['location'].lat());
        $('#longitude').val(place.geometry['location'].lng());
        $("#latitudeArea").removeClass("d-none");
        $("#longtitudeArea").removeClass("d-none");
    });
}
</script>

@endsection
