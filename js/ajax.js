function requestAsync(url, method, timeout, handler, body = null) {
    try { // trying to instantiate a XMLHttpRequest object
        var xhr = new XMLHttpRequest();
    } catch (e) {
        alert('XMLHttpRequest cannot be instantiated: ' + e.message);
    } finally {
        xhr.ontimeout = function () { alert('Time-out... :('); };
        xhr.onload = handler;
        xhr.open(method, url, true); // opening connection
        xhr.timeout = timeout;         // setting the response time
        xhr.send(body);             // sending the HTTP request
    }
}

function handleResponse(xhr, onSuccess, onError) {
    if (xhr.readyState === 4) {   // data arrived
        if (xhr.status === 200) { // response Ok from server
            onSuccess(xhr.responseText);
        } else if (! (xhr.status === 201 || xhr.status === 204)) {
            onError();
        }
    }
}

function isEmptyJsonObj(jsonObj) {
    for (var key in jsonObj) {
        return false;
    }
    return true;
}
