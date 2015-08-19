<?php

function add_shortcode_blockquote($atts, $content = null) {

	return	'<blockquote>'.$content.'</blockquote>';

}
add_shortcode('blockquote', 'add_shortcode_blockquote');

function add_shortcode_dropcap($atts) {

	extract(shortcode_atts(array(
		'letter' => '',
		'icon' => '',
		'color' => '',
		'size' => ''
	), $atts));
	
	if($size=='big') { $size='a'; $color=''; $icon=''; }
	
	return '<span class="dropcap '.$icon.' '.$color.' '.$size.'">'.$letter.'</span>';
}
add_shortcode('dropcap', 'add_shortcode_dropcap');

function add_shortcode_highlight($atts, $content = null) {

	extract(shortcode_atts(array(
		'color' => ''
	), $atts));

	return '<span class="highlight '.$color.'">'.do_shortcode($content).'</span>';
}
add_shortcode('highlight', 'add_shortcode_highlight');


