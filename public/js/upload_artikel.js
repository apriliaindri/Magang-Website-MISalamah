function goBack(){

    if(
        document.referrer === window.location.href ||
        document.referrer === ''
    ){

        window.location.href =
        dashboardRoute;

    }else{

        window.history.back();

    }

}

const inputFiles =
document.getElementById('files');

const fileList =
document.getElementById('file-list');

let selectedFiles = [];

inputFiles.addEventListener('change', function(e){

    Array.from(e.target.files).forEach(file => {

        selectedFiles.push(file);

    });

    updateInputFiles();

    renderFiles();

});

function renderFiles(){

    fileList.innerHTML = '';

    selectedFiles.forEach((file, index) => {

        const div =
        document.createElement('div');

        div.classList.add('file-item');

        div.innerHTML = `
            <div class="file-left">

                <span>📎</span>

                <span>${file.name}</span>

            </div>

            <button
                type="button"
                class="remove-file"
                onclick="removeFile(${index})"
            >
                ×
            </button>
        `;

        fileList.appendChild(div);

    });

}

function updateInputFiles(){

    const dataTransfer =
    new DataTransfer();

    selectedFiles.forEach(file => {

        dataTransfer.items.add(file);

    });

    inputFiles.files =
    dataTransfer.files;

}

function removeFile(index){

    selectedFiles.splice(index, 1);

    updateInputFiles();

    renderFiles();

}
