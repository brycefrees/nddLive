<?php

// OptionsFramework Admin Interface

/*-----------------------------------------------------------------------------------*/
/* Options Framework Admin Interface - optionsframework_add_admin */
/*-----------------------------------------------------------------------------------*/

// Load static framework options pages 
$functions_path = THEME_FRAMEWORK . '/admin/';

function optionsframework_add_admin() {

    global $query_string;
    
    $themename =  get_option('of_themename');      
    $shortname =  get_option('of_shortname'); 
   
    if ( isset($_REQUEST['page']) && $_REQUEST['page'] == 'optionsframework' ) {
		if (isset($_REQUEST['of_save']) && 'reset' == $_REQUEST['of_save']) {
			$options =  get_option('of_template'); 
			of_reset_options($options,'optionsframework');
			header("Location: admin.php?page=optionsframework&reset=true");
			die;
		}
    }
			
	$of_page = add_menu_page( $themename, $themename .'<br/>Admin Panel', 'edit_theme_options', 'optionsframework', 'optionsframework_options_page');
	
	// Add framework functionaily to the head individually
	add_action("admin_print_scripts-$of_page", 'of_load_only');
} 

add_action('admin_menu', 'optionsframework_add_admin');

/*-----------------------------------------------------------------------------------*/
/* Options Framework Reset Function - of_reset_options */
/*-----------------------------------------------------------------------------------*/

function of_reset_options($options,$page = ''){

	global $wpdb;
	$query_inner = '';
	$count = 0;
	
	$excludes = array( 'blogname' , 'blogdescription' );
	
	foreach($options as $option){
			
		if(isset($option['id'])){ 
			$count++;
			$option_id = $option['id'];
			$option_type = $option['type'];
			
			//Skip assigned id's
			if(in_array($option_id,$excludes)) { continue; }
			
			if($count > 1){ $query_inner .= ' OR '; }
			if($option_type == 'multicheck'){
				$multicount = 0;
				foreach($option['options'] as $option_key => $option_option){
					$multicount++;
					if($multicount > 1){ $query_inner .= ' OR '; }
					$query_inner .= "option_name = '" . $option_id . "_" . $option_key . "'";
					
				}
				
			} else if(is_array($option_type)) {
				$type_array_count = 0;
				foreach($option_type as $inner_option){
					$type_array_count++;
					$option_id = $inner_option['id'];
					if($type_array_count > 1){ $query_inner .= ' OR '; }
					$query_inner .= "option_name = '$option_id'";
				}
				
			} else {
				$query_inner .= "option_name = '$option_id'";
			}
		}
			
	}
	
	//When Theme Options page is reset - Add the of_options option
	if($page == 'optionsframework'){
		$query_inner .= " OR option_name = 'of_options'";
	}
	
	//echo $query_inner;
	
	$query = "DELETE FROM $wpdb->options WHERE $query_inner";
	$wpdb->query($query);
		
}


/*-----------------------------------------------------------------------------------*/
/* Build the Options Page - optionsframework_options_page */
/*-----------------------------------------------------------------------------------*/

function optionsframework_options_page(){
    $options =  get_option('of_template');      
    $themename =  get_option('of_themename');
?>


<div class="wrap" id="of_container">
  <div id="of-popup-save" class="of-save-popup">
    <div class="of-save-save">Options Updated</div>
  </div>
  <div id="of-popup-reset" class="of-save-popup">
    <div class="of-save-reset">Options Reset</div>
  </div>
  <form action="" enctype="multipart/form-data" id="ofform">
    <div id="header">
      <div class="logo">
        <h2><?php echo $themename; ?> Admin Panel</h2>
      </div>
	  <button id="save_all_changes" type="submit" class="of-button" />Save All Changes</button>
      <div class="clear"></div>
    </div>
    <?php 
		// Rev up the Options Machine
        $return = optionsframework_machine($options);
    ?>
    <div id="main">
      <div id="of-nav">
        <ul>
          <?php echo $return[1] ?>
        </ul>
      </div>
      <div id="content"> <?php echo $return[0]; /* Settings */ ?> </div>
      <div class="clear"></div>
    </div>
    <div class="save_bar_top">
    <img style="display:none" src="<?php echo THEME_ADMIN_IMG; ?>/loading-bottom.gif" class="ajax-loading-img ajax-loading-img-bottom" alt="Working..." />

  </form>
  <form action="<?php echo esc_attr( $_SERVER['REQUEST_URI'] ) ?>" method="post" style="display:inline" id="ofform-reset">
    <span class="submit-footer-reset">

    <input name="reset" type="submit" value="Reset Options"  class="button submit-button reset-button" onclick="return confirm('Click OK to reset. Any settings will be lost!');" />
    <input type="hidden" name="of_save" value="reset" />
    </span>
  </form>
  
  
	</div>
<?php  if (!empty($update_message)) echo $update_message; ?>
<div style="clear:both;"></div>
</div>
<!--wrap-->


<?php
}


