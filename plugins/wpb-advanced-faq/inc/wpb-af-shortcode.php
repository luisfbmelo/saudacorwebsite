<?php

/*
	WPB Advanced FAQ
	By WPBean
	
*/


if ( !function_exists('wpb_af_shortcode_function') ){
	function wpb_af_shortcode_function ($atts) {

		extract(shortcode_atts(array(
	      'post' 			=> -1,
	      'order' 			=> 'DESC',
	      'orderby' 		=> 'date',
	      'category'		=> '',
	      'tags'			=> '',
	      'theme'			=> 'flat', // ui, 
	      'close_previous'	=> 'yes', // no
		  
	   ), $atts));
	   
		$wp_query = new WP_Query( array( 
			'post_type' 			=> 'wpb_af_faq', 
			'orderby' 				=> $orderby,
			'order' 				=> $order,
			'posts_per_page' 		=> $post,
			'wpb_af_faq_category'	=> $category,
			'wpb_af_faq_tags'		=> $tags
		));

		$wpb_af_id = rand(10,1000);

		ob_start();

		// Control variable for grouping
		$group = '';

		if ($wp_query->have_posts()){ 
		?>
		<div id="wpb_af_<?php echo $wpb_af_id; ?>" class="wpb_af_<?php echo $theme; ?>_theme">
			<ul class="wpb_af_area">
				<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				<?php
					
					// Check if order is by category
					if ($orderby == 'category'){
						$category = get_the_terms(get_the_id(),'wpb_af_faq_category');
						$postorder=$category[0]->name;
					}else{
        				$postorder = get_post_meta( get_the_ID(), $orderby, true );
					}				
					

        			// Group elements
			        if ( $postorder != $group ) {
			        	// ...and change the stored date for the current group
			            $group = $postorder;

			        	if ( empty($group)){
				        	$group = 'Outros';
				        }

			            echo '<h4>' . $group . '</h4>';			            
			        }
        		?>

					<?php $faq_content = get_the_content(); ?>
					<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<a href="#"><?php the_title(); ?></a>
						<?php if( $faq_content && $faq_content != '' ): ?>
							<ul>
			                    <li><?php the_content(); ?></li>
			                </ul>
		            	<?php endif;?>
					</li>
			    <?php endwhile; ?>
			</ul>
		</div>

		<script type="text/javascript">
		jQuery( function($) {  
			$("#wpb_af_<?php echo $wpb_af_id; ?> > ul").navgoco({
				<?php if( $theme == 'flat' ):?>
		        caretHtml: '<i class="icon-wpb-af-plus"></i>',
		        <?php endif;?>
				accordion: <?php echo ( $close_previous == 'yes' ? 'true' : 'false' ); ?>,
				openClass: 'wpb-submenu-indicator-minus',
				save: true,
				cookie: {
					name: 'wpb_af',
					expires: false,
					path: '/'
				},
				slide: {
					duration: 400,
					easing: 'swing'
				}
		    });
		});
		</script>

		<?php
		}else{
			_e( '<h2 class="text-center">'.'Na&#771;o existem ainda questo&#771;es.'.'</h2>', 'margo' );
		}
		wp_reset_postdata();  // Reset
		return ob_get_clean();
	}
	add_shortcode( 'wpb_af_faqs', 'wpb_af_shortcode_function' );
}	