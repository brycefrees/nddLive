jQuery(document).ready( function($) {


	//iphone checkbox
	var $ibutton=$(".ibutton");
	if($ibutton.length>0) $ibutton.iButton(); 
		
	//range
	var $range=$('.range-input-container input')
	if($range.length>0) $range.rangeinput({progress:true});
	
	//colorpicker show on click
	$(".colorSelector").click(function(){
	
		$(this).prev().prev().children('.farbtastic').slideToggle(200);
		
	});
	
	$(".checkbox-list li").click(function(){
		
		$(this).siblings('li').removeClass('checked');
		$(this).addClass('checked');
	
	});

	
	
	

});


