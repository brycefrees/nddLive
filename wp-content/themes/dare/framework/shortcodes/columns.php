<?php

function add_shortcode_column($atts, $content = null, $code) {

	extract(shortcode_atts(array(
		'size' => '',
		'position' => ''
	), $atts));
	$output='';
	
	switch ($size):
		case '1/2':
		case '2/4':
		case '3/6':
			$size='six columns';
		break;
		case '1/3':
		case '2/6':
			$size='four columns';
		break;
		case '2/3':
		case '4/6':
			$size='eight columns';
		break;
		case '1/4':
			$size='three columns';
		break;
		case '3/4':
			$size='nine columns';
		break;
		case '1/6':
			$size='two columns';
		break;
		case '5/6':
			$size='ten columns';
		break;
		default:
			$size='four columns';
		break;
	endswitch;
	
	$output="";
	
	if($position=='last') $p=' last';
	else $p='';
	
	$output.='<div class="'.$size.$p.' ">'.do_shortcode(trim($content)).'</div>';
	
	if($position=='last') $output.='<div class="clear"></div>';

	return $output;
}


add_shortcode('column', 'add_shortcode_column'); 
