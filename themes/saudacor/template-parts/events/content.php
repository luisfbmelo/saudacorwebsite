<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package saudacor
 */

$event_place = get_field('event_place');
$event_hour = get_field('event_hour');
$downloads = pamd::get_downloads( $post->ID, false, 'array');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<?php if(has_post_thumbnail($post->ID)) { ?>
			<div class="col-xs-12 col-md-4">
				<a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="Ler mais" class="thumbnail-link" style="background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) ?>');">
				</a>
			</div>
			<div class="col-xs-12 col-md-8">
		<?php }else{ ?>
			<div class="col-xs-12">
		<?php } ?>
			<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark" title="Ler mais">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
			<div class="row event-meta">
				<div class="col-xs-6 ">
					<div class="event-place">
						<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
						<?php echo $event_place; ?>
					</div>
				</div>
				<div class="col-xs-6">
					<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
					<time><?php echo $event_hour; ?></time>
				</div>
			</div>
			<?php the_excerpt(); ?>

			<?php 
				// Downloads list
				if(!empty($downloads)){
					echo '<ul class="post-attached-media">';
					foreach( $downloads as $download ) {
						echo '<li>
							<a href="'.$download['url'].'" target="_blank" download title="Download do ficheiro '.$download['label'].'"><i class="glyphicon glyphicon-save" aria-hidden="true"></i><span>
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
</article><!-- #post-## -->
