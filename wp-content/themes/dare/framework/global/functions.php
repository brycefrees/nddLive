<?php

function tf_title(){

	$title = wp_title( '|', false, 'right' );
	$title.=get_bloginfo('name');

	if ( is_front_page() ) $title= get_bloginfo('name')." | ".get_bloginfo( 'description' );

	echo $title;

}

function tf_get_post_format($options){

$pf=get_post_format();
if($pf=='image' || $pf=='') return tf_get_image_post_format($options['image']);
if($pf=='gallery') return tf_get_gallery_post_format($options['gallery']);
if($pf=='video') return tf_get_video_post_format($options['video']);


}

function tf_get_image_post_format($options){

$output='';

if(get_meta_option('pf_image_height')!=0 && $options['height']==0) $options['height']=get_meta_option('pf_image_height');

if(has_post_thumbnail()):

$output.='<a href="'.get_permalink().'" title="'.get_the_title().'" alt="'.get_the_title().'">';

	$output.='<img class="scale-with-grid" src="'.theme_resize( get_image_url() ,$options['width'], $options['height'], true ).'">';
		
$output.='</a>';

endif;

return $output;


}

function tf_get_gallery_post_format($options){

$output='';

if($options['height']==0 && get_meta_option('pf_slideshow_height')!=0) $options['height']=get_meta_option('pf_slideshow_height'); 

$output.='<div class="item-slideshow">';
	$output.='<ul class="slideshow">';
			
	$images=tf_get_gallery_images(get_meta_option('pf_gallery'));		
	foreach($images as $image): 
								
		$output.='<li>';
		
			$output.='<img class="scale-with-grid" src="'.theme_resize( get_image_url($image['id']) ,$options['width'], $options['height'], true ).'">';
			
		$output.='</li>';
			
	endforeach; 
					
	$output.='</ul>';
$output.='</div>';

return $output;


}

function tf_get_video_post_format($options){


$output='<div class="video-wrap">';

if(get_meta_option('pf_video_type')==1):  

	$output.='<iframe width="'.$options['width'].'" height="'.$options['height'].'" src="http://player.vimeo.com/video/'.get_meta_option('pf_video_id').'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff"  webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';

else:	

	$output.='<iframe width="'.$options['width'].'" height="'.$options['height'].'" src="https://www.youtube.com/embed/'.get_meta_option('pf_video_id').'?theme=light&showinfo=0" frameborder="0" allowfullscreen></iframe>';

endif;

$output.='</div>';

return $output;

}

function tf_get_title(){

	if(is_archive()){
							
			if(is_category()) { $page_title = __('Category Archives: ',THEME_SLUG);  $page_description=sprintf('%s',single_cat_title('',false)); }
			elseif(is_tag())  { $page_title = __('Tag Archives: ',THEME_SLUG); $page_description=sprintf('%s',single_tag_title('',false)); }
			elseif(is_day()) { $page_title = __('Archives: ',THEME_SLUG); $page_description= sprintf('%s',get_the_time('F jS, Y')); }
			elseif(is_month()) { $page_title = __('Archives: ',THEME_SLUG); $page_description=sprintf('%s',get_the_time('F, Y')); }
			elseif(is_year()) { $page_title = __('Archives: ',THEME_SLUG); $page_description=sprintf('%s',get_the_time('Y')); }

			
		}
		elseif (is_404()) { $page_title = __('404 - Not Found',THEME_SLUG); $page_description=__('404 - Not Found',THEME_SLUG); }
		elseif (is_search()) { $page_title = __('Search results: ',THEME_SLUG);  $page_description=sprintf('%s',stripslashes( strip_tags( get_search_query()))); }
		
	//if(is_tax( 'portfolio_category' )) $page_title = sprintf('%s',single_cat_title('',false));   
		
	echo '<h1>'.$page_title.'</h1><h2>'.$page_description.'</h2>';

}

