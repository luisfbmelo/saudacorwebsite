<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package saudacor
 */

$title = strstr( wp_title(" | ", false, right), " | ", true );

get_header(); ?>

	<?php get_template_part('template-parts/content', 'generic-header' ); ?>

	<div class="search-container archive-container ">
		<div class="container">
			<div class="row">		
			
				<main class="site-main col-xs-12" role="main">					

					<?php if ( have_posts() ) : 
						$hit_count = $wp_query->found_posts;
					?>
						<header class="page-header">
							<h1 class="page-title"><?php printf( esc_html__( 'Encontrados %s', 'saudacor' ), '<span>' . $wp_query->found_posts . ' resultados</span>' ); ?></h1>
						</header><!-- .page-header -->
					


						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php
								get_template_part( 'template-parts/content', 'search' );
							?>							

						<?php endwhile; ?>

						<?php wp_pagenavi(); ?>	

					<?php else : ?>

						<?php get_template_part( 'template-parts/content', 'none' ); ?>

					<?php endif; ?>

				</main><!-- #main -->

			</div>
		</div>
	</div>

	

<?php get_footer(); ?>
