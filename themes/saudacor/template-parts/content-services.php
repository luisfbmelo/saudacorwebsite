<?php 

// Service Icon
$loop = new WP_Query(array('post_type' => 'services', 'orderby' => 'menu_order', 'order' => 'DESC')); 
$services_title = get_field('services_title');
 ?>

<?php if ($loop->have_posts()) : ?>
<!-- Services Section-->
<section class="services-section">
	<?php if ($services_title!=undefined && !empty($services_title)) : ?>
		<h1 class="align-center"><?php echo $services_title; ?></h1>
	<?php endif; ?>


	<div class="container">
		<div class="row">
			
			<?php $post_idx = 1; while($loop->have_posts()) : $loop->the_post(); ?>
			<?php $service_icon = get_field('service_1_image'); ?>

			<article class="col-xs-12 col-sm-6 col-md-15">
				<?php if(!empty($service_icon)) : ?>
					<div class="serv-img-wrapper">
						<img src="<?php echo $service_icon['url'] ?>" alt="<?php echo $service_icon['alt'] ?>"/>						
					</div>
				<?php endif; ?>

				<h6><?php the_title(); ?></h6>
				<p><?php the_content(); ?></p>

				<?php 
					if($post_idx % 2 == 0){
						echo '<div class="clearfix visible-sm-block"></div>';
					}
					if($post_idx % 5 == 0){
						echo '<div class="clearfix visible-md-block"></div>';
					}
				?>
			</article>
			<?php $post_idx++; endwhile; wp_reset_query();?>
		</div>
	</div>
	
</section>
<?php endif; ?>