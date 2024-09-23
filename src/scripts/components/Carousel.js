import Swiper from 'swiper/bundle';

// Classe Carousel pour créer des carrousels Swiper
export default class Carousel {
  constructor(element) {
    this.element = element;
    // Options par défaut du carrousel
    this.options = {
      slidesPerView: 1,
      spaceBetween: 20,
      pagination: {
        el: this.element.querySelector('.swiper-pagination'),
        clickable: true,
      },
      navigation: {
        nextEl: this.element.querySelector('.swiper-button-next'),
        prevEl: this.element.querySelector('.swiper-button-prev'),
      },
    };
    this.init(); // Initialise le carrousel
  }

  // Initialise le carrousel avec les options configurées
  init() {
    this.setOptions(); // Configure les options en fonction des attributs data
    new Swiper(this.element, this.options); // Crée une instance Swiper avec les options
  }

  // Configure les options du carrousel en fonction des attributs data de l'élément HTML
  setOptions() {
    // Configure le nombre de slides affichées en fonction de la largeur de l'écran
    if ('split' in this.element.dataset) {
      this.options.breakpoints = { 
        768: { slidesPerView: 3 },
        400: { slidesPerView: 2 } 
      };
    }
    // Active le mode autoplay avec une pause de 3 secondes entre chaque slide
    if ('autoplay' in this.element.dataset) {
      this.options.autoplay = {
        delay: 3000,
        pauseOnMouseEnter: true, 
        disableOnInteraction: true,
      };
    }
    // Active la lecture en boucle des slides
    if ('loop' in this.element.dataset) {
      this.options.loop = true;
    }
    // Configure l'espacement entre les slides
    if ('space' in this.element.dataset) {
      this.options.spaceBetween = 0;
    }
    // Configure le nombre de slides à afficher par vue
    if ('slides' in this.element.dataset) {
      const slidesValue = this.element.dataset.slides;
      // Si la valeur est 'auto', configure le mode 'auto' de Swiper
      const slidesPerView = slidesValue === 'auto' ? 'auto' : parseFloat(slidesValue);
      // Met à jour le nombre de slides par vue avec la valeur de l'attribut data-slides
      this.options.slidesPerView = slidesPerView || this.options.slidesPerView;
    }
  }
}