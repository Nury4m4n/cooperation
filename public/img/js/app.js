document.addEventListener('DOMContentLoaded', (event) => {
    var errorModal = new bootstrap.Modal(document.getElementById('errorModal'), {
        backdrop: 'static',
        keyboard: false
    });
    errorModal.show();
});

document.addEventListener('DOMContentLoaded', (event) => {
    var errorModal = new bootstrap.Modal(document.getElementById('success'), {
        backdrop: 'static',
        keyboard: false
    });
    errorModal.show();
});
