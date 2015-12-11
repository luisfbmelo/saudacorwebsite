<?php 
$loop = new WP_Query(array('post_type' => 'departments', 'orderby' => 'post_id', 'order' => 'ASC')); 
 ?>

<?php if ($loop->have_posts()) : ?>
	 <section class="department-section">
	 	<div class="container">
	 		<h1 class="align-center"><?php echo get_field('depart_sec_title'); ?></h1>
	 		<?php while($loop->have_posts()) : $loop->the_post(); ?>
		 		<div class="row">
		 			<article class="col-xs-12">
		 				<div class="row">
		 					<div class="col-xs-12 col-sm-3 text-center">
		 						<?php the_post_thumbnail(); ?>
		 					</div>
		 					<div class="col-xs-12 col-sm-9 dep-desc-wrapper text-center">
		 						<div class="dep-desc">
		 							<h4><?php the_title(); ?></h4>
		 							<p><?php the_content(); ?></p>
		 						</div>		 						
		 					</div>
		 				</div>
		 			</article>
		 		</div>
		 	<?php endwhile; ?>
	 	</div>
	 </section>
 <?php endif; wp_reset_query();?>