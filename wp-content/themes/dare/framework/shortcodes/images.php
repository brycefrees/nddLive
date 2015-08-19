<?php

function add_shortcode_image($atts) {

	extract(shortcode_atts(array(
		'url' => '',
		'width' => '500',
		'height' => '300',
		'align' => 'none',
		'lightbox' => 'no',
		'link' => '',
		'keep_aspect_ratio'=> 'yes'
	), $atts));
	$output='';
	
	

	if($link==''):
	
		if($lightbox=='yes') $href=$url; 
		else $href=''; 
	
	else:
	
		if($lightbox=='yes') $href=$link; 
		else $href=$link; 
	
	endif;
	
	if($lightbox=='yes') $lightbox='rel="prettyPhoto"';
	if($lightbox=='yes' && $link=='') $link=$url;
	
	if($align=='center' || $align=='none') $figure_width='style="max-width:'.$width.'px"';
	else $figure_width='';
	
	if($keep_aspect_ratio=='yes') $keep_aspect_ratio=false;
	else $keep_aspect_ratio=true;
	
	
	$output .= '<figure class="align'.$align.'" '.$figure_width.'>';
		
		if($href!='') $output .= '<a '.$lightbox.' href="'.$href.'">';
		
			$output .= '<img class="scale-with-grid" src="'.theme_resize( $url ,$width, $height, $keep_aspect_ratio ).'"/>';

			if($href!='') $output.='<span class="hover"></span>';	
			
		if($href!='') $output .= '</a>';
			
	$output .='</figure>';		


	return $output;
	
}

add_shortcode('image', 'add_shortcode_image');

