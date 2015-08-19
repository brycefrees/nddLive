<?php



class Theme_Widget_Recent_Posts extends WP_Widget {

	function Theme_Widget_Recent_Posts() {
		$widget_ops = array('classname' => 'widget_recent_posts', 'description' => "displays recent posts" );
		$this->WP_Widget('recent_posts', THEME_SLUG.' - '.'Recent Posts', $widget_ops);
		$this->alt_option_name = 'widget_recent_posts';

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	function widget($args, $instance) {
	
		$cache = wp_cache_get('widget_recent_posts', 'widget');

		if ( !is_array($cache) ) $cache = array();

		if ( isset($cache[$args['widget_id']]) ) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? 'Recent Posts' : $instance['title'], $instance, $this->id_base);
		if ( !$number = (int) $instance['number'] ) $number = 3;
		elseif ( $number < 1 ) $number = 1;
		else if ( $number > 10 ) $number = 10;
	
		$type=$instance['type'];
	
		$query = array('posts_per_page' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1);
		
		if(!empty($instance['cat'])) $query['cat'] = implode(',', $instance['cat']);
				
		$r = new WP_Query($query);
		if ($r->have_posts()) : ?>
		<?php echo $before_widget; ?>
		<?php if ( $title ) echo $before_title . $title . $after_title; ?>
		

		<ul class="<?php echo $type; ?>">

		<?php  while ($r->have_posts()) : $r->the_post(); ?>
		
			<?php if($type=='type1'): ?>
				<li>
					<div class="post-type format-<?php echo get_post_format(); ?>post"><a href="<?php the_permalink() ?>"></a></div>
					<div class="post-details"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a><span><?php _e('On',THEME_SLUG); ?> <?php echo get_the_date('d M, Y'); ?></span></div>
				</li>
			<?php else: ?>
				<li>
					<div class="post-image"><img src="<?php echo theme_resize( get_image_url() ,50, 50, true ); ?>" alt="<?php the_title(); ?>" /></div>
					<div class="post-headline"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a><span><?php _e('On',THEME_SLUG); ?> <?php echo get_the_date('d M, Y'); ?></span></div>
				</li>
			<?php endif; ?>

			
		<?php endwhile; ?>
		
		
		</ul>
		
		<?php echo $after_widget; ?>	
		
		<?php
		wp_reset_query();

		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_recent_posts', $cache, 'widget');
	}

	function update( $new_instance, $old_instance ) {
	
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		$instance['type'] = strip_tags($new_instance['type']);
		
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_recent_posts']) ) delete_option('widget_recent_posts');

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_recent_posts', 'widget');
	}

	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$cat = isset($instance['cat']) ? $instance['cat'] : array();
		$number = isset($instance['number']) ? absint($instance['number']) : 3;
		$categories = get_categories('orderby=name&hide_empty=0');
		$type = isset( $instance['type'] ) ? $instance['type'] : 'type1';

?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>">Number of posts to show</label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

		<p><label for="<?php echo $this->get_field_id('cat'); ?>">Categories</label>
		<select style="height:200px" name="<?php echo $this->get_field_name('cat'); ?>[]" id="<?php echo $this->get_field_id('cat'); ?>" class="widefat" multiple="multiple">
				<?php foreach($categories as $category):?>
				<option value="<?php echo $category->term_id;?>"<?php echo in_array($category->term_id, $cat)? ' selected="selected"':'';?>><?php echo $category->cat_name;?></option>
				<?php endforeach;?>
		</select>
		</p>
		
		<p><label for="<?php echo $this->get_field_id('type'); ?>">Display post format icons (type1) or featured images (type2)</label>
		<select id="<?php echo $this->get_field_id('type'); ?>" name="<?php echo $this->get_field_name('type'); ?>">
			<option<?php if($type == 'type1') echo ' selected="selected"'?> value="type1">type1</option>
			<option<?php if($type == 'type2') echo ' selected="selected"'?> value="type2">type2</option>
		</select></p>
		
<?php
	}
}

