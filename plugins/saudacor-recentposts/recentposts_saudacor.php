<?php

/*
Plugin Name: Recent Posts - Saudacor
Description: Other recent posts associated with current

*/
/* Start Adding Functions Below this Line */
// Creating the widget

class recentpostssaudacor extends WP_Widget {

	function __construct() {

		parent::__construct(

			// Base ID of your widget
			'recentpostssaudacor',

			// Widget name will appear in UI
			__('Recent Posts -', 'recentpostssaudacor_domain'),

			// Widget description
			array( 'description' => __( 'Display recent posts related with current category', 'recentpostssaudacor_domain' ), )

		);

	}

	 
	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];

		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];		 

		// This is where you run the code and display the output

		// Get other recent posts
		global $post;
		$cat_ID=array();
		$categories = get_the_category(); //get all categories for this post

		foreach($categories as $category) {
			array_push($cat_ID,$category->cat_ID);
		}

		$args = array(
		'orderby' => 'date',
		'order' => 'DESC',
		'post__not_in' => array($post->ID),
		'category__in' => $cat_ID
		); // post__not_in will exclude the post we are displaying

		$otherposts = get_posts($args);
		if (sizeof($otherposts)> 0) {
			$out='';
			foreach($otherposts as $otherpost) {
				$out .= '<li>';
				$out .=  '<a href="'.get_permalink($otherpost->ID).'" title="'.wptexturize($otherpost->post_title).'">'.wptexturize($otherpost->post_title).'</a></li>';
			}
			$out = '<ul class="otherpost">' . $out . '</ul>';
			echo $out;
		}else{
			echo "<li>Não existem outras publicações.</li>";
		}
		

		echo $args['after_widget'];

	}

	         

	// Widget Backend

	public function form( $instance ) {

		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}else {
			$title = __( 'Título', 'recentpostssaudacor_domain' );
		}

		// Widget admin form
		?>

		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Título:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
	<?php
	}
	     
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {

		$instance = array();

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;

	}


} // Class recentpostssaudacor ends here

 

// Register and load the widget
function recentpostssaudacor_load_widget() {
    register_widget( 'recentpostssaudacor' );
}

add_action( 'widgets_init', 'recentpostssaudacor_load_widget' );

/* Stop Adding Functions Below this Line */
?>
