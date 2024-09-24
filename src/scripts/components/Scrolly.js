// Classe Scrolly pour gérer les éléments scroll-triggered
export default class Scrolly {
  constructor(element) {
    this.element = element;

    // Options par défaut pour l'observation des intersections
    this.options = {
      rootMargin: '0px 0px 0px 0px', // Marge de la racine
      repeat: true, // Répéter l'observation par défaut
    };
    this.init(); // Initialise l'observation des éléments
  }

  // Initialise l'observation des éléments avec les options configurées
  init() {
    this.setOptions(); // Configure les options en fonction des attributs data
    // Crée un observateur d'intersection avec les options configurées
    const observer = new IntersectionObserver(this.watch.bind(this), this.options);
    // Sélectionne les éléments à observer
    const items = this.element.querySelectorAll('[data-scrolly]');
    // Démarre l'observation pour chaque élément
    for (let i = 0; i < items.length; i++) {
      const item = items[i];
      observer.observe(item);
    }

    /**
     * temporaire
     */
    const gridContainer = document.querySelector('.grid-container');

    function createGrid() {
      const containerWidth = window.innerWidth;
      const containerHeight = window.innerHeight;
      const squareSize = 35; // Taille d'un carré
      const numColumns = Math.floor(containerWidth / squareSize);
      const numRows = Math.floor(containerHeight / squareSize);
    
      gridContainer.style.gridTemplateColumns = `repeat(${numColumns}, 1fr)`;
      gridContainer.style.gridTemplateRows = `repeat(${numRows}, 1fr)`;
    
      gridContainer.innerHTML = ''; // Réinitialise la grille
    
      for (let i = 0; i < numColumns * numRows; i++) {
        const gridItem = document.createElement('div');
        gridItem.classList.add('grid-item');
        gridContainer.appendChild(gridItem);
      }
    }
    
    function getRandomInt(min, max) {
      return Math.floor(Math.random() * (max - min + 1)) + min;
    }
    
    // Fonction pour changer la couleur des voisins
    function changeSurroundingColors(index, columns) {
      const items = document.querySelectorAll('.grid-item');
      
      // Positions autour de l'élément actuel (gauche, droite, haut, bas et diagonales)
      const positions = [
        -columns - 1, -columns, -columns + 1,  // Carrés du dessus
        -1, 1,                                // Carrés sur les côtés
        columns - 1, columns, columns + 1     // Carrés du dessous
      ];
    
      // Parcourt les positions autour de l'élément
      positions.forEach((position) => {
        const neighborIndex = index + position;
    
        // Vérifie si l'index du voisin est valide
        if (neighborIndex >= 0 && neighborIndex < items.length) {
          const item = items[neighborIndex];
          
          // Change la couleur de la bordure du voisin
          item.style.borderColor = '#C6FF00'; // Couleur de bordure lorsque survolé
        }
      });
    }
    
    // Gestion du survol des éléments de la grille
    gridContainer.addEventListener('mouseover', (event) => {
      if (event.target.classList.contains('grid-item')) {
        const items = Array.from(document.querySelectorAll('.grid-item'));
        const index = items.indexOf(event.target);
        const numColumns = Math.floor(window.innerWidth / 35);
    
        // Réinitialiser les couleurs de la bordure
        items.forEach(item => {
          item.style.borderColor = '#444'; // Réinitialise la bordure
          item.style.opacity = 1; // Réinitialise l'opacité
        });
    
        // Change les couleurs autour de l'élément survolé
        changeSurroundingColors(index, numColumns);
      }
    });
    
    // Génère la grille initiale
    createGrid();
    
    // Gère la régénération de la grille lors du redimensionnement
    window.addEventListener('resize', createGrid);
    

    

    /**
     * temporaire
     */
  }

  // Configure les options de l'observateur d'intersection en fonction des attributs data
  setOptions() {
    // Désactive la répétition de l'observation si l'attribut 'noRepeat' est présent
    if ('noRepeat' in this.element.dataset) {
      this.options.repeat = false;
    }
  }

  // Fonction de rappel pour gérer les entrées dans la zone visible
  watch(entries, observer) {
    // Parcourt toutes les entrées observées
    for (let i = 0; i < entries.length; i++) {
      const entry = entries[i];
      const target = entry.target;
      // Ajoute la classe 'is-active' si l'élément est dans la zone visible
      if (entry.isIntersecting) {
        target.classList.add('is-active');
        // Si la répétition est désactivée, cesse d'observer l'élément après la première intersection
        if (this.options.repeat === false) {
          observer.unobserve(target);
        }
      } else {
        // Retire la classe 'is-active' si l'élément sort de la zone visible
        target.classList.remove('is-active');
      }
    }
  }
}