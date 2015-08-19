<?php
function add_shortcode_clients($atts) {

	extract(shortcode_atts(array(
		'id' => '',
	), $atts));
	$output='';
		
	$images=tf_get_gallery_images($id);
	
	$output.='<ul class="partners">';
	
		foreach($images as $image):   

		$output.="<li>";
		
			$output.="<a title='".$image['title']."'>";	
		
				$output.="<img class='' src='".theme_resize( get_image_url($image['id']) ,145, 60, false )."'/>";	
			
			$output.="</a>";	
												
		$output.="</li>";

	endforeach; 

	$output.='</ul>';
				
	return $output;

	
}

add_shortcode('clients', 'add_shortcode_clients');
?>
