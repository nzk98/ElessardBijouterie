<main class="blog-container">
    <h2 class="blog-title">Blog</h2>
    
    <div class="blog-content">
        <!-- Filtres -->
        <aside class="blog-filters">
            <h3>Catégories</h3>
            <div class="filter-options">
                <label class="filter-option">
                    <input type="checkbox" name="category" value="actualites">
                    Actualités
                </label>
                <label class="filter-option">
                    <input type="checkbox" name="category" value="inspirations">
                    Inspirations
                </label>
                <label class="filter-option">
                    <input type="checkbox" name="category" value="collections">
                    Collections
                </label>
            </div>

            <h3>Archives</h3>
            <div class="filter-options">
                <label class="filter-option">
                    <input type="checkbox" name="archive" value="2024">
                    2024
                </label>
                <label class="filter-option">
                    <input type="checkbox" name="archive" value="2023">
                    2023
                </label>
            </div>
        </aside>

        <!-- Articles -->
        <section class="blog-articles">
            <div class="articles-header">
                <h3 class="articles-title">Articles</h3>
                <div class="sort-options">
                    <label for="sort">Trier par :</label>
                    <select id="sort" name="sort">
                        <option value="recent">Plus récents</option>
                        <option value="popular">Plus populaires</option>
                    </select>
                </div>
            </div>

            <div class="articles-grid" id="articles-grid">
                <!-- Les articles seront chargés dynamiquement ici -->
            </div>
        </section>
    </div>
</main>

<!-- Template pour les articles -->
<template id="article-template">
    <article class="article-card">
        <div class="article-image">
            <img src="" alt="">
            <div class="article-category"></div>
        </div>
        <div class="article-content">
            <h3 class="article-title"></h3>
            <p class="article-excerpt"></p>
            <div class="article-meta">
                <span class="article-date"></span>
                <span class="article-comments"></span>
            </div>
            <a href="#" class="btn-read-more">Lire la suite</a>
        </div>
    </article>
</template>
