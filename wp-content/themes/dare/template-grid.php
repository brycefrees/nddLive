<?php
/*
Template Name: Image Grid
*/
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div id="slider">
	
	<?php
			
	global $add_rg_script;$add_rg_script = true;
	$images=tf_get_gallery_images(get_meta_option('rg_slider'));
	$rg_size=get_meta_option('rg_size'); 
		
	?>
		
	<div id="ri-grid" class="ri-grid ri-grid-size-2">
			
		<ul>
			
		<?php foreach($images as $image): ?>  
		
			<?php 
			
			if($image['url']!='') $class=' href="'.$image['url'].'"'; 
			else $class=' class="prettyPhoto" href="'.$image['src'].'"'; 
			
			?>
				
			<li><a <?php echo $class; ?>><img src="<?php echo theme_resize( get_image_url($image['id']) ,$rg_size, $rg_size, true ); ?>"></a></li>

		<?php endforeach; ?>  

		</ul>
			
	</div>
			
	<script>

	jQuery(document).ready(function($) {
	
		$( '#ri-grid' ).gridrotator( {
			rows		: <?php echo get_meta_option('rg_rows'); ?>,
			columns		: <?php echo get_meta_option('rg_columns'); ?>,
			animSpeed       : 500,
			step: <?php echo get_meta_option('rg_step'); ?>,
			maxStep         : <?php echo get_meta_option('rg_step'); ?>,
			preventClick    : false,
			interval	: <?php echo get_meta_option('rg_interval'); ?>,
			animType        : '<?php echo get_meta_option('animation_type'); ?>',
			w1024		: {
				rows	: <?php echo get_meta_option('rg_rows_1024'); ?>,
				columns	: <?php echo get_meta_option('rg_columns_1024'); ?>
			},
			w768		: {
				rows	: <?php echo get_meta_option('rg_rows_768'); ?>,
				columns	: <?php echo get_meta_option('rg_columns_768'); ?>
			},
			w480		: {
				rows	: <?php echo get_meta_option('rg_rows_480'); ?>,
				columns	: <?php echo get_meta_option('rg_columns_480'); ?>
			},
			w320		: {
				rows	: <?php echo get_meta_option('rg_rows_320'); ?>,
				columns	: <?php echo get_meta_option('rg_columns_320'); ?>
			},
		});
	
	});
	
	</script>

</div><!-- //slider -->

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