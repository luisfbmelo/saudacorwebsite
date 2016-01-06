<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package saudacor
 */

?>


<?php wp_footer(); ?>

<footer>
	<div class="container">	
		<?php dynamic_sidebar( 'footer-sidebar' ); ?>
	</div>
	<div class="container copyright">
		<div class="row">
			<div class="col-xs-12">
				&copy; <?php echo bloginfo('name'); ?> - <?php echo date('Y'); ?>				
			</div>
		</div>
	</div>
</footer>



</body>
</html>
