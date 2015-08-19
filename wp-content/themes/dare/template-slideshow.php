<?php
/*
Template Name: Slideshow
*/
?>

<?php get_header(); ?>



<div id="slider">

	<div class="container container-twelve">
		<div class="flexslider twelve columns">
			<ul class="slides">
			
				<?php $images=tf_get_gallery_images(get_meta_option('flex_gallery')); ?>
				
				<?php foreach( $images as $image ): ?>
				
				<?php 
				
				$url=$image['url'];
				if($image['reverse']=='yes') $class=' class="reverse"'; else $class=''; ?>
			
				<li<?php echo $class; ?>>
				
					<?php if($image['full_width']!='yes'): ?>
				
					<div class="content">
												
						<?php echo wpautop(do_shortcode($image['description'])); ?>
					
					</div>
					<div class="image">
					
						<?php if($image['image_content']!=''): ?>
						
							<?php echo wpautop(do_shortcode($image['image_content'])); ?>
						
						<?php else: ?>
						
							<?php if($url!=''): ?> <a href="<?php echo $url; ?>"> <?php endif; ?>
					
							<img src="<?php echo theme_resize($image['src'],449,0,false); ?>" alt="" /> 
							
							<?php if($url!=''): ?> </a> <?php endif; ?>
						
						<?php endif; ?>
					
					</div>
					
					<?php else: ?>
					
						<?php if($url!=''): ?> <a href="<?php echo $url; ?>"> <?php endif; ?>
					
						<img class="scale-with-grid" src="<?php echo theme_resize($image['src'],960,0,false); ?>" alt="" />
						
						<?php if($url!=''): ?> </a> <?php endif; ?>
					
					<?php endif; ?>
					
				</li>
				
				<?php endforeach; ?>
				
			</ul>
		</div>
		<div class="clear"></div>
	</div>

</div><!-- //slider -->

<script>

jQuery(function($){

	$('#slider').addClass('loading');

});

</script>

<?php while ( have_posts() ) : the_post(); ?>

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