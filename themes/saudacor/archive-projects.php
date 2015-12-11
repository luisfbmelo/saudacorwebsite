<?php
/**
 * The template for displaying projects.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package saudacor
 */

// Get categories of Project Type Taxonomy
$project_cats = get_terms('project_type',array('hide_empty' => true));

get_header(); ?>

	<?php get_template_part('template-parts/content', 'generic-header' ); ?>
	<?php if(sizeof($project_cats>0)) : ?>
		<div class="container filters-container">
			<div class="filter cta primary outlined small" data-filter="all">Todos</div>
			<?php foreach ($project_cats as $value) { ?>				
				<div class="filter cta primary outlined small" data-filter=".<?php echo $value->slug; ?>"><?php echo $value->name; ?></div>
			<?php } ?>
		</div>
	<?php endif; ?>
	<?php if ( have_posts() ) : ?>
		<div class="container mixitup-container">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
					get_template_part( 'template-parts/projects/content', get_post_format() );
				?>
			<?php endwhile; ?>
		</div>
		<div class="container">
			<?php wp_pagenavi(); ?>	
		</div>
		
	<?php endif; ?>

<?php get_footer(); ?>