var search = document.getElementById('search');
search.onkeyup = function() {showSuggestions()};
search.onblur = function() {hideSuggestions()};


function showSuggestions() {
        var input, filter, ul, li, a, i, noresDiv;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        if (filter === "") {
            hideSuggestions();
            return true;
        }
        ul = document.getElementById("suggestions");
        li = ul.getElementsByTagName("li");
        var matches = 0;
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
                matches++;
            } else {
                li[i].style.display = "none";

            }
        }
        noresDiv = document.getElementById("no-result");

        if (matches === 0) {
            noresDiv.innerHTML = "No results for <b>" + input.value +"</b>";
            noresDiv.style.display = "block";
        }
        else {
            ul.style.display = "block";
            noresDiv.style.display = "none";
        }
    }

    function hideSuggestions() {
        var ul, noresDiv;
        ul = document.getElementById("suggestions");
        noresDiv = document.getElementById("no-result");
        ul.style.display = "none";
        noresDiv.style.display = "none";
    }