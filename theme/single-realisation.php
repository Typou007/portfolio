<?php get_header(); ?>
<section class="content">
    <section class="wrapper">
        <div class="introduction"> 
            <div class="intro-grid">
                <div> 
                    <div class="intro-text" data-scrolly="fromLeft">
                        <!-- Affichage du sous-titre -->
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/svg/classic.svg" alt="">
                        <div class="numeros"> <h3><?php the_title(); ?></h3></div>
                        <div class="intro-affiche">
                            <div class="projet-titre">
                                <!-- Affichage du sous-titre -->
                                <h2><?php the_field('intro_sous_titre'); ?></h2>
                                <!-- Affichage du titre principal -->
                                <h1><?php the_field('intro_titre_principal'); ?></h1>
                            </div>
                            <div class="intro">
                                <div class="entrepot">
                                    <div class="txt">
                                        <!-- Affichage du texte d'introduction -->
                                        <p><?php the_field('intro_texte'); ?></p>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="images" data-scrolly="fromRight">
                    <!-- Affichage de l'image principale -->
                    <?php the_post_thumbnail('full'); ?>
                </div>
            </div>
        </div>

        <div>
            <div class="etage">
                <!-- Boucle sur le répéteur de technologies associées -->
                <?php if( have_rows('intro_technologies_associees') ): ?>
                    <?php while( have_rows('intro_technologies_associees') ): the_row(); ?>
                        <div class="arriere">
                            <svg xmlns="http://www.w3.org/2000/svg" width="87" height="100" viewBox="0 0 87 100" fill="none" preserveAspectRatio="none">
                                <path d="M1.69873 25.865L43.5 1.73107L85.3013 25.865V74.133L43.5 98.267L1.69873 74.133V25.865Z" fill="#B5B5B5" fill-opacity="0.6" stroke="#25113E" stroke-width="3"/>
                            </svg>
                            <div class="appli">
                                <svg class="icon icon-xl">
                                    <use xlink:href="#icon-<?php the_sub_field('nom_technologie'); ?>"></use>
                                </svg>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="resum wrapper">
            <div class="title" data-scrolly="fromBigSmall">
                <div class="titre-svg-container">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/svg/title.svg" alt="">
                </div>
                <div class="title-overlay">
                    <h2>Résumé</h2>
                </div>
            </div>
        <div class="resum-grid"> 
            <div>
                <div class="template" data-scrolly="fromLeft">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/svg/bas.svg" alt="">
                    <div class="tex">
                        <ul>
                            <!-- Boucle sur le répéteur des éléments 3D -->
                            <?php if( have_rows('resum_methode') ): ?>
                                <?php while( have_rows('resum_methode') ): the_row(); ?>
                                    <li><?php the_sub_field('resum_element'); ?></li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="titrage-down">
                        <h4><?php the_field('resum_titre_methode'); ?></h4>
                    </div>    
                </div>  
            </div>

            <div class="long">
                <div class="template" data-scrolly="fromBottom">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/svg/long.svg" alt="">
                    <div class="univers-texte droite">
                        <!-- Affichage du texte détaillé -->
                        <p><?php the_field('resum_texte_detaille'); ?></p>
                    </div>
                </div>
            </div>

            <div>
                <div class="template" data-scrolly="fromLeft">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/svg/haut.svg" alt="">
                    <div class="tex-up">
                        <ul>
                            <!-- Boucle sur le répéteur des crédits -->
                            <?php if( have_rows('resum_credits') ): ?>
                                <?php while( have_rows('resum_credits') ): the_row(); ?>
                                    <li><?php the_sub_field('resum_credit'); ?></li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="titrage-up">
                        <h4><?php the_field('resum_titre_credit'); ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="full-size wrapper">
        <div class="title" data-scrolly="fromBigSmall">
            <div class="titre-svg-container">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/svg/title.svg" alt="">
            </div>
            <div class="title-overlay">
                <h2><?php the_field('methode_titre_section'); ?></h2>
            </div>
        </div>

        <div class="full-flex">
            <div class="etape-text">
                <div class="template" data-scrolly="fromRight">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/svg/classic_inverse.svg" alt="">
                    <div class="univers-texte texte-etape haut">
                        <!-- Affichage du texte d'explication -->
                        <p><?php the_field('methode_texte_explication'); ?></p>
                    </div>
                </div>
            </div>

            <div data-scrolly="fromBottom">
                <svg xmlns="http://www.w3.org/2000/svg" width="1441" height="804" viewBox="0 0 1441 804" fill="none" preserveAspectRatio="none">
                    <!-- Affichage de l'image de méthodologie -->
                    <?php if($methode_image = get_field('methode_image')): ?>
                        <image class="fit" href="<?php echo esc_url($methode_image['url']); ?>" x="0" y="0" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" />
                    <?php endif; ?>
                    <path d="M637.505 3.00008L1437 3C1437.55 3 1438 3.44773 1438 4.00001L1438 673.929C1438 674.482 1437.55 674.929 1437 674.929L952.011 674.929C951.883 674.929 951.757 674.954 951.639 675.001L637.389 800.928C637.271 800.976 637.145 801 637.017 801L4.00018 801C3.44781 801 3.00018 800.552 3.00018 800L3.00011 127.388C3.00011 126.836 3.44774 126.388 4.00011 126.388L445.948 126.388C446.141 126.388 446.329 126.333 446.491 126.228L636.963 3.16015C637.124 3.05566 637.313 3.00008 637.505 3.00008Z" fill="#B5B5B5" fill-opacity="0.1" stroke="#769703" stroke-width="5"/>
                </svg>
            </div>
        </div>
    </section>

    <section class="chronologie wrapper">
        <div class="title" data-scrolly="fromBigSmall">
            <div class="titre-svg-container">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/svg/title.svg" alt="">
            </div>
            <div class="title-overlay">
                <h2><?php the_field('chrono_titre_section'); ?></h2> <!-- Affichage du titre de la section -->
            </div>
        </div>

        <div class="swiper">
            <div class="swiper-full swiper" data-component="Carousel" data-slides="1" data-loop data-split>
                <div class="swiper-wrapper cards">
                    <?php if (have_rows('chrono_cartes')): ?> <!-- Boucle sur les cartes du répéteur -->
                        <?php while (have_rows('chrono_cartes')) : the_row(); ?>
                            <div class="swiper-slide">
                                <div class="card">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1377" height="1456" viewBox="0 0 377 456" fill="none" preserveAspectRatio="none">
                                        <!-- Image de la carte -->
                                        <?php if ($image = get_sub_field('chrono_carte_image')): ?>
                                            <image class="card-media" href="<?php echo esc_url($image['url']); ?>" x="0" y="0" width="377" height="456" preserveAspectRatio="xMidYMid slice" />
                                        <?php endif; ?>

                                        <path d="M1.5 284.783V1.5H327.642V76.4529C327.642 76.9592 327.796 77.4536 328.083 77.8706L375.5 146.738V454.5H45.4508V343.673C45.4508 343.128 45.2728 342.598 44.944 342.163L1.5 284.783Z" fill="#B5B5B5" fill-opacity="0.1" stroke="#769703" stroke-width="3"/>
                                    </svg>
                                    <div class="card-content">
                                        <!-- Durée de la carte -->
                                        <p><?php the_sub_field('chrono_carte_duree'); ?></p>
                                        <!-- Titre de la carte -->
                                        <h5><?php the_sub_field('chrono_carte_titre'); ?></h5>
                                        <!-- Description de la carte -->
                                        <p><?php the_sub_field('chrono_carte_description'); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>


    <section class="etape wrapper">
        <div class="title" data-scrolly="fromBigSmall">
            <div class="titre-svg-container">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/svg/title.svg" alt="">
            </div>
            <div class="title-overlay">
                <h2><?php the_field('etape_titre_section'); ?></h2> <!-- Titre de la section -->
            </div>
        </div>
        <div class="full-flex">
            <div class="etape-text">
                <div class="template" data-scrolly="fromRight">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/svg/classic_inverse.svg" alt="">
                    <div class="univers-texte texte-etape haut">
                        <p><?php the_field('etape_texte_principal'); ?></p> <!-- Texte principal -->
                    </div>
                </div>
            </div>

            <div class="etape-grid">
                <div>
                    <div class="template" data-scrolly="fromLeft">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/svg/projet_etape_left.svg" alt="">
                        <div class="ecriture gauche">
                            <h3><?php the_field('etape_resolution_titre'); ?></h3> <!-- Titre de la résolution -->
                            <p><?php the_field('etape_resolution_texte'); ?></p> <!-- Texte de la résolution -->
                        </div>
                    </div>
                </div>

                <div>
                    <div class="template" data-scrolly="fromRight">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/svg/projet_etape_right.svg" alt="">
                        <div class="ecriture droite">
                            <h3><?php the_field('etape_apprentissage_titre'); ?></h3> <!-- Titre de l'apprentissage -->
                            <p><?php the_field('etape_apprentissage_texte'); ?></p> <!-- Texte de l'apprentissage -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="video-sup wrapper">
        <div class="title" data-scrolly="fromBigSmall">
            <div class="titre-svg-container">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/svg/title.svg" alt="">
            </div>
            <div class="title-overlay">
                <h2><?php the_field('resultat_titre_section'); ?></h2> <!-- Titre de la section -->
            </div>
        </div>
        <div>
            <div class="video">
                <div class="youtube" data-component="Youtube" data-youtube-id="<?php the_field('resultat_youtube_id'); ?>"> <!-- ID YouTube -->
                    <div class="youtube__media js-youtube">
                        <img class="js-poster" src="<?php echo esc_url(get_field('resultat_affiche_video')['url']); ?>" alt="Affiche vidéo" /> <!-- Affiche vidéo -->
                        <svg class="icon icon--xl">
                            <use xlink:href="#icon-play"></use>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

</section>


<?php get_footer(); ?>
