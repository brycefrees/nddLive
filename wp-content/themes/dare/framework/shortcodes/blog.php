<?php
function add_shortcode_blog($atts) {

	extract(shortcode_atts(array(
		'categories' => '',
		'count' => 4
	), $atts));
	$output='';
	
	$output.='<div class="blog-post-shortcode">';
	
	$i=0;
	$args= array("post_type" => "post","posts_per_page" => $count, "cat" => $categories);
	query_posts($args);
	while ( have_posts() ) : the_post();
	
		$output.='<div class="post-home three columns">';
			
			$output.='<div class="post-format-wrap">';
		
				$output.=tf_get_post_format( array('image'=>array('width'=>420,'height'=> 290 ),'gallery'=>array('width'=>420,'height'=> 290 ),'video'=>array('width'=>420,'height'=>290)));

			$output.='</div>';

			$output.='<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
			$output.='<div>'.get_the_date('d M, Y').' &nbsp;-&nbsp; '.get_comments_number().' '.__('comments',THEME_SLUG).'</div>';
			$output.='<p>'.tf_the_excerpt_max_charlength(120).'</p>';
		
		$output.='</div>';
			
	endwhile; 
	wp_reset_query();  
	wp_reset_postdata(); 
	
	$output.='</div>';
	$output.='<div class="clear"></div>';
		
	return $output;
	
}

add_shortcode('blog-posts', 'add_shortcode_blog');
?>