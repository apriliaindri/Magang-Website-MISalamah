function openModal(src) {
    document.getElementById('imageModal').style.display = 'flex';
    document.getElementById('modalImage').src = src;
}

function closeModal() {
    document.getElementById('imageModal').style.display = 'none';
}

function removeExistingFile(index, file) {
    document.getElementById(`file-${index}`).remove();

    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'hapus_file[]';
    input.value = file;

    document.getElementById('deleted-files').appendChild(input);
}

document.addEventListener('DOMContentLoaded', function () {

    // close modal button
    document.querySelector('.close-modal')
        .addEventListener('click', closeModal);

    // modal background click
    document.getElementById('imageModal')
        .addEventListener('click', function (e) {
            if (e.target.id === 'imageModal') {
                closeModal();
            }
        });

    // image preview click
    document.querySelectorAll('.js-preview-image')
        .forEach(img => {
            img.addEventListener('click', function () {
                openModal(this.dataset.src);
            });
        });

    // delete file buttons
    document.querySelectorAll('.remove-file')
        .forEach(btn => {
            btn.addEventListener('click', function () {
                removeExistingFile(
                    this.dataset.index,
                    this.dataset.file
                );
            });
        });

});
