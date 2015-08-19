<?php

$options[] = array( "name" => "Layouts",
					"type" => "heading");


					
$options[]  = array( "name" => "Default Page Layout",
						"class" => "",
						"id" => THEME_SLUG."page_layout",
						"options" => array( 
						
							array('url' => THEME_ADMIN_IMG.'/layouts/2.png','desc' => 'full width'),
							array('url' => THEME_ADMIN_IMG.'/layouts/6.png','desc' => 'right sidebar'),
							array('url' => THEME_ADMIN_IMG.'/layouts/5.png','desc' => 'left sidebar')
						
						),
						"desc" => "select the default layout for all the created pages (you can change the layout for individual pages from the 'Page Settings', metabox below the text editor)",
						"type" => "select_images"); 
						
					
$options[]  = array( "name" => "Default Post Layout",
						"class" => "",
						"id" => THEME_SLUG."post_layout",
						"options" => array( 
						
							array('url' => THEME_ADMIN_IMG.'/layouts/2.png','desc' => 'full width'),
							array('url' => THEME_ADMIN_IMG.'/layouts/6.png','desc' => 'right sidebar'),
							array('url' => THEME_ADMIN_IMG.'/layouts/5.png','desc' => 'left sidebar')
						
						),
						"desc" => "select the default layout for all the created posts",
						"type" => "select_images"); 
		
$options[]  = array( "name" => "Default Portfolio Layout",
						"class" => "",
						"id" => THEME_SLUG."portfolio_layout",
						"options" => array( 
						
							array('url' => THEME_ADMIN_IMG.'/layouts/2.png','desc' => 'full width'),
							array('url' => THEME_ADMIN_IMG.'/layouts/6.png','desc' => 'image & content'),
							array('url' => THEME_ADMIN_IMG.'/layouts/6.png','desc' => 'image & right sidebar'),
							array('url' => THEME_ADMIN_IMG.'/layouts/5.png','desc' => 'left sidebar & image')
						
						),
						"desc" => "select the default layout for all the created portfolio projects",
						"type" => "select_images"); 
											
									
									
					
?>