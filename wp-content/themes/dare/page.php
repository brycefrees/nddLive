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

<div id="content" class="container container-twelve">

	<div class="twelve columns">

<?php
				
$layout=get_meta_option('page_layout');
if($layout==0) $layout=get_theme_option('page_layout')+1;
				
switch($layout):
case 1:
?>

	<?php the_content(); ?>
			
<?php
break;
case 2:
?>

	<div id="blog-posts" class="nine columns alpha">
	
		<?php the_content(); ?>

	</div>

	<div id="sidebar" class="three columns omega">

	<?php get_sidebar(); ?>
	
	</div>
	<div class="clear"></div>

<?php
break;
case 3:
?>

	<div id="blog-posts" class="nine columns float-right omega">
	
		<?php the_content(); ?>

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

<?php endwhile; ?>	

<?php get_footer(); ?>