function tf_breadcrumb() {

	if(is_home() || is_404() || is_search()) return false; 

	echo '<a href="'.home_url('/').'">'.__('Home',THEME_SLUG).'</a> &nbsp;&nbsp;/&nbsp;&nbsp; ';

	if(is_singular('post')) echo '<a href="'.get_theme_option('blog_url').'">Blog</a> &nbsp;&nbsp;/&nbsp;&nbsp; <a class="active" href="'.get_permalink().'">'.get_the_title().'</a>';
	if(is_singular('portfolio')) echo '<a href="'.get_theme_option('portfolio_url').'">Portfolio</a> &nbsp;&nbsp;/&nbsp;&nbsp; <a class="active" href="'.get_permalink().'">'.get_the_title().'</a>';
	if(is_page()) echo '<a class="active" href="'.get_permalink().'">'.get_the_title().'</a>';
	if(is_category()) echo '<a href="'.get_theme_option('blog_url').'">Blog</a> &nbsp;&nbsp;/&nbsp;&nbsp; <a class="active">'.single_cat_title('',false).'</a>';
	if(is_tag()) echo '<a href="'.get_theme_option('blog_url').'">Blog</a> &nbsp;&nbsp;/&nbsp;&nbsp; <a class="active">'.single_tag_title('',false).'</a>';

}

function tf_the_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			return mb_substr( $subex, 0, $excut );
		} else {
			return $subex;
		}

	} else {
		return $excerpt;
	}
}

function tf_get_excerpt($post_id){
	global $wpdb;
	$query = 'SELECT post_excerpt FROM '. $wpdb->posts .' WHERE ID = '. $post_id .' LIMIT 1';
	$result = $wpdb->get_results($query, ARRAY_A);
	$post_excerpt=$result[0]['post_excerpt'];
	return $post_excerpt;
}


function tf_get_gallery_images($id){

	$atts=explode (',', trim(get_meta_option('gallery_items', $id),',,'));

	foreach($atts as $att): 
	
		$att=get_post($att);
		
		$images[] = array(
			'id' => $att->ID,
			'title' => get_the_title($att->ID),
			'src' => get_image_url($att->ID),
			'description' => $att->post_content,
			'url'  => get_meta_option('url_adress', $att->ID),
			'image_content'  => get_meta_option('image_content', $att->ID),
			'reverse' => get_meta_option('reverse', $att->ID),
			'full_width' => get_meta_option('full_width', $att->ID),
		);
	
	endforeach;
	
	return $images;

}

$tf_sidebars = array('Post Sidebar','Page Sidebar','Portfolio Sidebar');

function tf_register_sidebars(){

	global $tf_sidebars, $tf_footer_sidebars;

	foreach ($tf_sidebars as $sidebar){
		
		register_sidebar(array(
			'name' => $sidebar,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5>',
		));
		
	}
		
	//register footer sidebars
	$custom_footers_names=get_theme_option("adm_custom_footers_name");
	$custom_footers_layout=get_theme_option("adm_custom_footers_layout");


	if($custom_footers_names!=''){
	
		$custom_footers_names = explode(',',$custom_footers_names);
		$custom_footers_layout = explode(',',$custom_footers_layout);
		
		for($i=0; $i<count($custom_footers_names)-1; $i++){
		
			$layout=$custom_footers_layout[$i];
			
			switch ($layout):
				case 1:  $nr_columns=1;  break;
				case 2:  $nr_columns=2;  break;
				case 3:  $nr_columns=3;   break;
				case 4:  $nr_columns=2;   break;
				case 5:  $nr_columns=2;   break;
				case 6:  $nr_columns=4;   break;
				case 7:  $nr_columns=3;   break;
				case 8:  $nr_columns=3;   break;
				case 9:  $nr_columns=3;   break;
				case 10:  $nr_columns=2;   break;
				case 11:  $nr_columns=2;   break;
			endswitch;
			
			for($j=1; $j<=$nr_columns; $j++){
			
				register_sidebar(array(
					'name' =>  $custom_footers_names[$i].' '.$j.' column',
					'description' => 'column number '.$j.' of the footer with the name: '.$custom_footers_names[$i],
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h4 class="widget-title">',
					'after_title' => '</h4>',
				));
			
			}
		
		}
			
	}
	
	//register custom sidebars
	$custom_sidebars=get_theme_option('custom_sidebars');
	if(!empty($custom_sidebars)) $custom_sidebars_array = explode(',',$custom_sidebars);
	
	if(!empty($custom_sidebars)){

		for($i=0; $i<count($custom_sidebars_array)-1; $i++){
		
			register_sidebar(array(
				'name' =>  $custom_sidebars_array[$i].' - Custom Sidebar',
				'description' => '',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h5 class="widget-title">',
				'after_title' => '</h5>',
			));
		
		}
		
	}
	
}
add_action('widgets_init', 'tf_register_sidebars');

