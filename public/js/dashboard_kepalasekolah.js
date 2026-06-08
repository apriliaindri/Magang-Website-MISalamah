function toggleSidebar() {

    document
        .getElementById('sidebar')
        .classList
        .toggle('active');

}

function hideAll() {

    document.getElementById('formPengumuman').style.display = 'none';

    document.getElementById('formArtikel').style.display = 'none';

    document.getElementById('formUser').style.display = 'none';

}

function showPengumuman() {

    hideAll();

    document.getElementById('formPengumuman').style.display = 'block';

}

function showArtikel() {

    hideAll();

    document.getElementById('formArtikel').style.display = 'block';

}

function showUser(){

    // sembunyikan section lain
    document.getElementById("formPengumuman").style.display = "none";
    document.getElementById("formArtikel").style.display = "none";

    // tampilkan manage user
    document.getElementById("formUser").style.display = "block";

}

function openModal() {

    document.getElementById('userModal').style.display = 'flex';

}

function closeModal() {

    document.getElementById('userModal').style.display = 'none';

}

function openResetModal(userId) {

    document.getElementById('resetModal').style.display = 'flex';

    document.getElementById('resetForm').action =
        '/kepalasekolah/user/reset/' + userId;

}

function closeResetModal() {

    document.getElementById('resetModal').style.display = 'none';

}

window.onclick = function (event) {

    const userModal =
        document.getElementById('userModal');

    const resetModal =
        document.getElementById('resetModal');

    if (event.target === userModal) {

        userModal.style.display = 'none';

    }

    if (event.target === resetModal) {

        resetModal.style.display = 'none';

    }

};

function showNotif(type, message) {

    const popup =
        document.getElementById('notifPopup');

    const icon =
        document.getElementById('notifIcon');

    const msg =
        document.getElementById('notifMessage');

    popup.style.display = 'flex';

    if (type === 'success') {

        icon.innerHTML = '✔';

        icon.className = 'icon success';

    } else {

        icon.innerHTML = '✖';

        icon.className = 'icon error';

    }

    msg.innerText = message;

}

function closeNotif() {

    document.getElementById('notifPopup').style.display = 'none';

}

function togglePassword(id) {

    const input = document.getElementById(id);

    if (!input) {
        console.log('Input tidak ditemukan:', id);
        return;
    }

    if (input.type === 'password') {
        input.type = 'text';
    } else {
        input.type = 'password';
    }

}
