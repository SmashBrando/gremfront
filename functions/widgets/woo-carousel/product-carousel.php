<?php

class HG_ProductCarousel extends WP_Widget {

	public function __construct() {

		parent::__construct(
			'woocarousel',
			__( 'WooCommerce Carousel', 'happy-gremlin' ),
			array(
				'description' => __( 'Adds a carousel of products as a widget.', 'happy-gremlin' ),
				'classname'   => 'woo-carousel',
			)
		);

	}

	//output on the front end
	public function widget( $args, $instance ) {
		include( plugin_dir_path(__FILE__) . 'product-carousel-output.php' );
	}

	public function form( $instance ) {
		// Set default values
		$instance = wp_parse_args( (array) $instance, array(
			'happygremlin_title' => '', 
			'happygremlin_product_feed' => '',
		) );

		// Retrieve an existing value from the database
		$happygremlin_product_feed = !empty( $instance['happygremlin_product_feed'] ) ? $instance['happygremlin_product_feed'] : '';
		$happygremlin_title = !empty( $instance['happygremlin_title'] ) ? $instance['happygremlin_title'] : '';

		// Form fields
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'happygremlin_title' ) . '" class="happygremlin_title_label">' . __( 'Title', 'happy-gremlin' ) . '</label>';
		echo '	<input type="text" id="' . $this->get_field_id( 'happygremlin_title' ) . '" name="' . $this->get_field_name( 'happygremlin_title' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'happy-gremlin' ) . '" value="' . esc_attr( $happygremlin_title ) . '">';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'happygremlin_product_feed' ) . '" class="happygremlin_product_feed_label">' . __( 'Select a product feed', 'happy-gremlin' ) . '</label>';
		echo '	<select id="' . $this->get_field_id( 'happygremlin_product_feed' ) . '" name="' . $this->get_field_name( 'happygremlin_product_feed' ) . '" class="widefat">';
		echo '		<option value="_featured" ' . selected( $happygremlin_product_feed, '_featured', false ) . '> ' . __( 'Featured', 'happy-gremlin' );
		echo '		<option value="_new" ' . selected( $happygremlin_product_feed, '', false ) . '> ' . __( 'New', 'happy-gremlin' );
		echo '		<option value="_sale" ' . selected( $happygremlin_product_feed, '_sale_price', false ) . '> ' . __( 'Sale', 'happy-gremlin' );
		echo '	</select>';
		echo '</p>';

	}

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['happygremlin_product_feed'] = !empty( $new_instance['happygremlin_product_feed'] ) ? strip_tags( $new_instance['happygremlin_product_feed'] ) : '';
		$instance['happygremlin_title'] = !empty( $new_instance['happygremlin_title'] ) ? strip_tags( $new_instance['happygremlin_title'] ) : '';

		return $instance;

	}

}

function happygremlin_register_widgets() {
	register_widget( 'HG_ProductCarousel' );
}
add_action( 'widgets_init', 'happygremlin_register_widgets' );