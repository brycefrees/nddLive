<?php

global $options_post_format;

$options_post_format = array();

$options_post_format[] = array( "name" => "Image Height",
						"class" => "pf pf_image pf_0",
                        "desc" => "the height of the featured image (leave 0 to keep aspect ratio)",
						"id" => "pf_image_height",
						"std" => "0","min" => "0","max" => "800","step" => "1",
						"unit" => 'px',
						"type" => "range");	

$options_post_format[] = array( "name" => "Slideshow height",
						"class" => "pf pf_gallery",
                        "desc" => "the height of the slideshow in pixels (you can leave 10 if all images gave the same width and height)",
						"id" => "pf_slideshow_height",
						"std" => "350",
						"min" => "0","max" => "800","step" => "1","unit" => 'px',
						"type" => "range");						
						

$options_post_format[] = array( "name" => "Select gallery",
						"class" => "pf pf_gallery",
                        "desc" => "the gallery that will be used for this post format",
						"id" => "pf_gallery",
						"type" => "select_slideshow");						
						
$options_post_format[] = array( "name" => "Video type",
						"class" => "pf pf_video",
						"desc" => "select the video type for this post format",
						"id" => "pf_video_type",
						"options" => array('vimeo','youtube'),
						"type" => "select"); 	

$options_post_format[] = array( "name" => "Video ID",
						"class" => "pf pf_video",
						"desc" => "paste in the video id (found in the url adress of the video page)",
						"id" => "pf_video_id",
						"type" => "text"); 
	






?>