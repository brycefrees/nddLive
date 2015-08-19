<?php

global $options_page;

$options_page = array();

$options_page[]  = array( "name" => "Page Description",
						"desc" => "displayed next to the page title",
						"id" => "page_description",
						"type" => "text");						
								
$options_page[] = array( "name" => "Custom sidebar",
					"id" => "custom_sidebar",
					"desc" => "select a custom sidebar to display on this page",
					"class" => "",
					"type" => "select_sidebar"); 
					
$options_page[] = array( "name" => "Footer select",
					"id" => "custom_footer",
					"desc" => "select a footer to display on this page",
					"class" => "",
					"type" => "select_footer"); 
					
$options_page[]  = array( "name" => "Layout",
						"class" => "",
						"desc" => "select the layout of this page",
						"id" => "page_layout",
						"options" => array( 
						
							array('url' => THEME_ADMIN_IMG.'/layouts/1.png','desc' => 'default'),
							array('url' => THEME_ADMIN_IMG.'/layouts/2.png','desc' => 'full width'),
							array('url' => THEME_ADMIN_IMG.'/layouts/11.png','desc' => 'right sidebar'),
							array('url' => THEME_ADMIN_IMG.'/layouts/12.png','desc' => 'left sidebar')
						
						),
						"type" => "images"); 

$options_page[] = array( "name" => "Latitude",
					"id" => "latitude",
					"desc" => "latitude point of the map. (ex: 72.65653)",
					"class" => "template_type template-contact template-contact2",
					"type" => "text");
					
$options_page[] = array( "name" => "Longitude",
					"id" => "longitude",
					"desc" => "latitude point of the map",
					"class" => "template_type template-contact template-contact2",
					"type" => "text");
					
$options_page[] = array( "name" => "Zoom",
						"class" => "template_type template-contact template-contact2",
                        "desc" => "zoom level of the map",
						"id" => "zoom",
						"std" => "10","min" => "1","max" => "18","step" => "1",
						"type" => "range");
						

$options_page[] = array( "name" => "HTML content of the map marker",
					"id" => "map_content",
					"desc" => "text of the map popup",
					"class" => "template_type template-contact template-contact2",
					"type" => "textarea");						
					
$options_page[] = array( "name" => "Image Gallery",
						"class" => "template_type template-slideshow",
                        "desc" => "select the image gallery that will be used for the slideshow on this page",
						"id" => "flex_gallery",
						"type" => "select_slideshow");
						
									
$options_page[] = array( "name" => "Image Gallery",
						"class" => "template_type template-grid",
                        "desc" => "select the image gallery that will be used for the images grid on this page",
						"id" => "rg_slider",
						"type" => "select_slideshow");
						
$options_page[] = array( "name" => "Thumnbnail width & height",
						"class" => "template_type template-grid",
                        "desc" => "select the width and height of the resized images from the grid",
						"id" => "rg_size",
						"std" => "300","min" => "10","max" => "960","step" => "10","unit" => 'px',
						"type" => "range"); 
						
$options_page[] = array( "name" => "Number of rows",
						"class" => "template_type template-grid",
                        "desc" => "number of image rows",
						"id" => "rg_rows",
						"std" => "4","min" => "1","max" => "20","step" => "1","unit" => '',
						"type" => "range"); 
						
$options_page[] = array( "name" => "Number of columns",
						"class" => "template_type template-grid",
                        "desc" => "number of image columns",
						"id" => "rg_columns",
						"std" => "8","min" => "1","max" => "40","step" => "1","unit" => '',
						"type" => "range"); 
						
$options_page[] = array( "name" => "Step",
						"class" => "template_type template-grid",
                        "desc" => "select how many images will be replaced by new images at the same time",
						"id" => "rg_step",
						"std" => "6","min" => "1","max" => "100","step" => "1","unit" => '',
						"type" => "range"); 
						
$options_page[] = array( "name" => "Interval",
						"class" => "template_type template-grid",
                        "desc" => "specify in milliseconds the time it takes to switch images to newer images",
						"id" => "rg_interval",
						"std" => "3000","min" => "1000","max" => "10000","step" => "100","unit" => '',
						"type" => "range"); 
						
