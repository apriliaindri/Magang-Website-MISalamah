function goBack()
{
    if(window.history.length > 1)
    {
        window.history.back();
    }
    else
    {
        window.location.href = guruDashboardUrl;
    }
}

function closeModal()
{
    document.getElementById('modalSuccess')
        .style.display = 'none';

    window.location.href = guruDashboardUrl;
}

if(successTugas)
{
    window.onload = function()
    {
        document.getElementById('modalSuccess')
            .style.display = 'flex';
    };
}
