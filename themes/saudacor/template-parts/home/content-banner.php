<?php 
// Banner Section
$banner_image = get_field('banner_image');
$image_link = get_field('image_link');
 ?>

<!-- Banner Section-->
<section class="banner-section">
	<?php if (!empty($banner_image)) { ?>
		<?php if(!empty($image_link)) { ?>
			<a href="<?php echo $image_link;?>" title="<?php echo $banner_image['alt'];?>">
				<img src="<?php echo $banner_image['url'];?>" alt="<?php echo $banner_image['alt'];?>">
			</a>
		<?php }else{ ?>
			<img src="<?php echo $banner_image['url'];?>" alt="<?php echo $banner_image['alt'];?>">			
		<?php } ?>

	<?php 
	// Default Banner
	} else { ?>
		<div class="banner-box">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-5 corporate">
						<img src="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/img/logo_small.png" alt="Saudaçor Logo">
						<h2><?php echo bloginfo('title') ?></h2>
						<p><?php echo bloginfo('description') ?></p>
					</div>
					<div class="col-sm-7 medic-image">
						<img src="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/img/banner_medic.png" alt="Saudaçor Actions">
						
					</div>
				</div>
			</div>			
		</div>
	<?php } ?>
</section>