function nextSoal(i) {

    document.getElementById(`soal${i}`).style.display = 'none';

    document.getElementById(`soal${i + 1}`).style.display = 'block';

    setActive(i + 1);

}

function prevSoal(i) {

    document.getElementById(`soal${i}`).style.display = 'none';

    document.getElementById(`soal${i - 1}`).style.display = 'block';

    setActive(i - 1);

}

function lompatSoal(i) {

    const total = document.querySelectorAll('.soal-item');

    total.forEach((el) => {

        el.style.display = 'none';

    });

    document.getElementById(`soal${i}`).style.display = 'block';

    setActive(i);

}

function setActive(i) {

    document.querySelectorAll('.nomor').forEach((el) => {

        el.classList.remove('active');

    });

    document.getElementById(`nav${i}`).classList.add('active');

}
