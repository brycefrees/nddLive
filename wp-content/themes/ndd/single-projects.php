<?php
/*
 * CUSTOM POST TYPE TEMPLATE
 *
 * This is the custom post type post template. If you edit the post type name, you've got
 * to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is "register_post_type( 'bookmarks')",
 * then your single template should be single-bookmarks.php
 *
 * Be aware that you should rename 'custom_cat' and 'custom_tag' to the appropiate custom
 * category and taxonomy slugs, or this template will not finish to load properly.
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="cf">

						<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							
								<div id="projects-top" class="cf">
									
									<header class="article-header m-all t-1of3 d-2of5">

									<h1 class="single-title custom-post-type-title"><?php the_title(); ?></h1>
									
										<p class="nut"><?php echo get_the_excerpt(); ?> </p>
									
									
										<h4>More Information:</h4>
										 <?php if(have_rows('project_links')): ?>
											
											<?php while (have_rows('project_links')) : the_row(); ?>
											
												    
												<p class="links"><a href="<?php the_sub_field('link_url'); ?>"> &#8250; <?php the_sub_field('link_title'); ?></a></p>
												 		
												
												<?php  endwhile; 
												
											 else : 
											
											
											endif; 
											
										?>
										
										
										
										

									</header>
									
									<div id="slideshow" class="m-all t-2of3 d-3of5">
										
									<!-- Carousel================================================== -->
								    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
								     
								      <div class="carousel-inner" role="listbox">
									      
									    <?php $images = get_field('project_gallery');
										    if( $images ): ?>
  
									      
									    <?php foreach( $images as $image ): ?>
								        <div class="item">
								         <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
										  <a href="<?php echo $image['url']; ?>" rel="lightbox" class="fullscreenBTN"></a>
										 </div>
								         <?php endforeach; ?>
								       <?php endif; ?>
								        
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
			    
									</div>
									
								  </div><!--END PROJECTS TOP-->
							
							<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">
								
									
								<section class="entry-content wrap cf">
									
									<?php
										// the content (pretty self explanatory huh)
										the_content();

										/*
										 * Link Pages is used in case you have posts that are set to break into
										 * multiple pages. You can remove this if you don't plan on doing that.
										 *
										 * Also, breaking content up into multiple pages is a horrible experience,
										 * so don't do it. While there are SOME edge cases where this is useful, it's
										 * mostly used for people to get more ad views. It's up to you but if you want
										 * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
										 *
										 * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
										 *
										*/
										wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
										) );
									?>
								</section> <!-- end article section -->

								

								
							</article>

							<?php endwhile; ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single-custom_type.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>
							
							
						<div id="more-projects" class="wrap">	
							
							<h4>More Projects:</h4>
							
							<?php $loop = new WP_Query( array( 'post_type' => 'projects', 'post_child' => 0, 'posts_per_page' => 3, 'orderby' => 'rand' ) ); ?>
								<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'm-all t-1of3 d-1of3 cf' ); ?> role="article" >

								

								<section class="entry-content ">

									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('full'); ?></a>
									
									<header class="entry-header article-header">

										<h3 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									
									</header>


								</section>

								

							</article>

							<?php endwhile; ?>

					</div>			

							


						</main>

				</div>

			</div>

<?php get_footer(); ?>
