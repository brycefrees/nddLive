<?php
/*
 Template Name: Home Page
 *
 * This is your home page template. 
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

			<div id="content">
				
				
										
										
											
											
											
											
											
											
											
											
											
											
				
				
				<!-- Carousel================================================== -->
								    <div id="myCarousel" class="carousel slide" data-ride="carousel">
								      <!-- Indicators -->
								      <ol class="carousel-indicators">
								        <li data-target="#myCarousel" data-slide-to="0" class=""></li>
								        <li data-target="#myCarousel" data-slide-to="1"></li>
								        <li data-target="#myCarousel" data-slide-to="2"></li>
								      </ol>
								      <div class="carousel-inner" role="listbox">
									     
									    <?php if(have_rows('home_slideshow')): ?>
											
											<?php while (have_rows('home_slideshow')) : the_row(); ?>
											
												 <div class="item">
												 	<img src="<?php the_sub_field('image'); ?>" alt="First slide">
												 		<div class="container">
												 			<div class="carousel-caption">
												 				<h1><a href="<?php the_sub_field('text'); ?>"><?php the_sub_field('title');?></a></h1>
												 				<p><?php the_sub_field('text'); ?></p>
												 																 			</div>
												 		</div>
												 	</div>
												
												<?php  endwhile; 
												
											 else : 
											
											
											endif; 
											
										?>
									   
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
			    




				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-all all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">


								<section class="entry-content cf" itemprop="articleBody">
									
									
									
									<!--Recent Projects-->
									
									
									<div id="projects">
									<h4>Recent Projects</h4>
									
									<?php if(have_rows('recent_projects')): ?>
											
											<?php while (have_rows('recent_projects')) : the_row(); ?>
											
												<div class="m-all t-1of4 d-1of4">
												 	<a href="<?php the_sub_field('link');?>"><img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title');?>"></a>
												 	<h4><a href="<?php the_sub_field('link');?>"><?php the_sub_field('title');?></a></h4>
												 	<p><?php the_sub_field('desc'); ?></p>
												 </div>
												
												<?php  endwhile; 
												
											 else : 
											
											
											endif; 
											
										?>
									
									</div> <!--END RECENT PROJECTS-->
									
								
									
									
									<!--Services-->
									<div id="services">
									<h4>Services</h4>
									
									<?php if(have_rows('home_services')): ?>
											
											<?php while (have_rows('home_services')) : the_row(); ?>
											
												<div class="m-all t-1of2 d-1of2 cf">
												 	<a href="<?php the_sub_field('link');?>"><img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title');?>"></a>
												 	<h4><a href="<?php the_sub_field('link');?>"><?php the_sub_field('title');?></a></h4>
												 	<p><?php the_sub_field('desc'); ?></p>
												 </div>
												
												<?php  endwhile; 
												
											 else : 
											
											
											endif; 
											
										?>
									
																		
									</div>	
																		
								</section>
								
								<footer>
								</footer>

																

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

				</div>

			</div>


<?php get_footer(); ?>
