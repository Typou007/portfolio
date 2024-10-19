<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php wp_title('|', true, 'right') ?> | <?php bloginfo('name'); ?></title>
    
    <?php wp_head(); ?>
    
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/dist/styles/main.css">
    <script>
        iconsPath = '<?php bloginfo('template_url') ?>/dist/';
    </script>
    <script src="<?php bloginfo('template_url') ?>/dist/scripts/main.js" defer></script>
</head>

<body data-component="Scrolly" data-no-repeat>
    <?php wp_body_open(); ?>
    <div data-component="Backgrid" id="background"></div>
    
    <!-- Zone header -->
    <header class="header" data-component="Header" data-threshold="10" data-auto-hide="true">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="header__brand">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/logo.png" alt="un A et un B qui sont fusionnés">
            </a>
            <nav class="nav-primary ">
            <?php wp_nav_menu(array(
            'theme_location'  => 'menu_principal',
            'container'       => false, // Supprime le conteneur par défaut (le <div>)
            'menu_class'      => 'nav-primary', // Applique cette classe directement sur l'ul
        )); ?>
            </nav>
            <button class="header__toggle js-toggle">
                <span></span>
                <span></span>
                <span></span>
            </button>              
    </header>