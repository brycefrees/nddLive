<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div id="pageinfo">

	<div class="container container-twelve">
	
		<div class="twelve columns">

			<div class="pagetitle eight columns alpha">
				<h1><?php echo get_theme_option('portfolio_title'); ?></h1><h2><?php echo get_theme_option('portfolio_description'); ?></h2>
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
global $post;
$prev_post = get_previous_post();
$next_post = get_next_post();
?>

<div id="content" class="container container-twelve">

	<div class="twelve columns">
	
		<div class="item-header">
			<h3><?php the_title(); ?></h3>
			<div class="projects-nav">
				<?php if($next_post): ?> <div class="nav-prev"><a href="<?php echo get_permalink( $next_post->ID ); ?>" title="<?php echo _e('Previous',THEME_SLUG); ?>"></a></div> <?php endif; ?>
				<?php if(get_theme_option('portfolio_url')!=''): ?> <div class="nav-all"><a href="<?php echo get_theme_option('portfolio_url'); ?>" title="<?php echo _e('All Projects',THEME_SLUG); ?>"></a></div> <?php endif; ?>
				<?php if($prev_post): ?> <div class="nav-next"><a href="<?php echo get_permalink( $prev_post->ID ); ?>" title="<?php echo _e('Next',THEME_SLUG); ?>"></a></div> <?php endif; ?>
				
			</div>
		</div>
		
		<hr />
		
	</div>	
	<div class="clear"></div>
	
	<div class="twelve columns">
	
	
<?php
				
$layout=get_meta_option('page_layout');
if($layout==0) $layout=get_theme_option('portfolio_layout')+1;
				
switch($layout):

case 1:
?>

	
	
		<div class="post-format-wrap">
		
			<?php echo tf_get_post_format( array('image'=>array('width'=>940,'height'=> 0 ),'gallery'=>array('width'=>940,'height'=> 0 ),'video'=>array('width'=>940,'height'=>528))); ?>
		
		</div>
		
		<?php the_content(); ?>
		
		<?php tf_social_buttons(); ?>

	

<?php
break;
case 2:
?>

	<div class="eight columns alpha">
	
		<div class="post-format-wrap">
	
		<?php echo tf_get_post_format( array('image'=>array('width'=>620,'height'=> 0 ),'gallery'=>array('width'=>620,'height'=> 0 ),'video'=>array('width'=>620,'height'=>348))); ?>
		
		</div>
		
		<?php tf_social_buttons(); ?>
		
	</div>
	
	<div class="item-overview four columns omega">
	
		<?php the_content(); ?>
		


	</div>
	<div class="clear"></div>
	

<?php
break;
case 3:
?>


	<div id="blog-posts" class="nine columns alpha">
	
		<div class="post-format-wrap">
	
			<?php echo tf_get_post_format( array('image'=>array('width'=>700,'height'=> 0 ),'gallery'=>array('width'=>700,'height'=> 0 ),'video'=>array('width'=>700,'height'=>393))); ?>
		
		</div>
		
		<?php the_content(); ?>
		
		<?php tf_social_buttons(); ?>
		
	</div>

	<div id="sidebar" class="three columns omega">

	<?php get_sidebar(); ?>
	
	</div>
	<div class="clear"></div>
	
<?php
break;
case 4:
?>

	<div id="blog-posts" class="nine columns float-right omega">
	
		<div class="post-format-wrap">
	
			<?php echo tf_get_post_format( array('image'=>array('width'=>700,'height'=> 0 ),'gallery'=>array('width'=>700,'height'=> 0 ),'video'=>array('width'=>700,'height'=>393))); ?>
		
		</div>
		
		<?php the_content(); ?>
		
		<?php tf_social_buttons(); ?>
		
	</div>

	<div id="sidebar" class="three columns alpha">

	<?php get_sidebar(); ?>
	
	</div>
	<div class="clear"></div>

<?php
break;
endswitch;
	
?>


	<hr>
	<h4><?php _e('Recent Works.',THEME_SLUG); ?></h4>
	
	<?php
	global $post;
	$terms=get_the_terms($post->ID, 'portfolio_category'); 
	$cats=array();
	foreach($terms as $term) array_push($cats,$term->term_id);	
	$cats=implode(",", $cats);
	?>
	
	<div class="clear"></div>
	<?php echo do_shortcode("[portfolio items_per_page='4' exclude='".$post->ID."' categories='".$cats."']"); ?>




	</div>
	<div class="clear"></div>

</div><!-- //content -->

<?php endwhile; ?>	

<?php get_footer(); ?>