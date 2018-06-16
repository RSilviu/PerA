
function initMap(coords, zoom, mapId) {
    var map = new google.maps.Map(
        document.getElementById(mapId), {zoom: zoom, center: coords});
    var marker = new google.maps.Marker({position: coords, map: map});
}

function markOnMap(coords, mapId) {
    var zoom = 15;  // street level
    initMap(coords, zoom, mapId);
}