$options_page[]  = array( "name" => "Animation Type",
						"class" => "template_type template-grid",
						"id" => "animation_type",
						"desc" => "specify switch animation type",
						"options" => array('showHide','fadeInOut','slideLeft','slideRight','slideTop','slideBottom','rotateLeft','rotateRight','rotateTop','rotateBottom','scale','rotate3d','rotateLeftScale','rotateRightScale','rotateTopScale','rotateBottomScale','random'),
						"type" => "select_letters"); 
						
$options_page[] = array( "name" => "Number of rows 1024",
						"class" => "template_type template-grid",
                        "desc" => "number of image rows for a screen width of 1024 pixels",
						"id" => "rg_rows_1024",
						"std" => "4","min" => "1","max" => "20","step" => "1","unit" => '',
						"type" => "range"); 
						
$options_page[] = array( "name" => "Number of columns 1024",
						"class" => "template_type template-grid",
                        "desc" => "number of image columns for a screen width of 1024 pixels",
						"id" => "rg_columns_1024",
						"std" => "8","min" => "1","max" => "40","step" => "1","unit" => '',
						"type" => "range"); 
						
$options_page[] = array( "name" => "Number of rows 768",
						"class" => "template_type template-grid",
                        "desc" => "number of image rows for a screen width of 768 pixels",
						"id" => "rg_rows_768",
						"std" => "4","min" => "1","max" => "20","step" => "1","unit" => '',
						"type" => "range"); 
						
$options_page[] = array( "name" => "Number of columns 768",
						"class" => "template_type template-grid",
					    "desc" => "number of image columns for a screen width of 768 pixels",
						"id" => "rg_columns_768",
						"std" => "8","min" => "1","max" => "40","step" => "1","unit" => '',
						"type" => "range"); 
						
$options_page[] = array( "name" => "Number of rows 480",
						"class" => "template_type template-grid",
                        "desc" => "number of image rows for a screen width of 480 pixels",
						"id" => "rg_rows_480",
						"std" => "4","min" => "1","max" => "20","step" => "1","unit" => '',
						"type" => "range"); 
						
$options_page[] = array( "name" => "Number of columns 480",
						"class" => "template_type template-grid",
						"desc" => "number of image columns for a screen width of 480 pixels",
						"id" => "rg_columns_480",
						"std" => "8","min" => "1","max" => "40","step" => "1","unit" => '',
						"type" => "range"); 
						
$options_page[] = array( "name" => "Number of rows 320",
						"class" => "template_type template-grid",
                        "desc" => "number of image rows for a screen width of 320 pixels",
						"id" => "rg_rows_320",
						"std" => "4","min" => "1","max" => "20","step" => "1","unit" => '',
						"type" => "range"); 
						
$options_page[] = array( "name" => "Number of columns 320",
						"class" => "template_type template-grid",
                        "desc" => "number of image columns for a screen width of 320 pixels",
						"id" => "rg_columns_320",
						"std" => "8","min" => "1","max" => "40","step" => "1","unit" => '',
						"type" => "range"); 
						
			
						
$options_page[] = array( "name" => "Select the image gallery that will be used for the fullscreen slideshow on this page",
						"class" => "template_type template-fullscreen",
                        "desc" => "select another image gallery to be displayed on this page instead of the default",
						"id" => "fullscreen_gallery",
						"type" => "select_slideshow");
	
$options_page[] = array( "name" => "Width",
						"class" => "template_type template-fullscreen",
                        "desc" => "select the width of the resized images from the slideshow (the bigger the size the better the quality but slower loading of the page). ",
						"id" => "fullscreen_width",
						"std" => "1280","min" => "960","max" => "1920","step" => "1","unit" => 'px',
						"type" => "range"); 
	
$options_page[] = array( "name" => "Height",
						"class" => "template_type template-fullscreen",
                        "desc" => "select the height of the resized images from the slideshow (the bigger the size the better the quality but slower loading of the page).",
						"id" => "fullscreen_height",
						"std" => "420","min" => "200","max" => "900","step" => "1","unit" => 'px',
						"type" => "range"); 
						
$options_page[] = array( "name" => "Caption Top Position",
						"class" => "template_type template-fullscreen",
                        "desc" => "the distance between the top of the slideshow and the caption",
						"id" => "fullscreen_top",
						"std" => "200","min" => "0","max" => "800","step" => "1","unit" => 'px',
						"type" => "range"); 
						

						


?>