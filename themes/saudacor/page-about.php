<?php
/**
 * Template Name: Sobre
 */

get_header(); ?>
<main>
	<?php get_template_part('template-parts/content', 'generic-header' ); ?>	

	<?php get_template_part('template-parts/about/content', 'about-desc' ); ?>

	<?php get_template_part('template-parts/about/content', 'administration' ); ?>

	<?php get_template_part('template-parts/content', 'services' ); ?>

	<?php get_template_part('template-parts/about/content', 'departments' ); ?>
	
	<?php get_template_part('template-parts/about/content', 'contact' ); ?>
	
</main>
<?php get_footer(); ?>
