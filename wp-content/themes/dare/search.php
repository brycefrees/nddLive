<?php get_header(); ?>

<div id="pageinfo">

	<div class="container container-twelve">
	
		<div class="twelve columns">

			<div class="pagetitle eight columns alpha">
				<?php tf_get_title(); ?>
			</div>

			<div class="pagesnav four columns omega">
				<div class="breadcrumbs">
					<?php tf_breadcrumb(); ?>
				</div>
			</div>
		
		</div>

		<div class="clear"></div>

	</div>

</div><!-- //pageinfo -->

<?php

global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = urldecode($query_split[1]);
} 

$search_query['post_type']=array('post');
query_posts($search_query);		

?>

<div id="content" class="container container-twelve">

	<div class="twelve columns">

		<div id="blog-posts<?php echo get_theme_option('blog_type'); ?>" class="nine columns alpha">
		
			<?php get_template_part('loop'); ?>
			
			<div class="align-left">
				<?php echo tf_pagination(); ?>
			</div>
			
			<?php global $wp_query; $pages = $wp_query->max_num_pages;   ?>
			<div class="align-right">
				<p>Page <?php echo $paged; ?> of <?php echo $pages; ?></p>
			</div>

		</div>

		<div id="sidebar" class="three columns omega">

		<?php get_sidebar(); ?>
		
		</div>
	
	</div>
	<div class="clear"></div>


</div><!-- //content -->

<?php get_footer(); ?>