<?php
function add_shortcode_infobox($atts, $content) {

	extract(shortcode_atts(array(
		'style'=> '',
		'buttontext' => '',
		'buttonlink' => ''
	), $atts));

	
	$output='<div class="infobox '.$style.'">';
	
		$output.='<div class="content">';
			$output.=do_shortcode(trim($content));
		$output.='</div>';
		$output.='<div class="action">';
			$output.='<a href="'.$buttonlink.'" class="button small">'.$buttontext.'</a>';
		$output.='</div>';
				
	$output.='</div>';

	return $output;
	
}

add_shortcode('info-box', 'add_shortcode_infobox');
?>
