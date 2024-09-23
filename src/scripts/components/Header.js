export default class Header {
  constructor(element) {
    this.element = element; // Stocke l'élément DOM du header
    this.options = {
      threshold: 0, // Définit le seuil par défaut à 0
      autoHide: true, // Définit l'auto-masquage par défaut à vrai
    };
    this.scrollPosition = 0; // Initialise la position de défilement actuelle à 0
    this.lastScrollPosition = 0; // Initialise la dernière position de défilement à 0
    this.init(); // Initialise les fonctionnalités du header
    this.initNavMobile(); // Initialise le menu de navigation mobile
    this.html = document.documentElement; // Stocke la balise HTML du document
  }
  init() {
    this.setOptions(); // Configure les options du header

    window.addEventListener('scroll', this.onScroll.bind(this)); // Ajoute un écouteur d'événements de défilement à la fenêtre
  }

  setOptions() {
    if ('threshold' in this.element.dataset) { // Vérifie si l'attribut data-threshold est présent dans l'élément
      this.options.threshold = +this.element.dataset.threshold / 100; // Définit le seuil en fonction de l'attribut data-threshold
    }

    if ('autoHide' in this.element.dataset) { // Vérifie si l'attribut data-autoHide est présent dans l'élément
      this.options.autoHide = this.element.dataset.autoHide === 'true'; // Définit l'auto-masquage en fonction de l'attribut data-autoHide
    }
  }

  onScroll() {
    this.lastScrollPosition = this.scrollPosition; // Stocke la dernière position de défilement
    this.scrollPosition = document.scrollingElement.scrollTop; // Met à jour la position de défilement actuelle

    if (this.options.autoHide) { // Vérifie si l'auto-masquage est activé
      this.setHeaderState(); // Gère l'état du header en fonction de la position de défilement
    }

    this.setDirections(); // Met à jour la direction du défilement
  }

  setHeaderState() {
    if (
      this.scrollPosition >
      document.scrollingElement.scrollHeight * this.options.threshold
    ) {
      this.html.classList.add('header-is-hidden'); // Cache le header lorsque la position de défilement dépasse le seuil
    } else {
      this.html.classList.remove('header-is-hidden'); // Affiche le header si la position de défilement est inférieure au seuil
    }
  }

  setDirections() {
    if (this.scrollPosition >= this.lastScrollPosition) {
      this.html.classList.add('is-scrolling-down'); // Ajoute une classe pour indiquer le défilement vers le bas
      this.html.classList.remove('is-scrolling-up'); // Supprime une classe pour indiquer le défilement vers le haut
    } else {
      this.html.classList.add('is-scrolling-up'); // Ajoute une classe pour indiquer le défilement vers le haut
      this.html.classList.remove('is-scrolling-down'); // Supprime une classe pour indiquer le défilement vers le bas
    }
  }

  initNavMobile() {
    const toggle = this.element.querySelector('.js-toggle'); // Sélectionne le bouton de bascule du menu mobile
    toggle.addEventListener('click', this.onToggleNav.bind(this)); // Ajoute un écouteur d'événements pour basculer l'état du menu mobile
  }

  onToggleNav() {
    this.html.classList.toggle('nav-is-active'); // Active/désactive la classe pour afficher ou masquer le menu mobile
  }
}
