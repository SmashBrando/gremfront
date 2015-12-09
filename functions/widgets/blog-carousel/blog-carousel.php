<?php

class HG_blogCarousel extends WP_Widget {

	public function __construct() {

		parent::__construct(
			'blogcarousel',
			__( 'Blog Carousel', 'happy-gremlin' ),
			array(
				'description' => __( 'Adds a carousel of blog posts as a widget.', 'happy-gremlin' ),
				'classname'   => 'blog-carousel',
			)
		);

	}

	//output on the front end
	public function widget( $args, $instance ) {
		include( plugin_dir_path(__FILE__) . 'blog-carousel-output.php' );
	}

	public function form( $instance ) {
		// Set default values
		$instance = wp_parse_args( (array) $instance, array(
			'happygremlin_title' => '', 
		) );

		// Retrieve an existing value from the database
		$happygremlin_title = !empty( $instance['happygremlin_title'] ) ? $instance['happygremlin_title'] : '';

		// Form fields
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'happygremlin_title' ) . '" class="happygremlin_title_label">' . __( 'Title', 'happy-gremlin' ) . '</label>';
		echo '	<input type="text" id="' . $this->get_field_id( 'happygremlin_title' ) . '" name="' . $this->get_field_name( 'happygremlin_title' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'happy-gremlin' ) . '" value="' . esc_attr( $happygremlin_title ) . '">';
		echo '</p>';

	}

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['happygremlin_title'] = !empty( $new_instance['happygremlin_title'] ) ? strip_tags( $new_instance['happygremlin_title'] ) : '';

		return $instance;

	}

}

function happygremlin_register_blog_widgets() {
	register_widget( 'HG_BlogCarousel' );
}
add_action( 'widgets_init', 'happygremlin_register_blog_widgets' );