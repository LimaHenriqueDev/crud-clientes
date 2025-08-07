
    let clientIdToDelete = null;

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('button[data-bs-target="#confirmDeleteModal"]').forEach(button => {
            button.addEventListener('click', () => {
                clientIdToDelete = button.getAttribute('data-client-id');
            });
        });

        const confirmBtn = document.getElementById('confirm-delete-button');
        if (confirmBtn) {
            confirmBtn.addEventListener('click', () => {
                if (clientIdToDelete) {
                    const form = document.getElementById(`delete-form-${clientIdToDelete}`);
                    if (form) {
                        form.submit();
                    }
                }
            });
        }
    });


