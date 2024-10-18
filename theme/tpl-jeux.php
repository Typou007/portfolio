	
<?php /* Template Name: Liste de jeux */ ?>

<?php get_header(); ?>
    
    <div class="hero hero--compact">
        <div class="hero__media">
        <?php the_post_thumbnail('full'); ?>
        </div>
        <div class="hero__content">
            <div class="wrapper">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="wrapper">
            <div>
                <?php the_content(); ?>
            </div>
            <?php
                // affiche 2 jeux du plus ancien au plus récent(sur la base d'un champs ACF) 
                /*$arg = array(
                    'post_type' => 'jeu',
                    'post_status' => 'publish',
                    'posts_per_page' => '2',
                    'order' => 'asc',
                    'orderby' => 'pw_release_date',
                    'meta_key' => 'pw_release_date',
                    'meta_type' =>'DATE'
                );*/
                // affiche les jeux de la catégorie plate-formes
                /*$arg = array(
                    'post_type' => 'jeu',
                    'post_status' => 'publish',
                    'posts_per_page' => '2',
                    'category_name' => 'plates-formes',
                );*/
                // affiche les jeux d'action OU de simulation qui ont une note 4 et moins
                $arg = array(
                    'post_type' => 'jeu',
                    'post_status' => 'publish',
                    'posts_per_page' => '-1',
                    'order' => 'asc',
                    'orderby' => 'pw_release_date',
                    'meta_key' => 'pw_release_date',
                    'meta_type' =>'DATE'
                );
                
                $query = new WP_Query($arg);
            ?>
            <!-- Cards -->
            <div class="cards">
                <?php if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>


                <a href="<?php the_permalink() ?>" class="card">
                    <div class="card__media">
                        <?php
                            $image = get_field('pw_thumbnail');
                            if(!empty( $image ) ): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ); ?>">
                            <?php endif; ?>
                    </div>
                    <div class="card__content">
                        <h3 class="card__title"><?php the_title(); ?></h3>
                    </div>
                </a>
                    <?php endwhile ?>
                <?php endif ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    
    <?php get_footer(); ?>