<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package saudacor
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h3 class="page-title"><?php esc_html_e( 'Sem Conteúdo', 'saudacor' ); ?></h3>
	</header><!-- .page-header -->

	<div class="page-content">
		<div class="row">
			<div class="col-xs-12">
				<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

					<p><?php printf( wp_kses( __( 'Preparado para publicar o primeiro post? <a href="%1$s">Comece aqui</a>.', 'saudacor' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
			
				<?php elseif ( is_search() ) : ?>

				<p><?php esc_html_e( 'Não foram encontrados resultados com os parâmetros usados. Tente novamente com outras palavras.', 'saudacor' ); ?></p>

				<?php else : ?>
					<p><?php esc_html_e( 'Aparentemente não existe informação neste secção. Tente efetuar uma pesquisa para encontrar outro conteúdo.', 'saudacor' ); ?></p>

				<?php endif; ?>
			</div>

		</div>
		
	</div><!-- .page-content -->
</section><!-- .no-results -->
