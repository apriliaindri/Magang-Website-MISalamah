function openModal(src) {

    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');

    modal.style.display = 'flex';
    modalImage.src = src;

}

function closeModal() {

    document.getElementById('imageModal').style.display = 'none';

}

document
    .getElementById('imageModal')
    .addEventListener('click', function (e) {

        if (e.target.id === 'imageModal') {

            closeModal();

        }

    });
