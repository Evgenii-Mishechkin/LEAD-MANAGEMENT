export function showAlert() {
    document.addEventListener('DOMContentLoaded', function() {
        var alertBox = document.querySelector('.alert');

        if (alertBox) {
            setTimeout(function() {
                alertBox.classList.remove('hide');
                alertBox.classList.add('show');
            }, 100);

            setTimeout(function() {
                alertBox.classList.remove('show');
                alertBox.classList.add('hide');
            }, 3000);
        }
    });
};

export function showAlertError(text) {
    document.addEventListener('DOMContentLoaded', function() {
        let alertBox = document.querySelector('.alert-error');

        if (alertBox && text) {
            alertBox.innerHTML = text;
            console.log("text: ", text);

            setTimeout(function() {
                alertBox.classList.remove('hide');
                alertBox.classList.add('show');
            }, 100);

            setTimeout(function() {
                alertBox.classList.remove('show');
                alertBox.classList.add('hide');
            }, 3000);
        }
    });
};