function tf_get_sidebar(){


	$post_type=get_post_type();
	
	global $tf_sidebars,$post;
				 
	if($post_type=='post')	$sidebar = $tf_sidebars[0];		 
	elseif($post_type=='page') $sidebar = $tf_sidebars[1];
	elseif($post_type=='portfolio') $sidebar = $tf_sidebars[2];
	
	$custom = get_post_meta($post->ID, 'custom_sidebar_value', true);
	
	if( $custom && $custom!='off') $sidebar = $custom.' - Custom Sidebar';
	
	dynamic_sidebar($sidebar);
	
}

function tf_social_buttons() {

	if(is_singular('post') && get_theme_option('social_buttons_blog')=='no') return false;
	if(is_singular('portfolio') && get_theme_option('social_buttons_portfolio')=='no') return false;
	
	global $add_socialite_script;$add_socialite_script=true;

?>

<ul class="social-buttons clearfix">
    <li><a class="socialite twitter-share" href="http://twitter.com/share" rel="nofollow" target="_blank" data-text="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" data-count="small" data-via="<?php echo get_theme_option('twitter_username'); ?>"><span class="vhidden"></span></a></li>
    <li><a class="socialite googleplus-one" href="https://plus.google.com/share?url=http://socialitejs.com" rel="nofollow" target="_blank" data-annotation="bubble" data-width="400" data-size="medium" data-href="<?php the_permalink(); ?>"><span class="vhidden"></span></a></li>
    <li><a class="socialite facebook-like" href="http://www.facebook.com/sharer.php?u=http://www.socialitejs.com&t=Socialite.js" rel="nofollow" target="_blank" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-shares="" data-width="60" data-show-faces="false"><span class="vhidden"></span></a></li>
</ul>

<?php
 

}


function tf_pagination($pages = '', $range = 2){  

	$showitems = ($range * 2)+1;  
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	global $wp_query;
	$pages = $wp_query->max_num_pages;
	if(!$pages) $pages = 1;

	$output='';

	if($pages != 1):

		$output.= "<ul class='pagenav'>";

		//if($paged > 2 && $paged > $range+1 && $showitems < $pages) $output.= "<li><a  href='".get_pagenum_link(1)."'>&laquo;</a></li>";
		if($paged > 1 && $showitems < $pages) $output.= "<li class='prev'><a href='".get_pagenum_link($paged - 1)."'>&larr; Previous</a></li>";

		for ($i=1; $i <= $pages; $i++){
		 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
			 $output.= ($paged == $i)? "<li class='active'><a>".$i."</a>":"<li><a href='".get_pagenum_link($i)."' >".$i."</a></li>";
		 }
		}

		if ($paged < $pages && $showitems < $pages) $output.= "<li class='next'><a href='".get_pagenum_link($paged + 1)."'>Next &rarr;</a></li>";  
		//if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) $output.= "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";

		$output.= "</ul>";
	 
	endif;

	return $output;
}


function tf_custom_css() {
	
	$custom_css=get_theme_option('custom_css');
	$bg=get_theme_option('background_pattern');
	
?>
<style>

<?php if($bg!=THEME_IMG.'/patterns/bg0.jpg'): ?>

body{

background-image:url(<?php echo $bg; ?>);

}

<?php endif; ?>

#logo img{

left:<?php echo get_theme_option('logo_left'); ?>px;
top:<?php echo get_theme_option('logo_top'); ?>px;

}

#flex-slider-main .full-caption{

top:<?php echo get_meta_option('fullscreen_top'); ?>px;

}

<?php echo $custom_css; ?>

</style>



<?php
}
add_action( 'wp_head', 'tf_custom_css' );

function tf_custom_js() {

?>

<script>

var theme_loading_graphic='<?php echo THEME_IMG; ?>/loading.gif';

</script>

<?php
}
add_action( 'wp_head', 'tf_custom_js' );


?>