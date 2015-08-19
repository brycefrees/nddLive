<?php


function add_shortcode_pricing_table( $atts, $content ){

	extract(shortcode_atts(array(
	'count' => '3'
	), $atts));
	
	$GLOBALS['plan_count'] = 0;
	
	do_shortcode( $content );

	if($count==3) $column='four';
	if($count==4) $column='three';

	
	
	if( is_array( $GLOBALS['plans'] ) ):
		
		$i=0;
		foreach( $GLOBALS['plans'] as $plan ):
			
			if($i%$count==0) $pos='alpha';
			elseif($i%$count==$count-1) $pos='omega';
			else  $pos='';
			$i++;
			if($i==1) $type='one';
			if($i==2) $type='two';
			if($i==3) $type='three';
			if($i==4) $type='four';
			
			$plans[] = '<div class="pricing-table package-'.$type.' '.$column.' columns '.$pos.'">';
				$plans[] .= '<div class="title">'.$plan['title'].'</div>';
				$plans[] .= '<div class="price">'.$plan['price'].'<span>'.$plan['per'].'</span></div>';
				$plans[] .= '<ul class="package">';
					$plans[] .=$plan['features'];
				$plans[] .='</ul>';
				$plans[] .='<div class="action"><a href="'.$plan['button_link'].'" class="button light small">'.$plan['button_text'].'</a></div>';
			$plans[] .= '</div>';
			
		endforeach;
		
		$output = implode( "\n", $plans );
		
		
	endif;
	
	return $output;
	
}

add_shortcode( 'pricing-table', 'add_shortcode_pricing_table' );


function add_shortcode_plan( $atts, $content ){

	extract(shortcode_atts(array(
	'title' => 'Professional',
	'price' => '',
	'per' => '',
	'buttontext' => '',
	'buttonlink' => ''
	), $atts));
	
	
	$x = $GLOBALS['plan_count'];
	$GLOBALS['plans'][$x] = array( 'title' => $title, 'price' => $price, 'per'=>$per, 'button_text'=>$buttontext, 'button_link'=>$buttonlink, 'features' =>  $content);
	$GLOBALS['plan_count']++;
	
}

add_shortcode( 'plan', 'add_shortcode_plan' );
?>