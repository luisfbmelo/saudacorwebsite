<?php
/**
 * The template for displaying events.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package saudacor
 */

$day_check = '';

// Get page for pagination
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// Get blogal wp_query to be used with have_posts()
global $wp_query;
$original_query = $wp_query;
$wp_query = null;

// Get posts
$wp_query = new WP_Query( array( 
	'meta_key' => 'event_date',
	'orderby' => 'meta_value_num',
	'post_type' => 'events',
	'order' => 'DESC',
	'paged' => $paged) );
get_header(); ?>

	<?php get_template_part('template-parts/content', 'generic-header' ); ?>
	
	<main class="site-main events-list" role="main">
		<div class="container">
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ 
				$c=0;
				while ( have_posts() ) : the_post(); 
					$day = mysql2date('j', get_field('event_date'));
					if ($day != $day_check) {
						echo '<div class="date-group"><h5>'.mysql2date('j F, Y', get_field('event_date')).'</h5></div>';
					}
				?>

					<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/events/content', get_post_format() );
					?>

				<?php $day_check = $day; endwhile; ?>

				<?php wp_pagenavi(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; 
				// Reset wp_query
				$wp_query = null;
				$wp_query = $original_query;
				wp_reset_postdata();
			?>

		</div>

	</main><!-- #main -->

<?php get_footer(); ?>
