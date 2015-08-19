jQuery(document).ready( function($) {



	var textField;
	var tb_show_temp = window.tb_show; 
	var input_gallery_items=jQuery('input#gallery_items');

	jQuery('.gallery_items_wrap').sortable({

		update: function(event, ui) { 

			update_gallery_input();

		}
	});
	
	jQuery('.gallery_items_wrap .image_remove').live('click', function() {
	
		jQuery(this).parent().remove();
		update_gallery_input();
		
	});
	
	function update_gallery_input(){
	
		var str=',';
		
		jQuery('.gallery_items_wrap img').each(function(){

			str+=jQuery(this).attr('data-image')+',';

		});
		
		input_gallery_items.val(str);
	
	}
	



	jQuery('#gallery_upload').click(function() {
		
		tb_show('Add Gallery Images', 'media-upload.php?post_id='+jQuery('#post_ID').val()+'&tab=type&TB_iframe=1');
		

	});
	
	
	window.tb_show = function() { 

		

		var iframe = jQuery('#TB_iframeContent');
		iframe.load(function() {

			var iframeJQuery = iframe[0].contentWindow.jQuery;

			jQuery('<input id="add_gallery_images" class="button-primary" value="Add Gallery Images">').insertAfter(iframeJQuery('#save-all'));
			jQuery('<input class="add_image_to_gallery button-primary" value="Add Image to Gallery">').insertBefore(iframeJQuery('.savesend .del-link'));

			iframeJQuery('#add_gallery_images').click(function(){

				var gallery_items=iframeJQuery('.media-item');
			
				input_gallery_val=input_gallery_items.val();
				if(input_gallery_val=='') input_gallery_val=',';

				gallery_items.each(function(){
				
					var id=jQuery(this).attr('id').slice(11);
					
					//if it doesn't exist add it
					if(input_gallery_val.search(','+id+',')==-1)  {
					
						jQuery('.gallery_items_wrap').append('<li><img data-image="'+id+'" src="'+jQuery(this).find('.pinkynail').attr('src')+'"><a class="image_close"></a></li>');
						input_gallery_val+=id+',';
					
					}
			
				});
				
				input_gallery_items.val(input_gallery_val);
				tb_remove();

			});
			
			iframeJQuery('.insert_adress').click(function(){

				textField.val(jQuery(this).siblings('.del-attachment').attr('id').slice(15)).trigger('change');
				tb_remove();
				
			});
		
			
			iframeJQuery('.add_image_to_gallery').click(function(){

				var id=jQuery(this).siblings('.del-attachment').attr('id').slice(15);
			
				input_gallery_items.val(input_gallery_items.val()+id+',');
				
				jQuery('.gallery_items_wrap').append('<li><img data-image="'+id+'" src="'+jQuery(this).parent().parent().parent().parent().parent().find('.pinkynail').attr('src')+'"><a class="image_close"></a></li>');
				
			});
			
		});
	}
	
	



	
	
	
});


