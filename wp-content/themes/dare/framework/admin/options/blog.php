<?php

$options[] = array(
		"name" => "Blog",
		"type" => "heading"
	);
	
	$options[] = array( "name" => "Blog page title",
			"desc" => "the title that will be displayed on all blog posts",
			"id" => THEME_SLUG."blog_title",
			"std" => "Blog",
			"type" => "text"); 

$options[] = array( "name" => "Blog page description",
			"desc" => "the description that will be displayed next to the title on all blog posts",
			"id" => THEME_SLUG."blog_description",
			"std" => "Keep yourself updated with our posts",
			"type" => "text"); 

	
$options[] = array( "name" => "Blog page url",
			"desc" => "paste here the url adress of the blog page template (required for breadcrumbs)",
			"id" => THEME_SLUG."blog_url",
			"type" => "text"); 
	

$options[] = array( "name" => "Display social buttons",
					"desc" => "choose if you want social media share buttons after the blog post content",
					"id" => THEME_SLUG."social_buttons_blog",
					"options" => array('yes','no'),
					"type" => "select_letters"); 
			
$options[] = array( "name" => "Blog type",
					"desc" => "select your blog page type",
					"id" => THEME_SLUG."blog_type",
					"options" => array('type 1','type 2'),
					"type" => "select"); 
    


?>