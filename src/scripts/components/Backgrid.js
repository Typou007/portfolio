export default class Backgrid {
    constructor(element) {
        this.element = element; // Stocke l'élément DOM du header
        this.caseSize = 35; // Taille d'une case
        this.background = document.getElementById('background');
        this.sections = document.querySelectorAll('.section'); // Ajout de la sélection des sections
        this.lastScrollTop = 0; // Variable pour stocker la dernière position de scroll
        this.init();
        this.handleResize();
    }

    init() {
        this.createGrid();
        this.handleScroll(); // Appel à la méthode pour gérer le scroll des sections

        // Écouteur global de la position de la souris
        document.addEventListener('mousemove', (e) => {
            const mouseX = e.clientX;
            const mouseY = e.clientY;

            // Calculer la case active en fonction de la position de la souris
            const col = Math.floor(mouseX / this.caseSize);
            const row = Math.floor(mouseY / this.caseSize);

            // Désactiver toutes les cases
            document.querySelectorAll('.case').forEach(c => c.classList.remove('active'));

            // Activer la case survolée
            const activeCase = document.querySelector(`.case:nth-child(${(row * this.columns) + col + 1})`);
            if (activeCase) {
                activeCase.classList.add('active');
            }
        });
        window.addEventListener('load', function() {
            document.querySelectorAll('.projet').forEach(function(projet) {
                projet.style.position = 'sticky'; // S'assure que chaque projet est sticky dès le départ
                projet.style.top = '0'; // Réinitialise la position pour assurer qu'elle est correcte
                console.log("update")
            });
        });
        
    }

    handleScroll() {
        window.addEventListener('scroll', () => {
            let scrollTop = window.scrollY;

            // Gestion du comportement de chaque section
            this.sections.forEach((section, index) => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.offsetHeight;

                // Vérifie si la section doit être "active" en fonction du scroll
                if (scrollTop > sectionTop - window.innerHeight && scrollTop < sectionTop + sectionHeight) {
                    // Fige la section courante en position fixe
                    section.style.position = 'fixed';
                    section.style.top = '0';
                } else if (scrollTop >= sectionTop + sectionHeight) {
                    // Replace la section après qu'elle a été recouverte
                    section.style.position = 'absolute';
                    section.style.top = `${sectionTop}px`;
                } else {
                    // Remet les paramètres par défaut si la section n'est pas active
                    section.style.position = 'absolute';
                    section.style.top = `${sectionTop}px`;
                }
            });

            this.lastScrollTop = scrollTop; // Met à jour la dernière position de scroll
        });
    }

    createGrid() {
        // Taille d'une case
        this.columns = Math.ceil(window.innerWidth / this.caseSize);
        this.rows = Math.ceil(window.innerHeight / this.caseSize);

        // Vider la grille existante
        this.background.innerHTML = '';

        // Remplir l'écran avec des cases
        for (let i = 0; i < this.rows; i++) {
            for (let j = 0; j < this.columns; j++) {
                this.createCase(j, i);
            }
        }
    }
    

    createCase(x, y) {
        const div = document.createElement('div');
        div.classList.add('case');
        div.style.left = `${x * this.caseSize}px`;
        div.style.top = `${y * this.caseSize}px`;
        this.background.appendChild(div);
    }

    handleResize() {
        window.addEventListener('resize', () => {
            this.createGrid();
        });
    }
}
