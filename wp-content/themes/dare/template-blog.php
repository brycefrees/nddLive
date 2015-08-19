<?php
/*
Template Name: Blog Page
*/
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div id="pageinfo">

	<div class="container container-twelve">
	
		<div class="twelve columns">

			<div class="pagetitle eight columns alpha">
				<h1><?php the_title(); ?></h1><h2><?php echo get_meta_option('page_description'); ?></h2>
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

<?php endwhile; ?>	

<div id="content" class="container container-twelve">

	<div id="blog-posts<?php echo get_theme_option('blog_type'); ?>" class="twelve columns">
	
<?php
	
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
if(is_front_page())  $paged = (get_query_var('page')) ? get_query_var('page') : 1;
$args= array("post_type" => "post", "paged" => $paged);
query_posts($args);
	

				
$layout=get_meta_option('page_layout');
if($layout==0) $layout=get_theme_option('page_layout')+1;
				
switch($layout):

case 1:

?>

	<?php get_template_part('loop'); ?>
	
	<div class="align-left">
		<?php echo tf_pagination(); ?>
	</div>
	
	<?php global $wp_query; $pages = $wp_query->max_num_pages;   ?>
	<div class="align-right">
		<p>Page <?php echo $paged; ?> of <?php echo $pages; ?></p>
	</div>
	
	?>
	
<?php

break;

case 2:

?>

	<div class="nine columns alpha">
	
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
	<div class="clear"></div>

<?php

break;

case 3:

?>


	<div class="nine columns float-right omega">
	
		<?php get_template_part('loop'); ?>
		
		<div class="align-left">
			<?php echo tf_pagination(); ?>
		</div>
		
		<?php global $wp_query; $pages = $wp_query->max_num_pages;   ?>
		<div class="align-right">
			<p>Page <?php echo $paged; ?> of <?php echo $pages; ?></p>
		</div>

	</div>

	<div id="sidebar" class="three columns alpha">

		<?php get_sidebar(); ?>
		
	</div>
	<div class="clear"></div>

<?php

break;

endswitch;
	
?>

	</div>
	<div class="clear"></div>


</div><!-- //content -->



<?php get_footer(); ?>