<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Projet</title>
    <link rel="stylesheet" href="projet.css">
</head>
<body>
    <div class="posts-container">
        <h1 class="page-title">Projet</h1>

        <div class="post-form">
            <h2>Créer un nouveau Projet</h2>
            <form id="createProjectForm">
                <input type="text" name="name" placeholder="Nom du projet" required><br>
                <textarea name="description" placeholder="Description du projet" required></textarea><br>
                <input type="date" name="start_date" required><br>
                <input type="date" name="end_date"><br>
                <select name="status" required>
                    <option value="planned">Planned</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                </select><br>
                <button type="submit">Créer le Projet</button>
            </form>
        </div>

        <!-- Liste des projets -->
        <div id="projects-container">
            <div class="post-card" onclick="goToPropositions(1)" style="cursor:pointer;">
                <div class="post-card-link">
                    <div class="post-details">
                        <h2 class="post-title">Projet A</h2>
                        <p class="post-content">Description du projet A</p>
                        <p class="post-date">Début: 01/01/2024</p>
                        <p class="post-date">Fin: 01/06/2024</p>
                        <p class="post-status">Statut: Planifié</p>
                    </div>
                </div>
                <div class="button-group">
                    <button onclick='openEditPopup({
                        "id": 1,
                        "name": "Projet A",
                        "description": "Description du projet A",
                        "start_date": "2024-01-01",
                        "end_date": "2024-06-01",
                        "status": "planned"
                    }); event.stopPropagation();' class="edit-button">Modifier</button>

                    <button onclick="deleteProject(1); event.stopPropagation();" class="delete-button">Supprimer</button>
                </div>
            </div>
            <!-- Tu peux ajouter d'autres projets ici statiquement ou via JS -->
        </div>

        <!-- Conteneur de pagination -->
        <div id="pagination-container" class="pagination"></div>
    </div>

    <!-- Popup édition -->
    <div id="editPopup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closeEditPopup()">&times;</span>
            <h2>Modifier le Projet</h2>
            <form id="editForm">
                <div class="form-group">
                    <input type="text" id="editName" placeholder="Nom du projet" required>
                </div>
                <div class="form-group">
                    <textarea id="editDescription" placeholder="Description du projet" required></textarea>
                </div>
                <div class="form-group">
                    <label for="editStartDate">Date de début</label>
                    <input type="date" id="editStartDate" required>
                </div>
                <div class="form-group">
                    <label for="editEndDate">Date de fin (optionnelle)</label>
                    <input type="date" id="editEndDate">
                </div>
                <div class="form-group">
                    <label for="editStatus">Statut</label>
                    <select id="editStatus" required>
                        <option value="planned">Planifié</option>
                        <option value="ongoing">En cours</option>
                        <option value="completed">Terminé</option>
                    </select>
                </div>
                <button type="submit">Enregistrer les modifications</button>
            </form>
        </div>
    </div>

    <script src="projet.js"></script>
</body>
</html>
