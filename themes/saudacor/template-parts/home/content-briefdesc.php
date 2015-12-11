<?php 
$brief_title = get_field('brief_title');
$brief_desc = get_field('brief_desc');
$brief_image = get_field('brief_image');
$add_button_brief = get_field('add_button');
$button_text_brief = get_field('button_text_brief');
$button_link_brief = get_field('button_link_brief');

 ?>

<!-- Brief Description Section-->
<section class="brief-description-section">
	<div class="container">
		<div class="row">		
			<article class="col-xs-12 col-sm-6">

				<h3><?php echo $brief_title; ?></h3>
				<p><?php echo $brief_desc; ?></p>

				<?php if($add_button_brief==1) : ?>
					<a href="<?php echo $button_link_brief; ?>" class="cta primary outlined" title="<?php echo $button_text_brief; ?>"><?php echo $button_text_brief; ?></a>
				<?php endif; ?>

			</article>

			<div class="col-xs-12 col-sm-6">
				<img src="<?php echo $brief_image['url']; ?>" alt="<?php echo $brief_image['alt']; ?>">
			</div>
		</div>
	</div>
	
</section>