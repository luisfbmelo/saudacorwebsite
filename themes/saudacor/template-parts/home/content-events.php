<?php 
$posts = wp_get_recent_posts( array( 
	'offset' => 0,
	'numberposts' => 3, 
	'meta_key' => 'event_date',
	'orderby' => 'meta_value_num',
	'post_type' => 'events',
	'order' => 'DESC' ) );

$classesRight = null;
if (sizeof($posts)==1) : $classesLeft.=' fullwidth'; endif;
if (sizeof($posts)==2) : $classesRight.=' fullsection'; endif;

$add_button = get_field('event_add_button');
$button_text = get_field('event_button_text');
 ?>

<?php if(sizeof($posts)>0) : ?>
	<!-- Brief Description Section-->
	<section class="events-section">
		<h1 class="align-center">Eventos</h1>
		<div class="events-container">

			<article class="last-event <?php echo $classesLeft; ?>" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($posts[0]['ID'])); ?>)">
				<div class="event-overlay"></div>
				<section>
					<time><?php echo mysql2date('j F Y', get_field('event_date', $posts[0]['ID'])) ?></time>	
					<a href="<?php echo get_permalink ( $posts[0]['ID'] ) ?>" class="title-link" title="Mais sobre <?php echo $posts[0]['post_title'] ?>">							
						<h2><?php echo $posts[0]['post_title'] ?></h2>	
					</a>
					<a href="<?php echo get_permalink ( $posts[0]['ID'] ) ?>" class="cta primary small" title="Mais sobre <?php echo $posts[0]['post_title'] ?>"> Mais...</a>		
				</section>
			</article>

			<?php if($classesLeft==null) : ?>
				<div class="other-events">
					<article class="event_1">
						<section>
							<time><?php echo mysql2date('j F Y', get_field('event_date', $posts[1]['ID'])) ?></time>	
							<a href="<?php echo get_permalink ( $posts[1]['ID'] ) ?>" class="title-link" title="Mais sobre <?php echo $posts[1]['post_title'] ?>">									
								<h2><?php echo $posts[1]['post_title'] ?></h2>	
							</a>
							<a href="<?php echo get_permalink ( $posts[1]['ID'] ) ?>" class="cta blank outlined small" title="Mais sobre <?php echo $posts[1]['post_title'] ?>"> Mais...</a>		
						</section>
					</article>

					<?php if($classesRight==null) : ?>
						<article class="event_2">
							<section>
								<time><?php echo mysql2date('j F Y', get_field('event_date', $posts[2]['ID'])) ?></time>	
								<a href="<?php echo get_permalink ( $posts[2]['ID'] ) ?>" class="title-link" title="Mais sobre <?php echo $posts[2]['post_title'] ?>">
									<h2><?php echo $posts[2]['post_title'] ?></h2>	
								</a>
								<a href="<?php echo get_permalink ( $posts[2]['ID'] ) ?>" class="cta primary outlined small" title="Mais sobre <?php echo $posts[2]['post_title'] ?>"> Mais...</a>		
							</section>
						</article>
					<?php endif;?>
				</div>
			<?php endif; ?>
		</div>

		<?php if ($add_button==1) : ?>
			<div class="more-events">
				<div class="sec-cta aligncenter">
					<a href="<?php echo get_post_type( $posts[0]['ID'] ); ?>" class="cta primary" title="<?php echo $button_text ?>"><?php echo $button_text ?></a>					
				</div>
			</div>
		<?php endif; ?>
	</section>
<?php endif; wp_reset_query();?>