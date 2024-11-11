<?php
// Template Name: Front Page

get_header(); ?>
<!-- Zone header -->
<section class="content">

    <section class="hero">
        <div class="img_hero">
                    <video autoplay muted loop >
                        <source src="<?php echo get_template_directory_uri(); ?>/dist/assets/video/demo_realm_final.mp4" type="video/mp4" />
                    </video>
        </div>
        <div class="hero_content" data-scrolly="fromLeft">
            <div class="hero-svg-container"></div>
            <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/svg/hero_message.svg" alt="">
            <div class="text-overlay-top"><h3>Antoine Breton</h3></div>
            <div class="text-overlay"><h1>Développement & Création média</h1></div>
        </div>
    </section>

    <section id="propos" class="wrapper propos">
        <!-- Boucle pour afficher les articles du CPT 'Propos' -->
        <?php
        $args = array(
            'post_type' => 'propos',
            'posts_per_page' => -1,  // Récupérer tous les articles
        );
        $propos_query = new WP_Query($args);

        if ($propos_query->have_posts()) :
            while ($propos_query->have_posts()) : $propos_query->the_post();
        ?>
            <div class="title" data-scrolly="fromBigSmall">
                <div class="titre-svg-container">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/svg/title.svg" alt="">
                </div>
                <div class="title-overlay">
                    <h2><?php the_field('titre_principal'); ?></h2>
                </div>
            </div>

            <div class="propos-grid">
                <!-- Section Présentation -->
                <div class="presentation" data-scrolly="fromLeft">
                    <div class="presentation-container">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/assets/svg/presentation.svg" alt="">
                    </div>
                    <div class="contenu-presentation">
                        <div class="presentation-titrage">
                            <h3><?php the_field('sous_titre_presentation'); ?></h3>
                        </div>
                        <div class="presentation-overlay">
                            <?php the_field('contenu_presentation'); ?>
                        </div>    
                    </div>
                </div>

                <!-- Section Moi -->
                <div class="img" data-scrolly="fromRight">
                    <div>
                        <div class="video">
                            <div class="youtube" data-component="Youtube" data-youtube-id="gdyVf0j6YUw" data-no-rel>
                                <div class="youtube__media js-youtube">
                                    <img class="moi js-poster" src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/moi_italien.jpg" alt="Image principale de la section Moi" />
                                    <svg class="icon icon--xl">
                                        <use xlink:href="#icon-play"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="loisir" data-scrolly="fromLeft">
                    <div class="presentation">
                        <div class="presentation-container">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/assets/svg/presentation.svg" alt="">
                        </div>
                        <div class="contenu-loisir">
                            <div class="presentation-titrage-loisir">
                                <h3><?php the_field('sous_titre_moi'); ?></h3>
                            </div>
                            <div class="presentation-overlay">
                                <p><?php the_field('contenu_moi'); ?></p>
                            </div>
                            <?php if (have_rows('icones_moi')) : ?>
                                <div class="offre">
                                    <?php while (have_rows('icones_moi')) : the_row(); ?>
                                        <div class="produit">
                                            <div class="iconbg">
                                                <div class="iconp">
                                                    <svg class="icon icon--stroke icon-xl">
                                                        <use xlink:href="#icon-<?php the_sub_field('nom_icone'); ?>"></use>
                                                    </svg>
                                                </div>
                                                <div class="bg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="127" height="146" viewBox="0 0 127 146" fill="none">
                                                        <path d="M0.543949 36.7113L63.1297 0.57735L125.715 36.7113V108.979L63.1297 145.113L0.543949 108.979V36.7113Z" fill="#B5B5B5" fill-opacity="0.6" stroke="#25113E" stroke-width="3"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <p><?php the_sub_field('titre_icone'); ?></p>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Section Expertise -->
                <div class="expertise" data-scrolly="fromRight">
                    <div class="presentation">
                        <div class="presentation-container">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/assets/svg/expertise.svg" alt="">
                        </div>
                        <div class="contenu-expertise">
                            <div class="expertise-titrage-expert">
                                <h3><?php the_field('expertise_sous_titre'); ?></h3>
                            </div>
                            <div class="expertise-overlay-expert">
                                <div class="offre">
                                    <div class="evaluation">
                                        <?php if (have_rows('expertise_icones')) : ?>
                                            <?php while (have_rows('expertise_icones')) : the_row(); ?>
                                                <div class="resulta">
                                                    <div class="visuel">
                                                        <div class="logiciel">
                                                            <svg class="icon icon-xxl plus">
                                                                <use xlink:href="#icon-<?php the_sub_field('nom_icone'); ?>"></use>
                                                            </svg>
                                                        </div>
                                                        <div class="font">
                                                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/assets/svg/expertise_fond.svg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="niveau">
                                                        <img src="<?php echo esc_url(get_sub_field('lvl_icone')['url']); ?>" alt="">
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </section>

    <section id="projets" class="Presentation">
        <div class="title" data-scrolly="fromBigSmall">
            <div class="titre-svg-container">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/svg/title.svg" alt="">
            </div>
            <div class="title-overlay">
                <h2>Projets</h2>
            </div>
        </div>

        <div class="projets">
            <?php
            $args = array(
                'post_type' => 'projet',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'ASC',
            );
            $query = new WP_Query($args);
            $counter = 1;

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $projet_titre = get_field('projet_titre');
                    $projet_sous_titre = get_field('projet_sous_titre');
                    $projet_image_principale = get_field('projet_image_principale');
                    $projet_image_fond = get_field('projet_image_fond');
                    $projet_description = get_field('projet_description');
                    
                    // Récupération de la réalisation associée (si existante)
                    $realisation_associee = get_field('associe_realisation');
                    $realisation_link = '';
                    
                    // Vérifions si la réalisation associée est un tableau ou un objet, et obtenons le lien
                    if ($realisation_associee && !is_array($realisation_associee)) {
                        // Si le champ retourne un ID, on l'utilise pour obtenir le lien
                        $realisation_link = get_permalink($realisation_associee);
                    } elseif (is_array($realisation_associee) && isset($realisation_associee[0])) {
                        // Si le champ retourne un tableau, on prend le premier élément
                        $realisation_link = get_permalink($realisation_associee[0]->ID);
                    }
            ?>
            
            <div id="projet-<?php echo $counter; ?>" class="projet">
                <div class="projet-container">
                    <img class="back" src="<?php echo esc_url($projet_image_fond['url']); ?>" alt="">
                    <div class="affiche">
                        <div class="projet-titre">
                            <h2><?php echo esc_html($projet_sous_titre); ?></h2>
                            <h1><?php echo esc_html($projet_titre); ?></h1>
                        </div>
                        <div class="projet-image">
                            <img src="<?php echo esc_url($projet_image_principale['url']); ?>" alt="">
                        </div>
                        <div class="projet-info">
                            <div class="entrepot">
                                <div class="txt">
                                    <p><?php echo esc_html($projet_description); ?></p>
                                </div>
                                <div class="config">
                                    <div class="etage">
                                        <?php if (have_rows('projet_technologies')) : ?>
                                            <?php while (have_rows('projet_technologies')) : the_row(); ?>
                                                <div class="arriere">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="87" height="100" viewBox="0 0 87 100" fill="none">
                                                        <path d="M1.69873 25.865L43.5 1.73107L85.3013 25.865V74.133L43.5 98.267L1.69873 74.133V25.865Z" fill="#B5B5B5" fill-opacity="0.6" stroke="#25113E" stroke-width="3"/>
                                                    </svg>
                                                    <div class="app">
                                                        <svg class="icon icon-xl">
                                                            <use xlink:href="#icon-<?php the_sub_field('technologie_nom'); ?>"></use>
                                                        </svg>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <div class="btn-fond">
                                            <svg class="svg-btn" xmlns="http://www.w3.org/2000/svg" width="533" height="86" viewBox="0 0 533 86" fill="none">
                                                <path d="M3.84319 20.3275C-0.0638781 12.0364 5.98504 2.49902 15.1506 2.49902H491.46C496.3 2.49902 500.705 5.29267 502.768 9.67056L529.157 65.6705C533.064 73.9617 527.015 83.499 517.849 83.499H41.5398C36.7002 83.499 32.2954 80.7054 30.2324 76.3275L3.84319 20.3275Z" fill="#BEBEBE" stroke="#C6FF01" stroke-width="5"/>
                                            </svg>
                                            <!-- Lien vers la réalisation associée, si existante -->
                                            <a class="savoir" href="<?php echo esc_url($realisation_link ?: get_permalink()); ?>">
                                                En savoir plus
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="79" height="53" viewBox="0 0 79 73" fill="none">
                                                        <rect width="64.8821" height="9.74999" rx="4.875" transform="matrix(0.00755095 -0.964591 1.03417 -0.00412601 33.7849 67.3057)" fill="#3D4E05"/>
                                                        <path d="M5.58554 36.5492C5.60248 34.3852 7.49701 32.6437 9.8171 32.6595L30.822 32.8025L30.7606 40.6392L9.75575 40.4962C7.43567 40.4804 5.5686 38.7133 5.58554 36.5492Z" fill="#3D4E05"/>
                                                        <path d="M47.6287 32.917L68.6335 33.06C70.9536 33.0758 72.8207 34.843 72.8038 37.007C72.7868 39.171 70.8923 40.9125 68.5722 40.8967L47.5673 40.7537L47.6287 32.917Z" fill="#3D4E05"/>
                                                    </svg>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="projet<?php echo $counter; ?>">
                        <h3><?php the_title(); ?></h3>
                    </div>
                </div>
            </div>
            <?php
            $counter++; // Incrémente le compteur à chaque projet
        endwhile;
        endif;
        wp_reset_postdata();
            ?>  
        </div>
    </section>


    <section id="contact" class="contact">
            <div class="title">
                <div class="titre-svg-container">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/svg/title.svg" alt="">
                </div>
                <div class="title-overlay">
                    <h2>Contactez-moi</h2>
                </div>
            </div>
            <div class="u-grid-fullwitdh">
                <div class="etage">
                    <a class="arriere" href="mailto:bretonantoine3@gmail.com">
                        <svg xmlns="http://www.w3.org/2000/svg" width="166" height="191" viewBox="0 0 166 191" fill="none">
                            <path d="M2.2111 48.5656L82.8769 1.73446L163.543 48.5656V142.242L82.8769 189.074L2.2111 142.242V48.5656Z" fill="#B5B5B5" fill-opacity="0.6" stroke="#25113E" stroke-width="3" />
                        </svg>
                        <div class="appli">
                            <svg class="icon icon-xl">
                                <use xlink:href="#icon-email"></use>
                            </svg>
                        </div>
                    </a>
                    <a class="arriere" href="./wp-content/themes/theme/dist/assets/pdf/cv_develloppement.pdf" download="Breton_Antoine_CV.pdf"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="166" height="191" viewBox="0 0 166 191" fill="none">
                            <path d="M2.2111 48.5656L82.8769 1.73446L163.543 48.5656V142.242L82.8769 189.074L2.2111 142.242V48.5656Z" fill="#B5B5B5" fill-opacity="0.6" stroke="#25113E" stroke-width="3" />
                        </svg>
                        <div class="appli">
                            <svg class="icon icon-xl">
                                <use xlink:href="#icon-cv"></use>
                            </svg>
                        </div>
                    </a>

                </div>
            </div>
    </section>

</section>   

<?php get_footer(); ?>