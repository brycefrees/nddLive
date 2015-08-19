<?php

$options[] = array( "name" => "Header",
					"type" => "heading"); 
					

					
$options[] = array( "name" => "Logo",
					"desc" => "upload the logo",
					"id" => THEME_SLUG."logo_image",
					"std" => "",
					"type" => "upload_min");   

		
$options[] =array(
			"name" => "Logo left position",
			"desc" => "left margin of the logo",
			"id" => THEME_SLUG."logo_left",
			"min" => "1",
			"max" => "960",
			"step" => "1",
			"std" => "1",
			"type" => "range",
			"unit" => "px"
		);
		
$options[] =array(
			"name" => "Logo top position",
			"desc" => "top margin of the logo",
			"id" => THEME_SLUG."logo_top",
			"min" => "1",
			"max" => "960",
			"step" => "1",
			"std" => "1",
			"type" => "range",
			"unit" => "px"
		);
		



?>