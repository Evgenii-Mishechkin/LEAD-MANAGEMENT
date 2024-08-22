export function easeValidatePhone() {
    document.addEventListener('DOMContentLoaded', function () {
        const phoneInputs = document.querySelectorAll('input[type="tel"], input[name="phone"]');

        phoneInputs.forEach(phoneInput => {
            const form = phoneInput.closest('form');

            form.addEventListener('submit', function (event) {
                const phoneValue = phoneInput.value;
                const phoneRegex = /^\+?[0-9\s\-\(\)]+$/;

                if (!phoneRegex.test(phoneValue) || phoneValue.length < 10 || phoneValue.length > 20) {
                    event.preventDefault();
                    let alertBox = document.querySelector('.alert-error');

                    if (alertBox) {
                        alertBox.innerHTML = 'Введите корректный номер телефона';
                        setTimeout(function() {
                            alertBox.classList.remove('hide');
                            alertBox.classList.add('show');
                        }, 100);

                        setTimeout(function() {
                            alertBox.classList.remove('show');
                            alertBox.classList.add('hide');
                        }, 3000);
                    }
                    phoneInput.focus();
                }
            });
        });
    });
}
