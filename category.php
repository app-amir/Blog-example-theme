<?php get_header();

    $blog_category = get_queried_object();
    
    $category_name = $blog_category->name; ?>

    <section class="u-clearfix u-section-1 cat-section" id="sec-bf03">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <ul class="u-align-center u-text u-text-1 cate-ul">
                <li><a href="<?php echo home_url();?>">Home</a> <i class="fas fa-angle-double-right"></i></li>
                <li><?php echo esc_html( $category_name ); ?></li>
            </ul>
        </div>
    </section>

    <section class="u-clearfix u-grey-10 u-section-1" id="sec-ee3e">
        <div class="u-clearfix u-sheet u-sheet-1">
            <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                    <div class="u-layout-row">
                        <!-- Left Section -->
                        <div class="u-container-style u-layout-cell u-size-42 u-layout-cell-1">
                            <div class="u-container-layout u-container-layout-1">

                                <div class="u-container-style u-expanded-width u-grey-15 u-group u-group-1">
                                    <div class="u-container-layout u-container-layout-2">
                                        <h1 class="u-text u-text-1"><?php echo esc_html( $category_name ); ?></h1>
                                    </div>
                                </div><?php

                                // WP_Query arguments
                                $taxonomy = 'category'; 
                                $args=array(
                                    'tax_query' => array( 
                                        array(
                
                                            'taxonomy' => $taxonomy,
                                            'field'    => 'id',
                                            'terms'    => $blog_category,
                                        ),
                                    ),
                                    'post_type'         => 'post',
                                    'post_status'       => 'publish',
                                    'posts_per_page'    => -1,
                                    'order'             => 'ASC',
                                );

                                $the_query = new WP_Query( $args );
                                        
                                if( $the_query->have_posts() ) :?>

                                    <!-- Repeated Section -->
                                    <section class="u-clearfix u-grey-10 u-section-2" id="sec-0939">
                                        <div class="u-clearfix u-sheet u-sheet-1">
                                            <div class="u-expanded-width u-layout-grid u-list u-list-1">
                                                <div class="u-repeater u-repeater-1"><?php
                                                    while ( $the_query->have_posts() ) : $the_query->the_post();

                                                        $blog_title     = get_the_title();
                                                        $blog_link      = get_the_permalink();
                                                        $blog_excerpt   = get_the_excerpt();
                                                        $author_id      = $post->post_author;
                                                        $category_name  = get_the_category();
                                                        $blog_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' ); 

                                                        if( $blog_img ) :
                                                            $post_thumbnail = $blog_img[0];
                                                        else :
                                                            $post_thumbnail = get_stylesheet_directory_uri(). '/assets/img/background.png';
                                                        endif; ?>

                                                        <div class="u-container-style u-list-item u-repeater-item u-white u-list-item-1">
                                                            <div class="u-container-layout u-similar-container u-container-layout-1">
                                                                
                                                                <img alt="<?php echo esc_html( $blog_title ); ?>" class="u-expanded-width u-image u-image-default u-image-1" data-image-width="2000" data-image-height="1333" src="<?php echo esc_url( $post_thumbnail ); ?>">
                                                                
                                                                <h2 class="u-text u-text-1"><a href="<?php echo esc_url( $blog_link ); ?>"><?php echo __( $blog_title ); ?></a></h2>
                                                                
                                                                <ul class="u-text u-text-3">

                                                                    <!-- <li><a href="">Leave a comment</a></li> / -->
                                                                    <?php

                                                                    foreach( $category_name as $name ) : ?>
                                                                        
                                                                        <li><a href="<?php echo esc_url( get_category_link( $name ) ); ?>"><?php echo esc_html( $name->cat_name );?></a></li> /
                                                                    
                                                                    <?php endforeach; ?>
                                                                    <li><?php echo esc_html_e( 'By ', 'swb' ); ?><a href="<?php echo get_author_posts_url( $author_id ); ?>"><?php the_author_meta( 'display_name' , $author_id ); ?></a></li>
                                                                
                                                                </ul>
                                                                
                                                                <div class="u-heading-font u-text u-text-4"> <?php echo wpautop( $blog_excerpt ); ?></div>

                                                                <a href="<?php echo esc_url( $blog_link ); ?>" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-none u-text-palette-1-base u-btn-1"><?php echo esc_html_e( 'Read More', 'swb' ); ?> <i class="double-arrow fas fa-angle-double-right"></i></a>
                                                            </div>
                                                        </div>
                                                    <?php endwhile; ?>

                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                <?php endif; ?>
                                
                            </div>
                        </div>
                        <!-- Right Side Bar -->
                        
                        <div class="u-container-style u-layout-cell u-shape-rectangle u-size-18 u-layout-cell-2">
                            <div class="u-container-layout u-container-layout-2"><?php

                                // WP_Query arguments
                                $args = array(
                                    'post_type'         => 'post',
                                    'orderby'           => 'title',
                                    'order'             => 'DESC',
                                );

                                $the_query = new WP_Query( $args );
                                        
                                if( $the_query->have_posts() ) :?>

                                    <div class="u-container-style u-expanded-width u-group u-white u-group-1">
                                        <div class="u-container-layout u-container-layout-3">
                                            <h3 class="u-text u-text-2"><?php esc_html_e( 'Recents Posts', 'swb' ); ?></h3>
                                            <ul class="u-text u-text-3"><?php
                                                while ( $the_query->have_posts() ) : $the_query->the_post();

                                                    $blog_title = get_the_title();
                                                    $blog_link  = get_the_permalink(); ?>

                                                    <li><a href="<?php echo esc_url( $blog_link ); ?>"><?php echo esc_html( $blog_title ); ?></a></li>
                                                <?php endwhile; ?>
                                            </ul>
                                        </div>
                                    </div>

                                <?php endif; ?>

                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        
        </div>

    </section>

<?php get_footer();