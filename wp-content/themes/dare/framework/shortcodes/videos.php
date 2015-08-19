<?php

function add_video_vimeo($atts) {

	extract(shortcode_atts(array(
		'id' 	=> '',
		'width' => '560',
		'align' => 'center'
	), $atts));
	
	$height=floor($width/1.777);
	$output='<div class="video-container align'.$align.'" style="width:'.$width.'px;"><div class="video-wrap"><iframe src="http://player.vimeo.com/video/'.$id.'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
	
	return $output;
	
}
add_shortcode('vimeo', 'add_video_vimeo');

function add_video_youtube($atts) {

	extract(shortcode_atts(array(
		'id' 	=> '',
		'width' => '560',
		'align' => 'center'
	), $atts));

	$height=floor($width/1.777);
		
	$output='<div class="video-container align'.$align.'" style="width:'.$width.'px;"><div class="video-wrap"><iframe src="https://www.youtube.com/embed/'.$id.'?showinfo=0&theme=light" width="'.$width.'" height="'.$height.'" frameborder="0" allowfullscreen></iframe></div>';
		
	return $output;
	
	
}
add_shortcode('youtube', 'add_video_youtube');



?>