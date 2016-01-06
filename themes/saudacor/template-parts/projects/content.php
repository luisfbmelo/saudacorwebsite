<?php 
// Get post categories for post classes
$terms = get_the_terms( get_the_ID(), 'project_type' );

// Get post terms to use in MIXITUP
$postClasses = '';
if (is_array($terms)){
	foreach ( $terms as $term ) {
		$postClasses.=' '.$term->slug;
	}	
}

// Get post thumbnail
$postThumb = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));

// Set box background
$style = null;
$class = null;
if(!empty($postThumb) && $postThumb==true) {
	$style='style="background-image:url('. $postThumb .');"';
}else{
	$class = shuffle_strings(array('bg-primary','bg-secondary'));
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('mix'.$postClasses.' project-container '.$class); ?> <?php echo $style; ?>>	
	<?php if(!empty($postThumb)) : ?>
		<div class="overlay">&nbsp;</div>
		<?php the_title( sprintf( '<a href="%s" rel="bookmark" title="'.get_the_title().'" class="with-overlay"><h5 class="entry-title">', esc_url( get_permalink() ) ), '</h5></a>' ); ?>
	<?php else : ?>
		<?php the_title( sprintf( '<a href="%s" rel="bookmark" title="'.get_the_title().'"><h5 class="entry-title">', esc_url( get_permalink() ) ), '</h5></a>' ); ?>
		
	<?php endif; ?>
	
</article>