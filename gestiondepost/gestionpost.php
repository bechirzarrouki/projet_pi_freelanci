<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Posts de Freelances</title>
    <link rel="stylesheet" href="gestionpost.css">
</head>
<body>
<div class="posts-container">
    <h1 class="page-title">Posts de Freelances</h1>

    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Rechercher par titre...">
        <div class="search-active-badge">!</div>
        <div class="search-results-counter"></div>
    </div>

    <!-- Zone d'erreurs -->
    <div class="error-messages" style="display: none;">
        <ul>
            <li>Erreur exemple</li>
        </ul>
    </div>

    <div class="error-message" style="display: none;">Message d'erreur de session</div>

    <!-- Liste des posts -->
    <div class="posts-list" id="postsContainer">
        <!-- Les posts seront chargés dynamiquement par JS -->
    </div>

    <div id="pagination"></div>

    <!-- Modal d'ajout -->
    <div id="addPostModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span id="closeModal" class="close-button">&times;</span>
            <form enctype="multipart/form-data">
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" id="titre" required>
                </div>
                <div class="form-group">
                    <label for="contenu">Contenu</label>
                    <textarea name="contenu" id="contenu" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" required>
                </div>
                <div class="form-group">
                    <label for="author_id">Auteur</label>
                    <select name="author_id" id="author_id" required></select>
                </div>
                <button type="submit" class="create-button">Créer un Post</button>
            </form>
        </div>
    </div>

    <!-- Modal de confirmation -->
    <div id="confirmDeleteModal" class="modal" style="display: none;">
        <div class="modal-content">
            <p>Êtes-vous sûr de vouloir supprimer ce post ?</p>
            <button id="confirmDeleteBtn" class="confirm-button">Oui</button>
            <button id="cancelDeleteBtn" class="cancel-button">Annuler</button>
        </div>
    </div>
</div>

<script src="gestionpost.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const postsContainer = document.getElementById('postsContainer');
    // Load posts via AJAX
    fetch('post_crud.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'action=read'
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            postsContainer.innerHTML = '';
            data.posts.forEach(function(post) {
                const card = document.createElement('div');
                card.className = 'post-card';
                card.innerHTML = `
                    <img src="../${post.image}" alt="Image du post" class="post-image" style="max-width:200px;max-height:120px;object-fit:cover;">
                    <div class="post-details">
                        <h2 class="post-title">${post.titre}</h2>
                        <p class="post-content">${post.contenu}</p>
                        <p class="post-created-at">Créé à ${post.created_at}</p>
                        <button class="delete-button">Supprimer</button>
                    </div>
                `;
                card.querySelector('.delete-button').onclick = function() {
                    if (confirm('Supprimer ce post ?')) {
                        fetch('post_crud.php', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                            body: 'action=delete&id=' + encodeURIComponent(post.id)
                        })
                        .then(function(r) { return r.json(); })
                        .then(function(data) {
                            if (data.success) location.reload();
                            else alert('Erreur suppression');
                        });
                    }
                };
                postsContainer.appendChild(card);
            });
        }
    });
});
</script>
</body>
</html>
