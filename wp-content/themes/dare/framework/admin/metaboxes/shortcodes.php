<?php

global $shortcode_options;


$shortcode_options = array(	

array(
	"name" => "Accordions",
	"id" => "accordions",
	"options" => array (
		array(
		"name" => "Count",
		"id" => "count",
		"min" => 2,
		"max" => 8,
		"step" => "1",
		"type" => "range"
		),

		array(
		"name" => "Pane Title 1",
		"id" => "pane_title_1",
		"type" => "text"
		),

		array(
		"name" => "Pane Content 1",
		"id" => "pane_content_1",
		"type" => "textarea"
		),

		array(
		"name" => "Pane Title 2",
		"id" => "pane_title_2",
		"type" => "text"
		),

		array(
		"name" => "Pane Content 2",
		"id" => "pane_content_2",
		"type" => "textarea"
		),

		array(
		"name" => "Pane Title 3",
		"id" => "pane_title_3",
		"type" => "text"
		),

		array(
		"name" => "Pane Content 3",
		"id" => "pane_content_3",
		"type" => "textarea"
		),

		array(
		"name" => "Pane Title 4",
		"id" => "pane_title_4",
		"type" => "text"
		),

		array(
		"name" => "Pane Content 4",
		"id" => "pane_content_4",
		"type" => "textarea"
		),

		array(
		"name" => "Pane Title 5",
		"id" => "pane_title_5",
		"type" => "text"
		),

		array(
		"name" => "Pane Content 5",
		"id" => "pane_content_5",
		"type" => "textarea"
		),

		array(
		"name" => "Pane Title 6",
		"id" => "pane_title_6",
		"type" => "text"
		),

		array(
		"name" => "Pane Content 6",
		"id" => "pane_content_6",
		"type" => "textarea"
		),

		array(
		"name" => "Pane Title 7",
		"id" => "pane_title_7",
		"type" => "text"
		),

		array(
		"name" => "Pane Content 7",
		"id" => "pane_content_7",
		"type" => "textarea"
		),

		array(
		"name" => "Pane Title 8",
		"id" => "pane_title_8",
		"type" => "text"
		),

		array(
		"name" => "Pane Content 8",
		"id" => "pane_content_8",
		"type" => "textarea"
		),
					
	)
),
			
array(
	"name" => "Alerts",
	"id" => "alert",
	"options" => array (
		array(
		"name" => "Type",
		"id" => "type",
		"type" => "select",
		"options" => array('...','success','warning','info','attention')
		),

		array(
		"name" => "Text",
		"id" => "text",
		"type" => "text",
		),


	)
),


array(
	"name" => "Blog Posts",
	"id" => "blog-posts",
	"options" => array (
		array(
		"name" => "Categories",
		"id" => "categories",
		"type" => "multiselect_categories",
		"options"=> "category"
		),
		array(
		"name" => "Count",
		"id" => "count",
		"type" => "range",
		"min" => 1, "max" => 20, "step" => 1 
		),
	)
),

array(
	"name" => "Buttons",
	"id" => "button",
	"options" => array (
		array(
		"name" => "Text",
		"id" => "text",
		"type" => "text"
		),

		array(
		"name" => "Background color (optional)",
		"id" => "color",
		"type" => "select",
		"options" => array("...","light","dark"),
		"type" => "select"
		),

		array(
		"name" => "Link",
		"id" => "link",
		"type" => "text"
		),

	)
),

array(
	"name" => "Clients",
	"id" => "clients",
	"options" => array (
		array(
		"name" => "Gallery",
		"id" => "id",
		"type" => "select_posts",
		"options"=> "gallery"
		),
	)
),

array(
	"name" => "Columns",
	"id" => "column",
	"subtype" => "yes",
	"options" => array(

		array(
			"name" => "1/2 1/2",
			"id" => "x1-2x1-2",
			"options" => array (

				array(
				"name" => "Column Content 1/2",
				"id" => "content",
				"type" => "textarea"
				),

				array(
				"name" => "Column Content 1/2",
				"id" => "content",
				"type" => "textarea"
				),

			)
		),
		
		array(
			"name" => "1/3 1/3 1/3",
			"id" => "x1-3x1-3x1-3",
			"options" => array (

				array(
				"name" => "Column Content 1/3",
				"id" => "content",
				"type" => "textarea"
				),

				array(
				"name" => "Column Content 1/3",
				"id" => "content",
				"type" => "textarea"
				),
				
				array(
				"name" => "Column Content 1/3",
				"id" => "content",
				"type" => "textarea"
				),

			)
		),
		
		array(
			"name" => "2/3 1/3",
			"id" => "x2-3x1-3",
			"options" => array (

				array(
				"name" => "Column Content 2/3",
				"id" => "content",
				"type" => "textarea"
				),

				array(
				"name" => "Column Content 1/3",
				"id" => "content",
				"type" => "textarea"
				),
				
			)
		),
		
		array(
			"name" => "1/3 2/3",
			"id" => "x1-3x2-3",
			"options" => array (

				array(
				"name" => "Column Content 1/3",
				"id" => "content",
				"type" => "textarea"
				),

				array(
				"name" => "Column Content 2/3",
				"id" => "content",
				"type" => "textarea"
				),
				
			)
		),
		
				
		array(
			"name" => "1/4 1/4 1/4 1/4",
			"id" => "x1-4x1-4x1-4x1-4",
			"options" => array (

				array(
				"name" => "Column Content 1/4",
				"id" => "content",
				"type" => "textarea"
				),

				array(
				"name" => "Column Content 1/4",
				"id" => "content",
				"type" => "textarea"
				),
				
				array(
				"name" => "Column Content 1/4",
				"id" => "content",
				"type" => "textarea"
				),

				array(
				"name" => "Column Content 1/4",
				"id" => "content",
				"type" => "textarea"
				),
				
			)
		),
		
		array(
			"name" => "1/2 1/4 1/4",
			"id" => "x1-2x1-4x1-4",
			"options" => array (

				array(
				"name" => "Column Content 1/2",
				"id" => "content",
				"type" => "textarea"
				),

				array(
				"name" => "Column Content 1/4",
				"id" => "content",
				"type" => "textarea"
				),
				
				array(
				"name" => "Column Content 1/4",
				"id" => "content",
				"type" => "textarea"
				),
				
			)
		),
		
		array(
			"name" => "1/4 1/2 1/4",
			"id" => "x1-4x1-2x1-4",
			"options" => array (

				array(
				"name" => "Column Content 1/4",
				"id" => "content",
				"type" => "textarea"
				),

				array(
				"name" => "Column Content 1/2",
				"id" => "content",
				"type" => "textarea"
				),
				
				array(
				"name" => "Column Content 1/4",
				"id" => "content",
				"type" => "textarea"
				),
				
			)
		),
		
		array(
			"name" => "1/4 1/4 1/2",
			"id" => "x1-4x1-4x1-2",
			"options" => array (

				array(
				"name" => "Column Content 1/4",
				"id" => "content",
				"type" => "textarea"
				),

				array(
				"name" => "Column Content 1/4",
				"id" => "content",
				"type" => "textarea"
				),
				
				array(
				"name" => "Column Content 1/2",
				"id" => "content",
				"type" => "textarea"
				),
				
			)
		),
		
		array(
			"name" => "3/4 1/4",
			"id" => "x3-4x1-4",
			"options" => array (

				array(
				"name" => "Column Content 3/4",
				"id" => "content",
				"type" => "textarea"
				),

				array(
				"name" => "Column Content 1/4",
				"id" => "content",
				"type" => "textarea"
				),
							
			)
		),

		array(
			"name" => "1/4 3/4",
			"id" => "x1-4x3-4",
			"options" => array (

				array(
				"name" => "Column Content 1/4",
				"id" => "content",
				"type" => "textarea"
				),

				array(
				"name" => "Column Content 3/4",
				"id" => "content",
				"type" => "textarea"
				),
							
			)
		),
				
	),
),

array(
	"name" => "Contact Form",
	"id" => "contactform",
	"options" => array (
		array(
		"name" => "Email (optional)",
		"id" => "email",
		"type" => "text",
		"desc" => "leave empty if you want the admin email to be used"
		)
	)
),



array(
	"name" => "Images",
	"id" => "images",
	"options" => array(

		array(
		"name" => "Image URL",
		"desc" => "click browse and click the 'Insert ID' button",
		"id" => "url",
		"type" => "upload",
		),

		array(
		"name" => "Width",
		"desc" => "specify an image width in pixels",
		"id" => "width",
		"min" => 10,
		"max" => 900,
		"step" => "1",
		"type" => "range"
		),


		array(
		"name" => "Height",
		"id" => "height",
		"min" => 10,
		"max" => 800,
		"step" => "1",
		"type" => "range"
		),


		array(
		"name" => "Align (optional)",
		"desc" => "",
		"id" => "align",
		"type" => "select",
		"options" => array('none','left','right','center')
		),

		array(
		"name" => "Lightbox (optional)",
		"desc" => "",
		"id" => "lightbox",
		"type" => "select",
		"options" => array('no','yes')
		),

		array(
		"name" => "Link (optional)",
		"desc" => "if lightbox is on the link will open in a lightbox",
		"id" => "link",
		"type" => "text"
		),

		array(
		"name" => "Keep Aspect Ratio (optional)",
		"desc" => "if lightbox is on the link will open in a lightbox",
		"id" => "keep_aspect_ratio",
		"type" => "select",
		"options" => array('...','yes','no')
		),

	),
),

array(
	"name" => "Info Box",
	"id" => "info-box",
	"options" => array (
		array(
		"name" => "Style",
		"id" => "style",
		"type" => "select",
		"options" => array('...','style1','style2')
		),

		array(
		"name" => "Content",
		"id" => "content",
		"type" => "textarea",
		),
		
		array(
		"name" => "Button Text",
		"id" => "buttontext",
		"type" => "text",
		),
		
		array(
		"name" => "Button Link",
		"id" => "buttonlink",
		"type" => "text",
		),
		
	)
),



array(
	"name" => "Lists",
	"id" => "list",
	"options" => array (
		array(
		"name" => "Type",
		"id" => "type",
		"type" => "select",
		"options" => array('...','check','arrow','star','close','square','plus','minus')
		),

		array(
		"name" => "Content",
		"id" => "content",
		"type" => "textarea",
		),

	)
),


array(
	"name" => "Portfolio",
	"id" => "portfolio",
	"options" => array (
		array(
		"name" => "Categories",
		"id" => "categories",
		"type" => "multiselect_categories",
		"options"=> "portfolio_category"
		),
		array(
		"name" => "Style",
		"id" => "style",
		"type" => "select",
		"options"=> array('...','style1','style2')
		),
		array(
		"name" => "Columns",
		"id" => "columns",
		"type" => "select",
		"options"=> array('...','three','four')
		),
		array(
		"name" => "Type",
		"id" => "type",
		"type" => "select",
		"options"=> array('...','sortable','paginated')
		),
		array(
		"name" => "Items per page",
		"id" => "items_per_page",
		"type" => "range",
		"min" => 1,"max" => 50,"step" => 1, "std" => 5
		),
	),
),


array(
	"name" => "Pricing Table",
	"id" => "pricing_table",
	"options" => array (
	
		array(
		"name" => "Count",
		"id" => "count",
		"min" => 3,
		"max" => 4,
		"step" => "1",
		"type" => "range"
		),

		array(
		"name" => "1. Plan Name",
		"id" => "plan_name_1",
		"type" => "text"
		),

		array(
		"name" => "1. Plan Price",
		"id" => "plan_price_1",
		"type" => "text"
		),

		array(
		"name" => "1. Per",
		"id" => "plan_per_1",
		"type" => "text"
		),

		array(
		"name" => "1. Button Text",
		"id" => "plan_linkname_1",
		"type" => "text"
		),

		array(
		"name" => "1. Button Link",
		"id" => "plan_link_1",
		"type" => "text"
		),

		array(
		"name" => "1. Features",
		"id" => "plan_features_1",
		"type" => "textarea"
		),





		array(
		"name" => "2. Plan Name",
		"id" => "plan_name_2",
		"type" => "text"
		),

		array(
		"name" => "2. Plan Price",
		"id" => "plan_price_2",
		"type" => "text"
		),

		array(
		"name" => "2. Per",
		"id" => "plan_per_2",
		"type" => "text"
		),

		array(
		"name" => "2. Button Text",
		"id" => "plan_linkname_2",
		"type" => "text"
		),

		array(
		"name" => "2. Button Link",
		"id" => "plan_link_2",
		"type" => "text"
		),

		array(
		"name" => "2. Features",
		"id" => "plan_features_2",
		"type" => "textarea"
		),

		array(
		"name" => "3. Plan Name",
		"id" => "plan_name_3",
		"type" => "text"
		),

		array(
		"name" => "3. Plan Price",
		"id" => "plan_price_3",
		"type" => "text"
		),

		array(
		"name" => "3. Per",
		"id" => "plan_per_3",
		"type" => "text"
		),

		array(
		"name" => "3. Button Text",
		"id" => "plan_linkname_3",
		"type" => "text"
		),

		array(
		"name" => "3. Button Link",
		"id" => "plan_link_3",
		"type" => "text"
		),

		array(
		"name" => "3. Features",
		"id" => "plan_features_3",
		"type" => "textarea"
		),



		array(
		"name" => "4. Plan Name",
		"id" => "plan_name_4",
		"type" => "text"
		),

		array(
		"name" => "4. Plan Price",
		"id" => "plan_price_4",
		"type" => "text"
		),

		array(
		"name" => "4. Per",
		"id" => "plan_per_4",
		"type" => "text"
		),

		array(
		"name" => "4. Button Text",
		"id" => "plan_linkname_4",
		"type" => "text"
		),

		array(
		"name" => "4. Button Link",
		"id" => "plan_link_4",
		"type" => "text"
		),

		array(
		"name" => "4. Features",
		"id" => "plan_features_4",
		"type" => "textarea"
		),






	)

),



array(
	"name" => "Slideshow",
	"id" => "slideshow",
	"options" => array (
	
		array(
		"name" => "Gallery",
		"id" => "gallery",
		"type" => "select_posts",
		"options"=> "gallery"
		),

		array(
		"name" => "Width",
		"id" => "width",
		"min" => 0,
		"max" => 940,
		"step" => "1",
		"type" => "range"

		),

		array(
		"name" => "Height",
		"id" => "height",
		"min" => 0,
		"max" => 800,
		"step" => "1",
		"type" => "range"

		),

		array(
		"name" => "Align",
		"id" => "align",
		"type" => "select",
		"options" => array('...','none','left','right')

		),

	)
),



array(
	"name" => "Social Icons",
	"id" => "social-icons",
	"options" => array (
		array(
		"name" => "Skin",
		"id" => "skin",
		"type" => "select",
		"options"=> array('...','light','dark')
		),

		array(
		"name" => "Skype",
		"id" => "skype",
		"type" => "text",
		),

		array(
		"name" => "Flickr",
		"id" => "flickr",
		"type" => "text",
		),

		array(
		"name" => "Twitter",
		"id" => "twitter",
		"type" => "text",
		),

		array(
		"name" => "Dribbble",
		"id" => "dribbble",
		"type" => "text",
		),

		array(
		"name" => "Facebook",
		"id" => "facebook",
		"type" => "text",
		),

		array(
		"name" => "Googleplus",
		"id" => "googleplus",
		"type" => "text",
		),

		array(
		"name" => "Forrest",
		"id" => "forrest",
		"type" => "text",
		),

		array(
		"name" => "Vimeo",
		"id" => "vimeo",
		"type" => "text",
		),



	)
),


array(
	"name" => "Typography",
	"id" => "typography",
	"subtype" => "yes",
	"options" => array(

		array(
			"name" => "Block Quotes",
			"id" => "blockquote",
			"options" => array (

			array(
			"name" => "Content",
			"id" => "content",
			"type" => "textarea"
			),


			)
		),

		array(
		"name" => "Highlight",
		"id" => "highlight",
		"options" => array (
		array(
		"name" => "Content",
		"id" => "content",
		"type" => "textarea"
		),
		array(
		"name" => "Color (optional)",
		"id" => "color",
		"options" => array(
		"...","orange","yellow","green","blue",
		),
		"type" => "select",
		),
		)

		),

		array(
		"name" => "Dropcap",
		"id" => "dropcap",
		"options" => array (
		array(
		"name" => "Letter",
		"id" => "letter",
		"type" => "text"
		),

		array(
		"name" => "Icon",
		"id" => "icon",
		"type" => "select",
		"options" => array('...','link','heart','settings','secure'),
		),

		array(
		"name" => "Background color",
		"id" => "color",
		"type" => "select",
		"options" => array('...','grey','orange'),
		),

		array(
		"name" => "Size",
		"id" => "size",
		"type" => "select",
		"options" => array('...','big','small'),
		),

		)
		),





	),
),

array(
	"name" => "Tabs",
	"id" => "tabs",
	"options" => array (
		array(
		"name" => "Count",
		"id" => "count",
		"min" => 2,
		"max" => 8,
		"step" => "1",
		"type" => "range"
		),

		array(
		"name" => "Tab Title 1",
		"id" => "tab_title_1",
		"type" => "text"
		),

		array(
		"name" => "Tab Content 1",
		"id" => "tab_content_1",
		"type" => "textarea"
		),

		array(
		"name" => "Tab Title 2",
		"id" => "tab_title_2",
		"type" => "text"
		),

		array(
		"name" => "Tab Content 2",
		"id" => "tab_content_2",
		"type" => "textarea"
		),

		array(
		"name" => "Tab Title 3",
		"id" => "tab_title_3",
		"type" => "text"
		),

		array(
		"name" => "Tab Content 3",
		"id" => "tab_content_3",
		"type" => "textarea"
		),

		array(
		"name" => "Tab Title 4",
		"id" => "tab_title_4",
		"type" => "text"
		),

		array(
		"name" => "Tab Content 4",
		"id" => "tab_content_4",
		"type" => "textarea"
		),

		array(
		"name" => "Tab Title 5",
		"id" => "tab_title_5",
		"type" => "text"
		),

		array(
		"name" => "Tab Content 5",
		"id" => "tab_content_5",
		"type" => "textarea"
		),

		array(
		"name" => "Tab Title 6",
		"id" => "tab_title_6",
		"type" => "text"
		),

		array(
		"name" => "Tab Content 6",
		"id" => "tab_content_6",
		"type" => "textarea"
		),

		array(
		"name" => "Tab Title 7",
		"id" => "tab_title_7",
		"type" => "text"
		),

		array(
		"name" => "Tab Content 7",
		"id" => "tab_content_7",
		"type" => "textarea"
		),

		array(
		"name" => "Tab Title 8",
		"id" => "tab_title_8",
		"type" => "text"
		),

		array(
		"name" => "Tab Content 8",
		"id" => "tab_content_8",
		"type" => "textarea"
		),






	)
),


array(
	"name" => "Team",
	"id" => "team",
	"options" => array (
		array(
		"name" => "Count",
		"id" => "count",
		"min" => 1,
		"max" => 8,
		"step" => "1",
		"type" => "range"
		),

		array(
		"name" => "Member Image URL 1",
		"id" => "member_image_1",
		"type" => "text"
		),

		array(
		"name" => "Member content 1",
		"id" => "member_content_1",
		"type" => "textarea"
		),

		array(
		"name" => "Member Image URL 2",
		"id" => "member_image_2",
		"type" => "text"
		),

		array(
		"name" => "Member content 2",
		"id" => "member_content_2",
		"type" => "textarea"
		),

		array(
		"name" => "Member Image URL 3",
		"id" => "member_image_3",
		"type" => "text"
		),

		array(
		"name" => "Member content 3",
		"id" => "member_content_3",
		"type" => "textarea"
		),

		array(
		"name" => "Member Image URL 4",
		"id" => "member_image_4",
		"type" => "text"
		),

		array(
		"name" => "Member content 4",
		"id" => "member_content_4",
		"type" => "textarea"
		),

		array(
		"name" => "Member Image URL 5",
		"id" => "member_image_5",
		"type" => "text"
		),

		array(
		"name" => "Member content 5",
		"id" => "member_content_5",
		"type" => "textarea"
		),

		array(
		"name" => "Member Image URL 6",
		"id" => "member_image_6",
		"type" => "text"
		),

		array(
		"name" => "Member content 6",
		"id" => "member_content_6",
		"type" => "textarea"
		),

		array(
		"name" => "Member Image URL 7",
		"id" => "member_image_7",
		"type" => "text"
		),

		array(
		"name" => "Member content 7",
		"id" => "member_content_7",
		"type" => "textarea"
		),

		array(
		"name" => "Member Image URL 8",
		"id" => "member_image_8",
		"type" => "text"
		),

		array(
		"name" => "Member content 8",
		"id" => "member_content_8",
		"type" => "textarea"
		),






	)
),


array(
	"name" => "Testimonials",
	"id" => "testimonials",
	"options" => array (
		array(
		"name" => "Count",
		"id" => "count",
		"min" => 1,
		"max" => 8,
		"step" => "1",
		"type" => "range"
		),

		array(
		"name" => "Testimonial Author 1",
		"id" => "testimonial_author_1",
		"type" => "text"
		),

		array(
		"name" => "Testimonial Content 1",
		"id" => "testimonial_content_1",
		"type" => "textarea"
		),

		array(
		"name" => "Testimonial Author 2",
		"id" => "testimonial_author_2",
		"type" => "text"
		),

		array(
		"name" => "Testimonial Content 2",
		"id" => "testimonial_content_2",
		"type" => "textarea"
		),

		array(
		"name" => "Testimonial Author 3",
		"id" => "testimonial_author_3",
		"type" => "text"
		),

		array(
		"name" => "Testimonial Content 3",
		"id" => "testimonial_content_3",
		"type" => "textarea"
		),

		array(
		"name" => "Testimonial Author 4",
		"id" => "testimonial_author_4",
		"type" => "text"
		),

		array(
		"name" => "Testimonial Content 4",
		"id" => "testimonial_content_4",
		"type" => "textarea"
		),

		array(
		"name" => "Testimonial Author 5",
		"id" => "testimonial_author_5",
		"type" => "text"
		),

		array(
		"name" => "Testimonial Content 5",
		"id" => "testimonial_content_5",
		"type" => "textarea"
		),

		array(
		"name" => "Testimonial Author 6",
		"id" => "testimonial_author_6",
		"type" => "text"
		),

		array(
		"name" => "Testimonial Content 6",
		"id" => "testimonial_content_6",
		"type" => "textarea"
		),

		array(
		"name" => "Testimonial Author 7",
		"id" => "testimonial_author_7",
		"type" => "text"
		),

		array(
		"name" => "Testimonial Content 7",
		"id" => "testimonial_content_7",
		"type" => "textarea"
		),

		array(
		"name" => "Testimonial Author 8",
		"id" => "testimonial_author_8",
		"type" => "text"
		),

		array(
		"name" => "Testimonial Content 8",
		"id" => "testimonial_content_8",
		"type" => "textarea"
		),






	)
),

array(
	"name" => "Tooltip",
	"id" => "tooltip",
	"options" => array (
		array(
		"name" => "Tooltip text",
		"id" => "text",
		"type" => "text",
		),

		array(
		"name" => "Content",
		"id" => "content",
		"type" => "textarea",
		),


	)
),

array(
	"name" => "Videos",
	"id" => "videos",
	"subtype" => "yes",
	"options" => array(
		array(
			"name" => "YouTube",
			"id" => "youtube",
			"options" => array(
				array(
				"name" => "Video ID",
				"desc" => "the id from the video's URL (http://www.youtube.com/watch?v=<span style='color:red'>d0vXxH1IEmQ</span>)",
				"id" => "id",
				"type" => "text",
				),
				
				array(
				"name" => "Video Width",
				"desc" => "the id from the video's URL (http://www.youtube.com/watch?v=<span style='color:red'>d0vXxH1IEmQ</span>)",
				"id" => "width",
				"type" => "range",
				"min" => 10, "max" => 940, "step"=> 1 
				),
				
				array(
				"name" => "Align",
				"desc" => "the id from the video's URL (http://www.youtube.com/watch?v=<span style='color:red'>d0vXxH1IEmQ</span>)",
				"id" => "align",
				"type" => "select",
				"options" => array('...','none','left','right')
				),
			),
		),
		array(
			"name" => "Vimeo",
			"id" => "vimeo",
			"options" => array(
				array(
				"name" => "Video ID",
				"desc" => "the id from the video's URL (http://vimeo.com/<span style='color:red'>123456</span>)",
				"id" => "id",
				"type" => "text",
				),
				
				array(
				"name" => "Video Width",
				"desc" => "the id from the video's URL (http://www.youtube.com/watch?v=<span style='color:red'>d0vXxH1IEmQ</span>)",
				"id" => "width",
				"type" => "range",
				"min" => 10, "max" => 940, "step"=> 1 
				),
				
				array(
				"name" => "Align",
				"desc" => "the id from the video's URL (http://www.youtube.com/watch?v=<span style='color:red'>d0vXxH1IEmQ</span>)",
				"id" => "align",
				"type" => "select",
				"options" => array('...','none','left','right')
				),
				
			),
		),
	),
),


);				

