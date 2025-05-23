document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const postsContainer = document.getElementById('postsContainer');
    const postCards = Array.from(document.querySelectorAll('.post-card'));
    const paginationContainer = document.getElementById('pagination');
    const prevPageBtn = document.getElementById('prevPage');
    const nextPageBtn = document.getElementById('nextPage');
    const searchResultsCount = document.getElementById('searchResultsCount');

    const itemsPerPage = 3;
    let currentPage = 1;
    let filteredPosts = postCards;
    let currentPost = null;

    // Vérification que Bootstrap est chargé
    if (typeof bootstrap === 'undefined') {
        console.error('Bootstrap JS n’est pas chargé. Vérifiez l’ordre des scripts dans HTML.');
        return;
    }

    const editModal = new bootstrap.Modal(document.getElementById('editModal'));
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));

    function displayPosts() {
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;

        postCards.forEach(post => post.style.display = 'none');
        filteredPosts.slice(startIndex, endIndex).forEach(post => {
            post.style.display = 'block';
        });

        searchResultsCount.textContent = `${filteredPosts.length} résultat(s) trouvé(s)`;
        updatePagination();
    }

    function updatePagination() {
        const totalPages = Math.ceil(filteredPosts.length / itemsPerPage);
        const paginationList = paginationContainer.querySelector('.pagination');

        while (paginationList.children.length > 2) {
            paginationList.removeChild(paginationList.children[1]);
        }

        for (let i = 1; i <= totalPages; i++) {
            const pageItem = document.createElement('li');
            pageItem.className = `page-item ${i === currentPage ? 'active' : ''}`;

            const pageLink = document.createElement('a');
            pageLink.className = 'page-link';
            pageLink.href = '#';
            pageLink.textContent = i;
            pageLink.dataset.page = i;

            pageLink.addEventListener('click', function (e) {
                e.preventDefault();
                currentPage = parseInt(this.dataset.page);
                displayPosts();
            });

            pageItem.appendChild(pageLink);
            paginationList.insertBefore(pageItem, nextPageBtn);
        }

        prevPageBtn.classList.toggle('disabled', currentPage === 1);
        nextPageBtn.classList.toggle('disabled', currentPage === totalPages || totalPages === 0);
    }

    prevPageBtn.addEventListener('click', function (e) {
        e.preventDefault();
        if (currentPage > 1) {
            currentPage--;
            displayPosts();
        }
    });

    nextPageBtn.addEventListener('click', function (e) {
        e.preventDefault();
        const totalPages = Math.ceil(filteredPosts.length / itemsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            displayPosts();
        }
    });

    searchInput.addEventListener('input', function () {
        const searchTerm = this.value.toLowerCase().trim();
        filteredPosts = postCards.filter(post => post.dataset.title.includes(searchTerm));
        currentPage = 1;
        displayPosts();
    });

    // Gestion bouton Modifier
    document.addEventListener('click', function (e) {
        if (e.target.closest('.btn-edit')) {
            currentPost = e.target.closest('.post-card');
            const title = currentPost.querySelector('.card-title').textContent;
            const content = currentPost.querySelector('.card-text').textContent;

            document.getElementById('editTitle').value = title;
            document.getElementById('editContent').value = content;

            editModal.show();
        }
    });

    // Enregistrement après modification
    document.getElementById('editPostForm').addEventListener('submit', function (e) {
        e.preventDefault();
        if (currentPost) {
            const newTitle = document.getElementById('editTitle').value.trim();
            const newContent = document.getElementById('editContent').value.trim();

            currentPost.querySelector('.card-title').textContent = newTitle;
            currentPost.querySelector('.card-text').textContent = newContent;
            currentPost.dataset.title = newTitle.toLowerCase();

            editModal.hide();
            displayPosts();
        }
    });

    // Gestion bouton Supprimer
    document.addEventListener('click', function (e) {
        if (e.target.closest('.btn-delete')) {
            currentPost = e.target.closest('.post-card');
            deleteModal.show();
        }
    });

    // Confirmation suppression
    document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
        if (currentPost) {
            currentPost.remove();
            const index = postCards.indexOf(currentPost);
            if (index !== -1) {
                postCards.splice(index, 1);
                filteredPosts = postCards;
            }
            deleteModal.hide();
            displayPosts();
        }
    });

    displayPosts();
});
