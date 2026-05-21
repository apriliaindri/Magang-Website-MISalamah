document.addEventListener("DOMContentLoaded", function () {

    const total = document.querySelectorAll(".soal-item").length;

    const storageKey = document.querySelector("form").dataset.storage || null;

    function showSoal(i) {

        document.querySelectorAll(".soal-item").forEach(el => {
            el.style.display = "none";
        });

        const target = document.getElementById("soal" + i);
        if (target) target.style.display = "block";

        setActive(i);
    }

    function setActive(i) {

        document.querySelectorAll(".nomor").forEach(el => {
            el.classList.remove("active");
        });

        const nav = document.getElementById("nav" + i);
        if (nav) nav.classList.add("active");
    }

    // NEXT
    document.querySelectorAll(".btn-next").forEach(btn => {
        btn.addEventListener("click", function () {
            const i = parseInt(this.dataset.index);
            if (i + 1 < total) showSoal(i + 1);
        });
    });

    // PREV
    document.querySelectorAll(".btn-prev").forEach(btn => {
        btn.addEventListener("click", function () {
            const i = parseInt(this.dataset.index);
            if (i - 1 >= 0) showSoal(i - 1);
        });
    });

    // NAVIGATION
    document.querySelectorAll(".nomor").forEach(nav => {
        nav.addEventListener("click", function () {
            showSoal(parseInt(this.dataset.index));
        });
    });

    // SUBMIT
    document.querySelector(".btn-selesai")?.addEventListener("click", function () {

        if (confirm("Yakin ingin menyelesaikan ujian?")) {

            localStorage.removeItem(storageKey);

            localStorage.setItem("cbt_success", "1");

            document.querySelector("form").submit();
        }

    });

});
