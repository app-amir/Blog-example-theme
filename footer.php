<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Blog Website
 */

?>

    <footer class="u-align-center u-clearfix u-custom-color-2 u-footer u-footer" id="sec-b7b2">
        <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
            <div class="u-layout">
                <div class="u-layout-row">
                    <div class="u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-1">
                        <div class="u-container-layout u-container-layout-1">
                            <h2 class="u-custom-font u-font-roboto u-text u-text-1"><?php esc_html_e( 'Categories', 'swb' ); ?></h2><?php
                            $args = array(
                                'post_type'	=>	'post',
                                'taxonomy'	=>	'category',
                            );
                            $categories = get_categories( $args ); ?>
                            <ul class="u-custom-font u-heading-font u-spacing-2 u-text u-text-2"><?php 
                                foreach ( $categories as $category ) { ?>
                                    <li><a href="<?php echo esc_url( get_category_link( $category ) ); ?>"><?php echo esc_html( $category->name ); ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-2">
                        <div class="u-container-layout u-valign-top u-container-layout-2">
                            <h2 class="u-custom-font u-font-roboto u-text u-text-3"><?php esc_html_e( 'Recent Blog Posts', 'swb' ); ?></h2><?php 
                            $args = array(
                                'post_type'         => 'post',
                                'orderby'           => 'title',
                                'order'             => 'DESC',
                            );

                            $the_query = new WP_Query( $args );
                                    
                            if( $the_query->have_posts() ) : ?>

                                <ul class="u-custom-font u-heading-font u-spacing-2 u-text u-text-4 recent-posts-section"><?php 
                                    while ( $the_query->have_posts() ) : $the_query->the_post();

                                        $blog_title = get_the_title();
                                        $blog_link  = get_the_permalink(); ?>

                                        <li><a href="<?php echo esc_url( $blog_link ); ?>"><?php echo esc_html( $blog_title ); ?></a></li>
                                    <?php endwhile; ?>
                                </ul>

                            <?php endif ?>
                        </div>
                    </div>
                    <div class="u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-3">
                        <div class="u-container-layout u-container-layout-3">
                            <h2 class="u-custom-font u-font-roboto u-text u-text-5">Categories</h2>
                            <nav id="site-navigation" class="main-navigation">
                                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'explore' ); ?></button><?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'footer_menu',
                                        'menu_id'        => 'foot-menu',
                                    )
                                ); ?>
                            </nav><!-- #site-navigation -->
                        </div>
                    </div>
                    <div class="u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-4">
                        <div class="u-container-layout u-container-layout-4">
                            <h2 class="u-custom-font u-font-roboto u-text u-text-7"><?php esc_html_e( 'Affiliate Disclosure', 'swb' ); ?></h2>
                            <p class="u-heading-font u-text u-text-8"><?php esc_html_e( 'LatestComputerGadgets.com is a participant in the Amazon Services LLC Associates Program, an affiliate advertising program designed to provide a means for sites to earn advertising fees by advertising and linking to amazon.com.', 'swb' ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="u-border-3 u-border-custom-color-3 u-expanded-width u-line u-line-horizontal u-line-1"></div>
        <div class="u-container-style u-custom-color-2 u-group u-group-1">
            <div class="u-container-layout u-container-layout-5">
                <p class="u-align-center u-heading-font u-text u-text-9">Copyright &copy; <?php echo date("Y"); ?> Simple Blog Website<br>Designed By <a href="<?php echo esc_url( 'https://amir-production.com/'); ?>">Amir Production</a>
                </p>
            </div>
        </div>
    </footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
