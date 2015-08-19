jQuery(document).ready( function($) {

	var $select_list=$('#post-formats-select');
	

	if($select_list.length>0) {

		var val=$select_list.find(':checked').val();
		$('.op_pf').hide();
		$('.op_pf_'+val).show();
		
	
		$select_list.change(function() {
			
			val=$select_list.find(':checked').val();
			$('.op_pf').hide();
			$('.op_pf_'+val).show();
			
		});
	
	}

	
});


