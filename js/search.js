import { requestAsync, handleResponse, isEmptyJsonObj } from './ajax.js';
import { showRelation } from './showRelation.js'

var search = document.getElementById('search');
search.onkeyup = function(e) {
    if (search.value === '' || e.key === 'Escape' || e.key === 'Esc') hideSuggestions();
    if (e.key !== 'Enter' && search.value !== '') {
        hideSuggestions();
        const url = 'http://localhost:8080/PerA/search.php?' + search.name + '=' + search.value;
        console.log('url: ',url);
        const timeout = 2000;
        requestAsync(url,  'get', timeout, handleSearch);
    }
};

window.onclick = function (e) {
    if (e.target.id != 'search-div') {
        search.value = '';
        hideSuggestions();
    }
};

function handleSearch() {
    handleResponse(this, showSuggestions, function () {
        alert('search onError!');
    });
}

function showSuggestions(suggestionsJson) {
        var ul = document.getElementById('suggestions');
        var suggestions = JSON.parse(suggestionsJson);
        var input = document.getElementById('search');
        if (isEmptyJsonObj(suggestions)) {
            ul.innerHTML = "<li>No results for <b>" + input.value +"</b></li>";
        }
        else {
            for (var id in suggestions) {
                var name = suggestions[id];
                var li = document.createElement('li');
                li.innerText = name;
                // closure, self exe fun ...
                li.onclick = (function () {
                    var personId = id;
                    var personName = name;
                    return function() {
                        hideSuggestions();
                        const url = 'http://localhost:8080/PerA/people.php?id=' + personId + '&name=' + personName;
                        const timeout = 2000;
                        showRelation(url, timeout);
                    };
                })();

                ul.appendChild(li);
            }
        }
        ul.classList.remove('hidden');
}

    function hideSuggestions() {
        var ul;
        ul = document.getElementById("suggestions");
        ul.innerHTML = '';
    }