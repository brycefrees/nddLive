<?php

global $options_post;

$options_post = array();


						
$options_post[] = array( "name" => "Description",
						"class" => "",
						"desc" => "displayed next to the page title",
						"id" => "page_description",
						"type" => "text");
					
$options_post[] = array( "name" => "Custom sidebar",
					"id" => "custom_sidebar",
					"desc" => "select a custom sidebar to display on this page",
					"class" => "display_sidebar display_sidebar_1",
					"type" => "select_sidebar"); 
					
$options_post[] = array( "name" => "Footer select",
					"id" => "custom_footer",
					"desc" => "select a footer to display on this page",
					"type" => "select_footer"); 
					
$options_post[]  = array( "name" => "Layout",
						"class" => "",
						"desc" => "select the layout of this page",
						"id" => "page_layout",
						"options" => array( 
						
							array('url' => THEME_ADMIN_IMG.'/layouts/1.png','desc' => 'default'),
							array('url' => THEME_ADMIN_IMG.'/layouts/2.png','desc' => 'full width'),
							array('url' => THEME_ADMIN_IMG.'/layouts/11.png','desc' => 'right sidebar'),
							array('url' => THEME_ADMIN_IMG.'/layouts/12.png','desc' => 'left sidebar')
						
						),
						"type" => "images"); 
						

function tf_create_metaboxes() {
	global $theme_name;
	global $options_post, $options_page, $options_portfolio, $options_post_format, $options_gallery;
	
	if ( function_exists('add_meta_box') ) {
		add_meta_box( 'aps', 'Post Settings', 'create_meta_options', 'post', 'advanced', 'high', array('var1' => $options_post) );
		add_meta_box( 'aps', 'Page Settings', 'create_meta_options', 'page', 'advanced', 'high', array('var1' => $options_page) );
		add_meta_box( 'aps', 'Project Settings', 'create_meta_options', 'portfolio', 'advanced', 'high', array('var1' => $options_portfolio) );
		add_meta_box( 'meta-box-post-format', 'Post Format Settings', 'create_meta_options', 'post', 'side', 'default', array('var1' => $options_post_format) );
		add_meta_box( 'meta-box-post-format', 'Post Format Settings', 'create_meta_options', 'portfolio', 'side', 'default', array('var1' => $options_post_format) );
		add_meta_box( 'gallery', 'Gallery Settings', 'create_meta_options', 'gallery', 'advanced', 'high', array('var1' => $options_gallery) );

	}
}
add_action('admin_menu', 'tf_create_metaboxes');


function tf_save_meta($post_id) {

	global $post;
	global $options_post, $options_page, $options_portfolio, $options_post_format, $options_gallery;
	
	if(get_post_type( $post )=='post') $options=array_merge($options_post, $options_post_format);
	if(get_post_type( $post )=='page') $options=$options_page;
	if(get_post_type( $post )=='portfolio') $options=array_merge($options_portfolio, $options_post_format);
	if(get_post_type( $post )=='gallery') $options=$options_gallery;
    
	
	$screen=get_current_screen()->id;
	
	if( $screen!='post' && $screen!='page' && $screen!='portfolio' && $screen!='gallery'){
		return $post_id;
	}
	
	// verify nonce
	if(!isset($_POST['mytheme_meta_box_nonce'])) return $post_id;
	
	if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], 'global-functions.php')) {
		return $post_id;
	}
	
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	// check permissions
	if (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
	
	foreach ($options as $option):
	
		$old = get_post_meta($post_id, $option['id']."_value", true);
		$new = $_POST[$option['id']];
		
		if ($new != '' && $new != $old)  update_post_meta($post_id, $option['id']."_value", $new);
		if($new == '' && $option['type']=='toggle') update_post_meta($post_id, $option['id']."_value", 'off'); 
		
		
	endforeach;
	
}
add_action('save_post', 'tf_save_meta');





?>