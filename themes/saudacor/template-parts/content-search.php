<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package saudacor
 */

$categories = get_the_category();
$separator = ' ';
$output = '';

?>

<article id="post-<?php the_ID(); ?>" class="row">
	<div class="col-xs-12">
		<div class="article-single-container">
			<div class="article-text">			
			
				<?php the_title( sprintf( '<h5 class="entry-title"><a href="%s" rel="bookmark" title="Ler mais">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>

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

				<?php
					the_excerpt();
				?>

				 <div class="moretag"><a class="cta primary outlined small" href="<?php echo get_permalink($post->ID) ?>" title="Ler mais"> Ler mais </a></div>
			 </div>
		</div>
	</div><!-- .entry-content -->
</article>