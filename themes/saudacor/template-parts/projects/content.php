<?php 
// Get post categories for post classes
$terms = get_the_terms( get_the_ID(), 'project_type' );

$postClasses = '';
if (is_array($terms)){
	foreach ( $terms as $term ) {
		$postClasses.=' '.$term->slug;
	}	
}

$postThumb = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('mix'.$postClasses.' project-container'); ?> style="background-image:url(<?php echo $postThumb ?>);">	
	<div class="overlay">&nbsp;</div>
	<?php the_title( sprintf( '<a href="%s" rel="bookmark" title="'.get_the_title().'"><h5 class="entry-title">', esc_url( get_permalink() ) ), '</h5></a>' ); ?>
</article>