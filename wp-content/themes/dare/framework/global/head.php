<?php 

function tf_print_styles(){

	if(is_admin()) return false;
	
	wp_enqueue_style('base.css', THEME_CSS.'/base.css');
	
	if(get_theme_option('color_scheme')!='orange') 
		wp_enqueue_style('skin', THEME_CSS.'/'.get_theme_option('color_scheme').'.css');
	
	wp_enqueue_style('skeleton.css', THEME_CSS.'/skeleton.css');
	wp_enqueue_style('prettyPhoto.css', THEME_CSS.'/prettyPhoto.css');
	wp_enqueue_style('responsive-grid.css', THEME_CSS.'/responsive-grid.css');
	

	
}
add_action('wp_print_styles', 'tf_print_styles');

function tf_add_scripts() {
	
	if(is_admin()) return false;
	
	wp_enqueue_script('jquery');
	wp_enqueue_script('modernizr.custom.26887.js', THEME_JS . '/modernizr.custom.26887.js');
	
}
add_action('wp_enqueue_scripts', 'tf_add_scripts');


function tf_print_scripts() {

	if(is_admin()) return false;
	
	wp_enqueue_script('jquery.ui.min.js', THEME_JS . '/jquery.ui.min.js', array('jquery'));
	wp_enqueue_script('jquery.easing.js', THEME_JS . '/jquery.easing.js', array('jquery'));
	wp_enqueue_script('responsiveslides.min.js', THEME_JS . '/responsiveslides.min.js', array('jquery'));
	wp_enqueue_script('jquery.tooltip.js', THEME_JS . '/jquery.tooltip.js', array('jquery'));
	wp_enqueue_script('jquery.placeholder.min.js', THEME_JS . '/jquery.placeholder.min.js', array('jquery'));
	wp_enqueue_script('jquery.prettyPhoto.js', THEME_JS . '/jquery.prettyPhoto.js', array('jquery'));
	wp_enqueue_script('jquery.flexslider-min.js', THEME_JS . '/jquery.flexslider-min.js', array('jquery'));
	wp_enqueue_script('jquery.fitvids.js', THEME_JS . '/jquery.fitvids.js', array('jquery'));
	
	
	global $add_socialite_script;
	if($add_socialite_script) 
		wp_enqueue_script('socialite.min.js', THEME_JS . '/socialite.min.js', array('jquery')); 
	
	global $add_portfolio_script;
	if($add_portfolio_script):
		wp_enqueue_script('isotope.min.js', THEME_JS . '/isotope.min.js', array('jquery'));
		wp_enqueue_script('portfolio-init.js', THEME_JS . '/portfolio-init.js', array('jquery'));
	endif;
		
	global $add_validate_script;
	if ( $add_validate_script ) 
		wp_enqueue_script('jquery-validate', THEME_JS . '/jquery.validate.min.js', array('jquery'));
	
	global $add_tweet_script;
	if ( $add_tweet_script ) 
		wp_enqueue_script('jquery.tweet.js', THEME_JS . '/jquery.tweet.js' , array('jquery'));
	
	global $add_rg_script;
	if ( $add_rg_script ):
		wp_enqueue_script('jquery.gridrotator.js', THEME_JS . '/jquery.gridrotator.js', array('jquery'));
		wp_enqueue_script('jquery.transit.min.js', THEME_JS . '/jquery.transit.min.js', array('jquery'));
	endif;
	
	global $add_gmap_script;
	if ( $add_gmap_script ):
		wp_enqueue_script('jquery.gmap.min.js', THEME_JS . '/jquery.gmap.min.js' , array('jquery'));
		wp_enqueue_script('gmap.sensor', 'http://maps.google.com/maps/api/js?sensor=false' , array('jquery'));
	endif;
	
	if(is_single()) 
		wp_enqueue_script('comment-reply', array('jquery')); 
	
	wp_enqueue_script('custom', THEME_JS . '/custom.js', array('jquery'));
	

	
}
add_action('wp_footer', 'tf_print_scripts');

?>