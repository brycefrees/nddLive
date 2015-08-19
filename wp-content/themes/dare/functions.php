<?php

//constants
define('THEME_NAME', 'Dare');
define('THEME_SLUG', 'dare');
define('THEME_DIR', get_template_directory());
define('THEME_URI', get_template_directory_uri());
define('THEME_IMG', THEME_URI . '/images');
define('THEME_CSS', THEME_URI . '/css');
define('THEME_JS', THEME_URI . '/js');
define('THEME_INCLUDES', THEME_URI . '/includes');

define('THEME_FRAMEWORK', THEME_DIR . '/framework');
define('THEME_GLOBAL', THEME_FRAMEWORK . '/global');
define('THEME_CUSTOM_TYPES', THEME_FRAMEWORK . '/custom-post-types');
define('THEME_WIDGETS', THEME_FRAMEWORK . '/widgets');
define('THEME_SHORTCODES', THEME_FRAMEWORK . '/shortcodes');

define('THEME_ADMIN', THEME_FRAMEWORK . '/admin');
define('THEME_ADMIN_URI', THEME_URI . '/framework/admin');
define('THEME_ADMIN_CSS', THEME_ADMIN_URI . '/css');
define('THEME_ADMIN_JS', THEME_ADMIN_URI . '/js');
define('THEME_ADMIN_IMG', THEME_ADMIN_URI . '/img');
define('THEME_ADMIN_OPTIONS', THEME_ADMIN . '/options');
define('THEME_ADMIN_METABOXES', THEME_ADMIN . '/metaboxes');



load_theme_textdomain( THEME_SLUG, THEME_DIR . '/languages' ); 

//supports
function tf_theme_setup() {


	register_nav_menu('main_nav', THEME_NAME . ' Navigation');
	register_nav_menu('footer_nav', THEME_NAME . ' Footer Navigation');
	
	add_theme_support('post-thumbnails', array('post', 'portfolio'));
	add_theme_support('automatic-feed-links');
	add_theme_support( 'post-formats', array( 'gallery','image','video'));

	add_post_type_support('portfolio', 'post-formats');
	
	add_filter('wp_default_editor', create_function('', 'return "html";'));
	if ( ! isset( $content_width ) ) $content_width = 960;
	

	
}
add_action( 'after_setup_theme', 'tf_theme_setup' );




//theme functions
require_once (THEME_GLOBAL . '/head.php');
require_once (THEME_GLOBAL . '/functions.php');
require_once (THEME_GLOBAL . '/get-option.php');
require_once (THEME_GLOBAL . '/filters.php');
require_once (THEME_GLOBAL . '/resize.php');
require_once(THEME_FRAMEWORK . '/theme-update/class-pixelentity-theme-update.php');


//custom post types
require_once (THEME_CUSTOM_TYPES . '/gallery.php');
require_once (THEME_CUSTOM_TYPES . '/portfolio.php');

//admin
require_once (THEME_ADMIN_METABOXES . '/post.php');
require_once (THEME_ADMIN_METABOXES . '/post-formats.php');
require_once (THEME_ADMIN_METABOXES . '/page.php');
require_once (THEME_ADMIN_METABOXES . '/portfolio.php');
require_once (THEME_ADMIN_METABOXES . '/gallery.php');
require_once (THEME_ADMIN_METABOXES . '/shortcodes.php');
require_once (THEME_ADMIN_METABOXES . '/attachment.php');

// Custom functions and plugins
require_once (THEME_ADMIN . '/admin-functions.php');

// Admin Interfaces (options,framework, seo)		
require_once (THEME_ADMIN . '/admin-interface.php');		

// Options panel settings and custom settings
require_once (THEME_ADMIN . '/theme-options.php'); 
require_once (THEME_ADMIN . '/global-functions.php');
require_once (THEME_ADMIN . '/head.php');


//shortcodes
require_once (THEME_SHORTCODES . '/accordion.php');
require_once (THEME_SHORTCODES . '/alert.php');
require_once (THEME_SHORTCODES . '/blog.php');
require_once (THEME_SHORTCODES . '/buttons.php');
require_once (THEME_SHORTCODES . '/clients.php');
require_once (THEME_SHORTCODES . '/portfolio.php');
require_once (THEME_SHORTCODES . '/pricing-table.php');
require_once (THEME_SHORTCODES . '/columns.php');
require_once (THEME_SHORTCODES . '/contactform.php');
require_once (THEME_SHORTCODES . '/images.php');
require_once (THEME_SHORTCODES . '/info-box.php');
require_once (THEME_SHORTCODES . '/lists.php');
require_once (THEME_SHORTCODES . '/tabs.php');
require_once (THEME_SHORTCODES . '/team.php');
require_once (THEME_SHORTCODES . '/testimonials.php');
require_once (THEME_SHORTCODES . '/tooltips.php');
require_once (THEME_SHORTCODES . '/slideshow.php');
require_once (THEME_SHORTCODES . '/social-icons.php');
require_once (THEME_SHORTCODES . '/typography.php');
require_once (THEME_SHORTCODES . '/videos.php');



add_action( 'widgets_init', 'register_theme_widgets' ); 

function register_theme_widgets() {  
  
	register_widget('Theme_Widget_Popular_Posts');  
	register_widget('Theme_Widget_Recent_Posts');  
	register_widget('Theme_Widget_Related_Posts');  
	register_widget('Theme_Widget_Twitter');  
	
}  

//widgets
require_once (THEME_WIDGETS . '/popular.php');
require_once (THEME_WIDGETS . '/recent.php');
require_once (THEME_WIDGETS . '/related.php');
require_once (THEME_WIDGETS . '/twitter.php');
?>