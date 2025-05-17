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
    <div class="posts-list">
        <div class="post-card">
            <img src="storage/image1.jpg" alt="Image du post" class="post-image">
            <div class="post-details">
                <h2 class="post-title">Titre Exemple</h2>
                <p class="post-content">Contenu du post</p>
                <p class="post-created-at">Créé à 14:32:10</p>

                <form class="delete-post-form">
                    <button type="submit" class="delete-button">Supprimer</button>
                </form>
            </div>
        </div>
        <!-- Répétez .post-card pour tester -->
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
</body>
</html>
