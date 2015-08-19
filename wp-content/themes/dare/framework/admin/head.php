<?php

function add_admin_scripts() {

	wp_enqueue_script('jquery');

	wp_enqueue_style( 'admin-style', THEME_ADMIN_CSS.'/admin-style.css');
	
	$screen=get_current_screen()->id;
	
	if( $screen=='post' || $screen=='portfolio' ){
	
		wp_enqueue_script('metabox-pf', THEME_ADMIN_JS.'/metabox-pf.js', array('jquery'));
	
	}
	
	if( $screen=='page'){
	
		wp_enqueue_script('metabox-page', THEME_ADMIN_JS.'/metabox-page.js', array('jquery'));
	
	}

	if( $screen=='post' || $screen=='page' || $screen=='portfolio' ){

		
		wp_enqueue_script('farbtastic', array('jquery'));
		wp_enqueue_script('jqueryrange',THEME_ADMIN_JS.'/jquery.tools.min.js', array('jquery'));
		wp_enqueue_script('jquery.ibutton.min.js', THEME_ADMIN_JS.'/jquery.ibutton.min.js', array('jquery'));
		wp_enqueue_script('global', THEME_ADMIN_JS.'/global.js', array('jquery'));
		wp_enqueue_script('shortcodes', THEME_ADMIN_JS.'/shortcodes.js', array('jquery'));
		
		wp_enqueue_style( 'farbtastic-css', THEME_ADMIN_CSS.'/farbtastic.css');
		wp_enqueue_style( 'jquery.ibutton.css', THEME_ADMIN_CSS.'/jquery.ibutton.css');

	}
	
	if( $screen=='gallery'){
	
		wp_enqueue_script('jquery-ui-sortable', array('jquery'));
		wp_enqueue_script('metabox-gallery.js', THEME_ADMIN_JS.'/metabox-gallery.js', array('jquery'));
	
	}
	
	if( $screen=='toplevel_page_optionsframework'){

		wp_enqueue_script('ajaxupload', THEME_ADMIN_JS.'/ajaxupload.js', array('jquery'));
		wp_enqueue_script('admin-js', THEME_ADMIN_JS.'/admin.js', array('jquery'));
		wp_enqueue_script('farbtastic', array('jquery'));
		wp_enqueue_script('jqueryrange',THEME_ADMIN_JS.'/jquery.tools.min.js', array('jquery'));
		wp_enqueue_script('jquery.ibutton.min.js', THEME_ADMIN_JS.'/jquery.ibutton.min.js', array('jquery'));
		wp_enqueue_script('global', THEME_ADMIN_JS.'/global.js', array('jquery'));
		
		wp_enqueue_style( 'farbtastic-css', THEME_ADMIN_CSS.'/farbtastic.css');
		wp_enqueue_style( 'jquery.ibutton.css', THEME_ADMIN_CSS.'/jquery.ibutton.css');
		

	}
		
}

add_action('admin_enqueue_scripts', 'add_admin_scripts');

?>