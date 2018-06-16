<?php
include 'authCheck.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>PerA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./static/css/shared.css">
    <link rel="stylesheet" type="text/css" href="./static/css/home.css">
    <link rel="stylesheet" type="text/css" href="./static/css/others.css">

    <script defer src="./static/fontawesome/fontawesome-all.js"></script>
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
      <a href="#">Others</a>
    </div>
    <div id="container" class="content">
        <div id="activities">
            <ul class="short-act">
                <li>Name</li>
                <li><span><i class="far fa-clock"></i>Activity</span></li>
                <li><span><i class="fas fa-map-marker-alt"></i>joi, 6-7 am</span></li>
                <li>More activities from Name</li>
            </ul>
        </div>
        <div id="searchRes" class="hidden">
            <!--<div style="border-bottom: 3px solid #cb47f1; font-size: 18px">
                Results for <h3 style="display: inline"></h3>
            </div>-->
        </div>
    </div>
    <footer>
        <i class="far fa-copyright"></i> FII 2018 - All Rights Reserved
    </footer>    
</body>
</html>