/*-----------------------------------------------------------------------------------*/
/* Load required javascripts for Options Page - of_load_only */
/*-----------------------------------------------------------------------------------*/

function of_load_only() {

	add_action('admin_head', 'of_admin_head');


	
	
	
	function of_admin_head() { 
			
	
		
		?>

<script>
			jQuery(document).ready(function(){
			
			var flip = 0;
				
				/*
			jQuery('#expand_options').click(function(){
				if(flip == 0){
					flip = 1;
					jQuery('#of_container #of-nav').hide();
					jQuery('#of_container #content').width(755);
					jQuery('#of_container .group').add('#of_container .group h2').show();
	
					jQuery(this).text('[-]');
					
				} else {
					flip = 0;
					jQuery('#of_container #of-nav').show();
					jQuery('#of_container #content').width(595);
					jQuery('#of_container .group').add('#of_container .group h2').hide();
					jQuery('#of_container .group:first').show();
					jQuery('#of_container #of-nav li').removeClass('current');
					jQuery('#of_container #of-nav li:first').addClass('current');
					
					jQuery(this).text('[+]');
				
				}
			
			});
			
			
				jQuery('.group').hide();
				jQuery('.group:first').fadeIn();
				
				jQuery('.group .collapsed').each(function(){
					jQuery(this).find('input:checked').parent().parent().parent().nextAll().each( 
						function(){
           					if (jQuery(this).hasClass('last')) {
           						jQuery(this).removeClass('hidden');
           						return false;
           					}
           					jQuery(this).filter('.hidden').removeClass('hidden');
           				});
           		});
           					
				jQuery('.group .collapsed input:checkbox').click(unhideHidden);
				
				
				function unhideHidden(){
					if (jQuery(this).attr('checked')) {
						jQuery(this).parent().parent().parent().nextAll().removeClass('hidden');
					}
					else {
						jQuery(this).parent().parent().parent().nextAll().each( 
							function(){
           						if (jQuery(this).filter('.last').length) {
           							jQuery(this).addClass('hidden');
									return false;
           						}
           						jQuery(this).addClass('hidden');
           					});
           					
					}
				}
				
				
				jQuery('.of-radio-img-img').click(function(){
					jQuery(this).parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');
					jQuery(this).addClass('of-radio-img-selected');
					
				});
				jQuery('.of-radio-img-label').hide();
				jQuery('.of-radio-img-img').show();
				jQuery('.of-radio-img-radio').hide();
				*/

				jQuery('#of-nav li:first').addClass('current');
				jQuery('#of-nav li a').click(function(evt){
				
						jQuery('#of-nav li').removeClass('current');
						jQuery(this).parent().addClass('current');
						
						var clicked_group = jQuery(this).attr('href');
		 
						jQuery('.group').hide();
						
							jQuery(clicked_group).fadeIn();
		
						evt.preventDefault();
						
					});
				
				if('<?php if(isset($_REQUEST['reset'])) { echo $_REQUEST['reset'];} else { echo 'false';} ?>' == 'true'){
					
					var reset_popup = jQuery('#of-popup-reset');
					reset_popup.fadeIn();
					window.setTimeout(function(){
						   reset_popup.fadeOut();                        
						}, 2000);
						//alert(response);
					
				}
					
			//Update Message popup
			jQuery.fn.center = function () {
				this.animate({"top":( jQuery(window).height() - this.height() - 200 ) / 2+jQuery(window).scrollTop() + "px"},100);
				this.css("left", 250 );
				return this;
			}
		
			
			jQuery('#of-popup-save').center();
			jQuery('#of-popup-reset').center();
			jQuery(window).scroll(function() { 
			
				jQuery('#of-popup-save').center();
				jQuery('#of-popup-reset').center();
			
			});
			
			
		
			//AJAX Upload
			jQuery('.image_upload_button').each(function(){
			
			var clickedObject = jQuery(this);
			var clickedID = jQuery(this).attr('id');	
			new AjaxUpload(clickedID, {
				  action: '<?php echo admin_url("admin-ajax.php"); ?>',
				  name: clickedID, // File upload name
				  data: { // Additional data to send
						action: 'of_ajax_post_action',
						type: 'upload',
						data: clickedID },
				  autoSubmit: true, // Submit file after selection
				  responseType: false,
				  onChange: function(file, extension){},
				  onSubmit: function(file, extension){
						clickedObject.text('Uploading'); // change button text, when user selects file	
						this.disable(); // If you want to allow uploading only 1 file at time, you can disable upload button
						interval = window.setInterval(function(){
							var text = clickedObject.text();
							if (text.length < 13){	clickedObject.text(text + '.'); }
							else { clickedObject.text('Uploading'); } 
						}, 200);
				  },
				  onComplete: function(file, response) {
				   
					window.clearInterval(interval);
					clickedObject.text('Upload Image');	
					this.enable(); // enable upload button
					
					// If there was an error
					if(response.search('Upload Error') > -1){
						var buildReturn = '<span class="upload-error">' + response + '</span>';
						jQuery(".upload-error").remove();
						clickedObject.parent().after(buildReturn);
					
					}
					else{
						var buildReturn = '<img class="hide of-option-image" id="image_'+clickedID+'" src="'+response+'" alt="" />';

						jQuery(".upload-error").remove();
						jQuery("#image_" + clickedID).remove();	
						clickedObject.parent().after(buildReturn);
						jQuery('img#image_'+clickedID).fadeIn();
						clickedObject.next('span').fadeIn();
						clickedObject.parent().prev('input').val(response);
					}
				  }
				});
			
			});
			
			//AJAX Remove (clear option value)
			jQuery('.image_reset_button').click(function(){
			
					var clickedObject = jQuery(this);
					var clickedID = jQuery(this).attr('id');
					var theID = jQuery(this).attr('title');	
	
					var ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';
				
					var data = {
						action: 'of_ajax_post_action',
						type: 'image_reset',
						data: theID
					};
					
					jQuery.post(ajax_url, data, function(response) {
						var image_to_remove = jQuery('#image_' + theID);
						var button_to_hide = jQuery('#reset_' + theID);
						image_to_remove.fadeOut(500,function(){ jQuery(this).remove(); });
						button_to_hide.fadeOut();
						clickedObject.parent().prev('input').val('');
						
						
						
					});
					
					return false; 
					
				});   	 	
			
			//Save everything else
			jQuery('#ofform').submit(function(){
				
					function newValues() {
					  var serializedValues = jQuery("#ofform").serialize();
					  return serializedValues;
					}
					jQuery(":checkbox, :radio").click(newValues);
					jQuery("select").change(newValues);
					jQuery('.ajax-loading-img').fadeIn();
					var serializedReturn = newValues();
					 
					var ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';
				
					 //var data = {data : serializedReturn};
					var data = {
						<?php if(isset($_REQUEST['page']) && $_REQUEST['page'] == 'optionsframework'){ ?>
						type: 'options',
						<?php } ?>

						action: 'of_ajax_post_action',
						data: serializedReturn
					};
					
					jQuery.post(ajax_url, data, function(response) {
						var success = jQuery('#of-popup-save');
						var loading = jQuery('.ajax-loading-img');
						loading.fadeOut();  
						success.fadeIn();
						window.setTimeout(function(){
						   success.fadeOut(); 
						   
												
						}, 2000);
					});
					
					return false; 
					
				});   	 	
				
			});
			
			
		</script>
        
       
<?php }
}

