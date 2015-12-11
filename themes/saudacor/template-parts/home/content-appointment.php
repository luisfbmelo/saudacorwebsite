<?php 
$appoint_title = get_field('appoint_title');
$appoint_desc = get_field('appoint_desc');
$button_text_appointment = get_field('button_text_appointment');
$button_link_appointment = get_field('button_link_appointment');

 ?>

<!-- Brief Description Section-->
<section class="appointment-section" style="background-image:url(<?php echo bloginfo('stylesheet_directory') ?>/img/appointment_image.jpg);">
	<div class="container">
		<div class="row">		
			<div class="col-xs-12 col-sm-10 col-xs-offset-0 col-sm-offset-1">

				<h1 class="align-center"><?php echo $appoint_title; ?></h1>
				<p><?php echo $appoint_desc; ?></p>
				
				<div class="sec-cta aligncenter">
					<a href="<?php echo $button_link_appointment; ?>" class="cta primary" title="<?php echo $button_text_appointment; ?>"><?php echo $button_text_appointment; ?></a>					
				</div>

			</div>

		</div>
	</div>
	
</section>