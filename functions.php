<?php
/**
 * Theme functions and definitions
 *
 * @package BLOG
 */
define( 'BLOG', '1.0.1' );
define( 'BLOG_DIR', trailingslashit( get_stylesheet_directory() ) );

/**
 * Include methods.php.
 * @since 1.0.1
 */
require_once BLOG_DIR . 'includes/methods.php';


/**
 * By Using this Function Enqueue all the Scripts
 */
add_action( 'wp_enqueue_scripts', 'BLOG_enqueue_scripts', 200 );

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function BLOG_enqueue_scripts() {

	/**
	 * BLOG style.css file
	 */
	// Enqueue CSS Style Sheet
	wp_enqueue_style( 'blog-style', get_stylesheet_directory_uri() . '/style.css',
		array( 'hello-elementor-theme-style' ),
		BLOG
	);

	wp_enqueue_style( 'blog-main', get_stylesheet_directory_uri() . '/assets/css/home.css',
		BLOG
	);

	wp_enqueue_style( 'blog-style-css', get_stylesheet_directory_uri() . '/assets/css/page.css',
		BLOG
	);
	
	if( is_singular( 'post' ) ){
		wp_enqueue_style( 'single-blog-style-css', get_stylesheet_directory_uri() . '/assets/css/single-page.css',
			BLOG
		);	
	}

	wp_enqueue_style( 'header-style', get_stylesheet_directory_uri() . '/assets/css/header.css',
		BLOG
	);

	// Registered JS files
	wp_register_script( 'blog-page-js', get_stylesheet_directory_uri() . '/assets/js/page.js',
		array( 'jquery' ),
		BLOG,
		false
	);

	// Js for Navigation Menu
	wp_register_script( 'menu-navigation', get_stylesheet_directory_uri() . '/assets/js/navigation.js',
		array( 'jquery' ),
		BLOG,
		false
	);

	wp_enqueue_script( 'font-awesome-cdn', 'https://kit.fontawesome.com/7d730d8aef.js', 
		array( 'jquery' ),
		BLOG, 
		false 
	);

	wp_enqueue_script( 'blog-main-js', get_stylesheet_directory_uri() . '/assets/js/main.js',
		array( 
			'jquery',
			// 'blog-page-js',
			'menu-navigation'
		),
		BLOG,
		true
	);
}

add_action( 'after_setup_theme', 'explore_setup' );

if ( ! function_exists( 'explore_setup' ) ) :
	
	function explore_setup() {

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'swb' ),
				'footer_menu' => esc_html__( 'Footer Menu', 'swb' ),
			)
		);

	}

endif;
