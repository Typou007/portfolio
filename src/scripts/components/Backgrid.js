export default class Backgrid {
    constructor(element) {
        this.element = element; // Stocke l'élément DOM du header
        console.log("hel");
        this.init();
        
        }
        init(){
const gridContainer = document.querySelector('.grid-container');

// Fonction pour générer la grille dynamiquement selon la taille de la fenêtre
function createGrid() {
    console.log("grid");
    const containerWidth = window.innerWidth;
    const containerHeight = window.innerHeight;
    const squareSize = 20; // Taille d'un carré en pixels

    const numColumns = Math.floor(containerWidth / squareSize);
    const numRows = Math.floor(containerHeight / squareSize);

    gridContainer.style.gridTemplateColumns = `repeat(${numColumns}, 1fr)`;
    gridContainer.style.gridTemplateRows = `repeat(${numRows}, 1fr)`;

    for (let i = 0; i < numColumns * numRows; i++) {
        const gridItem = document.createElement('div');
        gridItem.classList.add('grid-item');
        gridContainer.appendChild(gridItem);
    }
}

// Fonction pour générer un entier aléatoire entre min et max
function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

// Fonction pour changer la couleur des carrés environnants
function changeSurroundingColors(index, columns) {
    const items = document.querySelectorAll('.grid-item');
    const positions = [
        -columns - 1, -columns, -columns + 1,  // Carrés du dessus
        -1, 1,                                // Carrés sur les côtés
        columns - 1, columns, columns + 1     // Carrés du dessous
    ];

    for (let i = 0; i < 5; i++) {
        const randomPosition = getRandomInt(0, positions.length - 1);
        const neighborIndex = index + positions[randomPosition];

        if (neighborIndex >= 0 && neighborIndex < items.length) {
            items[neighborIndex].style.backgroundColor = `hsl(${Math.random() * 360}, 80%, 70%)`;
        }
    }
}

// Ajoute l'événement 'mouseover' pour changer les couleurs
gridContainer.addEventListener('mouseover', (event) => {
    if (event.target.classList.contains('grid-item')) {
        const items = Array.from(document.querySelectorAll('.grid-item'));
        const index = items.indexOf(event.target);
        const numColumns = Math.floor(window.innerWidth / 20);

        // Réinitialiser les couleurs
        items.forEach(item => item.style.backgroundColor = '#ccc');

        changeSurroundingColors(index, numColumns);
    }
});

// Crée la grille au chargement de la page
createGrid();

// Ajuste la grille si la fenêtre est redimensionnée
window.addEventListener('resize', () => {
    gridContainer.innerHTML = ''; // Vide la grille
    createGrid(); // Recrée la grille avec la nouvelle taille
});

        }
}