export default class Backgrid {
    constructor(element) {
        this.element = element; // Stocke l'élément DOM du header
        this.init();
        
        }
        init(){
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
        }
}