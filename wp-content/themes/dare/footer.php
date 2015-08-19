<?php

$footer=get_meta_option('custom_footer', get_the_id());


if(!isset($footer) || $footer!=''){ 

	$footer=explode(',',$footer);
	$footer_name=$footer[0];
	$layout=$footer[1];

}
else{

	$footer=explode(',',get_theme_option("adm_custom_footers_name"));
	$footer_name=$footer[0];
	$layout=explode(',',get_theme_option("adm_custom_footers_layout"));
	$layout=$layout[0];

}

?>


<div id="footer">

	<div class="container container-twelve">

		<div class="twelve columns">
	
		<?php
		switch($layout):
		case 1: ?>

			<div class="twelve columns"><?php dynamic_sidebar($footer_name.' 1 column'); ?></div>

		<?php
		break;
		case 2: 
		?>

			<div class="six columns alpha"><?php dynamic_sidebar($footer_name.' 1 column'); ?></div>
			<div class="six columns omega"><?php dynamic_sidebar($footer_name.' 2 column'); ?></div>

		<?php
		break;
		case 3: 
		?>
		
			<div class="four columns alpha"><?php dynamic_sidebar($footer_name.' 1 column'); ?></div>
			<div class="four columns"><?php dynamic_sidebar($footer_name.' 2 column'); ?></div>
			<div class="four columns omega"><?php dynamic_sidebar($footer_name.' 3 column'); ?></div>

		<?php
		break;
		case 4: 
		?>

			<div class="four column alpha"><?php dynamic_sidebar($footer_name.' 1 column'); ?></div>
			<div class="eight column omega"><?php dynamic_sidebar($footer_name.' 2 column'); ?></div>

		<?php
		break;
		case 5: 
		?>

			<div class="eight column alpha"><?php dynamic_sidebar($footer_name.' 1 column'); ?></div>
			<div class="four column omega"><?php dynamic_sidebar($footer_name.' 2 column'); ?></div>

		<?php
		break;
		case 6: 
		?>

			<div class="three columns alpha"><?php dynamic_sidebar($footer_name.' 1 column'); ?></div>
			<div class="three columns"><?php dynamic_sidebar($footer_name.' 2 column'); ?></div>
			<div class="three columns"><?php dynamic_sidebar($footer_name.' 3 column'); ?></div>
			<div class="three columns omega"><?php dynamic_sidebar($footer_name.' 4 column'); ?></div>

		<?php
		break;
		case 7: 
		?>

			<div class="six columns alpha"><?php dynamic_sidebar($footer_name.' 1 column'); ?></div>
			<div class="three columns"><?php dynamic_sidebar($footer_name.' 2 column'); ?></div>
			<div class="three columns omega"><?php dynamic_sidebar($footer_name.' 3 column'); ?></div>

		<?php
		break;
		case 8: 
		?>

			<div class="three columns alpha"><?php dynamic_sidebar($footer_name.' 1 column'); ?></div>
			<div class="six columns"><?php dynamic_sidebar($footer_name.' 2 column'); ?></div>
			<div class="three columns omega"><?php dynamic_sidebar($footer_name.' 3 column'); ?></div>

		<?php
		break;
		case 9: 
		?>

			<div class="three columns alpha"><?php dynamic_sidebar($footer_name.' 1 column'); ?></div>
			<div class="three columns"><?php dynamic_sidebar($footer_name.' 2 column'); ?></div>
			<div class="six columns omega"><?php dynamic_sidebar($footer_name.' 3 column'); ?></div>

		<?php
		break;
		case 10: 
		?>

			<div class="nine columns alpha"><?php dynamic_sidebar($footer_name.' 1 column'); ?></div>
			<div class="three columns omega"><?php dynamic_sidebar($footer_name.' 2 column'); ?></div>

		<?php
		break;
		case 11: 
		?>

			<div class="three columns alpha"><?php dynamic_sidebar($footer_name.' 1 column'); ?></div>
			<div class="nine columns omega"><?php dynamic_sidebar($footer_name.' 2 column'); ?></div>

		<?php
		break;

		endswitch;
		?>
	
		</div>
		
		<div class="clear"></div>

	</div>

</div><!-- //footer-->


<div id="copyrights">
	<div class="container container-twelve">
	
		<div class="twelve columns">
		
			<div class="align-left six columns alpha"><p>&copy; Nakhshab Development & Design, Inc. <?php echo date("Y"); ?></p></div>
			<div class="six columns align-right omega">

				<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'footer_nav', 'depth' => 1)); ?>
								
			</div>
		
		</div>
		<div class="clear"></div>
	</div>
</div><!-- //copyrights -->



  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php get_site_url(); ?> /wp-content/themes/dare/js/bootstrap.min.js"></script>
    <script src="<?php get_site_url(); ?> /wp-content/themes/dare/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php get_site_url(); ?> /wp-content/themes/dare/js/ie10-viewport-bug-workaround.js"></script>
    
    

<?php

wp_footer();
if(get_theme_option('google_analytics')!='')  echo stripslashes(get_theme_option('google_analytics'));

?>

</body>
</html>