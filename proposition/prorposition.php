<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Propositions</title>
    <link rel="stylesheet" href="propositions.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="propositions-container">
        <h1 class="page-title">Vos Propositions</h1>

        <button onclick="toggleForm()" class="show-form-button">
            <span>Faire une proposition</span>
        </button>

        <div id="overlay" class="overlay"></div>

        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Rechercher par contenu ou budget...">
            <div class="search-results-counter"></div>
        </div>

        <!-- Formulaire ajout proposition -->
        <div id="proposition-form">
            <button onclick="closeForm()" class="close-form-button">&times;</button>
            <form id="fakeCreateForm">
                <label>Contenu :</label><br>
                <textarea name="contenu" required></textarea><br>
                <label>Budget (TND) :</label><br>
                <input type="number" name="budget" required><br>
                <label>Date de début :</label><br>
                <input type="date" name="date_creation" required><br>
                <label>Date de livraison :</label><br>
                <input type="date" name="date_fin" required><br>
                <button type="submit">Soumettre</button>
            </form>
        </div>

        <hr>
        <h2>Propositions pour le projet : Site Web Vitrine</h2>

        <div class="propositions-list" id="propositionsList">
            <!-- Dynamique via JS -->
        </div>

        <div id="paginationControls" class="pagination-controls">
            <button id="prevPage" class="pagination-button">Précédent</button>
            <span id="pageNumbers" class="page-numbers"></span>
            <button id="nextPage" class="pagination-button">Suivant</button>
        </div>

        <!-- Popup édition -->
        <div id="editPopup" class="popup" style="display:none;">
            <div class="popup-content">
                <span class="close" onclick="closeEditPopup()">&times;</span>
                <h2>Modifier la Proposition</h2>
                <form id="editForm">
                    <label>Contenu :</label><br>
                    <textarea id="editContenu" name="contenu" required></textarea><br>
                    <label>Budget (TND) :</label><br>
                    <input type="number" id="editBudget" name="budget" required><br>
                    <label>Date de début :</label><br>
                    <input type="date" id="editDateCreation" name="date_creation" required><br>
                    <label>Date de livraison :</label><br>
                    <input type="date" id="editDateFin" name="date_fin" required><br>
                    <button type="submit">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>

    <script src="propositions.js"></script>
</body>
</html>
