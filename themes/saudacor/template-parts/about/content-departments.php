<?php 
$loop = new WP_Query(array('post_type' => 'departments', 'orderby' => 'post_id', 'order' => 'DESC')); 
 ?>

<?php if ($loop->have_posts()) : ?>
	 <section class="department-section">
	 	<div class="container">
	 		<h1 class="align-center"><?php echo get_field('depart_sec_title'); ?></h1>
	 		<?php while($loop->have_posts()) : $loop->the_post(); ?>
		 		<div class="row">
		 			<article class="col-xs-12">
		 				<div class="row">
		 					<?php if (has_post_thumbnail()) : ?>
			 					<div class="col-xs-12 col-sm-3 dep-thumb">
			 						<?php the_post_thumbnail(); ?>
			 					</div>
			 				<?php endif; ?>
		 					<div class="col-xs-12 <?=(has_post_thumbnail()) ? 'col-sm-9' : 'col-sm-12' ?> dep-desc-wrapper">
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