<?php 
$contact_sec_title = get_field('contact_sec_title');
 ?>
<section class="contact-form">
	<h1 class="align-center"><?php echo $contact_sec_title; ?></h1>
	<div class="container">
		<?php echo do_shortcode( '[contact-form-7 id="136" title="quote"]' ); ?>		
	</div>
	
</section>