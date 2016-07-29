<?php
/**
 * Template Name: PlusSRS
 */

get_header(); ?>
<main class="srs">
	<?php get_template_part('template-parts/plussrs/content', 'banner' ); ?>	

	<?php get_template_part('template-parts/plussrs/content', 'about' ); ?>

	<?php get_template_part('template-parts/plussrs/content', 'start' ); ?>

	<?php get_template_part('template-parts/plussrs/content', 'stores' ); ?>

	<?php get_template_part('template-parts/plussrs/content', 'video' ); ?>
	
	
</main>
<?php get_footer(); ?>
