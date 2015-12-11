<?php 
$requisition_title = get_field('requisition_title');
$button_text_1 = get_field('button_text_1');
$button_link_1 = get_field('button_link_1');
$button_text_2 = get_field('button_text_2');
$button_link_2 = get_field('button_link_2');
 ?>

<!-- Brief Description Section-->
<?php if(!empty($button_text_1) && !empty($button_text_2)) : ?>
<section class="requisition-section">
	<div class="container">
		<div class="row">		
			<div class="col-xs-12 col-sm-6">
				<h2><?php echo $requisition_title ?></h2>
			</div>
			
			<div class="col-xs-12 col-sm-6">
				<?php if(!empty($button_text_1)) : ?>
					<a href="<?php echo $button_link_1 ?>" class="cta blank outlined" title="<?php echo $button_text_1; ?>"><?php echo $button_text_1; ?></a>
				<?php endif; ?>
				<?php if(!empty($button_text_2)) : ?>
					<a href="<?php echo $button_link_2 ?>" class="cta blank outlined" title="<?php echo $button_text_2; ?>"><?php echo $button_text_2; ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
</section>
<?php endif; ?>