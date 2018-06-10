import { requestAsync, handleResponse } from './ajax.js';

function handleAdd() {
    handleResponse(this, onSuccess, function () {
        alert('addToGroup onError!');
    });
}

function addToGroup(url, timeout) {
    requestAsync(url, 'get', timeout, handleAdd);
}

function onSuccess(msg) {
    alert(msg);
}

export { addToGroup };