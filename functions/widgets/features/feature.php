<?php

class HG_Feature extends WP_Widget {

	public function __construct() {

		parent::__construct(
			'feature',
			__( 'Feature', 'happy-gremlin' ),
			array(
				'description' => __( 'Adds a feature and icon.', 'happy-gremlin' ),
				'classname'   => 'feature',
			)
		);

	}

	//output on the front end
	public function widget( $args, $instance ) {
		include( plugin_dir_path(__FILE__) . 'feature-output.php' );
	}

	public function form( $instance ) {
		// Set default values
		$instance = wp_parse_args( (array) $instance, array(
			'happygremlin_title' => '', 
			'happygremlin_image' => '',
			'happygremlin_content' => '',
		) );

		// Retrieve an existing value from the database
		$happygremlin_title = !empty( $instance['happygremlin_title'] ) ? $instance['happygremlin_title'] : '';
		$happygremlin_image = !empty( $instance['happygremlin_image'] ) ? $instance['happygremlin_image'] : '';
		$happygremlin_content = !empty( $instance['happygremlin_content'] ) ? $instance['happygremlin_content'] : '';


		// Form fields
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'happygremlin_title' ) . '" class="happygremlin_title_label">' . __( 'Title', 'happy-gremlin' ) . '</label>';
		echo '	<input type="text" id="' . $this->get_field_id( 'happygremlin_title' ) . '" name="' . $this->get_field_name( 'happygremlin_title' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'happy-gremlin' ) . '" value="' . esc_attr( $happygremlin_title ) . '">';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'happygremlin_image' ) . '" class="happygremlin_image_label">' . __( 'Image URL', 'happy-gremlin' ) . '</label>';
		echo '	<input type="text" id="' . $this->get_field_id( 'happygremlin_image' ) . '" name="' . $this->get_field_name( 'happygremlin_image' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'happy-gremlin' ) . '" value="' . esc_attr( $happygremlin_image ) . '">';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'happygremlin_content' ) . '" class="happygremlin_content_label">' . __( 'Content', 'happy-gremlin' ) . '</label>';
		echo '	<textarea rows="6" id="' . $this->get_field_id( 'happygremlin_content' ) . '" name="' . $this->get_field_name( 'happygremlin_content' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'happy-gremlin' ) . '" value="' . esc_attr( $happygremlin_content ) . '">' . esc_attr( $happygremlin_content ) . '</textarea>';
		echo '</p>';

	}

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['happygremlin_title'] = !empty( $new_instance['happygremlin_title'] ) ? strip_tags( $new_instance['happygremlin_title'] ) : '';
		$instance['happygremlin_image'] = !empty( $new_instance['happygremlin_image'] ) ? strip_tags( $new_instance['happygremlin_image'] ) : '';
		$instance['happygremlin_content'] = !empty( $new_instance['happygremlin_content'] ) ? strip_tags( $new_instance['happygremlin_content'] ) : '';

		return $instance;

	}

}

function happygremlin_register__feature_widgets() {
	register_widget( 'HG_Feature' );
}
add_action( 'widgets_init', 'happygremlin_register__feature_widgets' );