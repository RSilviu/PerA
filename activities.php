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
    <script src="js/ajax.js" async></script>
    <script src="./static/activities.js" async></script>
    <script src="js/addToGroup.js" async></script>
    <script src="js/showRelation.js" async></script>
    <script src="js/search.js" async></script>
    <script src="js/activities.js" async></script>
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
<!--        <button id="notifs" class="general-button" type="button" data-count="3">
            <i class="far fa-bell fa-lg"></i>
        </button>-->
        <span style="color: #fff">Hi, <?php echo $_SESSION['username']; ?>!</span>
<!--        <span><i class="fas fa-cog"></i><a href="account.html">Settings</a></span>-->
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
                <div class="table-column" data-hour="8" data-day="Mon">

                </div>
                <div class="table-column" data-hour="8" data-day="Tue">

                </div>
                <div class="table-column" data-hour="8" data-day="Wen">

                </div>
                <div class="table-column" data-hour="8" data-day="Thu">

                </div>
                <div class="table-column" data-hour="8" data-day="Fri">

                </div>
                <div class="table-column" data-hour="8" data-day="Sat">

                </div>
                <div class="table-column" data-hour="8" data-day="Sun">

                </div>
            </div>
            <div class="table-row">
                <div class="table-column" style="font-size: 21px">
                    10:00
                </div>
                <div class="table-column" data-hour="10" data-day="Mon">

                </div>
                <div class="table-column"  data-hour="10" data-day="Tue">

                </div>
                <div class="table-column" data-hour="10" data-day="Wen">

                </div>
                <div class="table-column" data-hour="10" data-day="Thu">

                </div>
                <div class="table-column" data-hour="10" data-day="Fri">

                </div>
                <div class="table-column" data-hour="10" data-day="Sat">

                </div>
                <div class="table-column" data-hour="10" data-day="Sun">

                </div>
            </div>
            <div class="table-row">
                <div class="table-column" style="font-size: 21px">
                    12:00
                </div>
                <div class="table-column" data-hour="12" data-day="Mon">

                </div>
                <div class="table-column" data-hour="12" data-day="Tue">

                </div>
                <div class="table-column" data-hour="12" data-day="Wen">

                </div>
                <div class="table-column" data-hour="12" data-day="Thu">

                </div>
                <div class="table-column" data-hour="12" data-day="Fri">

                </div>
                <div class="table-column" data-hour="12" data-day="Sat">

                </div>
                <div class="table-column" data-hour="12" data-day="Sun">

                </div>
            </div>
            <div class="table-row">
                <div class="table-column" style="font-size: 21px">
                    14:00
                </div>
                <div class="table-column" data-hour="14" data-day="Mon">

                </div>
                <div class="table-column" data-hour="14" data-day="Tue">

                </div>
                <div class="table-column" data-hour="14" data-day="Wen">

                </div>
                <div class="table-column" data-hour="14" data-day="Thu">

                </div>
                <div class="table-column" data-hour="14" data-day="Fri">

                </div>
                <div class="table-column" data-hour="14" data-day="Sat">

                </div>
                <div class="table-column" data-hour="14" data-day="Sun">

                </div>
            </div>
            <div class="table-row">
                <div class="table-column"  style="font-size: 21px">
                    16:00
                </div>
                <div class="table-column" data-hour="16" data-day="Mon">

                </div>
                <div class="table-column" data-hour="16" data-day="Tue">

                </div>
                <div class="table-column" data-hour="16" data-day="Wen">

                </div>
                <div class="table-column" data-hour="16" data-day="Thu">

                </div>
                <div class="table-column" data-hour="16" data-day="Fri">

                </div>
                <div class="table-column" data-hour="16" data-day="Sat">

                </div>
                <div class="table-column" data-hour="16" data-day="Sun">

                </div>
            </div>
            <div class="table-row">
                <div class="table-column" style="font-size: 21px">
                    18:00
                </div>
                <div class="table-column" data-hour="18" data-day="Mon">

                </div>
                <div class="table-column" data-hour="18" data-day="Tue">

                </div>
                <div class="table-column" data-hour="18" data-day="Wen">

                </div>
                <div class="table-column" data-hour="18" data-day="Thu">

                </div>
                <div class="table-column"  data-hour="18" data-day="Fri">

                </div>
                <div class="table-column" data-hour="18" data-day="Sat">

                </div>
                <div class="table-column" data-hour="18" data-day="Sun">

                </div>
            </div>
        </div>

        <div id="bar-graph">
                <div class="day" id="Mon">
                    <!-- <div class="vertical-block-work"></div>
                    <div class="vertical-block-work"></div>
                    <div class="vertical-block-work"></div>
                    <div class="vertical-block-leisure"></div> -->
                </div>
                <div class="day" id="Tue">
                    <!-- <div class="ny-block"></div> -->
                </div>
                <div class="day" id="Wen">
                    <!-- <div class="ny-block"></div> -->
                </div>
                <div class="day" id="Thu">
                    <!-- <div class="vertical-block-work"></div>
                    <div class="vertical-block-work"></div>
                    <div class="vertical-block-leisure"></div>
                    <div class="vertical-block-leisure"></div>
                    <div class="vertical-block-leisure"></div> -->
                </div>
                <div class="day" id="Fri">
                    <!-- <div class="vertical-block-work"></div>
                    <div class="vertical-block-work"></div> -->
                </div>
                <div class="day" id="Sat">
                    <!-- <div class="vertical-block-leisure"></div> -->
                </div>
                <div class="day" id="Sun">
                    <!-- <div class="ny-block"></div> -->
                </div>
            <div class="day-bar">Monday</div>
            <div class="day-bar">Tuesday</div>
            <div class="day-bar">Wednesday</div>
            <div class="day-bar">Thursday</div>
            <div class="day-bar">Friday</div>
            <div class="day-bar">Saturday</div>
            <div class="day-bar">Sunday</div>
            <p style="font-size: 14px; margin-top: 50px;"><strong>Purple</strong> means type of work activities, <strong>Green</strong> means leisure/relax.</p>
        </div>

    </div>

    <footer>
        <i class="far fa-copyright"></i> FII 2018 - All Rights Reserved
    </footer>
</body>
</html>
