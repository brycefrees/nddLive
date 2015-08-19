<?php

$options[] = array( "name" => "General",
					"type" => "heading");
					
$options[] = array( "name" => "Color Scheme",
					"desc" => "select the colo scheme of the theme",
					"id" => THEME_SLUG."color_scheme",
					"std" => "orange",
					"options" => array("orange","blue","cyan","green","yellow"),
					"type" => "select_letters"); 
					
$options[] = array( "name" => "Custom Favicon",
					"desc" => "upload a 16x16 pixels png/gif image with your desired favicon",
					"id" => THEME_SLUG."favicon",
					"type" => "upload");  
					
$options[] = array( "name" => "Custom Favicon",
					"desc" => "upload a 57x57 pixels png/gif image with your desired favicon",
					"id" => THEME_SLUG."57_favicon",
					"type" => "upload");  
					
$options[] = array( "name" => "Custom Favicon",
					"desc" => "upload a 72x72 pixels png/gif image with your desired favicon",
					"id" => THEME_SLUG."72_favicon",
					"type" => "upload");  
					
$options[] = array( "name" => "Custom Favicon",
					"desc" => "upload a 114x114 pixels png/gif image with your desired favicon",
					"id" => THEME_SLUG."114_favicon",
					"type" => "upload");  

		
$options[] = array( "name" => "Tracking Code",
					"desc" => "paste your Google Analytics tracking code here",
					"id" => THEME_SLUG."google_analytics",
					"type" => "textarea");  
					
$options[] = array( "name" => "Twitter username",
			"desc" => "required if you wish to display social media share buttons on your blog or portfolio",
			"id" => THEME_SLUG."twitter_username",
			"type" => "text"); 

$options[] = array( "name" => "Background pattern",
					"desc" => "",
					"id" => THEME_SLUG."background_pattern",
					"options" => array(
						THEME_IMG.'/patterns/bg0.jpg',
						THEME_IMG.'/patterns/bg5.jpg',
						THEME_IMG.'/patterns/bg1.jpg',
						THEME_IMG.'/patterns/bg2.jpg',
						THEME_IMG.'/patterns/bg3.jpg',
						THEME_IMG.'/patterns/bg4.jpg',
						THEME_IMG.'/patterns/bg6.png',
						THEME_IMG.'/patterns/bg7.png',
						THEME_IMG.'/patterns/bg8.png',
						THEME_IMG.'/patterns/bg9.png',
						THEME_IMG.'/patterns/bg10.png',
						THEME_IMG.'/patterns/bg11.png',
					),
					"type" => "select_background"); 
					
$options[] = array( "name" => "Custom CSS",
					"desc" => "paste your custom css code here",
					"id" => THEME_SLUG."custom_css",
					"type" => "textarea"); 									
	
?>