<?php 
$news_title_sec = get_field('news_title_sec');
$news_categories_sec = get_field('news_categories_sec');
$more_button = get_field('more_button');
$pre_button_text = get_field('pre_button_text');
 ?>


<?php if (sizeof($news_categories_sec)>0) : ?>
	<div class="news-container">
		<h1 class="align-center"><?php echo $news_title_sec; ?></h1>
	
		<?php 
		// Get posts from each category
		foreach ($news_categories_sec as $cat){
			$posts = wp_get_recent_posts( array( 
				'category' => $cat, 
				'offset' => 0,
				'numberposts' => 3, 
				'post_type' => 'post',
				'orderby' => 'post_date', 
				'order' => 'DESC' ) );

			// Print category name and given posts
			if (sizeof($posts)>0) : ?>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 cat-name">
							<h3><?php echo get_cat_name($cat) ?></h3>
						</div>
					</div>	
				</div>					
				<div class="cat-news-container">
					<div class="container">
						<div class="row">
							<?php foreach ($posts as $post){?>
								<article class="col-xs-12 col-sm-4">
									<time><?php echo mysql2date('j F Y', $post['post_date']) ?></time>
									<a href="<?php echo post_permalink($post['ID']) ?>" class="post-title" title="Mais sobre <?php echo $post['post_title']; ?>"><h1><?php echo $post['post_title']; ?></h1></a>
									<a href="<?php echo post_permalink($post['ID']) ?>" class="cta primary outlined small" title="Mais sobre <?php echo $post['post_title']; ?>"> Mais...</a>
								</article>		

							<?php } ?>
						</div>
					</div>
				</div>
				
				<?php if($more_button==1) : ?>
					<div class="container">
						<div class="sec-cta aligncenter">
							<a href="<?php echo get_category_link( $cat ); ?>" class="cta primary" title="<?php echo $pre_button_text; ?> <?php echo get_cat_name($cat); ?>"><?php echo $pre_button_text; ?> <?php echo get_cat_name($cat); ?> </a>					
						</div>
					</div>
				<?php endif; ?>

			<?php endif;

			wp_reset_query();
		}?>
	</div>

<?php endif; ?>