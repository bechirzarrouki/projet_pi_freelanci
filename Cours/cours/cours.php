<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Cours</title>
    <link rel="stylesheet" href="cours.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="courses-container">
        <h1 class="page-title">Gestion des Cours</h1>
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Rechercher par titre ou description...">
            <div class="search-active-badge">!</div>
            <div class="search-results-counter"></div>
        </div>

        <div class="courses-list">
            <div class="course-card-container">
                <div class="course-card">
                    <h2 class="course-title">Cours HTML</h2>
                    <p class="course-description">Introduction aux bases de HTML pour débutants.</p>
                    <p class="course-date">Date de publication : 01/01/2024</p>
                </div>
            </div>
            <div class="course-card-container">
                <div class="course-card">
                    <h2 class="course-title">Cours CSS</h2>
                    <p class="course-description">Apprenez à styliser vos pages web avec CSS.</p>
                    <p class="course-date">Date de publication : 10/02/2024</p>
                </div>
            </div>
            <div class="course-card-container">
                <div class="course-card">
                    <h2 class="course-title">Cours JavaScript</h2>
                    <p class="course-description">Dynamisez vos sites web avec JavaScript.</p>
                    <p class="course-date">Date de publication : 15/03/2024</p>
                </div>
            </div>
           
        </div>

        <div id="pagination" class="pagination-controls"></div>
    </div>

    <script src="cours.js"></script>
</body>
</html>
