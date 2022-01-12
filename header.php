<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package Blog Website
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

    <section class="u-clearfix u-section-2" id="sec-46c0">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                    <div class="u-layout-row">
                        <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                            <div class="u-container-layout u-valign-middle u-container-layout-1 head-section-logo">
                                <?php the_custom_logo(); ?> 
                            </div>
                        </div>
                        <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                            <div class="u-container-layout u-valign-middle u-container-layout-2">
                                <nav id="site-navigation" class="main-navigation">
                                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'explore' ); ?></button>
                                    <?php
                                    wp_nav_menu(
                                        array(
                                            'theme_location' => 'menu-1',
                                            'menu_id'        => 'primary-menu',
                                        )
                                    );
                                    ?>
                                </nav><!-- #site-navigation -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	
