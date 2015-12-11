<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package saudacor
 */
$categories = get_the_category();

$downloads = pamd::get_downloads( $post->ID, false, 'array');
?>

<article id="post-<?php the_ID(); ?>" class="row">
	<div class="col-xs-2 col-md-1 date-container">
		<div class="post-day"><?php echo get_the_date('d'); ?></div>
		<div class="post-month"><?php echo get_the_date('M'); ?></div>
		<div class="post-year"><?php echo get_the_date('Y'); ?></div>
		
	</div>
	<div class="col-xs-10 col-md-11">
		
		<div class="article-single-container">
			<!--Post Image-->
			<?php if (has_post_thumbnail($post->ID)) : ?>
				<div class="post-img">
					<a href="<?php echo esc_url( get_permalink() ); ?>" title="Ler mais">
						<?php the_post_thumbnail(); ?>
					</a>
				</div>
			<?php endif; ?>

			<div class="article-text">			
			
				<?php the_title( sprintf( '<h5 class="entry-title"><a href="%s" rel="bookmark" title="Ler mais">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>

				<?php 
					if ( ! empty( $categories ) ) {
						echo '<div class="categories-container">';
					    foreach( $categories as $category ) {
					        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '" class="cta primary xsmall">' . esc_html( $category->name ) . '</a>';
					    }
					    echo $output;
					    echo '</div>';
					}
		 		?>

				<?php
					the_excerpt();
				?>

				<?php 
					// Downloads list
					if(!empty($downloads)){
						echo '<ul class="post-attached-media">';
						foreach( $downloads as $download ) {
							echo '<li>
								<a href="'.$download['url'].'" target="_blank" download title="Download ficheiro '.$download['label'].'"><i class="glyphicon glyphicon-save" aria-hidden="true"></i><span>
									'.$download['label'].'
									</span>
								</a>
							</li>';
					    }
					    echo '</ul>';
					}
				 ?>

				 <div class="moretag"><a class="cta primary outlined small" href="<?php echo get_permalink($post->ID) ?>" title="Ler mais"> Ler mais </a></div>
			 </div>
		</div>
		

	</div><!-- .entry-content -->


</article><!-- #post-## -->
