
function handleAdd() {
    handleResponse(this, onAddToGroupSuccess, function () {
        alert('addToGroup onError!');
    });
}

function addToGroup(url, timeout) {
    requestAsync(url, 'get', timeout, handleAdd);
}

function onAddToGroupSuccess(msg) {
    alert(msg);
}
