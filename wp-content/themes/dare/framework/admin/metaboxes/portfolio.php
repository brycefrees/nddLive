<?php


 
global $options_portfolio;

$options_portfolio = array();


$options_portfolio[] = array( "name" => "Footer select",
					"id" => "custom_footer",
					"type" => "select_footer"); 
					
						
$options_portfolio[]  = array( "name" => "Layout",
						"class" => "",
						"id" => "page_layout",
						"options" => array( 
						
							array('url' => THEME_ADMIN_IMG.'/layouts/1.png','desc' => 'default'),
							array('url' => THEME_ADMIN_IMG.'/layouts/2.png','desc' => 'full width'),
							array('url' => THEME_ADMIN_IMG.'/layouts/6.png','desc' => 'image & content'),
							array('url' => THEME_ADMIN_IMG.'/layouts/6.png','desc' => 'image & right sidebar'),
							array('url' => THEME_ADMIN_IMG.'/layouts/5.png','desc' => 'left sidebar & image')
						
						),
						"type" => "images"); 


?>