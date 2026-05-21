function openModal(src) {
    document.getElementById('imageModal').style.display = 'flex';
    document.getElementById('modalImage').src = src;
}

function closeModal() {
    document.getElementById('imageModal').style.display = 'none';
}

document.addEventListener('DOMContentLoaded', function () {

    const modal = document.getElementById('imageModal');
    const closeBtn = document.querySelector('.close-modal');
    const images = document.querySelectorAll('.detail-image img');

    images.forEach(img => {
        img.addEventListener('click', function () {
            openModal(this.src);
        });
    });

    closeBtn.addEventListener('click', closeModal);

    modal.addEventListener('click', function (e) {
        if (e.target.id === 'imageModal') {
            closeModal();
        }
    });

});
