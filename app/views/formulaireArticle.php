<div class="admin-main">
    <div class="admin-header">
        <div class="header-left">
            <h1>Création d'Article</h1>
        </div>
        <!-- Tu peux ajouter des éléments ici si besoin -->
    </div>

    <div class="admin-form-box">
        <h1>Créer un nouvel article de blog</h1>

        <form action="/admin/create-article" method="POST" class="admin-form" enctype="multipart/form-data">
            <!-- Informations de base -->
            <div class="form-section">
                <h2>Informations principales</h2>
                <div class="form-group">
                    <label for="titre">Titre de l'article</label>
                    <input type="text" id="titre" name="titre" required>
                </div>

                <div class="form-group">
                    <label for="contenu">Contenu de l'article</label>
                    <textarea id="contenu" name="contenu" rows="10" required></textarea>
                </div>
            </div>

            <!-- Image -->
            <div class="form-section">
                <h2>Image de l'article</h2>
                <div class="form-group">
                    <label for="image">Image principale</label>
                    <input type="file" id="image" name="image" accept="image/*">
                    <small>Optionnel : ajoute une image pour illustrer l'article.</small>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="admin-submit">
                    <i class="fas fa-save"></i> Créer l'article
                </button>
                <button type="reset" class="admin-reset">
                    <i class="fas fa-undo"></i> Réinitialiser
                </button>
            </div>
        </form>
    </div>
</div>
