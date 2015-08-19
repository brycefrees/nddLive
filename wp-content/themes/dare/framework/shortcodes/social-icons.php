<?php
function add_shortcode_socialicons($atts) {

	extract(shortcode_atts(array(
		'skin' => 'light',
		'skype' => '',
		'flickr' => '',
		'twitter' => '',
		'dribbble' => '',
		'facebook' => '',
		'googleplus' => '',
		'forrest' => '',
		'vimeo' => '',
	), $atts));
	$output='';
		
	$output.='<ul class="social-icons '.$skin.'">';
	
		if($skype!='') $output.='<li class="skype"><a href="'.$skype.'"></a></li>';
		if($flickr!='') $output.='<li class="flickr"><a href="'.$flickr.'"></a></li>';
		if($twitter!='') $output.='<li class="twitter"><a href="'.$twitter.'"></a></li>';
		if($dribbble!='') $output.='<li class="dribbble"><a href="'.$dribbble.'"></a></li>';
		if($facebook!='') $output.='<li class="facebook"><a href="'.$facebook.'"></a></li>';
		if($googleplus!='') $output.='<li class="googleplus"><a href="'.$googleplus.'"></a></li>';
		if($forrest!='') $output.='<li class="forrest"><a href="'.$forrest.'"></a></li>';
		if($vimeo!='') $output.='<li class="vimeo"><a href="'.$vimeo.'"></a></li>';

	$output.='</ul>';


	return $output;


}

add_shortcode('social-icons', 'add_shortcode_socialicons');
?>
