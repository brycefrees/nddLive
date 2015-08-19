<?php


function add_shortcode_accordion( $atts, $content ){

	$GLOBALS['pane_count'] = 0;
	
	do_shortcode( $content );
	
	if( is_array( $GLOBALS['panes'] ) ){
	
		foreach( $GLOBALS['panes'] as $tab ){
		
			$panes[] = '<h5><span></span>'.$tab['title'].'</h5><div class="content">'.$tab['content'].'</div>';
		
		}
		$output = '<div class="accordion">'.do_shortcode(implode( "\n", $panes )).'</div>';
		
	}
	
		
	return $output;
	
}

add_shortcode( 'accordion', 'add_shortcode_accordion' );


function add_shortcode_pane( $atts, $content ){

	extract(shortcode_atts(array(
	'title' => 'pane %d'
	), $atts));

	$x = $GLOBALS['pane_count'];
	$GLOBALS['panes'][$x] = array( 'title' => sprintf( $title, $GLOBALS['pane_count'] ), 'content' =>  $content );

	$GLOBALS['pane_count']++;
	
}

add_shortcode( 'pane', 'add_shortcode_pane' );

?>