/*-----------------------------------------------------------------------------------*/
/* Ajax Save Action - of_ajax_callback */
/*-----------------------------------------------------------------------------------*/

add_action('wp_ajax_of_ajax_post_action', 'of_ajax_callback');

function of_ajax_callback() {
	global $wpdb; // this is how you get access to the database
	
		
	$save_type = $_POST['type'];
	//Uploads
	if($save_type == 'upload'){
		
		$clickedID = $_POST['data']; // Acts as the name
		$filename = $_FILES[$clickedID];
       	$filename['name'] = preg_replace('/[^a-zA-Z0-9._\-]/', '', $filename['name']); 
		
		$override['test_form'] = false;
		$override['action'] = 'wp_handle_upload';    
		$uploaded_file = wp_handle_upload($filename,$override);
		 
				$upload_tracking[] = $clickedID;
				update_option( $clickedID , $uploaded_file['url'] );
				
		 if(!empty($uploaded_file['error'])) {echo 'Upload Error: ' . $uploaded_file['error']; }	
		 else { echo $uploaded_file['url']; } // Is the Response
	}
	elseif($save_type == 'image_reset'){
			
			$id = $_POST['data']; // Acts as the name
			global $wpdb;
			$query = "DELETE FROM $wpdb->options WHERE option_name LIKE '$id'";
			$wpdb->query($query);
	
	}	
	elseif ($save_type == 'options' OR $save_type == 'framework') {
		$data = $_POST['data'];
		
		parse_str($data,$output);

		
		//Pull options
        $options = get_option('of_template');

		
		foreach($options as $option_array){

			$id = $option_array['id'];
			$old_value = get_option($id);
			$new_value = '';
			
			if(isset($output[$id])){
				$new_value = $output[$option_array['id']];
			}
	
			if(isset($option_array['id'])) { // Non - Headings...
			
					///
					//$new_value = $output[$id];
					//if($new_value != '') update_option( $id, stripslashes($new_value));
			
			
					$type = $option_array['type'];
					
					
			
					if ( is_array($type)){
						foreach($type as $array){
							if($array['type'] == 'text' ){
								$id = $array['id'];
								$std = $array['std'];
								$new_value = $output[$id];
								if($new_value == ''){ $new_value = $std; }
								update_option( $id, stripslashes($new_value));
							}
						}                 
					}
					elseif($new_value == '' && $type == 'checkbox'){ // Checkbox Save
						
						update_option($id,'false');
					}
					elseif ($new_value == 'true' && $type == 'checkbox'){ // Checkbox Save
						
						update_option($id,'true');
					}
					elseif($type == 'multicheck'){ // Multi Check Save
						
						$option_options = $option_array['options'];
						
						foreach ($option_options as $options_id => $options_value){
							
							$multicheck_id = $id . "_" . $options_id;
							
							if(!isset($output[$multicheck_id])){
							  update_option($multicheck_id,'false');
							}
							else{
							   update_option($multicheck_id,'true'); 
							}
						}
					}
					elseif($type == 'multiselect'){	
					
						$new_value = $output[$id];
						$new_value = implode($new_value,',');
											
						update_option($id,$new_value); 
				
					
					
					}				
					elseif($type != 'upload_min'){
						
						update_option($id,stripslashes($new_value));
					}

					
					
				}
			}	
	
	}

  die();

}



