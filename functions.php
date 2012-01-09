<?php

// Lets do this right:
add_action( 'after_setup_theme', 'html5_setup' );

if ( ! function_exists( 'html5_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function html5_setup() {

// Translations can be filed in the /languages/ directory
load_theme_textdomain( 'html5reset', TEMPLATEPATH . '/languages' );
	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable($locale_file) )
	require_once($locale_file);
	
// Add RSS links to <head> section
	add_theme_support('automatic-feed-links');
	
// Load jQuery
	function html5_scripts() {
		wp_enqueue_script('jquery');
	}
add_action('wp_enqueue_scripts', 'html5_scripts');

// Add 3.1 post format theme support.
	add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video')); 

// This theme uses Featured Images
	add_theme_support( 'post-thumbnails' );
	
//This theme uses wp_nav_menus() for the header menu, utility menu and footer menu.
	register_nav_menus( array(
		'utility' 	=> __( 'Utility Menu', 'themename' ),
		'primary' 	=> __( 'Primary Menu', 'themename' ),
		'footer' 	=> __( 'Footer Menu', 'themename' ),
	) );
}
endif; // html5_setup

// Clean up the <head>
remove_action('wp_head', 'wp_generator');
if (function_exists('register_sidebar')) {
    register_sidebar(array(
    	'name' 			=> __('Sidebar Widgets','html5reset' ),
    	'id'   			=> 'sidebar-widgets',
    	'description'   => __( 'These are widgets for the sidebar.','html5reset' ),
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget'  => '</div>',
    	'before_title'  => '<h2>',
    	'after_title'   => '</h2>'
    ));
}
    

?>