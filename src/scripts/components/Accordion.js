export default class Accordion {
  constructor(element) {
    this.element = element;
    this.options = {
      open: false, // Initialise l'option open à false par défaut
    };
    this.init(); // Initialise l'accordion lors de la création de l'instance
  }

  init() {
    const headers = this.element.querySelectorAll(
      '.js-header .accordion__header'
    ); // Sélectionne tous les éléments d'en-tête de l'accordéon
    for (let i = 0; i < headers.length; i++) {
      const header = headers[i];
      header.addEventListener('click', this.onHeaderClick.bind(this)); // Ajoute un écouteur d'événements "click" à chaque en-tête
    }

    this.setOptions();  // Configure les options de l'accordéon
  }

  onHeaderClick(event) {
    const header = event.currentTarget; // Sélectionne l'en-tête qui a déclenché l'événement
    const container = header.closest('.accordion__container'); // Sélectionne le conteneur parent de l'en-tête cliqué


    // Supprime la classe is-active de tous les conteneurs
    const allContainers = this.element.querySelectorAll('.js-header');
    for (let i = 0; i < allContainers.length; i++) {
      const container = allContainers[i];
      if (this.options.open == false) {
        container.classList.remove('is-active');
      }
    }
    // Ajoute la classe is-active uniquement au conteneur correspondant à l'en-tête cliqué
    container.classList.toggle('is-active');
  }

  setOptions() {
    //data-not-closing // Vérifie si l'attribut data-not-closing est présent dans l'élément
    if ('notClosing' in this.element.dataset) {
      this.options.open = true; // Définit l'option open à true si l'attribut data-not-closing est présent
    }
    // Sélectionne tous les éléments avec l'attribut data-auto-open
    const autoOpenElements = this.element.querySelectorAll('[data-auto-open]');
    if (autoOpenElements.length >= 3) { // Si le nombre d'éléments avec l'attribut data-auto-open est supérieur ou égal à 3
      this.options.open = true; // Définit l'option open à true
    }
    /*auto-open rajoute la class is-active*/
    for (let i = 0; i < autoOpenElements.length; i++) {
       const autoOpenElement = autoOpenElements[i];
      autoOpenElement.classList.add('is-active');
    }
  }
}
