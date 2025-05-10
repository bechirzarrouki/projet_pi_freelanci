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

    <div class="posts-list">
        <!-- Ces éléments devraient être injectés dynamiquement ou remplis statiquement à la main -->
        <div class="post-card">
            <img src="storage/image1.jpg" alt="Image du post" class="post-image">
            <div class="post-details">
                <h2 class="post-title">Titre exemple</h2>
                <p class="post-content">Contenu du post exemple.</p>
                <p class="post-created-at">Créé à 12:00:00</p>
            </div>
        </div>
        <!-- Répéter le bloc ci-dessus pour chaque post -->
    </div>

    <div id="pagination"></div>
</div>

<!-- JS -->
<script src="posts.js"></script>
</body>
</html>
