
function handleShowRelation() {
    handleResponse(this, onShowRelationSuccess, function () {
        alert('showRelation onError!');
    });
}

function showRelation(url, timeout) {
    console.log('in showRelation');
    requestAsync(url, 'get', timeout, handleShowRelation);
}

function onShowRelationSuccess(content) {
    console.log('relation status: ', content);
    var container = document.getElementById('container');
    container.innerHTML = '';
    var p = document.createElement('p');
    var msg;
    var person = JSON.parse(content);
    var personName = person.name;
    let isInGroup = person.inGroup;
    if (isInGroup) {
        msg = '<strong>' + personName + '</strong> is in your group';
    } else {
        msg = '<strong>' + personName + '</strong> is not part of your group';
    }
    if (isInGroup < 0) {
        msg = 'This is you.';
    }
    p.innerHTML = msg;
    container.appendChild(p);
    if (isInGroup < 0) {
        return;
    }
    let personId = person.id;
    if (isInGroup) {
        let rssLink = document.createElement('a');
        rssLink.type = "application/rss+xml";
        rssLink.href = 'rss.php?id=' + personId;
        rssLink.target = '_blank';
        rssLink.textContent = 'View RSS';
        container.appendChild(rssLink);
        return;
    }
    // not in group
    var addBtn = document.createElement('input');
    addBtn.type = 'button';
    addBtn.value = 'Add to group';
    addBtn.addEventListener('click', function () {
        const url = 'http://localhost:8080/PerA/follow.php?id=' + personId + '&name=' + personName;
        const timeout = 2000;
        addToGroup(url, timeout);
    });
    container.appendChild(addBtn);
}

