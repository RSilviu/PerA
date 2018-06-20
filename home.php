<?php
include "authCheck.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>PerA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./static/fontawesome/fontawesome-all.js"></script>
    <script src="js/ajax.js" async></script>
    <script src="js/addToGroup.js" async></script>
    <script src="js/showRelation.js" async></script>
    <script src="js/search.js" async></script>
    <script src="js/mapsUtil.js" async></script>
    <script src="js/showHome.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $_ENV['MAPS_API_KEY'] ?>&libraries=places&callback=showHome"
    async defer></script>
    <link rel="stylesheet" type="text/css" href="./static/css/shared.css">
    <link rel="stylesheet" type="text/css" href="./static/css/home.css">
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
        <span style="color: #fff">Hi, <?php echo $_SESSION['username']; ?>!</span>
        <span><i class="fas fa-cog"></i><a href="account.html">Settings</a></span>
        <span><i class="fas fa-sign-out-alt"></i><a href="login.php">Logout</a></span>
    </nav>
    <div class="sidenav">
      <a href="activities.php">My Activities</a>
      <a href="others.php">Others</a>
    </div>
    <div id="container" class="content">
        <div id="searchRes" class="hidden">
            <!--<div style="border-bottom: 3px solid #cb47f1; font-size: 18px">
                Results for <h3 style="display: inline"></h3>
            </div>-->
        </div>
        <div id="activities">
            <!-- <a href="#"> -->
            <!--<ul class="short-act">
                <li>TW</li>
                <li>Sa se dezvolte o aplicatie Web ce permite utilizatorilor autentificati sa realizeze managementul activitatilor personale. Fiecare utilizator va preciza tipuri de activitati si datele aferente acestora: nume, descriere, localizare, perioada de desfasurare, periodicitatea etc.</li>
                <li><span><i class="far fa-clock"></i>joi, 6-7 am</span></li>
                <li><span><i class="fas fa-redo"></i>some frequency</span></li>
                <li><span><i class="fas fa-map-marker-alt"></i>Copou</span></li>
                <li><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2712.1761075498052!2d27.573612404372014!3d47.17398846310152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x193e4b6864504e2c!2sFacultatea+de+Informatic%C4%83!5e0!3m2!1sro!2sro!4v1521061875366" allowfullscreen></iframe></li>
                <li class="act-details">View details</li>
            </ul>-->
        </div>
        <button id="addActBtn" onclick="showAddActivity()">+</button>
    </div>
    <footer>
        <i class="far fa-copyright"></i> FII 2018 - All Rights Reserved
    </footer>
    <!--<script>
        document.getElementById('searchForm').addEventListener('submit', function (f) {
           f.preventDefault();

            // ui part
           document.getElementById('activities').classList.add('hidden');
           var resultsDiv = document.getElementById('searchRes');
           var searchInput = document.getElementById('search');
           var h3 = document.querySelector('#searchRes h3');
           h3.innerText = '"' + searchInput.value + '"';
           resultsDiv.classList.remove('hidden');

           // ajax part
           const url = 'http://localhost:8080/PerA/search.php?' + searchInput.name + '=' + searchInput.value;
           const timeout = 2000;
           requestAsync(url,  'get', timeout, handleSearch);
        });
    </script>-->
<!--    <script src="https://maps.googleapis.com/maps/api/js?key=--><?php //echo $_ENV['MAPS_API_KEY'] ?><!--"></script>-->
</body>
</html>


<!-- <table>
                <tr>
                    <th colspan="2">cursa cu trotineta</th>
                </tr>
                <tr>
                    <td><span><i class="far fa-clock"></i>joi, 6-7 am</span></td>
                    <td><span><i class="fas fa-map-marker-alt"></i>Copou</span></td>
                </tr>
            </table> -->


