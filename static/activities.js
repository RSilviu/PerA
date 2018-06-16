var timetable = document.getElementById('timetable');
var barGraph = document.getElementById('bar-graph');

function showTimetable()
{
    barGraph.style.display = "none";
    timetable.style.display = "inline-block";
}

function showBarGraph()
{
    barGraph.style.display = "inline-block";
    timetable.style.display = "none";
}