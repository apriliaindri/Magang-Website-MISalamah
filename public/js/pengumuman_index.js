document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.delete-form').forEach(form => {

        form.addEventListener('submit', function (e) {

            const confirmDelete = confirm('Yakin hapus pengumuman ini?');

            if (!confirmDelete) {
                e.preventDefault();
            }

        });

    });

});
