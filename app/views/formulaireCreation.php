<!-- Contenu principal -->
<div class="admin-container">
    

    <!-- Main Content -->
    <div class="admin-main">
        <div class="admin-header">
            <div class="header-left">
                <h1>Création d'un nouveau produit</h1>
            </div>
        </div>

        <div class="admin-form-box">
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                </div>
            <?php endif; ?>

            <form action="index.php?page=AdminFormCreation" method="POST" enctype="multipart/form-data" class="admin-form">
                <div class="form-section">
                    <h2>Informations générales</h2>
                    <div class="form-group">
                        <label for="nom">Nom du produit</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="8"  required></textarea>
                    </div>
                </div>

                <div class="form-section">
                    <h2>Détails du produit</h2>
                    <div class="form-group">
                        <label for="prix">Prix</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="prix" name="prix" step="0.01" required>
                            <span class="input-group-text">€</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" min="0" value="0">
                    </div>

                    <div class="form-group">
                        <label for="categorie">Catégorie</label>
                        <select class="form-select" id="categorie" name="categorie" required>
                            <option value="">Sélectionnez une catégorie</option>
                            <option value="1">Colliers</option>
                            <option value="2">Bracelets</option>
                            <option value="3">Bagues</option>
                            <option value="4">Boucles d'oreilles</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="matiere">Matière</label>
                        <select class="form-select" id="matiere" name="matiere">
                            <option value="1">Or</option>
                            <option value="2">Argent</option>
                            <option value="3">Platine</option>
                        </select>
                    </div>
                </div>

                <div class="form-section">
                    <h2>Image du produit</h2>
                    <div class="form-group">
                        <label for="image">Images (JPG, PNG, GIF, max 5Mo chacune) :</label>
                        <input type="file" name="image[]" id="image" accept="image/jpeg, image/png, image/gif" multiple>
                        <small>Formats acceptés : JPG, PNG, GIF. Taille maximale : 5MB</small>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="admin-submit">
                        <i class="fas fa-save"></i> Créer le produit
                    </button>
                    <a href="index.php?page=AdminFormCreation" class="admin-reset">
                        <i class="fas fa-times"></i> Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

