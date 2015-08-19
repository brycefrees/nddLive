<?php


function add_shortcode_testimonials( $atts, $content ){


	global $add_tabs_script;$add_tabs_script=true;

	$GLOBALS['testimonial_count'] = 0;
	
	do_shortcode( $content );

	if( is_array( $GLOBALS['testimonials'] ) ){
	
		foreach( $GLOBALS['testimonials'] as $testimonial ){
		
			$tesimonials[] = '<div class="testimonial"><div class="testimonial-content">'.$testimonial['content'].'</div><div class="testimonial-author">'.$testimonial['author'].'</div></div>';
		
		}
		$output = '<div class="testimonials-wrapper">'.do_shortcode(implode( "\n", $tesimonials )).'<div class="testimonial-next"></div><div class="testimonial-prev"></div></div>';
		
	}
	
	return $output;	
	
}

add_shortcode( 'testimonial-group', 'add_shortcode_testimonials' );


function add_shortcode_tesimontial( $atts, $content ){

	extract(shortcode_atts(array(
	'author' => ''
	), $atts));

	$x = $GLOBALS['testimonial_count'];
	$GLOBALS['testimonials'][$x] = array( 'author' => sprintf( $author, $GLOBALS['testimonial_count'] ), 'content' =>  $content );

	$GLOBALS['testimonial_count']++;
	
}

add_shortcode( 'testimonial', 'add_shortcode_tesimontial' );

?>