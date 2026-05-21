function showNotif(type, message){

    const popup =
        document.getElementById('notifPopup');

    const icon =
        document.getElementById('notifIcon');

    const msg =
        document.getElementById('notifMessage');

    popup.style.display = 'flex';

    if(type === 'success'){

        icon.innerHTML = '✔';
        icon.className = 'icon success';

    }else{

        icon.innerHTML = '✖';
        icon.className = 'icon error';

    }

    msg.innerText = message;
}

function closeNotif(){

    document.getElementById('notifPopup')
        .style.display = 'none';
}

document.addEventListener('DOMContentLoaded', function(){

    if(window.notifSuccess){

        showNotif('success', window.notifSuccess);
    }

    if(window.notifError){

        showNotif('error', window.notifError);
    }
});
