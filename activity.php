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
        input[readonly] {
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="static/css/timePicker.css">
</head>
<body>
    <h3><?php if (isset($_REQUEST['id'])) echo 'Modify activity';
    else echo 'New activity'; ?></h3>
    <form action="<?php if (isset($_REQUEST['id'])) echo 'updateActivity.php?id='.$_REQUEST['id'];
    else echo 'createActivity.php';?>" method="post">
        <fieldset>
            <legend>Type</legend>
            <div>
                <input type="radio" id="t1"
                       name="type" value="0" <?php if (! isset($_REQUEST['type']) || $_REQUEST['type'] == TYPE_RELAX) echo 'checked'; ?>>
                <label for="t1">relax</label>

                <input type="radio" id="t2"
                       name="type" value="1" <?php if (isset($_REQUEST['type']) && $_REQUEST['type'] == TYPE_WORK) echo 'checked'; ?>>
                <label for="t2">work</label>
            </div>
            <br>
        </fieldset>
        <br>
        <label for="name">name</label>
        <input required type="text" id="name" name="name" autocomplete="off"
        value="<?php if (isset($_REQUEST['name'])) echo $_REQUEST['name']; ?>">
        <br><br>
        <label for="desc">description</label><br>
        <textarea name="description" id="desc" cols="30" rows="10"><?php if (isset($_REQUEST['description'])) echo $_REQUEST['description']; ?>
        </textarea>
        <br><br>
        <label for="autocomplete">place</label>
        <input required id="autocomplete" name="place" onFocus="geolocate()" type="text"
        value="<?php if (isset($_REQUEST['place'])) echo $_REQUEST['place']; ?>">
        <input type="hidden" name="place_id" id="place_id"
        value="<?php if (isset($_REQUEST['place_id'])) echo $_REQUEST['place_id']; ?>">
        <input type="hidden" name="lat" id="lat"
        value="<?php if (isset($_REQUEST['lat'])) echo $_REQUEST['lat']; ?>">
        <input type="hidden" name="lng" id="lng"
        value="<?php if (isset($_REQUEST['lng'])) echo $_REQUEST['lng']; ?>">
        <br><br>

        <label for="dayOfTheWeek">day (i.e Mon)</label>
        <input type="text" name="day" id="dayOfTheWeek"
               value="<?php if (isset($_REQUEST['day'])) echo $_REQUEST['day']; ?>" readonly><br><br>
        <label for="hourOfDay">hour (8:00 - 18:00)</label>
        <input type="text" name="hour" id="hourOfDay"
               value="<?php if (isset($_REQUEST['hour'])) echo $_REQUEST['hour']; ?>" readonly>
        <br><br>

      <!--<input type="hidden" name="tz_minutes" id="tz">
      <div class="nativeDateTimePicker">
        <label for="startDate">Starts</label>
        <input type="datetime-local" id="startDate" name="startDate">
      </div>-->
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


    <!--<div class="nativeDateTimePicker">
            <label for="endDate">Ends</label>
            <input type="datetime-local" id="endDate" name="endDate">
    </div>-->
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

        <label for="periodicity">periodicity</label>
        <select name="periodicity" id="periodicity">
            <option value="0"
                <?php if (! isset($_REQUEST['periodicity']) || $_REQUEST['periodicity'] == PERIODICITY_NONE) echo 'selected'; ?>>None</option>
            <option value="1"
                <?php if (isset($_REQUEST['periodicity']) && $_REQUEST['periodicity'] == PERIODICITY_DAILY) echo 'selected'; ?>>Daily</option>
            <option value="2"
                <?php if (isset($_REQUEST['periodicity']) && $_REQUEST['periodicity'] == PERIODICITY_WEEKLY) echo 'selected'; ?>>Weekly</option>
        </select>
        <br><br>
        <input type="submit" value="<?php if (isset($_REQUEST['id'])) echo 'Update';
        else echo 'Create'; ?>">
        <br><br>
    </form>
    <script>
        /*var tz_offset_minutes = new Date().getTimezoneOffset();
        document.getElementById('tz').value = (tz_offset_minutes === 0 ? 0 : -tz_offset_minutes);*/

        var autocomplete;

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
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $_ENV['MAPS_API_KEY'] ?>&libraries=places&callback=initAutocomplete"
            async defer></script>
<!--    <script src="js/dateTimeCompat.js"></script>-->
</body>
</html>