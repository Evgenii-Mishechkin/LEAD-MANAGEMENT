export function saveButtonCheck (){

    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('edit-lead-form');
        const saveButton = document.getElementById('save-button');

        if (form && saveButton) {
            const initialFormData = new FormData(form);

            form.addEventListener('input', function () {
                const currentFormData = new FormData(form);
                let formChanged = false;

                for (let [key, value] of currentFormData.entries()) {
                    if (initialFormData.get(key) !== value) {
                        formChanged = true;
                        break;
                    }
                }

                saveButton.disabled = !formChanged;
                saveButton.classList.toggle('bg-indigo-600', formChanged);
                saveButton.classList.toggle('bg-gray-400', !formChanged);
            });
        }
    });
}