/*-----------------------------------------------------------------------------------*/
/* Generates The Options Within the Panel - optionsframework_machine */
/*-----------------------------------------------------------------------------------*/

function optionsframework_machine($options) {
        
    $counter = 0;
	$menu = '';
	$output = '';
	foreach ($options as $value) {
	   
		$counter++;
		$val = '';
		//Start Heading
		 
		 if(!isset($value['type'])) $value['type']='';
		 if(!isset($value['name'])) $value['name']='';
		 
		 if ( $value['type'] != "heading" ){
		 	$class = ''; if(isset( $value['class'] )) { $class = $value['class']; }
			$output .= '<div class="section section-'.$value['type'].' '. $class .'">'."\n";
			$output .= '<h3 class="heading">'. $value['name'] .'</h3>'."\n";
			$output .= '<div class="option">'."\n" . '<div class="controls">'."\n";

		 } 

		 //End Heading
		 
		
		
		$select_value = '';      
		
		switch ( $value['type'] ):
		
		case 'text':
			
			$val = get_option($value['id']);
			if($val=='' && isset($value['std'])) $val = $value['std'];

			$output .= '<input class="of-input" name="'. $value['id'] .'" id="'. $value['id'] .'" type="'. $value['type'] .'" value="'. $val .'" />';
		
		break;
		
		case 'select':

			$output .= '<select class="of-input" name="'. $value['id'] .'" id="'. $value['id'] .'">';
		
			$select_value = get_option($value['id']);
			if($select_value=='')  $select_value=$value['std'];
			
			$i=1;
			 
			foreach ($value['options'] as $option) {
				
				$selected = '';
				
				 if($select_value == $i) {
					
						$selected = ' selected="selected"'; 
				 }
				  
				 $output .= '<option'. $selected .' value="'.$i.'">';
				 $output .= $option;
				 $output .= '</option>';
				 
				 $i++;
			 
			 } 
			 $output .= '</select>';

			
		break;
		
		case 'select_letters':

			$output .= '<select class="of-input" name="'. $value['id'] .'" id="'. $value['id'] .'">';
		
			$select_value = get_option($value['id']);
			if($select_value=='') $select_value=$value['std'];
			 
			foreach ($value['options'] as $option) {
				
				$selected = '';
				
				 if($select_value == $option) {
					
						$selected = ' selected="selected"'; 
				 }
				  
				 $output .= '<option'. $selected .' value="'.$option.'">';
				 $output .= $option;
				 $output .= '</option>';
				
			 
			 } 
			 $output .= '</select>';

			
		break;
		
		
		case 'select_slideshow':
		
	

		   $args = array("post_type" => "gallery", "numberposts" => "-1");                    

		   $posts_obj = get_posts($args);
		   
			$output .= '<select class="of-input" name="'. $value['id'] .'" id="'. $value['id'] .'">';
		
			$selected_value = get_option($value['id']);
			
			if(!$selected_value) $selected_value=$value['std'];
			
			 
			foreach ($posts_obj  as $cat) {
				
				$selected = '';
				
				 if ( $selected_value == $cat->ID) { $selected = ' selected="selected"';} 

				  
				 $output .= '<option'. $selected .' value="'.$cat->ID.'">';
				 $output .= $cat->post_title;
				 $output .= '</option>';
			 
			 } 
			 $output .= '</select>';

			
		break;
		
		case 'select_background':
		
			$i = 0;
			$select_value = get_option($value['id']);

			$output .= '<ul class="background-pattern-list">';
			
			foreach ($value['options'] as $key => $option) : 

				$i++;

				$checked = '';
				$selected = '';
				if($select_value != '' && $select_value == $option) { $checked = ' checked'; $selected = 'of-radio-img-selected'; } 


							
				if($checked == ' checked') $current=' class="current"';
				else $current='';
				

				$output .= '<li '.$current.' style="background-image:url('.$option.')">';
				$output .= '<input type="radio" id="of-radio-img-' . $value['id'] . $i . '" class="checkbox of-radio-img-radio" value="'.$option.'" name="'. $value['id'].'" '.$checked.' />';
				$output .='</li>';

			endforeach;


			$output .= '</ul>';
		
		break;
		
		case 'textarea':
			
			$cols = '8';
			$ta_value = '';
			
			if(isset($value['std'])) {
				
				$ta_value = $value['std']; 
				
				if(isset($value['options'])){
					$ta_options = $value['options'];
					if(isset($ta_options['cols'])){
					$cols = $ta_options['cols'];
					} else { $cols = '8'; }
				}
				
			}
				$std = get_option($value['id']);
				if( $std != "") { $ta_value = stripslashes( $std ); }
				$output .= '<textarea class="of-input" name="'. $value['id'] .'" id="'. $value['id'] .'" cols="'. $cols .'" rows="8">'.$ta_value.'</textarea>';
			
			
		break;
		
		case "radio":
			
			 $select_value = get_option( $value['id']);
				   
			 foreach ($value['options'] as $key => $option) 
			 { 

				 $checked = '';
				   if($select_value != '') {
						if ( $select_value == $key) { $checked = ' checked'; } 
				   } else {
					if ($value['std'] == $key) { $checked = ' checked'; }
				   }
				$output .= '<input class="of-input of-radio" type="radio" name="'. $value['id'] .'" value="'. $key .'" '. $checked .' />' . $option .'<br />';
			
			}
			 
		break;
		
				
		case "color":

			$val=get_option($value['id']);
			if(!isset($val)) $val=$value['std'];
					
			$output .= '<div id="'.  $value['id'] .'_picker" class="colorPicker"></div>';
			$output .= '<input id="'. $value['id'] .'" type="text" name="'. $value['id'] .'" class="colorInput" value="'.$val.'" /><div class="colorSelector"></div>';
			
			$output .= "<script>
			jQuery(document).ready( function($) {
			
				$('#". $value['id']."_picker').farbtastic('#". $value['id']."');
			
			});
			</script>";
		
		break; 

		case 'multiselect':
		
		
		   $meta_array=explode(",",get_option($value['id']));
		   
		   
		   
		   $output .='<select style="height:120px;" name="'.$value['id'].'[]" id="'.$value['id'].'" class="widefat of-input" multiple="multiple">';
		   foreach ($value['options'] as $option):
		      
				$selected='';
				if($meta_array) 
					foreach ($meta_array as $a):

						if($a==$option) $selected = ' selected="selected"';

				
					endforeach;

				$output .= '<option'. $selected .' class="of-input" value="'.$option.'">'.$option.'</option>';
				 
		   endforeach;
		   $output .='</select>';
		   
		   ///////
		
		
		break;
		case "upload":
			
			$output .= optionsframework_uploader_function($value['id'],$value['id'],null);
			
		break;
		case "upload_min":
			
			$output .= optionsframework_uploader_function($value['id'],$value['std'],'min');
			
		break;

		
	    case "range":
			
			$output .= '<div class="range-input-container">';
			
			$output .= '<input type="range" name="' . $value['id'] . '" value="';
			
			
			$val = get_option($value['id']);			
			if($val=='' || !isset($val)) $val = $value['std'];
			

			
			$output .= $val;
			
			if (isset($value['min'])) $output .= '" min="' . $value['min'];
			if (isset($value['max'])) $output .= '" max="' . $value['max'];
			if (isset($value['step'])) $output .= '" step="' . $value['step'];
	
			$output .= '" />';
			
			if (isset($value['unit'])) $output .= '<span>' . $value['unit'] . '</span>';
			
			$output .= '</div>';
			
	    break;
				
		case "images":
			$i = 0;
			$select_value = get_option( $value['id']);
				   
			foreach ($value['options'] as $key => $option) 
			 { 
			 $i++;

				 $checked = '';
				 $selected = '';
				   if($select_value != '') {
						if ( $select_value == $key) { $checked = ' checked'; $selected = 'of-radio-img-selected'; } 
				    } else {
						if ($value['std'] == $key) { $checked = ' checked'; $selected = 'of-radio-img-selected'; }
						elseif ($i == 1  && !isset($select_value)) { $checked = ' checked'; $selected = 'of-radio-img-selected'; }
						elseif ($i == 1  && $value['std'] == '') { $checked = ' checked'; $selected = 'of-radio-img-selected'; }
						else { $checked = ''; }
					}	
				
				$output .= '<span>';
				$output .= '<input type="radio" id="of-radio-img-' . $value['id'] . $i . '" class="checkbox of-radio-img-radio" value="'.$key.'" name="'. $value['id'].'" '.$checked.' />';
				$output .= '<div class="of-radio-img-label">'. $key .'</div>';
				$output .= '<img src="'.$option.'" alt="" class="of-radio-img-img '. $selected .'" onClick="document.getElementById(\'of-radio-img-'. $value['id'] . $i.'\').checked = true;" />';
				$output .= '</span>';
				
			}
		
		break; 
		
		case "select_images":
	
			$i = 0;
			$select_value = get_option($value['id']);
			

			
			$output .= '<ul class="checkbox-list">';
				   
			foreach ($value['options'] as $key => $option) : 
			
				
			 $i++;

				 $checked = '';
				 $selected = '';
				   if($select_value != '') {
						if ( $select_value == $key) { $checked = ' checked'; $selected = 'of-radio-img-selected'; } 
					} else {
						if ($value['std'] == $key) { $checked = ' checked'; $selected = 'of-radio-img-selected'; }
						elseif ($i == 1  && !isset($select_value)) { $checked = ' checked'; $selected = 'of-radio-img-selected'; }
						elseif ($i == 1  && $value['std'] == '') { $checked = ' checked'; $selected = 'of-radio-img-selected'; }
						else { $checked = ''; }
					}	
				
				$output .= '<li class="'.$checked.'">';
					$output .= '<input type="radio" id="of-radio-img-' . $value['id'] . $i . '" class="checkbox of-radio-img-radio" value="'.$key.'" name="'. $value['id'].'" '.$checked.' />';
					$output .= '<img src="'.$option['url'].'" alt="" class="of-radio-img-img '. $selected .'" onClick="document.getElementById(\'of-radio-img-'. $value['id'] . $i.'\').checked = true;" />';
					$output .= '<div class="of-radio-img-label">'.$option['desc'].'</div>';
				$output .= '</li>';
				
			endforeach;
			
			$output .= '</ul>';
		
		break; 
		
    
		
		case "custom_sidebar":
				
			$custom_sidebars=get_theme_option('custom_sidebars');
			if(!empty($custom_sidebars)) $custom_sidebars_array = explode(',',$custom_sidebars);
			else $custom_sidebars_array = array();
		
			$output.= '<input type="text" id="sidebar_name"/>';

			$output.= '<a id="add_sidebar" class="of-button"/>Create sidebar</a>';
			
			$output.='<h3 id="sidebar_heading" class="heading">Created Sidebars</h3>';
			
			$output.='<div id="created_sidebars">';
			
			if(!empty($custom_sidebars)){
			
				
				for($i=0; $i<count($custom_sidebars_array)-1; $i++) $output.= '<div class="created_item" data-name="'.$custom_sidebars_array[$i].'">'.$custom_sidebars_array[$i].'<a class="of-button"/>delete</a></div>';
				
			}
			
			$output.='</div>';

	

			$output.= '<input id="custom_sidebars" type="hidden" value="' . $custom_sidebars . '" name="' . $value['id'] . '" />';
		
		break;       

		case "custom_footer":
				
			$custom_footers_names=get_theme_option("adm_custom_footers_name");
			$custom_footers_layout=get_theme_option("adm_custom_footers_layout");
				
			if(!empty($custom_footers_names)) $custom_footers_names_array = explode(',',$custom_footers_names);
			if(!empty($custom_footers_layout)) $custom_footers_layout_array = explode(',',$custom_footers_layout);
			
		
			$output .= '<ul id="adm_footer_layout" class="checkbox-list">';
			
			$output .= '<li>';
			
				$output .= '<input type="radio" name="sex" value="1" />';
				$output .= '<img src="'.THEME_ADMIN_IMG.'/layouts/2.png"/>';
				$output .= '<div class="of-radio-img-label">1/1</div>';
			
			$output .= '</li>';
			
			$output .= '<li>';
			
				$output .= '<input type="radio" name="sex" value="2" />';
				$output .= '<img src="'.THEME_ADMIN_IMG.'/layouts/3.png"/>';
				$output .= '<div class="of-radio-img-label">1/2 1/2</div>';
			
			$output .= '</li>';
			
			$output .= '<li>';
			
				$output .= '<input type="radio" name="sex" value="3" />';
				$output .= '<img src="'.THEME_ADMIN_IMG.'/layouts/4.png"/>';
				$output .= '<div class="of-radio-img-label">1/3 1/3 1/3</div>';
			
			$output .= '</li>';
			
						$output .= '<li>';
			
				$output .= '<input type="radio" name="sex" value="4" />';
				$output .= '<img src="'.THEME_ADMIN_IMG.'/layouts/5.png"/>';
				$output .= '<div class="of-radio-img-label">1/3 2/3</div>';
			
			$output .= '</li>';
			
			$output .= '<li>';
			
				$output .= '<input type="radio" name="sex" value="5" />';
				$output .= '<img src="'.THEME_ADMIN_IMG.'/layouts/6.png"/>';
				$output .= '<div class="of-radio-img-label">2/3 1/3</div>';
			
			$output .= '</li>';
			
			$output .= '<li>';
			
				$output .= '<input type="radio" name="sex" value="6" />';
				$output .= '<img src="'.THEME_ADMIN_IMG.'/layouts/7.png"/>';
				$output .= '<div class="of-radio-img-label">1/4 1/4 1/4 1/4</div>';
			
			$output .= '</li>';
			
			$output .= '<li>';
			
				$output .= '<input type="radio" name="sex" value="7" />';
				$output .= '<img src="'.THEME_ADMIN_IMG.'/layouts/8.png"/>';
				$output .= '<div class="of-radio-img-label">1/2 1/4 1/4</div>';
			
			$output .= '</li>';
			
			$output .= '<li>';
			
				$output .= '<input type="radio" name="sex" value="8" />';
				$output .= '<img src="'.THEME_ADMIN_IMG.'/layouts/9.png"/>';
				$output .= '<div class="of-radio-img-label">1/4 1/2 1/4</div>';
			
			$output .= '</li>';
			
			$output .= '<li>';
			
				$output .= '<input type="radio" name="sex" value="9" />';
				$output .= '<img src="'.THEME_ADMIN_IMG.'/layouts/10.png"/>';
				$output .= '<div class="of-radio-img-label">1/4 1/4 1/2</div>';
			
			$output .= '</li>';
			
			$output .= '<li>';
			
				$output .= '<input type="radio" name="sex" value="10" />';
				$output .= '<img src="'.THEME_ADMIN_IMG.'/layouts/11.png"/>';
				$output .= '<div class="of-radio-img-label">3/4 1/4</div>';
			
			$output .= '</li>';
			
			$output .= '<li>';
			
				$output .= '<input type="radio" name="sex" value="11" />';
				$output .= '<img src="'.THEME_ADMIN_IMG.'/layouts/12.png"/>';
				$output .= '<div class="of-radio-img-label">1/4 3/4</div>';
			
			$output .= '</li>';
			
			$output .= '</ul>';
		
			$output.= '<input type="text" id="adm_footer_name" placeholder="Footer Name"/>';
			
			$output.= '<a id="adm_add_footer" class="of-button">Create Footer</a>';
			
			$output.='<h3 id="sidebar_heading" class="heading">Created Footers</h3>';
			
			$output.='<div id="created_footers">';
			
			if(!empty($custom_footers_names)){
				
				for($i=0; $i<count($custom_footers_names_array)-1; $i++) $output.= '<div class="created_item" data-name="'.$custom_footers_names_array[$i].'" data-layout="'.$custom_footers_layout_array[$i].'">'.$custom_footers_names_array[$i].'<a class="of-button">delete</a></div>';
				
			}
						
			$output.='</div>';

			$output.= '<input id="adm_custom_footers_name" type="hidden" value="' . $custom_footers_names . '" name="'.$value['id'].'" />';
			$output.= '<input id="adm_custom_footers_layout" type="hidden" value="' . $custom_footers_layout. '" name="'.THEME_SLUG.'adm_custom_footers_layout" />';
		
		break;   		
		
		case "heading":
			
			if($counter >= 2){
			   $output .= '</div>'."\n";
			}
			$jquery_click_hook = ereg_replace("[^A-Za-z0-9]", "", strtolower($value['name']) );
			$jquery_click_hook = "of-option-" . $jquery_click_hook;
			$menu .= '<li><a title="'.  $value['name'] .'" href="#'.  $jquery_click_hook  .'">'.  $value['name'] .'</a></li>';
			$output .= '<div class="group" id="'. $jquery_click_hook  .'"><h2>'.$value['name'].'</h2>'."\n";
		break;   
		                               
		endswitch;

		
		// if TYPE is an array, formatted into smaller inputs... ie smaller values
		if ( is_array($value['type'])) {
			foreach($value['type'] as $array){
			
					$id = $array['id']; 
					$std = $array['std'];
					$saved_std = get_option($id);
					if($saved_std != $std){$std = $saved_std;} 
					$meta = $array['meta'];
					
					if($array['type'] == 'text') { // Only text at this point
						 
						 $output .= '<input class="input-text-small of-input" name="'. $id .'" id="'. $id .'" type="text" value="'. $std .'" />';  
						 $output .= '<span class="meta-two">'.$meta.'</span>';
					}
				}
		}
		if ( $value['type'] != "heading" ) { 
			if ( $value['type'] != "checkbox" ) 
				{ 
				$output .= '<br/>';
				}
			if(!isset($value['desc'])){ $explain_value = ''; } else{ $explain_value = $value['desc']; } 
			$output .= '</div><div class="explain">'. $explain_value .'</div>'."\n";
			$output .= '<div class="clear"> </div></div></div>'."\n";
			}
	   
	}
    $output .= '</div>';
    return array($output,$menu);

}


