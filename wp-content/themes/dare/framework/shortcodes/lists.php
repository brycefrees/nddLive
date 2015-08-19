<?php
function add_shortcode_list($atts, $content) {

	extract(shortcode_atts(array(
		'type' => 'arrow',
	), $atts));
	$output='';
		
	return '<ul class="'.$type.'">'.$content.'</ul>';
	
}

add_shortcode('list', 'add_shortcode_list');
?>