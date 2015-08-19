<?php
/*
 Template Name: Home Page Simple
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
								      
								      <div class="carousel-inner" role="listbox">
									     
									    <?php if(have_rows('home_slideshow')): ?>
											
											<?php while (have_rows('home_slideshow')) : the_row(); ?>
											
												 <div class="item">
												 	<img src="<?php the_sub_field('image'); ?>" alt="First slide">
												 		<div class="container">
												 			<div class="carousel-caption">
												 				<h1><a href="<?php the_sub_field('link');?>"><?php the_sub_field('title');?></a></h1>
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
									
									
									
									<!--Services-->
									<div id="services">
									<h4><a href=" <?php echo site_url(); ?> /services/">Services</a></h4>
									
									<?php if(have_rows('home_services')): ?>
											
											<?php while (have_rows('home_services')) : the_row(); ?>
											
												<div class="m-all t-1of3 d-1of3 cf">
												 	<a href="<?php the_sub_field('link');?>"><img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title');?>"></a>
												 	<h4><a href="<?php the_sub_field('link');?>"><?php the_sub_field('title');?></a></h4>
												 	
												 </div>
												
												<?php  endwhile; 
												
											 else : 
											
											
											endif; 
											
										?>
									
																		
									</div>	<!--End Services-->
									
									
									
									<!--Recent Projects-->
									
									
									<div id="projects">
									<h4><a href=" <?php echo site_url(); ?> /projects/">Recent Projects</a></h4>
									
									<?php if(have_rows('recent_projects')): ?>
											
											<?php while (have_rows('recent_projects')) : the_row(); ?>
											
												<div class="m-all t-1of4 d-1of4">
												 	<a href="<?php the_sub_field('link');?>"><img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title');?>"></a>
												 	<h4><a href="<?php the_sub_field('link');?>"><?php the_sub_field('title');?></a></h4>
												 	
												 </div>
												
												<?php  endwhile; 
												
											 else : 
											
											
											endif; 
											
										?>
									
									</div> <!--END RECENT PROJECTS-->
									
								
									
									
									
																		
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
