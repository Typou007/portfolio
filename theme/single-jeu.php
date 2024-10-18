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
        <div class="wrapper game">
            <div class="game__content">
                <?php the_content(); ?>
            </div>
            
            <div class="game__meta">
                <?php $realisators = get_field('pw_realisator'); ?>

                <?php if ($realisators) : ?>
                    <h4> réalisateur</h4>

                    <?php foreach($realisators as $realisator) : ?>
                        <p><?php echo get_the_title($realisator->ID); ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
                
                <?php if (get_field('pw_release_date')) : ?>
                    <h4>Date de sortie</h4>
                    <p><?php the_field('pw_release_date'); ?></p>
                <?php endif; ?>
                
                <?php $categories = array(); ?>
                <?php foreach(get_the_category() as $category) :?>
                    <?php array_push($categories, $category->name); ?>
                <?php endforeach?>

                
                <?php if ($categories) : ?>
                    <h4>Genre</h4>
                    <p><?php echo implode(',', $categories); ?></p>
                <?php endif ?>
                <?php if (get_field('pw_rating')) : ?>
                    <h4>Classement</h4>
                    <p><?php the_field('pw_rating'); ?>⭐️ </p>
                <?php endif ?>
            </div>
        </div>
    </section>

<?php if ( have_rows('pw_gallery') ): ?>
    <section class="section">
        <div class="wrapper">
            <h2>Galerie photos</h2>

            <!-- Cards -->
            <div class="gallery">
            
                <?php while(have_rows('pw_gallery')) : the_row(); ?>

                    <div class="gallery__card">          
                        <div class="gallery__media">
                        <?php
                            $image = get_sub_field('photo');
                            if(!empty( $image ) ):
                        ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        <?php endif; ?>

                    </div>
                    <p> <?php the_sub_field('caption') ?></p>
                </div>

                <?php endwhile ?>
            
            </div>
        </div>
    </section>
    <?php endif; ?>
    <?php get_footer(); ?>