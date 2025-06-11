<main class="products-container">
    <h2 class="products-main-title">Boutique</h2>
    
    <!-- Filtres -->
    <aside class="filters-sidebar">
        <h2>Filtres</h2>
        <div class="filter-section">
            <h3>Collections</h3>
            <div class="filter-options">
                <label class="filter-option">
                    <input type="checkbox" name="collection" value="cranes">
                    Crânes
                </label>
                <label class="filter-option">
                    <input type="checkbox" name="collection" value="cristaux">
                    Cristaux
                </label>
                <label class="filter-option">
                    <input type="checkbox" name="collection" value="pierre-volcanique">
                    Pierres volcaniques
                </label>
            </div>
        </div>
        
        <div class="filter-section">
            <h3>Type de bijoux</h3>
            <div class="filter-options">
                <label class="filter-option">
                    <input type="checkbox" name="material" value="argent">
                    Bracelet
                </label>
                <label class="filter-option">
                    <input type="checkbox" name="material" value="bronze">
                    pendentif
                </label>
            </div>
        </div>
    </aside>

    <!-- Liste des produits -->
    <section class="products-grid">
        <div class="products-header">
            <h2>Nos Créations</h2>
            <div class="sort-options">
                <label for="sort">Trier par :</label>
                <select id="sort" name="sort">
                    <option value="newest">Plus récents</option>
                    <option value="price-asc">Prix croissant</option>
                    <option value="price-desc">Prix décroissant</option>
                </select>
            </div>
        </div>

        <div class="products-list" id="products-list">
            <?php foreach ($creations as $creation): ?>
                <article class="product-card">
                    <div class="product-image">
                        <img src="<?php echo !empty($creation->getImages()) ? $creation->getImages()[0] : 'assets/images/default-product.jpg'; ?>" 
                             alt="<?php echo htmlspecialchars($creation->getNom()); ?>">
                        <div class="product-overlay">
                            <button class="btn-view" onclick="window.location.href='index.php?page=Produits&id=<?php echo $creation->getId(); ?>'">
                                Voir détails
                            </button>
                            <form method="POST" action="index.php?page=Panier" style="display:inline;">
                                <input type="hidden" name="add_to_cart" value="1">
                                <input type="hidden" name="id" value="<?php echo $creation->getId(); ?>">
                                <input type="hidden" name="nom" value="<?php echo htmlspecialchars($creation->getNom()); ?>">
                                <input type="hidden" name="prix" value="<?php echo $creation->getPrix(); ?>">
                                <input type="hidden" name="image" value="<?php echo !empty($creation->getImages()) ? $creation->getImages()[0] : 'assets/images/default-product.jpg'; ?>">
                                <input type="hidden" name="quantite" value="1">
                                <button type="submit" class="btn-add-cart">Ajouter au panier</button>
                            </form>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title"><?php echo htmlspecialchars($creation->getNom()); ?></h3>
                        <p class="product-price"><?php echo number_format($creation->getPrix(), 2); ?> €</p>
                        <p class="product-status">
                            <?php echo $creation->getStock() > 0 ? 'En stock' : 'Rupture de stock'; ?>
                        </p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>

