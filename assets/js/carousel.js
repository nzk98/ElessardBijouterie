class Carousel {
    constructor(element, options = {}) {
        // Éléments du carrousel
        this.container = element;
        this.slides = [];
        
        // Options par défaut
        this.options = {
            autoplay: options.autoplay || true,
            interval: options.interval || 5000,
            transition: options.transition || 500
        };
        
        // État du carrousel
        this.currentSlide = 0;
        this.isPlaying = this.options.autoplay;
        
        // Initialisation
        this.init();
    }
    
    init() {
        // Création des contrôles
        this.createControls();
        
        // Chargement des images
        this.loadImages();
        
        // Démarrage de l'autoplay si activé
        if (this.options.autoplay) {
            this.play();
        }
        
        // Gestion des événements
        this.bindEvents();
    }
    
    createControls() {
        // Création des boutons précédent/suivant
        const prevButton = document.createElement('button');
        prevButton.className = 'carousel-control prev';
        prevButton.innerHTML = '❮';
        prevButton.setAttribute('aria-label', 'Image précédente');
        
        const nextButton = document.createElement('button');
        nextButton.className = 'carousel-control next';
        nextButton.innerHTML = '❯';
        nextButton.setAttribute('aria-label', 'Image suivante');
        
        // Création des indicateurs
        this.indicators = document.createElement('div');
        this.indicators.className = 'carousel-indicators';
        
        // Ajout des contrôles au conteneur
        this.container.appendChild(prevButton);
        this.container.appendChild(nextButton);
        this.container.appendChild(this.indicators);
    }
    
    loadImages() {
       
        const images = [
            {
                src: 'assets/images/slide1.jpg',
                alt: 'Collection de colliers en or'
            },
            {
                src: 'assets/images/slide2.jpg',
                alt: 'Bague en diamant'
            },
            {
                src: 'assets/images/slide3.jpg',
                alt: 'Bracelet de perles'
            },
            {
                src: 'assets/images/slide4.jpg',
                alt: 'Boucles d\'oreilles élégantes'
            }
        ];
        
        images.forEach((image, index) => {
            const slide = document.createElement('div');
            slide.className = 'carousel-slide';
            
            // Création d'une image pour vérifier le chargement
            const img = new Image();
            img.onload = () => {
                slide.style.backgroundImage = `url(${image.src})`;
            };
            img.onerror = () => {
                console.error(`Erreur de chargement de l'image: ${image.src}`);
            };
            img.src = image.src;
            img.alt = image.alt;
            
            if (index === 0) {
                slide.classList.add('active');
            }
            
            this.container.appendChild(slide);
            this.slides.push(slide);
            
            // Création d'un indicateur pour cette slide
            const indicator = document.createElement('button');
            indicator.className = 'carousel-indicator';
            indicator.setAttribute('aria-label', `Aller à l'image ${index + 1}`);
            if (index === 0) indicator.classList.add('active');
            this.indicators.appendChild(indicator);
        });
    }
    
    bindEvents() {
        // Gestion des clics sur les boutons
        const [prevButton, nextButton] = this.container.querySelectorAll('.carousel-control');
        
        prevButton.addEventListener('click', () => this.prev());
        nextButton.addEventListener('click', () => this.next());
        
        // Gestion des clics sur les indicateurs
        this.indicators.querySelectorAll('.carousel-indicator').forEach((indicator, index) => {
            indicator.addEventListener('click', () => this.goTo(index));
        });
        
        // Pause au survol
        this.container.addEventListener('mouseenter', () => this.pause());
        this.container.addEventListener('mouseleave', () => {
            if (this.options.autoplay) this.play();
        });
    }
    
    next() {
        this.goTo((this.currentSlide + 1) % this.slides.length);
    }
    
    prev() {
        this.goTo((this.currentSlide - 1 + this.slides.length) % this.slides.length);
    }
    
    goTo(index) {
        // Retrait de la classe active
        this.slides[this.currentSlide].classList.remove('active');
        this.indicators.children[this.currentSlide].classList.remove('active');
        
        // Mise à jour de l'index courant
        this.currentSlide = index;
        
        // Ajout de la classe active
        this.slides[this.currentSlide].classList.add('active');
        this.indicators.children[this.currentSlide].classList.add('active');
    }
    
    play() {
        this.isPlaying = true;
        this.interval = setInterval(() => this.next(), this.options.interval);
    }
    
    pause() {
        this.isPlaying = false;
        clearInterval(this.interval);
    }
}

// Initialisation du carrousel une fois le DOM chargé
document.addEventListener('DOMContentLoaded', () => {
    const carousel = new Carousel(document.getElementById('main-carousel'), {
        autoplay: true,
        interval: 5000,
        transition: 500
    });
}); 