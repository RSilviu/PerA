// define variables
var nativePickers = document.querySelectorAll('.nativeDateTimePicker');
var fallbackPickers = document.querySelectorAll('.fallbackDateTimePicker');
var fallbackLabels = document.querySelectorAll('.fallbackLabel');

var startYearSelect = document.querySelector('#startYear');
var startMonthSelect = document.querySelector('#startMonth');
var startDaySelect = document.querySelector('#startDay');
var startHourSelect = document.querySelector('#startHour');
var startMinuteSelect = document.querySelector('#startMinute');

// hide fallback initially
var pickerCount = fallbackPickers.length;
for (let i = 0; i < pickerCount; i++) {
    fallbackPickers[i].style.display = 'none';
    fallbackLabels[i].style.display = 'none';
}

// test whether a new datetime-local input falls back to a text input or not
var test = document.createElement('input');
test.type = 'datetime-local';
// if it does, run the code inside the if() {} block
if(test.type === 'text') {
    // hide the native picker and show the fallback
    for (let i = 0; i < pickerCount; i++) {
        nativePickers[i].style.display = 'none';
        fallbackPickers[i].style.display = 'block';
        fallbackLabels[i].style.display = 'block';
    }
    // populate the days and years dynamically
    // (the months are always the same, therefore hardcoded)
    populateDays(startMonthSelect.value);
    populateYears();
    populateHours();
    populateMinutes();
}

function populateDays(month) {
    // delete the current set of <option> elements out of the
    // day <select>, ready for the next set to be injected
    while(startDaySelect.firstChild){
        startDaySelect.removeChild(startDaySelect.firstChild);
    }

    // Create variable to hold new number of days to inject
    var dayNum;

    // 31 or 30 days?
    if(month === 'January' | month === 'March' | month === 'May' | month === 'July' | month === 'August' | month === 'October' | month === 'December') {
        dayNum = 31;
    } else if(month === 'April' | month === 'June' | month === 'September' | month === 'November') {
        dayNum = 30;
    } else {
        // If month is February, calculate whether it is a leap year or not
        var year = startYearSelect.value;
        (year - 2016) % 4 === 0 ? dayNum = 29 : dayNum = 28;
    }

    // inject the right number of new <option> elements into the day <select>
    for(i = 1; i <= dayNum; i++) {
        var option = document.createElement('option');
        option.textContent = i;
        startDaySelect.appendChild(option);
    }

    // if previous day has already been set, set startDaySelect's value
    // to that day, to avoid the day jumping back to 1 when you
    // change the year
    if(previousDay) {
        startDaySelect.value = previousDay;

        // If the previous day was set to a high number, say 31, and then
        // you chose a month with less total days in it (e.g. February),
        // this part of the code ensures that the highest day available
        // is selected, rather than showing a blank startDaySelect
        if(startDaySelect.value === "") {
            startDaySelect.value = previousDay - 1;
        }

        if(startDaySelect.value === "") {
            startDaySelect.value = previousDay - 2;
        }

        if(startDaySelect.value === "") {
            startDaySelect.value = previousDay - 3;
        }
    }
}

function populateYears() {
    // get this year as a number
    var date = new Date();
    var year = date.getFullYear();

    // Make this year, and the 100 years before it available in the year <select>
    for(var i = 0; i <= 100; i++) {
        var option = document.createElement('option');
        option.textContent = year-i;
        startYearSelect.appendChild(option);
    }
}

function populateHours() {
    // populate the hours <select> with the 24 hours of the day
    for(var i = 0; i <= 23; i++) {
        var option = document.createElement('option');
        option.textContent = (i < 10) ? ("0" + i) : i;
        startHourSelect.appendChild(option);
    }
}

function populateMinutes() {
    // populate the minutes <select> with the 60 hours of each minute
    for(var i = 0; i <= 59; i++) {
        var option = document.createElement('option');
        option.textContent = (i < 10) ? ("0" + i) : i;
        startMinuteSelect.appendChild(option);
    }
}

// when the month or year <select> values are changed, rerun populateDays()
// in case the change affected the number of available days
startYearSelect.onchange = function() {
    populateDays(startMonthSelect.value);
}

startMonthSelect.onchange = function() {
    populateDays(startMonthSelect.value);
}

//preserve day selection
var previousDay;

// update what day has been set to previously
// see end of populateDays() for usage
startDaySelect.onchange = function() {
    previousDay = startDaySelect.value;
}