
function handleAdd() {
    handleResponse(this, onAddToGroupSuccess, function () {
        alert('addToGroup onError!');
    });
}

function addToGroup(url, timeout, body) {
    requestAsync(url, 'POST', timeout, handleAdd, body);
}

function onAddToGroupSuccess(msg) {
}
