<?php if ( have_posts() ) while ( have_posts() ) : the_post();   ?>

<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>

	<div class="post-format-wrap">
	
		<?php echo tf_get_post_format( array('image'=>array('width'=>260,'height'=> 180 ),'gallery'=>array('width'=>260,'height'=> 180 ),'video'=>array('width'=>260,'height'=>180))); ?>

	</div>
	<div class="post-content">
		<h4><span class="post-type format-<?php echo get_post_format(); ?>post"></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		<div class="details"><?php _e('By',THEME_SLUG); ?>&nbsp;<?php the_author(); ?> &nbsp;-&nbsp; <?php _e('On',THEME_SLUG); ?> <?php echo get_the_date('d M, Y'); ?>&nbsp;-&nbsp; <?php comments_number( __('0 comments',THEME_SLUG), __('1 comment',THEME_SLUG), __('% comments',THEME_SLUG) ); ?></div>
		<?php the_excerpt(); ?>
		<p><a href="<?php the_permalink(); ?>"><?php _e('Read More',THEME_SLUG); ?></a></p>
	</div>
</div>

<hr />

<?php endwhile; ?>





