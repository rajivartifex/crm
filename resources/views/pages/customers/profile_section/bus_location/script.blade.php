<script>
    google.maps.event.addDomListener(window, 'load', initialize);

    function initialize() {
        var input = document.getElementById('autocomplete');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function () {
            $("#address1").val('');
            $("#address2").val('');
            $("#suburb").val('');
            $("#state").val('');
            $("#postcode").val('');
            $("#country").val('');
            var place = autocomplete.getPlace();
            var lat = place.geometry['location'].lat();
            var long = place.geometry['location'].lng();
            geocodeLatLng(lat, long);
        });
    }

    function geocodeLatLng(latitude, longitude) {
        var geocoder = new google.maps.Geocoder();
        var latlng = { lat: parseFloat(latitude), lng: parseFloat(longitude) };

        geocoder.geocode({ location: latlng }, function (results, status) {
            if (status === "OK") {
                if (results[0]) {
                    var addressComponents = results[0].address_components;
                    var address = {};

                    for (var i = 0; i < addressComponents.length; i++) {
                        var component = addressComponents[i];
                        var componentType = component.types[0];

                        if (componentType === "street_number") {
                            address.address1 = component.long_name;
                            $("#address1").val(address.address1);
                        } else if (componentType === "route") {
                            address.address2 = component.long_name;
                            $("#address2").val(address.address2);
                        } else if (componentType === "locality") {
                            address.suburb = component.long_name;
                            $("#suburb").val(address.suburb);
                        } else if (componentType === "administrative_area_level_1") {
                            address.state = component.long_name;
                            $("#state").val(address.state);
                        } else if (componentType === "postal_code") {
                            address.postcode = component.long_name;
                            $("#postcode").val(address.postcode);
                        } else if (componentType === "country") {
                            address.country = component.long_name;
                            $("#country").val(address.country);
                        }
                    }
                } else {
                    console.log("No results found");
                }
            } else {
                console.log("Geocoder failed due to: " + status);
            }
        });
    }

    $(document).ready(function(){
         /* Business subscription form submit event */
         var cust_id = $(`input[name="ff[cust_id]"]`).val();
        $(".business-location-form").submit(function(e){
            e.preventDefault();
            var form_data = new FormData(this);

            $.ajax({
                url: "{{url('customer/business-location/store')}}",
                type:"POST",
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: form_data,
                dataType: 'json',
                processData: false,
                success:function(response){
                    console.log(response.data);
                    location.href = "{{url('customer/business-location')}}" + "?loc_id=" + response.data.id + "&cust_id=" + cust_id;
                }
            })
        });
    });
</script>
