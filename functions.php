<?php
/**
 * Chictonic functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Chictonic
 */

if ( ! function_exists( 'chictonic_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function chictonic_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Chictonic, use a find and replace
	 * to change 'chictonic' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'chictonic', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'header-menu' => esc_html__( 'Header Menu', 'chictonic' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'chictonic_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'chictonic_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function chictonic_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'chictonic_content_width', 640 );
}
add_action( 'after_setup_theme', 'chictonic_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function chictonic_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'chictonic' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'chictonic' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'chictonic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function chictonic_scripts() {
	
	 wp_register_style('googleFonts', 'https://fonts.googleapis.com/css?family=Orbitron:400,900)');
            wp_enqueue_style( 'googleFonts');
	wp_enqueue_style( 'chictonic-style', get_stylesheet_uri() );

	wp_enqueue_script( 'chictonic-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'chictonic-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script('flexslider', get_stylesheet_directory_uri() . '/js/flex-slider/jquery.flexslider.js', array('jquery'), '2.6.1', true);
	wp_enqueue_script('flexslider-min', get_stylesheet_directory_uri() . '/js/flex-slider/jquery.flexslider-min.js', array('jquery'), '2.6.1', true);
	wp_enqueue_style( 'flexslider-css', get_stylesheet_directory_uri() . '/js/flex-slider/flexslider.css');
	
	/* jsSocials plugin for social media icons*/
	wp_enqueue_script('jssocial', get_stylesheet_directory_uri() . '/js/js-socials/jssocials.js', array('jquery'), '1.2.1', true);
	wp_enqueue_script('jssocials-min', get_stylesheet_directory_uri() . '/js/js-socials/jssocials.min.js', array('jquery'), '1.2.1', true);
	wp_enqueue_style( 'jssocial-css', get_stylesheet_directory_uri() . '/js/js-socials/jssocials.css');
	wp_enqueue_style( 'jssocial-css-classic', get_stylesheet_directory_uri() . '/js/js-socials/jssocials-theme-classic.css');
	
	/*Scroll up bar */
	wp_enqueue_script('scrollup', get_stylesheet_directory_uri() . '/js/scroll-up-bar/dist/scroll-up-bar.js', array('jquery'), '0.3.0', true);
	wp_enqueue_script('scrollup-min', get_stylesheet_directory_uri() . '/js/scroll-up-bar/dist/scroll-up-bar.min.js', array('jquery'), '0.3.0', true);
	
	wp_enqueue_script('my-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'chictonic_scripts' );

$values = array(
	'width'         => 500,
	'height'        => 500,
	'default-image' => get_template_directory_uri() . '/images/header-default.jpg',
);
add_theme_support( 'custom-header', $values );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
