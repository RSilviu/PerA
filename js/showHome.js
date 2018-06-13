import { requestAsync, handleResponse } from './ajax.js';

window.onload = showHome;

function handleShowHome() {
    handleResponse(this, onSuccess, function () {
        alert('showHome onError!');
    });
}

function showHome() {
    const url = 'http://localhost:8080/PerA/showHome.php';
    const timeout = 2000;
    requestAsync(url, 'get', timeout, handleShowHome);
}

function onSuccess(content) {
    var activities = JSON.parse(content);

}
