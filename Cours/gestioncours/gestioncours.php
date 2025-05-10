<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Cours</title>
    <link rel="stylesheet" href="gestioncours.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="courses-container">
        <h1 class="page-title">Gestion des Cours</h1>
        <button id="addCourseButton" class="add-course-button">Ajouter un cours</button>

        <div class="courses-list">
            <div class="course-card-container">
                <a href="#" class="course-card-link">
                    <div class="course-card">
                        <h2 class="course-title">Titre du cours exemple</h2>
                        <p class="course-description">Description du cours exemple</p>
                        <p class="course-date">Date de publication : 09/05/2025</p>
                        <div class="course-actions">
                            <a href="#" class="edit-button"
                               data-course-id="1"
                               data-course-title="Titre du cours exemple"
                               data-course-description="Description du cours exemple"
                               data-course-content="Contenu du cours"
                               data-course-status="active">
                                Modifier
                            </a>
                            <button class="delete-button">Supprimer</button>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Modal d'ajout -->
        <div id="addCourseModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span id="closeModal" class="close-button">&times;</span>
                <h2 class="modal-title">Ajouter un nouveau cours</h2>
                <form class="add-course-form">
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" id="titre" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="contenu">Contenu</label>
                        <textarea id="contenu" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Statut</label>
                        <select id="status" required>
                            <option value="active">Actif</option>
                            <option value="inactive">Inactif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="files">Fichiers</label>
                        <input type="file" id="files" multiple>
                    </div>
                    <button type="submit" class="create-button">Ajouter le cours</button>
                </form>
            </div>
        </div>

        <!-- Modal d'édition -->
        <div id="editCourseModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span id="closeEditModal" class="close-button">&times;</span>
                <h2 class="modal-title">Modifier le cours</h2>
                <form id="editCourseForm">
                    <div class="form-group">
                        <label for="editTitre">Titre</label>
                        <input type="text" id="editTitre" required>
                    </div>
                    <div class="form-group">
                        <label for="editDescription">Description</label>
                        <textarea id="editDescription" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editContenu">Contenu</label>
                        <textarea id="editContenu" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editStatus">Statut</label>
                        <select id="editStatus" required>
                            <option value="active">Actif</option>
                            <option value="inactive">Inactif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editFiles">Fichiers</label>
                        <input type="file" id="editFiles" multiple>
                        <div id="existingFiles" class="existing-files"></div>
                    </div>
                    <button type="submit" class="create-button">Enregistrer les modifications</button>
                </form>
            </div>
        </div>
    </div>

    <script src="gestioncours.js"></script>
</body>
</html>
