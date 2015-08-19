jQuery(document).ready( function($) {

	var $select_list=$('#page_template');
	
	if($select_list.length>0) {

		var val=$select_list.val();
		$('.op_template_type').hide();
		$('.op_'+val.substring(0, val.length - 4)).show();


		$select_list.change(function() {
			
			val=$select_list.val();
			$('.op_template_type').hide();
			$('.op_'+val.substring(0, val.length - 4)).show();
			
		});
	
	}

	
});


