var activitiesTable = document.getElementById("timetable")

for (var i = 1; i < activitiesTable.children.length; i++) {
	for (var j = 1; j < activitiesTable.children[i].children.length; j++) {
		activitiesTable.children[i].children[j].addEventListener ('click', function(e) {
			onCellClicked(e.target)
		}
	)}
}

function onCellClicked(el) {
	console.log("on click", el)
	window.location = "/PerA/event.html?hour=" + el.getAttribute("hour") + ",day=" + el.getAttribute("day")
}
