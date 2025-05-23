<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Posts</title>
    <link rel="stylesheet" href="post.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="container mt-4">
    <h2>Créer un nouveau post</h2>

    <form id="postForm">
        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" id="titre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="contenu" class="form-label">Contenu</label>
            <textarea id="contenu" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" id="image" class="form-control">
        </div>

        <button type="button" class="btn btn-primary">Publier</button>
    </form>

    <div class="mt-4">
        <input type="text" id="searchInput" class="form-control" placeholder="Rechercher par titre...">
        <div id="searchResultsCount" class="small text-muted mt-1"></div>
    </div>

    <div class="mt-5">
        <h4>Liste des Posts</h4>
        <div class="row" id="postsContainer">
            <!-- Exemple de post statique -->
            <div class="col-md-4 mb-4 post-card" data-title="exemple de post">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Image du post">
                    <div class="card-body">
                        <h5 class="card-title">Exemple de Post</h5>
                        <p class="card-text">Ceci est un contenu fictif pour démonstration.</p>
                    </div>
                    <div class="card-footer-modern d-flex justify-content-between align-items-center">
                        <div class="date-badge">
                            <span class="date-icon"><i class="far fa-calendar-alt"></i></span>
                            <span class="date-text">09/05/2025</span>
                        </div>
                        <div class="action-buttons">
                            <button class="btn-action btn-edit" title="Modifier cet article">
                                <i class="fas fa-pen"></i>
                                <span>Modifier</span>
                            </button>
                            <button type="button" class="btn-action btn-delete" title="Supprimer cet article">
                                <i class="fas fa-trash"></i>
                                <span>Supprimer</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
<!-- Modal Modifier -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Modifier le post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <form id="editPostForm">
          <div class="mb-3">
            <label for="editTitle" class="form-label">Titre</label>
            <input type="text" id="editTitle" class="form-control">
          </div>
          <div class="mb-3">
            <label for="editContent" class="form-label">Contenu</label>
            <textarea id="editContent" class="form-control" rows="4"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Supprimer -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmer la suppression</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <p>Voulez-vous vraiment supprimer ce post ?</p>
        <div class="d-flex justify-content-end">
          <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Supprimer</button>
        </div>
      </div>
    </div>
  </div>
</div>

    <div id="pagination" class="mt-4 d-flex justify-content-center">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item disabled" id="prevPage">
                    <a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
                </li>
                <li class="page-item active"><a class="page-link" href="#" data-page="1">1</a></li>
                <li class="page-item" id="nextPage">
                    <a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="posts.js"></script>
</body>

</html>
