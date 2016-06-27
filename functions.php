<?php
/**
 *  Starter functions.
 */

if ( ! function_exists( 'mikhail_setup' ) ) :

function starter_setup() {

	//Enable languages
	load_theme_textdomain( 'starter', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	//Document title
	add_theme_support( 'title-tag' );

	//Post thumbnails
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'starter' ),
	) );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	remove_post_type_support('page', 'editor');

	//Post formats
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'status'
	) );

	//Custom logo
	// add_theme_support( 'custom-logo', array(
	//    'height'      => 125,
	//    'width'       => 400,
	//    'flex-height' => false
	// ) );


}
endif;
add_action( 'after_setup_theme', 'starter_setup' );


/*
 * Theme script and styles
 */
function starter_scripts() {

	//Stylesheet
	wp_enqueue_style( 'starter-style', get_stylesheet_uri() );

	//Normalize
	wp_enqueue_style( 'starter-normalize', get_stylesheet_directory_uri() . '/styles/normalize.css', array(), '4.1.1' );

	//Fonts from google fonts.
	wp_enqueue_style( 'starter-google-fonts', '');

	//Custom js file
	wp_enqueue_script( 'starter-customjs', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '1.0.0', true );

	//Navigation js
	wp_enqueue_script( 'starter-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '1.0.0', true );

	//Adding Font Awesome
	wp_enqueue_style( 'starter-fontawesome', get_template_directory_uri() . '/styles/font-awesome.min.css', array(), '4.6.3' );	

	//Include masonry
	wp_enqueue_script( 'starter-masonry', get_stylesheet_directory_uri() . '/js/masonry.pkgd.js', array(), '4.0.0', true );


}
add_action( 'wp_enqueue_scripts', 'starter_scripts');


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function starter_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'starter' ),
			'id'            => 'sidebar-1',
			'description'   => '',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'starter_widgets_init' );



//Remove nodes from the admin toolbar
function starter_remove_nodes( $wp_admin_bar ) {
	// $wp_admin_bar->remove_node( 'comments' );
}
add_action( 'admin_bar_menu', 'starter_remove_nodes', 999 );

//Remove menus from the admin-menu
function starter_remove_menus(){
  // remove_menu_page( 'edit-comments.php' );          //Comments
  // remove_menu_page( 'users.php' );                  //Users
  // remove_menu_page( 'tools.php' );                  //Tools
}
add_action( 'admin_menu', 'starter_remove_menus' );



/**
 * Customizer additions.
 */
require get_template_directory() . '/customizer.php';

/**
 * Custom template funtions
 */
require get_template_directory() . '/template-functions.php';




?>