<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package saudacor
 */
$categories = get_the_terms( $post->ID, 'project_type');
$separator = ' ';
$output = '';

$downloads = pamd::get_downloads( $post->ID, false, 'array');
?>

<article id="post-<?php the_ID(); ?>" class="specific-single-post">
	<header class="entry-header">
		<?php the_title( '<h5 class="entry-title">', '</h5>' ); ?>
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<time>
					<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					<?php echo mysql2date('j F Y', $post->post_date) ?>
				</time>
			</div>
			<?php if (!empty($categories)) : ?>
				<div class="col-xs-12 col-sm-6">
					<div class="proj-types">			
						<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
						<?php
							foreach($categories as $key=>$cat) { 
								if ($key>0)
									echo ',';

							    echo '&nbsp;'.$cat->name; 
							} 
						?>
					</div>
				</div>
			<?php endif; ?>
		</div>
		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>

		<?php 
			// Downloads list
			if(!empty($downloads)){
				echo '<h6 class="post-attached-media-title">Recursos</h6>';
				echo '<ul class="post-attached-media">';
				foreach( $downloads as $download ) {
					echo '<li>
						<a href="'.$download['url'].'" target="_blank" download><i class="glyphicon glyphicon-save" aria-hidden="true"></i><span>
							'.$download['label'].'
							</span>
						</a>
					</li>';
			    }
			    echo '</ul>';
			}
		 ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
