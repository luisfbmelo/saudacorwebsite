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

// Use map?
$event_lat = get_field('event_lat');
$event_long = get_field('event_long');

// Event Program
$event_program = get_field('event_program');
?>

<article id="post-<?php the_ID(); ?>" class="specific-single-post">
	<header class="entry-header">
		<?php the_title( '<h5 class="entry-title">', '</h5>' ); ?>
		
		<!-- Google Maps -->
		<?php if (!empty($event_lat) && !empty($event_long)) : ?>
			<div class="row">
				<div class="col-xs-12">
					<?php echo do_shortcode('[wp_gmaps lat="'.$event_lat.'" lng="'.$event_long.'" zoom="17" marker="1"]' ); ?>
				</div>
			</div>
		<?php endif; ?>

		<!-- Event small details -->
		<div class="row event-small-details">
			<div class="col-xs-12 col-md-6">
				<time>
					<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					<?php echo mysql2date('j F Y', $post->post_date) ?>
				</time>
			</div>
			<div class="col-xs-12 col-md-6">
				<div class="event-place">
					<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
					<?php echo get_field('event_place') ?>
				</div>
			</div>
			<div class="col-xs-12 col-md-12">
				<time>
					<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
					<?php echo get_field('event_hour'); ?>
				</time>
			</div>
		</div>
		
	</header><!-- .entry-header -->

	<!-- Post content -->
	<div class="entry-content">
		<?php 
			// Display categories
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
			// Content
			the_content();

			// Event Program
			if ( $event_program ) {

				echo '<div class="event-program">';

					echo '<h6>Programa</h6>';

				    echo '<table border="0">';

				        if ( $event_program['header'] ) {

				            echo '<thead>';

				                echo '<tr>';

				                    foreach ( $event_program['header'] as $th ) {

				                        echo '<th>';
				                            echo $th['c'];
				                        echo '</th>';
				                    }

				                echo '</tr>';

				            echo '</thead>';
				        }

				        echo '<tbody>';

				            foreach ( $event_program['body'] as $tr ) {

				                echo '<tr>';

				                    foreach ( $tr as $td ) {

				                        echo '<td>';
				                            echo $td['c'];
				                        echo '</td>';
				                    }

				                echo '</tr>';
				            }

				        echo '</tbody>';

				    echo '</table>';
				echo '</div>';
			}


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
