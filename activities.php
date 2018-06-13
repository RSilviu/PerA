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
    <script defer type="module" src="js/activities.js"></script>
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
                <div class="table-column" hour="8" day="Mon">
                    Cafea
                </div>
                <div class="table-column" hour="8" day="Tue">

                </div>
                <div class="table-column" hour="8" day="Wen">

                </div>
                <div class="table-column" hour="8" day="Thu">
                    Cafea
                </div>
                <div class="table-column" hour="8" day="Fri">

                </div>
                <div class="table-column" hour="8" day="Sat">

                </div>
                <div class="table-column" hour="8" day="Sun">

                </div>
            </div>
            <div class="table-row">
                <div class="table-column" style="font-size: 21px">
                    10:00
                </div>
                <div class="table-column" hour="10" day="Mon">
                    PSH
                </div>
                <div class="table-column"  hour="10" day="Tue">

                </div>
                <div class="table-column" hour="10" day="Wen">

                </div>
                <div class="table-column" hour="10" day="Thu">

                </div>
                <div class="table-column" hour="10" day="Fri">
                    PBR
                </div>
                <div class="table-column" hour="10" day="Sat">
                    Plimbare
                </div>
                <div class="table-column" hour="10" day="Sun">

                </div>
            </div>
            <div class="table-row">
                <div class="table-column" style="font-size: 21px">
                    12:00
                </div>
                <div class="table-column" hour="12" day="Mon">
                    CN
                </div>
                <div class="table-column" hour="12" day="Tue">

                </div>
                <div class="table-column" hour="12" day="Wen">

                </div>
                <div class="table-column" hour="12" day="Thu">
                    Java
                </div>
                <div class="table-column" hour="12" day="Fri">

                </div>
                <div class="table-column" hour="12" day="Sat">

                </div>
                <div class="table-column" hour="12" day="Sun">

                </div>
            </div>
            <div class="table-row">
                <div class="table-column" style="font-size: 21px">
                    14:00
                </div>
                <div class="table-column" hour="14" day="Mon">

                </div>
                <div class="table-column" hour="14" day="Tue">

                </div>
                <div class="table-column" hour="14" day="Wen">

                </div>
                <div class="table-column" hour="14" day="Thu">
                    TW
                </div>
                <div class="table-column" hour="14" day="Fri">
                    GPC
                </div>
                <div class="table-column" hour="14" day="Sat">

                </div>
                <div class="table-column" hour="14" day="Sun">

                </div>
            </div>
            <div class="table-row">
                <div class="table-column"  style="font-size: 21px">
                    16:00
                </div>
                <div class="table-column" hour="16" day="Mon">
                    POO
                </div>
                <div class="table-column" hour="16" day="Tue">

                </div>
                <div class="table-column" hour="16" day="Wen">

                </div>
                <div class="table-column" hour="16" day="Thu">
                    Fotbal
                </div>
                <div class="table-column" hour="16" day="Fri">

                </div>
                <div class="table-column" hour="16" day="Sat">

                </div>
                <div class="table-column" hour="16" day="Sun">

                </div>
            </div>
            <div class="table-row">
                <div class="table-column" style="font-size: 21px">
                    18:00
                </div>
                <div class="table-column" hour="18" day="Mon">

                </div>
                <div class="table-column" hour="18" day="Tue">

                </div>
                <div class="table-column" hour="18" day="Wen">

                </div>
                <div class="table-column" hour="18" day="Thu">
                    Bere
                </div>
                <div class="table-column"  hour="18" day="Fri">

                </div>
                <div class="table-column" hour="18" day="Sat">

                </div>
                <div class="table-column" hour="18" day="Sun">

                </div>
            </div>
        </div>

        <div id="bar-graph">
                <div class="day" id="Mon">
                    <div class="vertical-block-work"></div>
                    <div class="vertical-block-work"></div>
                    <div class="vertical-block-work"></div>
                    <div class="vertical-block-leisure"></div>
                </div>
                <div class="day" id="Tue">
                    <div class="ny-block"></div>
                </div>
                <div class="day" id="Wen">
                    <div class="ny-block"></div>
                </div>
                <div class="day" id="Thu">
                    <div class="vertical-block-work"></div>
                    <div class="vertical-block-work"></div>
                    <div class="vertical-block-leisure"></div>
                    <div class="vertical-block-leisure"></div>
                    <div class="vertical-block-leisure"></div>
                </div>
                <div class="day" id="Fri">
                    <div class="vertical-block-work"></div>
                    <div class="vertical-block-work"></div>
                </div>
                <div class="day" id="Sat">
                    <div class="vertical-block-leisure"></div>
                </div>
                <div class="day" id="Sun">
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
