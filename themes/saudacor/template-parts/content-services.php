<?php 
// Service Icon
$loop = new WP_Query(array('post_type' => 'services', 'orderby' => 'post_id', 'order' => 'ASC')); 
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
			
			<?php while($loop->have_posts()) : $loop->the_post(); ?>
			<?php $service_icon = get_field('service_1_image'); ?>

			<article class="col-xs-12 col-sm-3">
				<?php if(!empty($service_icon)) : ?>
					<div class="serv-img-wrapper">
						<img src="<?php echo $service_icon['url'] ?>" alt="<?php echo $service_icon['alt'] ?>"/>						
					</div>
				<?php endif; ?>

				<h5><?php the_title(); ?></h5>
				<p><?php the_content(); ?></p>
			</article>
			<?php endwhile; wp_reset_query();?>
		</div>
	</div>
	
</section>
<?php endif; ?>