<?php

$options[] = array(
		"name" => "Portfolio",
		"type" => "heading"
	);
    

$options[] = array( "name" => "Portfolio project title",
			"desc" => "the title that will be displayed on all project pages",
			"id" => THEME_SLUG."portfolio_title",
			"std" => "Portfolio",
			"type" => "text"); 

$options[] = array( "name" => "Portfolio project description",
			"desc" => "the description that will be displayed next to the title on all project pages",
			"id" => THEME_SLUG."portfolio_description",
			"std" => "Get impressed of our fabulous projects",
			"type" => "text"); 
			
$options[] = array( "name" => "Portfolio page url",
			"desc" => "paste here the url adress where you have placed the portfolio shortcode",
			"id" => THEME_SLUG."portfolio_url",
			"type" => "text"); 
			
$options[] = array( "name" => "Display social buttons",
					"desc" => "choose if you want social media share buttons after the portfolio content",
					"id" => THEME_SLUG."social_buttons_portfolio",
					"options" => array('yes','no'),
					"type" => "select_letters"); 

?>