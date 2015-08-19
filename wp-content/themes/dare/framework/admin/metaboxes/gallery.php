<?php
 
global $options_gallery;

$options_gallery = array();

$options_gallery[] = array( "name" => "Gallery Images",
						"desc" => "steps to create a new gallery:<br>(1) click the 'browse' button<br> (2) click 'Select files' and upload your images<br>(3) after the images are uploaded click the 'Save All Changes' button then the 'Add Gallery Images' button. You can also add images that are already uploaded in the Media Library by selecting the 'Media Library' tab and clicking the 'Add Image to Gallery' button",
						"id" => "gallery_items",
						"type" => "gallery_items"); 

?>