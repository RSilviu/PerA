
function handleShowHome() {
    handleResponse(this, onShowHomeSuccess, function () {
        alert('showHome onError!');
    });
}

function showHome() {
    const url = 'http://localhost:8080/PerA/showHome.php';
    const timeout = 2000;
    requestAsync(url, 'get', timeout, handleShowHome);
}


function onShowHomeSuccess(content) {
    console.log('onSuccess in showHome...');
    let activitiesDiv = document.getElementById('activities');
    let activities = JSON.parse(content);
    // activitiesDiv.innerHTML = content;
    let mapDetails = [];
    if (activities.length === 0) {
        let p = document.createElement('p');
        p.innerText = 'No activities scheduled for this week';
        activitiesDiv.appendChild(p);

        var addBtn = document.createElement('input');
        addBtn.type = 'button';
        addBtn.value = 'Add activity';
        addBtn.onclick = function() {
            window.location.href = 'http://localhost:8080/PerA/activity.php';
        };
        activitiesDiv.appendChild(addBtn);
        return;
    }
    for (let activity of activities) {
        let span, i;
        let ul = document.createElement('ul');
        ul.className = 'short-act';

        let name = document.createElement('li');
        name.innerText = activity.act_name;

        let description = document.createElement('li');
        description.innerText = activity.description;

        let atDate = document.createElement('li');
        span = document.createElement('span');
        span.innerHTML = '<i class="far fa-clock"></i>' + 'ziua, ora';
        atDate.appendChild(span);

        let repeats = document.createElement('li');
        span = document.createElement('span');
        span.innerHTML = '<i class="fas fa-redo"></i>' + 'data urmatoare';
        repeats.appendChild(span);

        let place = document.createElement('li');
        span = document.createElement('span');
        span.innerHTML = '<i class="fas fa-map-marker-alt"></i>' + activity.place_name;
        place.appendChild(span);

        let mapView = document.createElement('li');
        let mapDiv = document.createElement('div');
        mapDiv.id = 'map' + activity.act_id;
        mapDiv.style.width = '100%';
        mapDiv.style.height = '100%';
        mapView.appendChild(mapDiv);

        mapDetails.push({ coords: { lat: parseFloat(activity.lat), lng: parseFloat(activity.lng) }, mapId: mapDiv.id });

        let details = document.createElement('li');
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
    for (let detail of mapDetails) {
        markOnMap(detail.coords, detail.mapId);
    }
}

function detailsListener()
{
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
}
