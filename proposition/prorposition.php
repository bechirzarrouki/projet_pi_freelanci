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
        <div id="proposition-form" style="display: none;">
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

        <!-- Liste des propositions -->
        <div class="propositions-list" id="propositionsList">
            <!-- Proposition 1 -->
            <div class="proposition-card"
                data-id="1"
                data-contenu="Créer un site vitrine"
                data-budget="500"
                data-date_creation="2025-05-20"
                data-date_fin="2025-06-01">
                <div class="proposition-contenu">Créer un site vitrine</div>
                <div class="proposition-budget">500 TND</div>
                <button onclick="handleEditClick(this)">Modifier</button>
            </div>

            <!-- Proposition 2 -->
            <div class="proposition-card"
                data-id="2"
                data-contenu="Développement d'une application mobile"
                data-budget="1200"
                data-date_creation="2025-05-18"
                data-date_fin="2025-06-10">
                <div class="proposition-contenu">Développement d'une application mobile</div>
                <div class="proposition-budget">1200 TND</div>
                <button onclick="handleEditClick(this)">Modifier</button>
            </div>

            <!-- Proposition 3 -->
            <div class="proposition-card"
                data-id="3"
                data-contenu="Refonte d’un site e-commerce"
                data-budget="800"
                data-date_creation="2025-05-19"
                data-date_fin="2025-06-07">
                <div class="proposition-contenu">Refonte d’un site e-commerce</div>
                <div class="proposition-budget">800 TND</div>
                <button onclick="handleEditClick(this)">Modifier</button>
            </div>
        </div>

        <!-- Pagination -->
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
                <form id="editForm" method="POST">
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

    <!-- JS inclus -->
    <script src="propositions.js"></script>

    <!-- Fonctions utilitaires pour formulaire -->
    <script>
        function toggleForm() {
            document.getElementById("proposition-form").style.display = "block";
        }

        function closeForm() {
            document.getElementById("proposition-form").style.display = "none";
        }
    </script>
</body>
</html>
