
const PERIODICITY_NONE = 0;
const PERIODICITY_DAILY = 1;
// const PERIODICITY_WEEKLY = 2;


function showAddActivity() {
    // window.location.href = 'http://localhost:8080/PerA/activity.php';
    window.location.href = 'http://localhost:8080/PerA/activities.php';
}

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
    let activitiesDiv = document.getElementById('activities');
    activitiesDiv.innerHTML = '';
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
        name.innerHTML = '<strong>' + activity.act_name + '</strong>';

        let description = document.createElement('li');
        description.innerText = activity.description;

        let atDate = document.createElement('li');
        span = document.createElement('span');
        span.innerHTML = '<i class="far fa-clock"></i>' + activity.day + ', ' + activity.hour;
        atDate.appendChild(span);

        let repeatType = activity.periodicity;
        let nextDay, nextHour, nextTime;
        if (repeatType === PERIODICITY_NONE) {
            nextTime = 'N/A';
        } else if (repeatType === PERIODICITY_DAILY) {
            nextTime = 'maine, ora';
        } else {
            nextTime = 'sapt viitoare, ac ora';
        }
        let repeats = document.createElement('li');
        span = document.createElement('span');
        span.innerHTML = '<i class="fas fa-redo"></i>' + nextTime;
        repeats.appendChild(span);

        let place = document.createElement('li');
        span = document.createElement('span');
        span.innerHTML = '<i class="fas fa-map-marker-alt"></i>' + activity.place_name;
        place.appendChild(span);

        let mapView = document.createElement('li');
        let mapDiv = document.createElement('div');
        mapDiv.id = 'map' + activity.act_id;
        mapDiv.style.width = '100%';
        mapDiv.style.height = '250px';
        mapView.appendChild(mapDiv);

        mapDetails.push({ coords: { lat: parseFloat(activity.lat), lng: parseFloat(activity.lng) }, mapId: mapDiv.id });

        let update = document.createElement('li');
        update.innerText = 'Update';
        update.classList.add('updateActBtn');
        update.onclick = updateActivityListener;

        let remove = document.createElement('li');
        remove.innerText = 'Remove';
        remove.classList.add('removeActBtn');
        remove.onclick = removeActivityListener;

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
        ul.appendChild(update);
        ul.appendChild(remove);
        ul.appendChild(details);

        activitiesDiv.appendChild(ul);
    }
    for (let detail of mapDetails) {
        markOnMap(detail.coords, detail.mapId);
    }
}

function updateActivityListener() {
    alert('Not implemented');
}

function onRemoveActivitySuccess() {
    showHome();
}

function handleRemoveActivity() {
    handleResponse(this, onRemoveActivitySuccess, function () {
        alert('handleRemoveActivity error!');
    });
}

function removeActivityListener() {
    let act_id = this.parentElement.querySelector('div').id;
    act_id = act_id.substr(3);
    const url = 'http://localhost:8080/PerA/removeActivity.php?act_id=' + act_id;
    const timeout = 2000;
    requestAsync(url, 'get', timeout, handleRemoveActivity);
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
