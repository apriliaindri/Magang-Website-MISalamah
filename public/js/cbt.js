document.addEventListener("DOMContentLoaded", function () {

    function setActive(i) {

        document.querySelectorAll(".nomor").forEach(el => {
            el.classList.remove("active");
        });

        const activeNav = document.getElementById("nav" + i);
        if (activeNav) activeNav.classList.add("active");
    }

    function showSoal(i) {

        document.querySelectorAll(".soal-item").forEach(el => {
            el.classList.remove("active");
        });

        const target = document.getElementById("soal" + i);
        if (target) target.classList.add("active");

        setActive(i);
    }

    // NEXT
    document.querySelectorAll(".btn-next").forEach(btn => {
        btn.addEventListener("click", function () {
            const i = parseInt(this.dataset.index);
            showSoal(i + 1);
        });
    });

    // PREV
    document.querySelectorAll(".btn-prev").forEach(btn => {
        btn.addEventListener("click", function () {
            const i = parseInt(this.dataset.index);
            showSoal(i - 1);
        });
    });

    // NAV CLICK
    document.querySelectorAll(".nomor").forEach(nav => {
        nav.addEventListener("click", function () {
            showSoal(parseInt(this.dataset.index));
        });
    });

    // SUBMIT
    document.querySelector(".btn-selesai").addEventListener("click", function () {

        if (confirm("Yakin ingin menyelesaikan ujian?")) {
            document.querySelector("form").submit();
        }

    });

});
