<footer>
    <div class="footer-container">
        <div class="footer_info">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/logo_footer.png" alt="un A et un B qui sont fusionnés">
                    </a>
                <div class="separateur">
                    <div class="one">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/svg/bar1.svg" alt="">
                    </div>
                    <div class="two">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/svg/bar2.svg" alt="">
                    </div>
                        
                </div>   
                <div class="sociale">
                    <?php if (have_rows('sociaux', 'options')) : ?>
                        <div class="u-grid-fullwitdh">
                            <div class="etage">
                                <?php while(have_rows('sociaux', 'options')) : the_row(); ?>
                                    <a class="arriere" href="<?php the_sub_field('lien', 'options') ?>" class="nav__link <?php the_sub_field('reseau', 'options') ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="84" height="96" viewBox="0 0 84 96" fill="none">
                                            <path d="M1.91792 25.1281L41.904 2.1001L81.8902 25.1281V71.1775L41.904 94.2054L1.91792 71.1775V25.1281Z" fill="#B5B5B5" fill-opacity="0.6" stroke="#25113E" stroke-width="3"/>
                                        </svg>
                                        <div class="appli">
                                            <svg class="icon icon-xl">
                                                <use xlink:href="#icon-<?php the_sub_field('reseau', 'options') ?>"></use>
                                            </svg>
                                        </div>     
                                    </a>
                                <?php endwhile ?>
                            </div> 
                        </div>
                    <?php endif ?>
                </div>
        </div>

        <div class="copy"> Copyright © <?php echo Date('Y'); ?>  <?php wp_title('|', true, 'right') ?> | <?php bloginfo('name'); ?>. Tous droits réservés. Reproduction interdite sans autorisation préalable.</div>
</footer>
</body>
</html>
