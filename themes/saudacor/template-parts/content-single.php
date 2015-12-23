<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package saudacor
 */
$categories = get_the_category();
$separator = ' ';
$output = '';

$downloads = pamd::get_downloads( $post->ID, false, 'array');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('generic-single-post'); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<time>
			<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
			<?php echo mysql2date('j F Y', $post->post_date) ?>
		</time>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php 
			if ( ! empty( $categories ) ) {
				echo '<div class="categories-container">';
			    foreach( $categories as $category ) {
			        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '" class="cta primary xsmall">' . esc_html( $category->name ) . '</a>' . $separator;
			    }
			    echo trim( $output, $separator );
			    echo '</div>';
			}
 		?>

		<?php the_content(); ?>

		<?php 
			// Downloads list
			if(!empty($downloads)){
				echo '<h6 class="post-attached-media-title">Recursos</h6>';
				echo '<ul class="post-attached-media">';
				foreach( $downloads as $download ) {
					echo '<li>
						<a href="'.$download['url'].'" target="_blank" download><i class="glyphicon glyphicon-save" aria-hidden="true"></i><span>
							'.$download['label'].'
							</span>
						</a>
					</li>';
			    }
			    echo '</ul>';
			}
		 ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
