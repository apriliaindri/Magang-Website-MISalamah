const inputFiles = document.getElementById('files');
const fileList = document.getElementById('file-list');

let selectedFiles = [];

inputFiles.addEventListener('change', function (e) {

    Array.from(e.target.files).forEach(file => {
        selectedFiles.push(file);
    });

    updateInputFiles();
    renderFiles();

});

function renderFiles() {

    fileList.innerHTML = '';

    selectedFiles.forEach((file, index) => {

        const ext = file.name.split('.').pop().toLowerCase();
        const div = document.createElement('div');
        div.classList.add('preview-item');

        // IMAGE
        if (['jpg','jpeg','png','webp'].includes(ext)) {

            const imageUrl = URL.createObjectURL(file);

            div.innerHTML = `
                <div class="preview-card">
                    <img src="${imageUrl}"
                         class="preview-image"
                         onclick="openModal('${imageUrl}')">

                    <div class="preview-name">${file.name}</div>

                    <button type="button"
                            class="remove-file"
                            onclick="removeFile(${index})">
                        ×
                    </button>
                </div>
            `;
        }

        // PDF
        else if (ext === 'pdf') {

            const pdfUrl = URL.createObjectURL(file);

            div.innerHTML = `
                <div class="preview-card">
                    <a href="${pdfUrl}" target="_blank" class="pdf-preview">
                        <img src="/img/pdf-icon.png" class="pdf-icon">
                        <span>${file.name}</span>
                    </a>

                    <button type="button"
                            class="remove-file"
                            onclick="removeFile(${index})">
                        ×
                    </button>
                </div>
            `;
        }

        // OTHER
        else {
            div.innerHTML = `
                <div class="preview-card file-card">
                    <div class="preview-name">📎 ${file.name}</div>

                    <button type="button"
                            class="remove-file"
                            onclick="removeFile(${index})">
                        ×
                    </button>
                </div>
            `;
        }

        fileList.appendChild(div);
    });
}

function updateInputFiles() {

    const dataTransfer = new DataTransfer();

    selectedFiles.forEach(file => {
        dataTransfer.items.add(file);
    });

    inputFiles.files = dataTransfer.files;
}

function removeFile(index) {

    selectedFiles.splice(index, 1);

    updateInputFiles();
    renderFiles();
}

// MODAL IMAGE
function openModal(src) {
    document.getElementById('imageModal').style.display = 'flex';
    document.getElementById('modalImage').src = src;
}

function closeModal() {
    document.getElementById('imageModal').style.display = 'none';
}

function goBack() {
    if (window.history.length > 1) {
        window.history.back();
    } else {
        window.location.href = "{{ route('pengumuman.index') }}";
    }
}
