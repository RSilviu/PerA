
function initMap(coords, zoom) {
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: zoom, center: coords});
    var marker = new google.maps.Marker({position: coords, map: map});
}

function markOnMap(coords) {
    var zoom = 15;  // street level
    initMap(coords, zoom);
}

export { markOnMap };