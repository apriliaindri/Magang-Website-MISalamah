function toggleSidebar(){

    document
        .getElementById('sidebar')
        .classList
        .toggle('active');

}

function hideAll(){

    document
        .getElementById('blank-state')
        .classList
        .add('hidden');

    document
        .getElementById('tugas')
        .classList
        .add('hidden');

    document
        .getElementById('pengumuman')
        .classList
        .add('hidden');

}

function showTugas(){

    hideAll();

    document
        .getElementById('tugas')
        .classList
        .remove('hidden');

    closeSidebar();

}

function showPengumuman(){

    hideAll();

    document
        .getElementById('pengumuman')
        .classList
        .remove('hidden');

    closeSidebar();

}

function closeSidebar(){

    document
        .getElementById('sidebar')
        .classList
        .remove('active');

}

function toggleSidebar()
{
    const sidebar =
        document.getElementById("sidebar");

    sidebar.classList.toggle("active");

    document.body.classList.toggle("sidebar-open");
}
