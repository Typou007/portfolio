# Portfolio WordPress personnalisé

Portfolio personnel conçu et développé entièrement par **Antoine Breton**.

Ce portfolio a été réalisé dans le cadre d'un projet de préparation au stage de la **Technique d'intégration multimédia du Cégep Édouard-Montpetit**.

J'ai réalisé seul l'ensemble du projet de A à Z : conception de l'identité visuelle, création des maquettes, intégration du site statique, développement des interactions et transformation du site en thème WordPress dynamique avec PHP.

## Aperçu du projet

Le site présente mon profil, mes compétences et mes réalisations dans une interface interactive. Son intégration à WordPress permet de modifier le contenu depuis l'administration sans avoir à intervenir directement dans le code.

## Réalisation personnelle

J'ai pris en charge l'ensemble du projet :

- conception visuelle et expérience utilisateur;
- création des maquettes et de la direction artistique;
- intégration adaptative en HTML et CSS;
- développement des interactions en JavaScript;
- programmation du thème WordPress en PHP;
- création et affichage de types de contenu personnalisés;
- intégration des champs personnalisés avec ACF;
- préparation et optimisation des éléments visuels et multimédias.

## Fonctionnalités

- thème WordPress entièrement personnalisé;
- gestion dynamique des projets et des réalisations;
- types de contenu personnalisés pour structurer le portfolio;
- champs administrables avec Advanced Custom Fields (ACF);
- carrousels interactifs avec Swiper;
- intégration de vidéos avec l'API YouTube IFrame;
- animations déclenchées au défilement avec Intersection Observer;
- navigation adaptative pour ordinateur, tablette et téléphone;
- prise en charge de ressources SVG et d'éléments multimédias.

## Technologies utilisées

- WordPress
- PHP
- JavaScript
- HTML5
- CSS3
- Advanced Custom Fields (ACF)
- Swiper
- API YouTube IFrame
- Figma
- Adobe Creative Cloud

## Structure principale

```text
theme/
|-- dist/                    # Fichiers CSS, JavaScript et ressources du site
|-- footer.php               # Pied de page
|-- front-page.php           # Page d'accueil
|-- functions.php            # Configuration et fonctionnalités WordPress
|-- header.php               # En-tête et navigation
|-- index.php                # Modèle WordPress par défaut
|-- single-realisation.php   # Présentation détaillée d'une réalisation
`-- style.css                # Informations du thème WordPress
```

## Installation locale

1. Installer WordPress dans un environnement de développement local.
2. Copier le dossier `theme` dans `wp-content/themes/`.
3. Activer le thème depuis l'administration de WordPress.
4. Installer et activer l'extension Advanced Custom Fields.
5. Configurer les champs personnalisés nécessaires au contenu du portfolio.
6. Ajouter le contenu et les médias depuis l'administration.

Le fichier `wp-config.php`, la base de données et les données propres à l'environnement local ne sont pas inclus dans le dépôt.

## Auteur

**Antoine Breton**  
[LinkedIn](https://www.linkedin.com/in/antoine-breton-823655329)

## Utilisation

Ce dépôt présente un projet personnel destiné à mon portfolio. Sauf indication contraire, le code, la conception visuelle et les ressources originales ne sont pas distribués sous une licence libre.
