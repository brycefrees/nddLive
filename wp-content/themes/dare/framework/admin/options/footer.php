<?php

$options[] = array( "name" => "Footer",
					"type" => "heading"); 
				


$options[] = array( "name" => "Create Footer",
					"desc" => "select the footer layout, type in a name then click the 'Create Footer' button. All footer columns will be created in the Widgets section of wordpress",
					"id" => THEME_SLUG."adm_custom_footers_name",
					"type" => "custom_footer");

$options[] = array(  "id" => THEME_SLUG."adm_custom_footers_layout");
					
					
$options[] =	array(
			"name" => "Copyright text",
			"desc" => "displayed at the bottom of the page",
			"id" => THEME_SLUG."copyright_text",
			"type" => "text"
		);
	
			
?>