/*-----------------------------------------------------------------------------------*/
/* OptionsFramework Uploader - optionsframework_uploader_function */
/*-----------------------------------------------------------------------------------*/

function optionsframework_uploader_function($id,$std,$mod){

    //$uploader .= '<input type="file" id="attachement_'.$id.'" name="attachement_'.$id.'" class="upload_input"></input>';
    //$uploader .= '<span class="submit"><input name="save" type="submit" value="Upload" class="button upload_save" /></span>';
    
	$uploader = '';
    $upload = get_option($id);
	
	if($mod != 'min') { 
			$val = $std;
            if ( get_option( $id ) != "") { $val = get_option($id); }
            $uploader .= '<input class="of-input" name="'. $id .'" id="'. $id .'_upload" type="text" value="'. $val .'" />';
	}
	
	$uploader .= '<div class="upload_button_div"><a class="of-button white image_upload_button" id="'.$id.'">Upload Image</a>';
	

	$uploader .='</div>' . "\n";
    $uploader .= '<div class="clear"></div>' . "\n";
	if(!empty($upload)){
    	$uploader .= '<a class="of-uploaded-image" href="'. $upload . '">';
    	$uploader .= '<img class="of-option-image" id="image_'.$id.'" src="'.$upload.'" alt="" />';
    	$uploader .= '</a>';
		}
	$uploader .= '<div class="clear"></div>' . "\n"; 


return $uploader;
}

?>
