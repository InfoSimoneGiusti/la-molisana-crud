import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const deleteButtons = document.querySelectorAll('.form_delete_pasta button[type="submit"]');

/*
deleteButtons.forEach(button => {
    button.addEventListener('click', event => {
        event.preventDefault();

        const modal = document.getElementById('confirmModal');

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        const confirmDeleteBtn = modal.querySelector('.btn.btn-danger')

        confirmDeleteBtn.addEventListener('click', () => {
            button.parentElement.submit();
        });
    })
});
*/

/*
deleteButtons.forEach(button => {
    button.addEventListener('click', event => {
        event.preventDefault();

        const userResponse = confirm("Sei sicuro di voler eliminare l'elemento?");

        if (userResponse) {
            button.parentElement.submit();
        }

    })
});
*/
