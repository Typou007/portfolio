        <footer class="footer">
            <div class="wrapper">

            <a href="<?php bloginfo('url'); ?>" class="brand">
                <svg class="icon icon--md">
                    <use xlink:href="#icon-power"></use>
                </svg>
                <?php bloginfo('name'); ?>
            </a>

                <!-- separator -->
                <hr>

                <!-- social -->
        <?php if (have_rows('pw_social', 'options')) : ?>         
            <nav class="nav-social">
                <ul>
                <?php while(have_rows('pw_social', 'options')) : the_row(); ?>

                    <li>
                        <a href="<?php the_sub_field('link', 'options') ?>" class="nav__link <?php the_sub_field('name', 'options') ?>">
                            <svg class="icon icon--md">
                                <use xlink:href="#icon-<?php the_sub_field('name', 'options') ?>"></use>
                            </svg>
                        </a>
                    </li>

                <?php endwhile ?> 
                </ul>
            </nav>
        <?php endif ?>
                <p>Tous droits réservés © <?php echo Date('Y'); ?> <?php bloginfo('name'); ?></p>

            </div>
        </footer>
    <?php wp_footer(); ?>
    </body>
</html>