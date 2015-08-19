<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-all d-all hentry cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
						
							<h1 class="page-title">Projects </h1>
							
					



<ul id="menu-port" class="nav top-nav cf">


    <li id="menu-item-2334" class="filter menu-item menu-item-type-custom menu-item-object-custom menu-item-2334" data-filter="all">
        <a>All</a>
    </li>
    <li id="menu-item-2335" class="filter menu-item menu-item-type-custom menu-item-object-custom menu-item-2335" data-filter=".category-commercial">
        <a>Commercial</a>
    </li>
    <li id="menu-item-2336" class="filter menu-item menu-item-type-custom menu-item-object-custom menu-item-2336" data-filter=".category-multi-family">
        <a>Multi Family</a>
    </li>
    <li id="menu-item-2337" class="filter menu-item menu-item-type-custom menu-item-object-custom menu-item-2337" data-filter=".category-residential">
        <a>Residential</a>
    </li>


</ul>









				
							
							
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							
							

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'm-all t-1of4 d-1of4 cf mix' ); ?> role="article" >

							
								
									
								<section class="entry-content ">

									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('full'); ?></a>
									
									<header class="entry-header article-header">

										<h3 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									
									</header>


								</section>

								

							</article>

							<?php endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>
							
							<footer> </footer>

						</main>

					

				</div>
				
				

			</div>
			
			

<?php get_footer(); ?>
