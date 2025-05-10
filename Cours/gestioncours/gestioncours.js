document.addEventListener('DOMContentLoaded', function () {
    const addCourseButton = document.getElementById('addCourseButton');
    const addCourseModal = document.getElementById('addCourseModal');
    const closeModal = document.getElementById('closeModal');

    addCourseButton.addEventListener('click', () => {
        addCourseModal.style.display = 'block';
        setTimeout(() => document.body.style.overflow = 'hidden', 10);
    });

    closeModal.addEventListener('click', () => closeModalFunction(addCourseModal));

    const editButtons = document.querySelectorAll('.edit-button');
    const editCourseModal = document.getElementById('editCourseModal');
    const closeEditModal = document.getElementById('closeEditModal');
    const editForm = document.getElementById('editCourseForm');
    const existingFiles = document.getElementById('existingFiles');

    editButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            document.getElementById('editTitre').value = this.dataset.courseTitle;
            document.getElementById('editDescription').value = this.dataset.courseDescription;
            document.getElementById('editContenu').value = this.dataset.courseContent;
            document.getElementById('editStatus').value = this.dataset.courseStatus;
            existingFiles.innerHTML = ''; // Aucun fichier dynamique ici
            editCourseModal.style.display = 'block';
            setTimeout(() => document.body.style.overflow = 'hidden', 10);
        });
    });

    closeEditModal.addEventListener('click', () => closeModalFunction(editCourseModal));

    function closeModalFunction(modal) {
        modal.style.opacity = '0';
        document.body.style.overflow = '';
        setTimeout(() => {
            modal.style.display = 'none';
            modal.style.opacity = '';
        }, 300);
    }

    window.addEventListener('click', function (event) {
        if (event.target === addCourseModal) closeModalFunction(addCourseModal);
        if (event.target === editCourseModal) closeModalFunction(editCourseModal);
    });

    document.querySelectorAll('.modal-content').forEach(content => {
        content.addEventListener('click', event => event.stopPropagation());
    });

    const successMessage = document.querySelector('.success-message');
    if (successMessage) {
        setTimeout(() => {
            successMessage.style.opacity = '0';
            setTimeout(() => successMessage.style.display = 'none', 500);
        }, 5000);
    }
});
