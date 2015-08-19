<?php
function add_shortcode_alerts($atts, $content) {

	extract(shortcode_atts(array(
		'type' => 'success',
	), $atts));
	
	return '<div class="alert-'.$type.'">'.$content.'</div>';
	
}

add_shortcode('alert', 'add_shortcode_alerts');
?>
