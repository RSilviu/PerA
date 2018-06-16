<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Activites</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./static/css/shared.css">
    <link rel="stylesheet" type="text/css" href="./static/css/home.css">
    <link rel="stylesheet" type="text/css" href="./static/css/activities.css">
    <script defer src="./static/fontawesome/fontawesome-all.js"></script>
    <script defer src="./static/activities.js"></script>
    <script defer type="module" src="js/search.js"></script>
</head>
<body>
    <nav id="topnav">
        <a id="logo" href="home.php">PerA</a>
        <div id="search-div">
            <form id="searchForm" action="#">
                <input name="search" id="search" type="search" autocomplete="off" placeholder="Search people, etc..">
            </form>
            <ul id="suggestions" class="hidden">
            </ul>
        </div>
        <button id="notifs" class="general-button" type="button" data-count="3">
            <i class="far fa-bell fa-lg"></i>
        </button>
        <span><i class="fas fa-cog"></i><a href="account.html">Settings</a></span>
        <span><i class="fas fa-sign-out-alt"></i><a href="login.php">Logout</a></span>
    </nav>
    <div class="sidenav">
      <a href="activities.php">My Activities</a>
      <a href="others.php">Others</a>
    </div>

    <div id="container" class="activities">

        <button onclick="showTimetable()" id="timetable-b">Schedule</button>
        <button onclick="showBarGraph()" id="bar-graph-b">Stats</button>

        <div id="timetable">

            <div class="table-row-days">
                <div class="table-column" style="border: 0px"></div>
                <div class="table-column">Monday</div>
                <div class="table-column">Tuesday</div>
                <div class="table-column">Wednesday</div>
                <div class="table-column">Thursday</div>
                <div class="table-column">Friday</div>
                <div class="table-column">Saturday</div>
                <div class="table-column">Sunday</div>
            </div>
            <div class="table-row">
                <div class="table-column" style="font-size: 21px">
                    08:00
                </div>
                <div class="table-column">
                    Cafea
                </div>
                <div class="table-column">

                </div>
                <div class="table-column">

                </div>
                <div class="table-column">
                    Cafea
                </div>
                <div class="table-column">

                </div>
                <div class="table-column">

                </div>
                <div class="table-column">

                </div>
            </div>
            <div class="table-row">
                <div class="table-column" style="font-size: 21px">
                    10:00
                </div>
                <div class="table-column">
                    PSH
                </div>
                <div class="table-column">

                </div>
                <div class="table-column">

                </div>
                <div class="table-column">

                </div>
                <div class="table-column">
                    PBR
                </div>
                <div class="table-column">
                    Plimbare
                </div>
                <div class="table-column">

                </div>
            </div>
            <div class="table-row">
                <div class="table-column" style="font-size: 21px">
                    12:00
                </div>
                <div class="table-column">
                    CN
                </div>
                <div class="table-column">

                </div>
                <div class="table-column">

                </div>
                <div class="table-column">
                    Java
                </div>
                <div class="table-column">

                </div>
                <div class="table-column">

                </div>
                <div class="table-column">

                </div>
            </div>
            <div class="table-row">
                <div class="table-column" style="font-size: 21px">
                    14:00
                </div>
                <div class="table-column">

                </div>
                <div class="table-column">

                </div>
                <div class="table-column">

                </div>
                <div class="table-column">
                    TW
                </div>
                <div class="table-column">
                    GPC
                </div>
                <div class="table-column">

                </div>
                <div class="table-column">

                </div>
            </div>
            <div class="table-row">
                <div class="table-column"  style="font-size: 21px">
                    16:00
                </div>
                <div class="table-column">
                    POO
                </div>
                <div class="table-column">

                </div>
                <div class="table-column">

                </div>
                <div class="table-column">
                    Fotbal
                </div>
                <div class="table-column">

                </div>
                <div class="table-column">

                </div>
                <div class="table-column">

                </div>
            </div>
            <div class="table-row">
                <div class="table-column" style="font-size: 21px">
                    18:00
                </div>
                <div class="table-column">

                </div>
                <div class="table-column">

                </div>
                <div class="table-column">

                </div>
                <div class="table-column">
                    Bere
                </div>
                <div class="table-column">

                </div>
                <div class="table-column">

                </div>
                <div class="table-column">

                </div>
            </div>
        </div>

        <div id="bar-graph">
                <div class="day">
                    <div class="vertical-block-work"></div>
                    <div class="vertical-block-work"></div>
                    <div class="vertical-block-work"></div>
                    <div class="vertical-block-leisure"></div>
                </div>
                <div class="day">
                    <div class="ny-block"></div>
                </div>
                <div class="day">
                    <div class="ny-block"></div>
                </div>
                <div class="day">
                    <div class="vertical-block-work"></div>
                    <div class="vertical-block-work"></div>
                    <div class="vertical-block-leisure"></div>
                    <div class="vertical-block-leisure"></div>
                    <div class="vertical-block-leisure"></div>
                </div>
                <div class="day">
                    <div class="vertical-block-work"></div>
                    <div class="vertical-block-work"></div>
                </div>
                <div class="day">
                    <div class="vertical-block-leisure"></div>
                </div>
                <div class="day">
                    <div class="ny-block"></div>
                </div>
            <div class="day-bar">Monday</div>
            <div class="day-bar">Tuesday</div>
            <div class="day-bar">Wednesday</div>
            <div class="day-bar">Thursday</div>
            <div class="day-bar">Friday</div>
            <div class="day-bar">Saturday</div>
            <div class="day-bar">Sunday</div>
        </div>

    </div>

    <footer>
        <i class="far fa-copyright"></i> FII 2018 - All Rights Reserved
    </footer>
</body>
</html>
