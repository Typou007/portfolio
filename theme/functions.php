<?php

// Ajoute le support pour les images à la une au thème personnalisé
add_theme_support('post-thumbnails');

// Menu
function pw_creer_menu() {
	register_nav_menu('menu_principal', 'Menu principal');
}
add_action('init', 'pw_creer_menu');

// Créer le CPT 'Propos'
function cpt_propos_init() {
    $labels = array(
        'name'                  => _x('Propos', 'Post type general name', 'textdomain'),
        'singular_name'         => _x('Propos', 'Post type singular name', 'textdomain'),
        'menu_name'             => _x('Propos', 'Admin Menu text', 'textdomain'),
        'name_admin_bar'        => _x('Propos', 'Add New on Toolbar', 'textdomain'),
        'add_new'               => __('Ajouter Nouveau', 'textdomain'),
        'add_new_item'          => __('Ajouter Nouveau Propos', 'textdomain'),
        'new_item'              => __('Nouveau Propos', 'textdomain'),
        'edit_item'             => __('Éditer Propos', 'textdomain'),
        'view_item'             => __('Voir Propos', 'textdomain'),
        'all_items'             => __('Tous les Propos', 'textdomain'),
        'search_items'          => __('Rechercher Propos', 'textdomain'),
        'parent_item_colon'     => __('Parent Propos:', 'textdomain'),
        'not_found'             => __('Aucun Propos trouvé.', 'textdomain'),
        'not_found_in_trash'    => __('Aucun Propos trouvé dans la corbeille.', 'textdomain'),
        'featured_image'        => _x('Image de couverture pour ce Propos', 'Overrides the “Featured Image” phrase for this post type.', 'textdomain'),
        'set_featured_image'    => _x('Définir image de couverture', 'Overrides the “Set featured image” phrase.', 'textdomain'),
        'remove_featured_image' => _x('Supprimer image de couverture', 'Overrides the “Remove featured image” phrase.', 'textdomain'),
        'use_featured_image'    => _x('Utiliser comme image de couverture', 'Overrides the “Use as featured image” phrase.', 'textdomain'),
        'archives'              => _x('Archives de Propos', 'The post type archive label used in nav menus.', 'textdomain'),
        'insert_into_item'      => _x('Insérer dans Propos', 'Overrides the phrase used when inserting media.', 'textdomain'),
        'uploaded_to_this_item' => _x('Téléversé sur ce Propos', 'Overrides the phrase for uploaded files.', 'textdomain'),
        'filter_items_list'     => _x('Filtrer la liste de Propos', 'Screen reader text for the filter links.', 'textdomain'),
        'items_list_navigation' => _x('Navigation de la liste de Propos', 'Screen reader text for pagination.', 'textdomain'),
        'items_list'            => _x('Liste de Propos', 'Screen reader text for the items list.', 'textdomain'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'propos'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail'),
        'menu_icon'          => 'dashicons-id-alt',  // Icône du menu d'administration
    );

    register_post_type('propos', $args);
}
add_action('init', 'cpt_propos_init');

// Register Custom Post Type
function custom_post_type_projets() {

    $labels = array(
        'name'                  => 'Projets',
        'singular_name'         => 'Projet',
        'menu_name'             => 'Projets',
        'name_admin_bar'        => 'Projet',
        'archives'              => 'Archives des Projets',
        'attributes'            => 'Attributs des Projets',
        'parent_item_colon'     => 'Projet Parent',
        'all_items'             => 'Tous les Projets',
        'add_new_item'          => 'Ajouter un Nouveau Projet',
        'add_new'               => 'Ajouter un Projet',
        'new_item'              => 'Nouveau Projet',
        'edit_item'             => 'Modifier le Projet',
        'update_item'           => 'Mettre à Jour le Projet',
        'view_item'             => 'Voir le Projet',
        'view_items'            => 'Voir les Projets',
        'search_items'          => 'Chercher des Projets',
    );
    $args = array(
        'label'                 => 'Projet',
        'description'           => 'Les projets de votre portfolio',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
		'menu_icon'          => 'dashicons-archive',  // Icône du menu d'administration
    );
    register_post_type( 'projet', $args );

}
add_action( 'init', 'custom_post_type_projets', 0 );

// Enregistrement du CPT "Réalisation"
function create_realisation_cpt() {
    $labels = array(
        'name' => 'Réalisations',
        'singular_name' => 'Réalisation',
        'menu_name' => 'Réalisations',
        'name_admin_bar' => 'Réalisation',
        'add_new' => 'Ajouter une nouvelle',
        'add_new_item' => 'Ajouter une nouvelle réalisation',
        'new_item' => 'Nouvelle réalisation',
        'edit_item' => 'Modifier la réalisation',
        'view_item' => 'Voir la réalisation',
        'all_items' => 'Toutes les réalisations',
        'search_items' => 'Rechercher des réalisations',
        'not_found' => 'Aucune réalisation trouvée.',
        'not_found_in_trash' => 'Aucune réalisation dans la corbeille.',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,  // Active les archives
        'rewrite' => array('slug' => 'realisation'),  // Le slug des URL des réalisations
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-portfolio',  // Dashicon personnalisé
    );

    register_post_type('realisation', $args);
}

add_action('init', 'create_realisation_cpt');






//Page d'options ACF
if(function_exists('acf_add_options_page')){

	//on ajoute une page d'option
	acf_add_options_page(array(
		'page_title' => 'Options générales',
		'menu_title' => 'Options générales',
		'page_slug' => 'pw-theme-options-generales',
		'capability' => 'edit_posts',
		'redirect' => false
	));
}

// Fonction pour autoriser les SVG dans WordPress
function autoriser_svg( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'autoriser_svg' );

function sanitize_svg( $file ) {
    if ( $file['type'] === 'image/svg+xml' ) {
        $file['ext']  = 'svg';
        $file['type'] = 'image/svg+xml';
    }
    return $file;
}
add_filter( 'wp_check_filetype_and_ext', 'sanitize_svg', 10, 4 );
