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
    const observer = new IntersectionObserver(
      this.watch.bind(this),
      this.options
    );
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
      // Taille d'une case
// Taille d'une case
const caseSize = 35;

// Créer des cases dynamiquement pour remplir l'écran
const background = document.getElementById('background');
const columns = Math.ceil(window.innerWidth / caseSize);
const rows = Math.ceil(window.innerHeight / caseSize);

function createCase(x, y) {
    const div = document.createElement('div');
    div.classList.add('case');
    div.style.left = `${x * caseSize}px`;
    div.style.top = `${y * caseSize}px`;
    background.appendChild(div);
}

// Remplir l'écran avec des cases
for (let i = 0; i < rows; i++) {
    for (let j = 0; j < columns; j++) {
        createCase(j, i);
    }
}

// Écouteur global de la position de la souris
document.addEventListener('mousemove', (e) => {
    const mouseX = e.clientX;
    const mouseY = e.clientY;

    // Calculer la case active en fonction de la position de la souris
    const col = Math.floor(mouseX / caseSize);
    const row = Math.floor(mouseY / caseSize);

    // Désactiver toutes les cases
    document.querySelectorAll('.case').forEach(c => c.classList.remove('active'));

    // Activer la case survolée
    const activeCase = document.querySelector(`.case:nth-child(${(row * columns) + col + 1})`);
    if (activeCase) {
        activeCase.classList.add('active');
    }
});

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
