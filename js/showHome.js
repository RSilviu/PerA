import { requestAsync, handleResponse } from './ajax.js';
import { markOnMap } from "./mapsUtil.js";

// window.onload = showHome;

function handleShowHome() {
    handleResponse(this, onSuccess, function () {
        alert('showHome onError!');
    });
}

function showHome() {
    const url = 'http://localhost:8080/PerA/showHome.php';
    const timeout = 2000;
    requestAsync(url, 'get', timeout, handleShowHome);
}

/*
<li><span><i class="far fa-clock"></i>joi, 6-7 am</span></li>
<li><span><i class="fas fa-redo"></i>some frequency</span></li>
<li><span><i class="fas fa-map-marker-alt"></i>Copou</span></li>
<li><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2712.1761075498052!2d27.573612404372014!3d47.17398846310152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x193e4b6864504e2c!2sFacultatea+de+Informatic%C4%83!5e0!3m2!1sro!2sro!4v1521061875366" allowfullscreen></iframe></li>
<li class="act-details">View details</li>
*/


function onSuccess(content) {
    var span, i;
    var activitiesDiv = document.getElementById('activities');
    var activities = JSON.parse(content);
    for (let activity of activities) {
        var ul = document.createElement('ul');
        ul.className = 'short-act';

        var name = document.createElement('li');
        name.innerText = activity.act_name;

        var description = document.createElement('li');
        description.innerText = activity.description;

        var atDate = document.createElement('li');
        span = document.createElement('span');
        i = document.createElement('i');
        i.className = "far fa-clock";
        span.appendChild(i);
        span.innerText = 'ziua, ora';
        atDate.appendChild(span);

        var repeats = document.createElement('li');
        span = document.createElement('span');
        i = document.createElement('i');
        i.className = "fas fa-redo";
        span.appendChild(i);
        span.innerText = 'cum se repeta';
        repeats.appendChild(span);

        var place = document.createElement('li');
        span = document.createElement('span');
        i = document.createElement('i');
        i.className = "fas fa-map-marker-alt";
        span.appendChild(i);
        span.innerText = activity.place_name;
        place.appendChild(span);

        var mapView = document.createElement('li');
        var mapDiv = document.createElement('div');
        mapDiv.id = 'map';
        mapDiv.onload = function() {
            markOnMap({lat: activity.lat, lng: activity.lng});
        };
        mapView.appendChild(mapDiv);

        var details = document.createElement('li');
        details.className = 'act-details';
        details.innerText = 'View details';
        details.onclick = detailsListener;

        ul.appendChild(name);
        ul.appendChild(description);
        ul.appendChild(atDate);
        ul.appendChild(repeats);
        ul.appendChild(place);
        ul.appendChild(mapView);
        ul.appendChild(details);

        activitiesDiv.appendChild(ul);
    }
}

function detailsListener()
{
    /*var lis = document.querySelectorAll('.act-details');
    for (let li of lis) {
        li.onclick = function() {*/
            var cls, action;
            var parentClass = this.parentNode.className;
            if (parentClass === 'short-act') {
                cls = 'long-act';
                action = 'Hide';
            }
            else if (parentClass === 'long-act') {
                cls = 'short-act';
                action = 'View';
            }
            this.parentNode.className = cls;
            this.innerHTML = action + ' details';
        /*};
    }*/
}
