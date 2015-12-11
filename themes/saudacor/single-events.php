<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package saudacor
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>
		<main class="archive-single event-single">
			<!--BreadCrumbs-->
			<div class="breadcrumbs bottom-thin" xmlns:v="http://rdf.data-vocabulary.org/#">
				<div class="container">
					<?php if ( function_exists('yoast_breadcrumb') ) {
				    	yoast_breadcrumb('<div id="breadcrumbs">','</div>');} 
			    	?>
				</div>			    
			</div>


			
			
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<!--Post Image-->
						<?php if (has_post_thumbnail($post->ID)) : ?>
							<div class="post-img">
								<?php the_post_thumbnail(); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="row">
					<!--Post content-->
					<div class="col-xs-12 col-md-9">
						<?php get_template_part( 'template-parts/events/content', 'single' ); ?>
					</div>

					<!--Other posts-->
					<aside class="col-xs-12 col-md-3">
						<?php dynamic_sidebar( 'events-sidebar' ); ?>
					</aside>
				</div>
			</div>
		</main>
	<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
