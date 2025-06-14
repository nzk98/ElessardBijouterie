<!-- Section principale de la page d'accueil -->
<main>
    <!-- Carrousel -->
    <section class="carousel" aria-label="Carrousel de bijoux">
        <div id="main-carousel" class="carousel-container">
            <?php 
            $totalImages = count($carouselImages);
            if ($totalImages > 0):
                $currentImage = isset($_GET['slide']) ? (int)$_GET['slide'] : 0;
                $currentImage = max(0, min($currentImage, $totalImages - 1));
                $prevSlide = ($currentImage - 1 + $totalImages) % $totalImages;
                $nextSlide = ($currentImage + 1) % $totalImages;
            ?>
                <div class="carousel-item active">
                    <img src="<?php echo htmlspecialchars($carouselImages[$currentImage]->getUrlImage()); ?>" 
                         alt="Image de bijou" 
                         class="carousel-image">
                </div>
                <div class="carousel-navigation">
                    <a href="?page=Accueil&slide=<?php echo $prevSlide; ?>" class="carousel-control prev" aria-label="Image précédente">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <div class="carousel-indicators">
                        <?php for ($i = 0; $i < $totalImages; $i++): ?>
                            <a href="?page=Accueil&slide=<?php echo $i; ?>" 
                               class="carousel-indicator <?php echo $i === $currentImage ? 'active' : ''; ?>"
                               aria-label="Aller à l'image <?php echo $i + 1; ?>">
                            </a>
                        <?php endfor; ?>
                    </div>
                    <a href="?page=Accueil&slide=<?php echo $nextSlide; ?>" class="carousel-control next" aria-label="Image suivante">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            <?php else: ?>
                <div class="carousel-item">
                    <p class="no-images">Aucune image disponible dans le carrousel</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Articles du blog mis en avant -->
    <section class="featured-posts">
        <h2>Derniers Articles</h2>
        <div class="posts-grid">
            <!-- Les articles seront chargés dynamiquement depuis la base de données -->
        </div>
    </section>
</main>