<?php
    include "authCheck.php";
    const TYPE_RELAX = 0;
    const TYPE_WORK = 1;

    const PERIODICITY_NONE = 0;
    const PERIODICITY_DAILY = 1;
    const PERIODICITY_WEEKLY = 2;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity</title>
    <style>
        #autocomplete {
            width: 50%;
        }
        fieldset {
            width: 20%;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="./static/css/shared.css">
    <script defer src="./static/fontawesome/fontawesome-all.js"></script>
    <link rel="stylesheet" href="static/css/timePicker.css">
</head>
<body>
<nav id="topnav">
        <a id="logo" href="home.html">PerA</a>
        <div id="search-div">
            <input id="search" type="search" autocomplete="off" placeholder="Search people, etc..">
        </div>
        <button id="notifs" class="general-button" type="button" data-count="3">
            <i class="far fa-bell fa-lg"></i>
        </button>
        <span><i class="fas fa-cog"></i><a href="account.html">Settings</a></span>
        <span><i class="fas fa-sign-out-alt"></i><a href="login.html">Logout</a></span>
    </nav>
    <h3>New activity</h3>
    <form action="createActivity.php" method="post">
        <div id="fields">
        <fieldset>
            <legend>Type</legend>
            <div>
                <input type="radio" id="t1"
                       name="type" value="0" checked>
                <label for="t1">relax</label>

                <input type="radio" id="t2"
                       name="type" value="1">
                <label for="t2">work</label>
            </div>
            <br>
        </fieldset>
        <br>
        <div>
        <label for="name">name</label>
        <input type="text" id="name" name="name" autocomplete="off">
        </div>
        <div>
        <label for="desc">description</label><br>
        <textarea name="description" id="desc" cols="30" rows="10"></textarea>
        </div>
        <div>
        <label for="autocomplete">place</label>
        <input id="autocomplete" name="place" onFocus="geolocate()" type="text"> </div>
        <input type="hidden" name="place_id" id="place_id">
        <input type="hidden" name="lat" id="lat">
        <input type="hidden" name="lng" id="lng">

        <label for="periodicity">periodicity</label>
        <select name="periodicity" id="periodicity">
            <option value="0" selected>None</option>
            <option value="1">Daily</option>
            <option value="2">Every Two Hours</option>
        </select>
        <br><br>
        <input type="submit" value="Submit">
        <br><br>
        <input id="hour" name="hour" type="hidden">
        <input id="day" name="day" type="hidden">
    </div>
    </form>
    <script>
        // var tz_offset_minutes = new Date().getTimezoneOffset();
        // document.getElementById('tz').value = (tz_offset_minutes === 0 ? 0 : -tz_offset_minutes);

        var autocomplete;
        document.getElementById('hour').value = getHourParameter()
        document.getElementById('day').value = getDayParameter()

        function initAutocomplete() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            autocomplete = new google.maps.places.Autocomplete((document.getElementById('autocomplete')));

            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            // autocomplete.addListener('place_changed', markOnMap);

            autocomplete.addListener('place_changed', function () {
                var place = autocomplete.getPlace();
                document.getElementById('place_id').value = place.place_id;
                document.getElementById('lat').value = place.geometry.location.lat();
                document.getElementById('lng').value = place.geometry.location.lng();
            });
        }

        function geolocate() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var geolocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    var circle = new google.maps.Circle({
                        center: geolocation,
                        radius: position.coords.accuracy
                    });
                    autocomplete.setBounds(circle.getBounds());
                });
            }
        }

        function getDayParameter() {
            var day = ''
            document.location.search.split('?')[1].split(',').forEach(function(value) {
                var param = value.split('=')
                if(param[0] == 'day') {
                    day = param[1]
                }
            })
            console.log("day -> ", day)
            return day
        }

        
        function getHourParameter() {
            var hour = ''
            document.location.search.split('?')[1].split(',').forEach(function(value) {
                var param = value.split('=')
                if(param[0] == 'hour') {
                    hour = param[1]
                }
            })
            console.log("hour!", hour)
            return hour
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $_ENV['MAPS_API_KEY'] ?>&libraries=places&callback=initAutocomplete"
            async defer></script>
<!--    <script src="js/dateTimeCompat.js"></script>-->
</body>
</html>

 <!-- <input type="hidden" name="tz_minutes" id="tz">
      <div class="nativeDateTimePicker">
        <label for="startDate">Starts</label>
        <input type="datetime-local" id="startDate" name="startDate">
<!--        <span class="validity"></span>-->
    <!--   </div> -->
            <!--  <p class="fallbackLabel">Starts</p>
              <div class="fallbackDateTimePicker">
                    <div>
                          <span>
        <label for="startDay">Day:</label>
        <select id="startDay" name="day">
        </select>
      </span>
                          <span>
        <label for="startMonth">Month:</label>
        <select id="startMonth" name="month">
          <option selected>January</option>
          <option>February</option>
          <option>March</option>
          <option>April</option>
          <option>May</option>
          <option>June</option>
          <option>July</option>
          <option>August</option>
          <option>September</option>
          <option>October</option>
          <option>November</option>
          <option>December</option>
        </select>
      </span>
                          <span>
        <label for="startYear">Year:</label>
        <select id="startYear" name="year">
        </select>
      </span>
                        </div>
                    <div>
                          <span>
        <label for="startHour">Hour:</label>
        <select id="startHour" name="hour">
        </select>
      </span>
                          <span>
        <label for="startMinute">Minute:</label>
        <select id="startMinute" name="minute">
        </select>
      </span>
                        </div>
                  </div>-->


    <!-- <div class="nativeDateTimePicker">
            <label for="endDate">Ends</label>
            <input type="datetime-local" id="endDate" name="endDate">
<!--            <span class="validity"></span>-->
    <!-- </div> -->
        <!--  <p class="fallbackLabel">Ends</p>
          <div class="fallbackDateTimePicker">
                <div>
                      <span>
        <label for="endDay">Day:</label>
        <select id="endDay" name="day">
        </select>
      </span>
                      <span>
        <label for="endMonth">Month:</label>
        <select id="endMonth" name="month">
          <option selected>January</option>
          <option>February</option>
          <option>March</option>
          <option>April</option>
          <option>May</option>
          <option>June</option>
          <option>July</option>
          <option>August</option>
          <option>September</option>
          <option>October</option>
          <option>November</option>
          <option>December</option>
        </select>
      </span>
                      <span>
        <label for="endYear">Year:</label>
        <select id="endYear" name="year">
        </select>
      </span>
                    </div>
                <div>
                      <span>
        <label for="endHour">Hour:</label>
        <select id="endHour" name="hour">
        </select>
      </span>
                      <span>
        <label for="endMinute">Minute:</label>
        <select id="endMinute" name="minute">
        </select>
      </span>
                    </div>
              </div>-->


        <!--durata: 1 zi, 1+ zile
        repeat: 1 zi - zi urmatoare, zi anume ; 1+ zile - zi anume, saptamanal, lunar, anual, ... , dinamic-->

        <!-- <br><br> -->