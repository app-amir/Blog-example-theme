<?php get_header(); ?>

<div class="wrapper"><?php

    $blog_title     = get_the_title();
    $blog_excerpt   = get_the_excerpt();
    $author_id      = $post->post_author;
    $category_name  = get_the_category();
    $blog_time      = get_the_time("M j, Y"); 
    $blog_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' ); 

    if( $blog_img ) :
        $post_thumbnail = $blog_img[0];
    else :
        $post_thumbnail = get_stylesheet_directory_uri(). '/assets/img/background.png';
    endif;?>

    <section class="u-clearfix u-section-1" id="sec-bf03">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <ul class="u-align-center u-text u-text-1">
                <li><a href="<?php echo home_url();?>">Home</a> <i class="fas fa-angle-double-right"></i></li><?php
                        
                foreach( $category_name as $name ) : ?>

                    <li><a href="<?php echo esc_url( get_category_link( $name ) ); ?>" class="blog-cat-title"><?php echo esc_html( $name->cat_name );?></a> <i class="fas fa-angle-double-right"></i></li>
                    
                <?php endforeach; ?>
                <li><?php echo esc_html( $blog_title ); ?></li>
            </ul>
      </div>
    </section>
    <section class="u-clearfix u-grey-10 u-section-2" id="sec-9bf1">
        <div class="u-clearfix u-sheet u-sheet-1">
            <div class="u-container-style u-expanded-width u-group u-white u-group-1">
                <div class="u-container-layout u-container-layout-1">
                    <h1 class="u-text u-text-1"><?php echo esc_html( $blog_title ); ?></h1>
                    <ul class="u-text u-text-2 single-breadcrum">
                        <?php foreach( $category_name as $name ) : ?>
                            <li><a href="<?php echo esc_url( get_category_link( $name ) ); ?>" class="blog-cat-title"><?php echo esc_html( $name->cat_name );?></a></li> /
                        <?php endforeach; ?>

                        <li><?php echo esc_html_e( 'By ', 'swb' ); ?><a href="<?php echo get_author_posts_url( $author_id ); ?>"><?php the_author_meta( 'display_name' , $author_id ); ?></a></li> /
                        <li><?php echo esc_html( $blog_time ); ?></li>
                    </ul>
                    <p class="u-text u-text-3"><?php echo wpautop( $blog_excerpt ); ?></p>
                    <img class="u-expanded-width u-image u-image-default u-image-1" src="<?php echo esc_url( $post_thumbnail ); ?>" alt="<?php echo esc_html( $blog_title ); ?>" data-image-width="400" data-image-height="265">
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>