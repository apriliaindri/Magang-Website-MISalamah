function goBack() {

    if (
        document.referrer === window.location.href ||
        document.referrer === ''
    ) {

        window.location.href = guruDashboardUrl;

    } else {

        window.history.back();

    }

}
