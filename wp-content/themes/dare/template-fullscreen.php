<?php
/*
Template Name: Fullscreen Slideshow
*/
?>

<?php get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>

		 <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="http://localhost:8888/NDD/wp-content/uploads/2012/10/slide-one4.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>NDD</h1>
              <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="http://localhost:8888/NDD/wp-content/uploads/2012/10/slide-one4.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Another example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="http://localhost:8888/NDD/wp-content/uploads/2012/10/slide-one4.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->
    
    

<div id="content" class="container container-twelve">

<?php
				
$layout=get_meta_option('page_layout');
if($layout==0) $layout=get_theme_option('page_layout')+1;
				
switch($layout):
case 1:
?>

	<div class="twelve columns">

		<?php the_content(); ?>
		
	</div>
	<div class="clear"></div>
	
<?php
break;
case 2:
?>

	<div id="blog-posts" class="nine columns">
	
		<?php the_content(); ?>

	</div>

	<div id="sidebar" class="three columns">

	<?php get_sidebar(); ?>
	
	</div>
	<div class="clear"></div>

<?php
break;
case 3:
?>

	<div id="blog-posts" class="nine columns float-right">
	
		<?php the_content(); ?>

	</div>

	<div id="sidebar" class="three columns">

		<?php get_sidebar(); ?>
		
	</div>
	<div class="clear"></div>

<?php
break;
endswitch;
?>

<?php endwhile; ?>	

</div><!-- //content -->

<?php get_footer(); ?>