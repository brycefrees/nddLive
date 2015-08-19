<?php
function add_shortcode_portfolio_list($atts) {

	extract(shortcode_atts(array(
		'categories' => '4,5,7',
		'style' => 'style1',
		'columns' => 'four',
		'type' => '',
		'items_per_page'=> 4,
		'exclude' => ''
	), $atts));
	$output='';
	
	global $add_portfolio_script;$add_portfolio_script = true;
	
	if($categories!='') $categories=explode(',',$categories);
	
	if($columns=='three') $columns='four'; else $columns='three';
	if($type=='sortable') $items_per_page=-1; 
	
	if($type=='sortable'):
	
		$output.='<ul id="filter" data-option-key="filter">';
					
			$output.='<li class="active"><a href="#" data-option-value="*">'.__('All', THEME_SLUG).'</a></li>';
			
			foreach($categories as $cat):
			
				$cat=get_term_by( 'id', $cat, 'portfolio_category');
				$output.='<li><a href="#" data-option-value=".cat-'.$cat->term_id.'">'.$cat->name.'</a></li>';
			
			endforeach;
									
		$output.='</ul>';
	
	endif;
	
	$output.='<div id="portfolio" class="'.$style.' faded loader">';
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						
	$args=array("post_type" => "portfolio","post__not_in" => array($exclude),"orderby" => "date", "paged" => $paged, "posts_per_page" => $items_per_page,"tax_query" => array(array("taxonomy" => "portfolio_category","field" => "id","terms" => $categories)));
	query_posts($args);		
	
	global $wp_query; $pages = $wp_query->max_num_pages;

	while ( have_posts() ) : the_post();
	
		$terms=get_the_terms( get_the_id(), 'portfolio_category' ); 
		
		$cats=array();
		foreach($terms as $term) $cats[] = $term->name;
		$cats = join( ", ", $cats );
	
		$output.='<div class="item photography video '.$columns.' columns '.implode(get_post_class(),' ').'">';
			$output.='<div class="image">';
				$output.='<a href="'.get_permalink().'">';
					$output.='<img src="'.theme_resize( get_image_url() ,420, 280, true ).'" alt="'.get_the_title().'" />';
					
					if($style=='style2') $output.='<span></span>';
					if($style=='style1') $output.='<span><strong>'.get_the_title().'<br /><span>'.$cats.'</span></strong></span>';
					
				$output.='</a>';
				if($style=='style2') $output.='<h5><a href="'.get_permalink().'">'.get_the_title().'</a></h5>';
			$output.='</div>';
		$output.='</div>';
					
	endwhile;  

	$output.="</div>";
	$output.='<div class="clear"></div>';	
	
	if($type=='paginated'):
	
		$output.='<hr>';
		
		$output.='<div class="six columns alpha">';
			$output.=tf_pagination();
		$output.='</div>';

		$output.='<div class="align-right six columns omega">';
			$output.='<p>Page '.$paged.' of '.$pages.'</p>';
		$output.='</div>';

		$output.='<div class="clear"></div>';
	
	endif;
	
	wp_reset_query(); 
	wp_reset_postdata(); 
		
	
	return $output;
	
}

add_shortcode('portfolio', 'add_shortcode_portfolio_list');
?>
