
const TYPE_RELAX = 0;
const TYPE_WORK = 1;

var activitiesTable = document.getElementById("timetable");

for (var i = 1; i < activitiesTable.childNodes.length; i++) {
	for (var j = 1; j < activitiesTable.childNodes[i].childNodes.length; j++) {
		let cell = activitiesTable.childNodes[i].childNodes[j];
		if (cell.nodeType !== Node.TEXT_NODE && cell.hasAttribute('data-hour')) {
            cell.addEventListener ('click', function(e) {
                    onCellClicked(e.target)
                }
            );
		}
	}
}

retrieveActivities();


function onCellClicked(el) {
	console.log("on click", el);
	window.location = "/PerA/activity.php?hour=" + el.getAttribute("data-hour") + "&day=" + el.getAttribute("data-day")
}

function retrieveActivities() { //not work
	var url = 'http://localhost:8080/PerA/retrieveActivities.php';
	requestAsync(url, 'get', 2000, handleRetrieve);
}

function handleRetrieve() {
	handleResponse(this, onRetrieveActivitiesSuccess, function () {
        alert('activities onError!');
    });
}

function onRetrieveActivitiesSuccess(content) {
    let activities = JSON.parse(content);
    populateSchedule(activities);
    populateStats(activities);
}

function populateSchedule(activities) {
	activities.forEach(activity => {
		let tableElement = getElementFromTimeTable(activity);
		tableElement.innerText = activity.name
	});
}

function getElementFromTimeTable(activity) {
	for (let row of activitiesTable.childNodes) {
		for (let cell of row.childNodes) {
            if (cell.nodeType !== Node.TEXT_NODE && cell.hasAttribute('data-day') && activity.day == cell.getAttribute('data-day') &&
                activity.hour == cell.getAttribute('data-hour')) {
                return cell;
            }
        }
	}
	alert('Calendar date not found :(');
}

function populateStats(activities) {
	var graph = document.getElementById("bar-graph");
	graph.childNodes.forEach(function(element) {
        var currentAct = [];
        activities.forEach(function(activity) {
			if(element.nodeType !== Node.TEXT_NODE && element.id != '' &&
				activity.day == element.id) {
				if(activity.type == TYPE_RELAX) {
					currentAct.unshift(activity);
				} else {
					currentAct.push(activity);
				}
			}});

		currentAct.forEach(function(act) {
			var newCell = document.createElement('div');
			newCell.className = act.type == TYPE_WORK ? "vertical-block-work" : "vertical-block-leisure";
			element.appendChild(newCell);
		});
	});

}