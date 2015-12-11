<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package saudacor
 */

get_header(); ?>

	<main class="site-main" role="main">
		<section class="error-404 not-found container">
			<div class="row">
				<div class="col-xs-12">
					<h2 class="page-title">Oops! <br/> Parece que se encontra perdido.</h2>
				</div>
				<p><?php esc_html_e( 'A página que está à procura não existe.', 'saudacor' ); ?></p>

				<a href="<?php echo get_home_url(); ?>" class="cta primary">Voltar ao início</a>
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php get_footer(); ?>


