import { handleResponse, requestAsync} from './ajax.js';

var activitiesTable = document.getElementById("timetable")
var activities = retrieveActivities()
// populateSchedule()
// populateStats()

for (var i = 1; i < activitiesTable.children.length; i++) {
	for (var j = 1; j < activitiesTable.children[i].children.length; j++) {
		activitiesTable.children[i].children[j].addEventListener ('click', function(e) {
			onCellClicked(e.target)
		}
	)}
}

function onCellClicked(el) {
	console.log("on click", el)
	window.location = "/PerA/activity.php?hour=" + el.getAttribute("hour") + ",day=" + el.getAttribute("day")
}

function retrieveActivities() { //not work
	var url = 'http://localhost:8080/PerA/retrieveActivities.php'
	requestAsync(url, 'get', 20000, handleRetrieve);
}

function handleRetrieve() {
	handleResponse(this, onSuccess, function () {
        alert('activities onError!');
    });
}

function onSuccess(content) {
    var activities = JSON.parse(content);
	console.log('activities fetched', activities)
}

function populateSchedule() {
	activities.array.forEach(element => {
		var tableElement = getElementFromTimeTable()
		tableElement.value = element.name
	});
}

function getElementFromTimeTable(element) {
	activitiesTable.children.forEach(row => {
		row.children.forEach(cell => {
			if(element.getAttribute('day') == cell.getAttribute('day') &&
				element.getAttribute('hour') == cell.getAttribute('hour')) {
					return cell
				}
		})
	})
}

function populateStats() {
	var graph = document.getElementById("bar-graph")

	graph.children.forEach(function(element) {
		var currentAct = []
		activities.forEach(function(activity) {
			if(activity.day == element.getAttribute('day')) {
				if(activity.type == 0) {
					currentAct = [activity] + currentAct
				} else {
					currentAct = currentAct = [activity]
				}
			}})

			currentAct.forEach(function(act) {
				var newCell = document.createElement("DIV")
				newCell.className = element.type == 0 ? "vertical-block-work" : "vertical-block-leisure"
				element.appendChild(newCell)
			})
		})

}