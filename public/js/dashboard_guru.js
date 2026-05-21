function toggleSidebar() {

    document
        .getElementById('sidebar')
        .classList
        .toggle('active');

}

function showPengumuman() {

    document.getElementById('formPengumuman').style.display = 'block';

    document.getElementById('formTugas').style.display = 'none';

    document
        .getElementById('sidebar')
        .classList
        .remove('active');

}

function showTugas() {

    document.getElementById('formTugas').style.display = 'block';

    document.getElementById('formPengumuman').style.display = 'none';

    document
        .getElementById('sidebar')
        .classList
        .remove('active');

}

function tambahSoal() {

    const container = document.getElementById('soalContainer');

    const div = document.createElement('div');

    div.classList.add('soalItem');

    div.innerHTML = `
        <input type="text" name="pertanyaan[]" placeholder="Pertanyaan" required>

        <input type="text" name="pilihan_a[]" placeholder="Pilihan A" required>

        <input type="text" name="pilihan_b[]" placeholder="Pilihan B" required>

        <input type="text" name="pilihan_c[]" placeholder="Pilihan C" required>

        <input type="text" name="pilihan_d[]" placeholder="Pilihan D" required>

        <select name="jawaban[]" required>

            <option value="">
                Jawaban Benar
            </option>

            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>

        </select>

        <hr>
    `;

    container.appendChild(div);

}

function showNotif(type, message) {

    const popup = document.getElementById('notifPopup');

    const icon = document.getElementById('notifIcon');

    const msg = document.getElementById('notifMessage');

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

window.onload = function () {

    if (successMessage) {

        showNotif('success', successMessage);

    }

    if (hasError) {

        showNotif('error', 'Terjadi kesalahan, coba lagi!');

    }

};
