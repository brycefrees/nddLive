<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div id="pageinfo">

	<div class="container container-twelve">
	
		<div class="twelve columns">

			<div class="pagetitle eight columns alpha">
				<h1><?php echo get_theme_option('blog_title'); ?></h1><h2><?php echo get_theme_option('blog_description'); ?></h2>
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

	<div id="blog-posts" class="twelve columns">

<?php
				
$layout=get_meta_option('page_layout');
if($layout==0) $layout=get_theme_option('post_layout')+1;
				
switch($layout):

case 1:

?>


	<div class="post">

		<div class="post-slideshow">

			<?php echo tf_get_post_format( array('image'=>array('width'=>940,'height'=> 0 ),'gallery'=>array('width'=>940,'height'=> 0 ),'video'=>array('width'=>940,'height'=>528))); ?>

		</div>
		
		<div class="post-content">
			<h4><span class="post-type format-<?php echo get_post_format(); ?>post"></span><?php the_title(); ?></h4>
			<div class="details"><?php _e('By',THEME_SLUG); ?>&nbsp;<?php the_author(); ?> &nbsp;-&nbsp; <?php _e('On',THEME_SLUG); ?> <?php echo get_the_date('d M, Y'); ?>&nbsp;-&nbsp; <?php comments_number( __('0 comments',THEME_SLUG), __('1 comment',THEME_SLUG), __('% comments',THEME_SLUG) ); ?></div>
			
			<?php the_content(); ?>
			
			<?php tf_social_buttons(); ?>
			
		</div>
	</div>
	
	<hr />
	
	<?php comments_template(); ?>


	
<?php

break;

case 2:

?>

	<div id="blog-posts" class="nine columns alpha">
	
		<div class="post">
	
			<div class="post-slideshow">

				<?php echo tf_get_post_format( array('image'=>array('width'=>700,'height'=> 0 ),'gallery'=>array('width'=>700,'height'=> 0 ),'video'=>array('width'=>700,'height'=>393))); ?>
		
			</div>
			
			<div class="post-content">
				<h4><span class="post-type format-<?php echo get_post_format(); ?>post"></span><?php the_title(); ?></h4>
				<div class="details"><?php _e('By',THEME_SLUG); ?>&nbsp;<?php the_author(); ?> &nbsp;-&nbsp; <?php _e('On',THEME_SLUG); ?> <?php echo get_the_date('d M, Y'); ?>&nbsp;-&nbsp; <?php comments_number( __('0 comments',THEME_SLUG), __('1 comment',THEME_SLUG), __('% comments',THEME_SLUG) ); ?></div>
				
				<?php the_content(); ?>
				
				<?php tf_social_buttons(); ?>
				
			</div>
		</div>
		
		<hr />
		
		<?php comments_template(); ?>

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
	
		<div class="post">
	
			<div class="post-slideshow">

				<?php echo tf_get_post_format( array('image'=>array('width'=>700,'height'=> 0 ),'gallery'=>array('width'=>700,'height'=> 0 ),'video'=>array('width'=>700,'height'=>393))); ?>
		
			</div>
			
			<div class="post-content">
				<h4><span class="post-type format-<?php echo get_post_format(); ?>post"></span><?php the_title(); ?></h4>
				<div class="details"><?php _e('By',THEME_SLUG); ?>&nbsp;<?php the_author(); ?> &nbsp;-&nbsp; <?php _e('On',THEME_SLUG); ?> <?php echo get_the_date('d M, Y'); ?>&nbsp;-&nbsp; <?php comments_number( __('0 comments',THEME_SLUG), __('1 comment',THEME_SLUG), __('% comments',THEME_SLUG) ); ?></div>
				
				<?php the_content(); ?>
				
				<?php tf_social_buttons(); ?>
				
			</div>
		</div>
		
		<hr />
		
		<?php comments_template(); ?>

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