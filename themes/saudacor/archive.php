<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package saudacor
 */

$title = strstr( wp_title(" | ", false, right), " | ", true );

get_header(); ?>

	<?php get_template_part('template-parts/content', 'generic-header' ); ?>

	<div class="archive-container dark-bg">
		<div class="container">
			<div class="row">		
			
				<main class="site-main col-xs-12 col-sm-9" role="main">

					<?php if ( have_posts() ) : ?>


						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php
								get_template_part( 'template-parts/content', get_post_format() );
							?>							

						<?php endwhile; ?>

						<?php wp_pagenavi(); ?>	

					<?php else : ?>

						<?php get_template_part( 'template-parts/content', 'none' ); ?>

					<?php endif; ?>

				</main><!-- #main -->

				<aside class="col-xs-12 col-sm-3 dark-bg">
					<?php get_sidebar(); ?>
				</aside>
			</div>
		</div>
	</div>
<?php get_footer(); ?>