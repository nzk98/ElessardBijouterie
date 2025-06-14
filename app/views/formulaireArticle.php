<div class="admin-main">
    <div class="admin-header">
        <div class="header-left">
            <h1>Ajouter un article de blog</h1>
        </div>
        <!-- Tu peux ajouter des éléments ici si besoin -->
    </div>

    <div class="admin-form-box">
        <h1>Créer un nouvel article de blog</h1>

        <form action="/admin/create-article" method="POST" class="admin-form" enctype="multipart/form-data">
            <!-- Informations de base -->
            <div class="form-section">
                <h2>Titre de l'article</h2>
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" class="form-control" id="titre" name="titre" required>
                </div>
            </div>

            <div class="form-section">
                <h2>Contenu</h2>
                <div class="form-group">
                    <label for="contenu">Contenu</label>
                    <textarea class="form-control" id="contenu" name="contenu" rows="10" style="width:100%" required></textarea>
                </div>
            </div>

            <div class="form-section">
                <h2>Catégorie</h2>
                <div class="form-group">
                    <label for="categorie">Catégorie</label>
                    <select class="form-select" id="categorie" name="categorie" required>
                        <option value="">Sélectionnez une catégorie</option>
                        <option value="inspiration">Inspiration</option>
                        <option value="actualite">Actualité</option>
                        <option value="collections">Collections</option>
                    </select>
                </div>
            </div>

            <!-- Image -->
            <div class="form-section">
                <h2>Image de l'article</h2>
                <div class="form-group">
                    <label for="image">Image principale (optionnelle)</label>
                    <input type="file" id="image" name="image" accept="image/*">
                    <small>Formats acceptés : JPG, PNG, GIF. Taille maximale : 5MB</small>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="admin-submit">
                    <i class="fas fa-save"></i> Publier l'article
                </button>
                <button type="reset" class="admin-reset">
                    <i class="fas fa-undo"></i> Réinitialiser
                </button>
            </div>
        </form>
    </div>
</div>
