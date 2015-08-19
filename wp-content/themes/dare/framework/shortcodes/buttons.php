<?php
function add_shortcode_button($atts) {

	extract(shortcode_atts(array(
		'color' => '',
		'text' => __('Press Me',THEME_SLUG),
		'link'=> ''
	), $atts));
	$output='';
		
	$output.='<p><a class="button '.$color.'" href="'.$link.'">'.$text.'</a></p>';

	return $output;
	
}

add_shortcode('button', 'add_shortcode_button');
?>
