<?php


function add_shortcode_tabgroup( $atts, $content ){

	global $add_tabs_script;$add_tabs_script=true;

	$GLOBALS['tab_count'] = 0;
	$active=' class="active"';
	
	

	do_shortcode( $content );

	if( is_array( $GLOBALS['tabs'] ) ){
	
		$i=1;
		foreach( $GLOBALS['tabs'] as $tab ){
		
			$tabs[] = '<li><a href="#" class="tab'.$i.'">'.$tab['title'].'</a></li>';			
			$panes[] = '<div class="tab'.$i.' content">'.$tab['content'].'</div>';
			
			$i++;
		}
		$output = '<div class="tabs"><ul>'.implode( "\n", $tabs ).'</ul>'.do_shortcode(implode( "\n", $panes )).'</div>';
		
	}
	
	$output .= '<div class="clear"></div>';
	
	return $output;
	
}

add_shortcode( 'tabgroup', 'add_shortcode_tabgroup' );


function add_shortcode_tab( $atts, $content ){

	extract(shortcode_atts(array(
	'title' => 'Tab %d'
	), $atts));

	$x = $GLOBALS['tab_count'];
	$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' =>  $content );

	$GLOBALS['tab_count']++;
	
}

add_shortcode( 'tab', 'add_shortcode_tab' );

?>