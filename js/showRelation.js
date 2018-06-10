import { requestAsync, handleResponse } from './ajax.js';
import { addToGroup } from "./addToGroup.js";

function handleShowRelation() {
    handleResponse(this, onSuccess, function () {
        alert('showRelation onError!');
    });
}

function showRelation(url, timeout) {
    console.log('in showRelation')
    requestAsync(url, 'get', timeout, handleShowRelation);
}

function onSuccess(content) {
    console.log('relation status: ', content)
    var container = document.getElementById('container');
    container.innerHTML = '';
    var h2 = document.createElement('h2');
    var msg;
    var person = JSON.parse(content);
    var personName = person.name;
    if (person.inGroup) {
        msg = personName + ' is in your group';
    } else {
        msg = personName + ' is not part of your group';
    }
    h2.innerText = msg;
    container.appendChild(h2);
    if (! person.inGroup) {
        var addBtn = document.createElement('input');
        addBtn.type = 'button';
        addBtn.value = 'Add to group';
        addBtn.addEventListener('click', function () {
            const url = 'http://localhost:8080/PerA/follow.php?id=' + person.id + '&name=' + personName;
            const timeout = 2000;
            addToGroup(url, timeout);
        });
        container.appendChild(addBtn);
    }
}

export { showRelation };
