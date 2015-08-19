<?php
/*
 Template Name: Services
 *
 * This is your home page template. 
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

			<div id="content">
				
				
				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-all all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">


								<section class="entry-content cf" itemprop="articleBody">
									
									
									<div class="m-all t-1of5 d-1of7">
										
										
										<ul class="sidebar-nav">
											<li>Services</li>
											<?php if(have_rows('services_nav')): ?>	
										
										 <?php while (have_rows('services_nav')) : the_row(); ?>
											
												    
												<li><a href="<?php the_sub_field('link'); ?>"> &#8250; <?php the_sub_field('title'); ?></a></li>

												<?php  endwhile;

										
												else : 
											 
																						
											endif; 
											
										?>
										<br>
										
										
										<ul class="sidebar-nav">
											<li>Sections</li>
											<?php if(have_rows('sections_nav')): ?>
											
											<?php while (have_rows('sections_nav')) : the_row(); ?>
											
												    
												<li><a href="#<?php the_sub_field('link_title'); ?>"> &#8250; <?php the_sub_field('link_title'); ?></a></li>
												 		
												
												<?php  endwhile; 
												
											 else : 
											 
																						
											endif; 
											
										?>
										
										
										</ul>
									</div>
									
									
									
									<div class="content m-all t-4of5 d-6of7">
									
									<?php the_content(); ?>
																		
									</div>									
								
																		
								</section>


																

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
