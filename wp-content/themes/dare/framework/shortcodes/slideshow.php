<?php
function add_shortcode_slideshow($atts) {

	extract(shortcode_atts(array(
		'gallery' => '',
		'width' => '400',
		'height'=> '200',
		'align' => 'center'
	), $atts));
	
	$images=tf_get_gallery_images($gallery);
	
	$output='';
			
	if($align=='center' || $align=='none') $max_width='style="max-width:'.$width.'px"';
	else $max_width='';
	
	$output.='<div class="slideshow-wrap align'.$align.'" '.$max_width.'>';

		$output.="<ul class='slideshow'>";
						
		foreach($images as $image):   

			$output.="<li>";
			
				$output.="<img class='scale-with-grid' src='".theme_resize( $image['src'] ,$width, $height, true )."'/>";	
													
			$output.="</li>";

		endforeach; 
	
		$output.="</ul>";
			
	$output.="</div>";
	
	return $output;
	
}

add_shortcode('slideshow', 'add_shortcode_slideshow');
?>