function meta_options_shortcode($shortcode_options) {
	
?>


<?php
	
	global $shortcode_options;
	
	echo '<div>
			<table class="metabox_table">
				<tr>
					<th class="heading"><h4><label>Shortcode</label></h4></th>
					<td class="option"><select id="first_sc_select">
							<option value="none">select the shortcode</option>';
	
							foreach($shortcode_options as $shortcode) 
									echo '<option value="'.$shortcode['id'].'">'.$shortcode['name'].'</option>';
							
	
				echo '</select>
					</td>
				</tr>
				
			
			</table>
		</div>';
	
	foreach($shortcode_options as $shortcode):
	
			echo '<div class="first_sc_container first_sc_container_'.$shortcode['id'].'">';
			
			if(!isset($shortcode['subtype'])):
							
			    echo '<table class="metabox_table">';
				foreach($shortcode['options'] as $option):
					
					echo '<tr>';
					echo '<th class="heading"><h4>'.$option['name'].'</h4></th>';
					
					echo '<td class="option">';
					$option['id']='sc_'.$shortcode['id'].'_'.$option['id'];
					
					renderHTML($option);
					
					echo '</td>';

					if(!isset($option['desc'])) $option['desc']='';

					echo '<td class="description">'.$option['desc'].'</td>';
					echo '</tr>';
					
				endforeach;
				echo '</table>';
				
			else:
			
				echo '<div>
						<table class="metabox_table">
							<tr><th class="heading"><h4><label>Type</label></h4></th>
							<td class="option"><select class="secondary_sc_select secondary_sc_select_'.$shortcode['id'].'">
									<option value="none">...</option>';
									
									foreach($shortcode['options'] as $secondary_shortcode)
										echo '<option value="'.$secondary_shortcode['id'].'">'.$secondary_shortcode['name'].'</option>';
								
				
							echo '</select>
								 </td>
								</tr>
							</table>
						</div>';
				
				foreach($shortcode['options'] as $secondary_shortcode):
					echo '<div class="secondary_sc_container secondary_sc_container_'.$secondary_shortcode['id'].'">
							<table class="metabox_table">';
							
							foreach($secondary_shortcode['options'] as $option):
								
								echo '<tr>';
								echo '<th class="heading"><h4>'.$option['name'].'</h4></th>';
								
								echo '<td class="option">';
								$option['id']='sc_'.$shortcode['id'].'_'.$secondary_shortcode['id'].'_'.$option['id'];
								
								renderHTML($option);
								
								echo '</td>';

								if(!isset($option['desc'])) $option['desc']='';

								echo '<td class="description">'.$option['desc'].'</td>';
								echo '</tr>';
							  
							endforeach;
					echo '</table>
						</div>';
				endforeach;
		
			endif;
			
			echo '</div>';
		endforeach;
		
	
	?>
		
	<table class="metabox_table">
	
		<tr>
			<th class="heading"><h4><label></label></h4></th>
			<td class="option"><input id="generate_code" class="button-primary"  value="Generate Code"/></td>
		</tr>
	
		<tr>
			<th class="heading"><h4><label>Generated Code</label></h4></th>
			<td class="option"><textarea id="generated-code"></textarea></td>
		</tr>

	
	</table>

<?php
}

