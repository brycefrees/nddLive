<?php
function add_shortcode_tooltip($atts, $content) {

	extract(shortcode_atts(array(
		'text' => '',
	), $atts));
		
	return '<a href="#" class="tooltip-top" title="'.$text.'">'.$content.'</a>';
	
}

add_shortcode('tooltip', 'add_shortcode_tooltip');
?>