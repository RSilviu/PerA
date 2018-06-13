<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MapsTest</title>
    <!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=&libraries=places"></script>-->
    <style>
        /* Set the size of the div element that contains the map */
        #autocomplete {
            width: 40%;
        }
        #map {
            margin-top: 150px;
            height: 400px;  /* The height is 400 pixels */
            width: 400px;  /* The width is the width of the web page */
        }
    </style>
</head>
<body>
    <div id="locationField">
        <input id="autocomplete" placeholder="Enter your address"
               onFocus="geolocate()" type="text">
    </div>
    <div id="map"></div>
    <script>
        // This example displays an address form, using the autocomplete feature
        // of the Google Places API to help users fill in the information.

        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        // Initialize and add the map
        function initMap(coords, zoom) {
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: zoom, center: coords});
            var marker = new google.maps.Marker({position: coords, map: map});
        }

        var placeSearch, autocomplete;

        function initAutocomplete() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')));

            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            // autocomplete.addListener('place_changed', markOnMap);
            autocomplete.addListener('place_changed', function () {
                var place = autocomplete.getPlace();
                console.log(place.place_id);
            });
        }

        function markOnMap() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();
            var zoom = 15;  // street level
            initMap(place.geometry.location, zoom);
            /*   for (var component in componentForm) {
                document.getElementById(component).value = '';
                document.getElementById(component).disabled = false;
            }*/

            // Get each component of the address from the place details
            // and fill the corresponding field on the form.
            /*for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                }
            }*/
        }

        // Bias the autocomplete object to the user's geographical location,
        // as supplied by the browser's 'navigator.geolocation' object.
        function geolocate() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var geolocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    var circle = new google.maps.Circle({
                        center: geolocation,
                        radius: position.coords.accuracy
                    });
                    autocomplete.setBounds(circle.getBounds());
                });
            }
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $_ENV['MAPS_API_KEY'] ?>&libraries=places&callback=initAutocomplete"
            async defer></script>
</body>
</html>