function create_meta_box_shortcode() {

	if ( function_exists('add_meta_box') ) {
		
		add_meta_box( 'add_shortcode_metabox', 'Add Shortcode', 'meta_options_shortcode', 'post', 'normal', 'high' );
		add_meta_box( 'add_shortcode_metabox', 'Add Shortcode', 'meta_options_shortcode', 'page', 'normal', 'high' );
		add_meta_box( 'add_shortcode_metabox', 'Add Shortcode', 'meta_options_shortcode', 'portfolio', 'normal', 'high' );
	}
}

add_action('admin_menu', 'create_meta_box_shortcode');




function renderHTML($opt){
	
	    $output='';
	
		switch($opt['type']):
		case 'select':
		
			$output .= '<select id="'. $opt['id'] .'">';
		
			foreach ($opt['options'] as $option) {
				
				 $output .= '<option>';
				 $output .= $option;
				 $output .= '</option>';
			 
			 } 
			 $output .= '</select>';

			
		break;
		
		case 'text':

			$output .= '<input id="'. $opt['id'] .'" value="" />';
			
		break;
		case 'textarea':
			
			$output .= '<textarea id="'. $opt['id'] .'"></textarea>';
			
		break;
		
		
		
		case 'upload':
		
		    $output .= '<div class="op_upload_wrap" >';
			$output .= '<input id="'. $opt['id'] .'" value="" />';
			$output .= '<button class="button-primary">Browse</button>';
			$output .= '</div>';
		
		break;
		case "range":
			
			$output .= '<div class="range-input-container">';
			
			$output .= '<input id="'. $opt['id'].'" type="range" ';
			
			if (isset($opt['min'])) $output .= '" min="' . $opt['min'];
			if (isset($opt['max'])) $output .= '" max="' . $opt['max'];
			if (isset($opt['step'])) $output .= '" step="' . $opt['step'];
			$output .= '" />';
			
			if (isset($opt['unit'])) $output .= '<span>' . $opt['unit'] . '</span>';
			
			$output .= '</div>';
			
	    break;
		
		case 'multiselect_portfolio':

		   $args = array("hide_empty" => 1,"taxonomy" => "portfolio_category");  
		   
		   $of_categories_obj = get_categories($args);


		   
		   $output .='<select style="height:120px;" id="'. $opt['id'] .'" multiple="multiple">';
		   foreach ($of_categories_obj as $of_cat):
			  


				$output .= '<option value="'.$of_cat->cat_ID.'">'.$of_cat->cat_name.'</option>';
				 
		   endforeach;
		   $output .='</select>';
		   
		break;
		
		case 'select_gallery':
		
		   $args = array("post_type" => "gallery", "numberposts" => "-1");           
		   
		   $of_categories_obj = get_posts($args);


		   
		   $output .='<select id="'.$opt['id'].'">';
		   foreach ($of_categories_obj as $of_cat):
			  
				$output .= '<option value="'.$of_cat->ID.'">'.$of_cat->post_title.'</option>';
				 
		   endforeach;
		   $output .='</select>';
		   
		
		break;
		
		case 'multiselect_categories':

		   $args = array("hide_empty" => 1,"taxonomy" => $opt['options']);  
		   $categories_obj = get_categories($args);

		   $output .='<select style="height:120px;" id="'. $opt['id'] .'" multiple="multiple">';
		   foreach ($categories_obj as $cat):
			  
				$output .= '<option value="'.$cat->cat_ID.'">'.$cat->cat_name.'</option>';
				 
		   endforeach;
		   $output .='</select>';
		   
		break;
		
		case 'multiselect_galleries':

		   $args = array("post_type" => "gallery", "numberposts" => "-1");           
		   
		   $of_categories_obj = get_posts($args);


		   
		   $output .='<select style="height:120px;" id="'.$opt['id'].'" multiple="multiple">';
		   foreach ($of_categories_obj as $of_cat):
			  


				$output .= '<option value="'.$of_cat->ID.'">'.$of_cat->post_title.'</option>';
				 
		   endforeach;
		   $output .='</select>';
		   
		break;
		
		case "color":

			$output .= '<div id="'. $opt['id'] .'_picker" class="colorPicker"></div>';
			$output .= '<input id="'. $opt['id'] .'" type="text" value="#333333" /><div class="colorSelector"></div>';
			
			$output .= "<script>
			jQuery(document).ready( function($) {
			
				$('#".$opt['id']."_picker').farbtastic('#".$opt['id']."');
			
			});
			</script>";
		
		break; 
		
		case "select_posts":

			$args = array("post_type" => $opt['options'], "numberposts" => "-1");                    

		  	$posts_obj = get_posts($args);
		   
			$output .= '<select id="'. $opt['id'] .'">';
				 
			foreach ($posts_obj  as $cat) {
				
				 $output .= '<option value="'.$cat->ID.'">';
				 $output .= $cat->post_title;
				 $output .= '</option>';
			 
			 } 
			 $output .= '</select>';
			
	    break;
		


	endswitch;
	
	echo $output;
}







?>