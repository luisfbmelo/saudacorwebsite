<?php 
$loop = new WP_Query(array('post_type' => 'administration', 'orderby' => 'post_id', 'order' => 'ASC')); 
$adminis_desc = get_field('adminis_desc');
$adminis_title = get_field('adminis_sec_title');
 ?>

<?php if ($loop->have_posts()) : ?>
<!-- Services Section-->
<section class="administration-section">
	<div class="container">

		<!-- Section Title -->
		<div class="row">
			<div class="col-xs-12">
				<h1 class="align-center">
					<?php echo $adminis_title; ?>
				</h1>
			</div>
		</div>

		<!-- Administration -->
		<div class="row">
			
			<?php while($loop->have_posts()) : $loop->the_post(); ?>
			<?php 
				$adminis_status = get_field('adminis_status'); 
				$adminis_image = get_field('adminis_image'); 
			?>

			<article class="col-xs-12 col-sm-4">
				<?php if(!empty($adminis_image)) : ?>
					<div class="serv-img-wrapper">
						<img src="<?php echo $adminis_image['url'] ?>" alt="<?php echo $adminis_image['alt'] ?>"/>						
					</div>
				<?php endif; ?>

				<p><?php echo $adminis_status ?></p>				
				<h5><?php the_title(); ?></h5>
			</article>
			<?php endwhile; wp_reset_query();?>
		</div>

		<!-- Section description -->
		<div class="row">
			<div class="col-xs-12">
				<div class="adminis-desc">
					<?php echo $adminis_desc; ?>					
				</div>
			</div>
		</div>
	</div>
	
</section>
<?php endif; wp_reset_query();?>