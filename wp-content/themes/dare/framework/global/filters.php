<?php

//alow use of shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

function new_excerpt_more($more) {

	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

function mysite_post_class( $classes ) {

	if(is_admin()) return $classes;
	
	if(get_post_type()=='portfolio') {
	
		$terms = get_the_terms( get_the_id(), 'portfolio_category' );
		foreach ($terms as $term) $classes[] ="cat-".$term->term_id;
		
	
	}
	
	return $classes;
	
}

add_filter( 'post_class', 'mysite_post_class', 10 );


function wpex_clean_shortcodes($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );
    $content = strtr($content, $array);
    return $content;
}
add_filter('the_content', 'wpex_clean_shortcodes');


function tf_default_commentform($defaults) {

global $current_user;

	$defaults = array(
		'fields'=> array(		
			'author' => '<p><input id="author" name="author" type="text" placeholder="'. __( 'Name' , THEME_SLUG) .'" size="30"' . $aria_req . ' /></p>',
			'email'  => '<p><input id="email" name="email" type="text" placeholder="'. __( 'Email' , THEME_SLUG) .'" size="30"' . $aria_req . ' /></p>',
		),
		'comment_field'        => '<p><textarea name="comment" id="comment" rows="9" cols="85" placeholder="'. __( 'Your Message' , THEME_SLUG) .'"></textarea></p>',
		'must_log_in'          => '<p class="must-log-in">...',
		'logged_in_as'         => '<p>'.__( 'Logged in as' ).' '.$current_user->display_name.'. <a href="'.wp_logout_url(get_permalink()).'" title="'.__( 'Log out of this account' ).'">'.__( 'Log out' ).'</a></p>',
		'comment_notes_before' => '',
		'comment_notes_after'  => '',
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => '<h5>'.__( 'Leave a comment' , THEME_SLUG).'</h5>',
		'title_reply_to'       => __( 'Leave a reply to %s', THEME_SLUG ),
		'cancel_reply_link'    => __( 'Cancel reply', THEME_SLUG ),
		'label_submit'         => __( 'Publish' , THEME_SLUG),
	);

	return $defaults;

}

add_filter('comment_form_defaults','tf_default_commentform');
	
	

?>