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



<div id="content" class="container container-twelve">

	<div class="twelve columns">

		<p><?php _e('Unfortunately, the page you tried accessing could not be retrieved.',THEME_SLUG); ?></p>

	</div>
	<div class="clear"></div>


</div><!-- //content -->

<?php get_footer(); ?>