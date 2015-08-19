jQuery(document).ready( function($) {

	var textField;
	var val1, val2, error;
	var tb_show_temp = window.tb_show; 

	//add image url to the shortcode textfield	
	jQuery('.op_upload_wrap button').click(function(e) {

		e.preventDefault();
		tb_show('Insert Image ID', 'media-upload.php?type=gallery&tab=library&TB_iframe=1');
		textField= jQuery(this).prev();
		
			
	});
	
	window.tb_show = function() { 

		tb_show_temp.apply(null, arguments); 

		var iframe = jQuery('#TB_iframeContent');
		iframe.load(function() {

			var iframeJQuery = iframe[0].contentWindow.jQuery;

			jQuery('<input id="insert_id" class="insert_id button-primary" value="Insert Image URL">').insertBefore(iframeJQuery('.savesend .del-link'));
						
			iframeJQuery('.insert_id').click(function(){
			
				textField.val(jQuery(this).parents('.submit').siblings('.url').find('.urlfield').val());
				tb_remove();
				
			});
		
			
			
		});
	}
	
	
	//tabs 
	$('.first_sc_container_tabs').find('tr:gt(0)').hide();
	$('#sc_tabs_count').change(function(event, value) {

		$(this).parents('tbody').children('tr:gt(0)').hide();
		$(this).parents('tbody').children('tr:lt('+(value*2+1)+')').show();
		
	});
	
	//accordion
	$('.first_sc_container_accordions').find('tr:gt(0)').hide();
	$('#sc_accordions_count').change(function(event, value) {

		$(this).parents('tbody').children('tr:gt(0)').hide();
		$(this).parents('tbody').children('tr:lt('+(value*2+1)+')').show();
		
	});
	
	//testimonials
	$('.first_sc_container_testimonials').find('tr:gt(0)').hide();
	$('#sc_testimonials_count').change(function(event, value) {

		$(this).parents('tbody').children('tr:gt(0)').hide();
		$(this).parents('tbody').children('tr:lt('+(value*2+1)+')').show();
		
	});
	
	
	//pricing tables 
	$('.first_sc_container_pricing_table').find('tr:gt(0)').hide();
	$('#sc_pricing_table_count').change(function(event, value) {

		$(this).parents('tbody').children('tr:gt(0)').hide();
		$(this).parents('tbody').children('tr:lt('+(value*6+1)+')').show();
		
	});
	
	//teams
	$('.first_sc_container_team').find('tr:gt(0)').hide();
	$('#sc_team_count').change(function(event, value) {

		$(this).parents('tbody').children('tr:gt(0)').hide();
		$(this).parents('tbody').children('tr:lt('+(value*2+1)+')').show();
		
	});

	//shortodes 
	$('#first_sc_select').val('none');
	$('#first_sc_select').change(function(e, value){
		$('.first_sc_container').hide();
		$('.secondary_sc_container').hide();
		$('.secondary_sc_select').val('none');	
		$('.first_sc_container_'+this.value).stop().fadeTo(300,1);
	});
	
	$('.secondary_sc_select').change(function(){
		$('.secondary_sc_container').hide();
		$('.secondary_sc_container_'+this.value).stop().fadeTo(300,1);	
	});
	
	$('#generate_code').click(function(){
	
		var str=generate_sc_code();
		var module_name=str.replace('[','').replace(']','').split(" ")[0];
		
		$('#generated-code').val(str);
	});
	
	
	function get_text_value(val){
	
		if (val2 == undefined) return $('#sc_'+val1+'_'+val).val();
		else return $('#sc_'+val1+'_'+val2+'_'+val).val();

	}
	
	function generate_sc_code(e){
	
		val1 = $('#first_sc_select').val();
		val2 = $('.secondary_sc_select_'+val1).val();
		error='';
		var sc='';
		
		switch(val1){
		
			case 'accordions':
			
				var count=get_text_value('count');				
				var panes='';
				
				for(i=1;i<=count;i++) panes+='\n[pane title="'+get_text_value('pane_title_'+i)+'"]\n\n'+get_text_value('pane_content_'+i)+'\n\n[/pane]\n';
				
				sc='[accordion]'+panes+'[/accordion]';
				
			break;
			
			case 'alert':
						
				var type=get_text_value('type');
				var text=get_text_value('text');
				
				if(type!='...') type=' type="'+type+'"';
				else type='';
				
				sc='[alert'+type+']'+text+'[/alert]';
				
			break;
		
			case 'blog-posts':
						
				var categories=get_text_value('categories');
				var count=get_text_value('count');
				
				if(categories!=null) categories=' categories="'+categories+'"';
				else error=true;
				if(count!='1') count=' count="'+count+'"';
				else count='';

				sc='[blog-posts'+categories+count+']';
				
			break;
		
			case 'button':
						
				var text=get_text_value('text');
				var color=get_text_value('color');
				var link=get_text_value('link');
				
				if(text!='') text=' text="'+text+'"';
				else text='';
				if(color!='...') color=' color="'+color+'"';
				else color='';
				if(link!='') link=' link="'+link+'"';
				else link='';
				
				sc='[button'+text+link+color+']';
				
			break;
			
			case 'clients':
						
				var id=get_text_value('id');
				
				if(id!='') id=' id="'+id+'"';
				else error=true;
				
				sc='[clients'+id+']';
				
			break;
			
			case 'column':

				var columns=val2.split("x");
				var sc='';
				$textareas=$('.secondary_sc_container_'+val2).find('textarea');
				
				for(i=0;i<$textareas.length;i++) {
				
					pos="";
					if(i==$textareas.length-1) pos=" position='last'";
				
					sc+="[column size='"+columns[i+1].replace("-","/")+"'"+pos+"]\n\n";
					sc+=$textareas.eq(i).val();
					sc+="\n\n[/column]\n\n";
				
				}
					
			break;

			case 'contactform':
						
				var email=get_text_value('email');
				
				if(email!='') email=' email="'+email+'"';
				
				sc='[contactform'+email+']';
				
			break;
			
			case 'images':
		
				var url=get_text_value('url');
				var width=get_text_value('width');
				var height=get_text_value('height');
				var align=get_text_value('align');
				var lightbox=get_text_value('lightbox');
				var link=get_text_value('link');
				var keep_aspect_ratio=get_text_value('keep_aspect_ratio');

				if(url!='') url=' url="'+url+'"';
				else error=true;
				if(width!='10') width=' width="'+width+'"';
				else width='';
				if(height!='10') height=' height="'+height+'"';
				else height='';
				
				if(align!='none') align=' align="'+align+'"';
				else align='';
				
				if(lightbox!='no') lightbox=' lightbox="'+lightbox+'"';
				else lightbox='';
				
				if(link!='') link=' link="'+link+'"';
				else link='';
				
				if(keep_aspect_ratio!='...') keep_aspect_ratio=' keep_aspect_ratio="'+keep_aspect_ratio+'"';
				else keep_aspect_ratio='';

				sc='[image'+url+width+height+align+lightbox+link+keep_aspect_ratio+']';
				
			break;
			
			case 'info-box':
			
				var style=get_text_value('style');
				var content=get_text_value('content');
				var buttontext=get_text_value('buttontext');
				var buttonlink=get_text_value('buttonlink');

				if(style!='...') style=' style="'+style+'"';
				else style='';
				if(buttontext!='') buttontext=' buttontext="'+buttontext+'"';
				else buttontext='';
				if(buttonlink!='') buttonlink=' buttonlink="'+buttonlink+'"';
				else buttonlink='';

				sc='[info-box'+style+buttontext+buttonlink+']\n\n'+content+'\n\n[/info-box]';
			
			break;
						
			case 'list':
						
				var type=get_text_value('type');
				var content=get_text_value('content');
				
				if(type!='...') type=' type="'+type+'"';
				else type='';
				
				sc='[list'+type+']\n\n'+content+'\n\n[/list]';
				
			break;
			
			case 'portfolio':
						
				var categories=get_text_value('categories');
				var style=get_text_value('style');
				var columns=get_text_value('columns');
				var type=get_text_value('type');
				var items_per_page=get_text_value('items_per_page');
				
				if(categories!=null) categories=' categories="'+categories+'"';
				else error=true;
				if(style!='...') style=' style="'+style+'"';
				else style='';
				if(columns!='...') columns=' columns="'+columns+'"';
				else columns='';
				if(type!='...') type=' type="'+type+'"';
				else type='';
				if(items_per_page!='1') items_per_page=' items_per_page="'+items_per_page+'"';
				else items_per_page='';

				sc='[portfolio'+categories+style+columns+type+items_per_page+']';
				
			break;
			
			case 'pricing_table':
			
				var count=get_text_value('count');				
				var plans='';
				
				for(i=1;i<=count;i++) {
				
					var name=get_text_value('plan_name_'+i); 
					var price=get_text_value('plan_price_'+i); 
					var per=get_text_value('plan_per_'+i); 
					var link=get_text_value('plan_link_'+i); 
					var linkname=get_text_value('plan_linkname_'+i); 
					var features=get_text_value('plan_features_'+i); 					
					
					name=' name="'+name+'"';
					price=' price="'+price+'"';
					per=' per="'+per+'"';
					link=' buttonlink="'+link+'"';
					linkname=' buttontext="'+linkname+'"';
		
					plans+='\n[plan'+name+price+per+link+linkname+']\n'+features+'\n[/plan]\n';
				
				}
				
				count=' count="'+count+'"';
				
				
				sc='[pricing-table'+count+']\n'+plans+'[/pricing-table]';
				
			break;
				
			case 'slideshow':
						
				var gallery=get_text_value('gallery');
				var width=get_text_value('width');
				var height=get_text_value('height');
				var align=get_text_value('align');
				
				if(gallery!=null) gallery=' gallery="'+gallery+'"';
				else error=true;
				
				if(align!='...') align=' align="'+align+'"';
				else align='';
				
				width=' width="'+width+'"';
				height=' height="'+height+'"';

				sc='[slideshow'+gallery+width+height+align+']';
				
			break;
		
			case 'social-icons':
						
				var skin=get_text_value('skin');
				var skype=get_text_value('skype');
				var flickr=get_text_value('flickr');
				var twitter=get_text_value('twitter');
				var dribbble=get_text_value('dribbble');
				var facebook=get_text_value('facebook');
				var googleplus=get_text_value('googleplus');
				var forrest=get_text_value('forrest');
				var vimeo=get_text_value('vimeo');
				
				if(skin!='...') skin=' skin="'+skin+'"';
				else skin='';
				if(skype!='') skype=' skype="'+skype+'"';
				else skype='';
				if(flickr!='') flickr=' flickr="'+flickr+'"';
				else flickr='';
				if(twitter!='') twitter=' twitter="'+twitter+'"';
				else twitter='';
				if(dribbble!='') dribbble=' dribbble="'+dribbble+'"';
				else dribbble='';
				if(facebook!='') facebook=' facebook="'+facebook+'"';
				else facebook='';
				if(googleplus!='') googleplus=' googleplus="'+googleplus+'"';
				else googleplus='';
				if(forrest!='') forrest=' forrest="'+forrest+'"';
				else forrest='';
				if(vimeo!='') vimeo=' vimeo="'+vimeo+'"';
				else vimeo='';
				
				sc='[social-icons'+skin+skype+flickr+twitter+dribbble+facebook+googleplus+forrest+vimeo+']';
				
			break;
				
			case 'typography':

				switch( val2 ){
		
					case 'blockquote':
					
						var content=get_text_value('content');
						
				        if(content=='') error=true;
						
						sc='[blockquote]\n'+content+'\n[/blockquote]';
						
					break;

	
						
					case 'highlight':
					
						var content=get_text_value('content');
						var color=get_text_value('color');
						
						if(content=='') error =true;
						if(color!='...') color = ' color="'+color+'"';
						else color='';
						
						sc='[highlight'+color+']'+content+'[/highlight]';
						
					break;
					
					case 'dropcap':
					
						var letter=get_text_value('letter');
						var icon=get_text_value('icon');
						var color=get_text_value('color');
						var size=get_text_value('size');
						
						if(letter!='') letter = ' letter="'+letter+'"';
						else letter='';
						if(icon!='...') icon = ' icon="'+icon+'"';
						else icon='';
						if(color!='...') color = ' color="'+color+'"';
						else color='';
						if(size!='...') size = ' size="'+size+'"';
						else size='';
						
						sc='[dropcap'+letter+icon+color+size+']';
						
					break;
					

				
					}
					
				break;
				
			case 'tabs':
			
				var count=get_text_value('count');				
				var tabs='';
				
				for(i=1;i<=count;i++) tabs+='\n[tab title="'+get_text_value('tab_title_'+i)+'"]\n\n'+get_text_value('tab_content_'+i)+'\n\n[/tab]\n';
				
				sc='[tabgroup]\n'+tabs+'\n[/tabgroup]';
				
			break;
			
			case 'team':
			
				var count=get_text_value('count');				
				var members='';
				
				for(i=1;i<=count;i++) members+='\n[member image="'+get_text_value('member_image_'+i)+'"]\n\n'+get_text_value('member_content_'+i)+'\n\n[/member]\n';
				
				sc='[team-group]\n'+members+'\n[/team-group]';
				
			break;
			
			case 'testimonials':
			
				var count=get_text_value('count');				
				var testimonials='';
				
				for(i=1;i<=count;i++) testimonials+='\n[testimonial author="'+get_text_value('testimonial_author_'+i)+'"]\n\n'+get_text_value('testimonial_content_'+i)+'\n\n[/testimonial]\n';
				
				sc='[testimonial-group]\n'+testimonials+'\n[/testimonial-group]';
				
			break;
			
			case 'tooltip':
						
				var text=get_text_value('text');
				var content=get_text_value('content');
				
				if(text!='') text = ' text="'+text+'"';
				
				sc='[tooltip'+text+']'+content+'[/tooltip]';
				
			break;
			 
			case 'videos':

				switch(val2){
				
					case 'youtube':
					
						var id=get_text_value('id');
						var width=get_text_value('width');
						var align=get_text_value('align');

						if(id!='') id=' id="'+id+'"';
						else error=true;
						if(width!='') width=' width="'+width+'"';
						else width='';
						if(align!='...') align=' align="'+align+'"';
						else align='';

						sc='[youtube'+id+width+align+']';
						
					break;
					case 'vimeo':
					
						var id=get_text_value('id');
						var width=get_text_value('width');
						var align=get_text_value('align');

						if(id!='') id=' id="'+id+'"';
						else error=true;
						if(width!='') width=' width="'+width+'"';
						else width='';
						if(align!='...') align=' align="'+align+'"';
						else align='';

						sc='[vimeo'+id+width+align+']';
						
					break;
				
				}
				break;
			
		}
		

		if(error==true) return '';
		else return sc;
			 
		e.preventDefault();
		return '';
	
	}
	
		
	
});


