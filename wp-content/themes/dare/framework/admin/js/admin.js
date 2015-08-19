jQuery(document).ready( function($) {

	//custom sidebar
	$('#add_sidebar').click(function() {
		
		var sb_name=$('#sidebar_name').val();
		
		if (sb_name!='') {
					
			$('#created_sidebars').append('<div class="created_item" data-name="'+sb_name+'">'+sb_name+'<a class="of-button">delete</a></div>');
			
			update_sidebar_field();

		}
			
	});
	
	function update_sidebar_field(){
	
		$('#custom_sidebars').val('');
		
		$('#created_sidebars .created_item').each(function(index){
		
			$('#custom_sidebars').val($('#custom_sidebars').val()+$(this).attr('data-name')+',');

		
		});
	
	}
	
	//footer layour images click
	$('#adm_footer_layout li img').click(function() {
	
		$(this).prev().attr("checked", "checked");
		
	});
	
	//custom footer
	$('#adm_add_footer').click(function() {
	
		var ci_name=$('#adm_footer_name').val();
	
		if (ci_name=='') return false;
					
		$('#created_footers').append('<div class="created_item" data-name="'+ci_name+'" data-layout="'+$('#adm_footer_layout input:checked').val()+'">'+ci_name+'<a class="of-button">delete</a></div>');
		update_footer_fields();

	});
	
	function update_footer_fields(){
	
		$('#adm_custom_footers_name, #adm_custom_footers_layout').val('');
		
		$('#created_footers .created_item').each(function(index){
		
			$('#adm_custom_footers_name').val($('#adm_custom_footers_name').val()+$(this).attr('data-name')+',');
			$('#adm_custom_footers_layout').val($('#adm_custom_footers_layout').val()+$(this).attr('data-layout')+',');
		
		});
	}

	
	$('.created_item > a').live('click', function(){
	
		$(this).parent().hide().remove();
		
		update_sidebar_field();
		update_footer_fields();
		
	});

	$(".background-pattern-list li").click(function() {
	
		$this=$(this);
		$this.siblings('li.current').removeClass('current');
		$this.addClass('current').find('input').attr('checked', true);

  
  });
	


});


