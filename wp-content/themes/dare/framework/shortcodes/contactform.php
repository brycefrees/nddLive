<?php
function add_shortcode_contactform($atts) {

	extract(shortcode_atts(array(
		'email' => get_bloginfo('admin_email')
	), $atts));
	$output='';
	
	global $add_validate_script;$add_validate_script = true;
	
	$output.='<form class="contact-form" action="'.THEME_URI.'/mail.php" method="post" novalidate="novalidate">';
		$output.='<p><input type="text" name="name" required="required" placeholder="'.__('Name', THEME_SLUG).'" /></p>';
		$output.='<p><input type="email" name="email" required="required" placeholder="'.__('Email', THEME_SLUG).'" /></p>';
		$output.='<p><textarea rows="8" name="content" required="required" placeholder="'.__('Your Message', THEME_SLUG).'"></textarea></p>';
		$output.='<p><button type="submit">'.__('Submit',THEME_SLUG).'</button></p>';
		$output.='<input type="hidden" value="'.$email.'" name="to" />';
		$output.='<div class="alert-success hidden">'.__('Your message was successfully sent!',THEME_SLUG).'</div>';
	$output.='</form>';

	return $output;

	
	
}

add_shortcode('contactform', 'add_shortcode_contactform');
?>
