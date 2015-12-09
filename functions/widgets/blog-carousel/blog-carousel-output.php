<?php echo $args['before_widget']; ?>

<?php
$widget_custom_id = 'blogcar-' . $instance["panels_info"]["id"];
?>

<div class="blog-carousel">
	<div class="carousel-header">
	<h1>
		<?php if ( ! empty( $instance['happygremlin_title'] ) ) {
				echo $args['happygremlin_title'] . apply_filters( 'happygremlin_title', $instance['happygremlin_title'] ). $args['happygremlin_title'];
			}
		?>
	</h1>
	<div class="arrows <?php echo $widget_custom_id; ?>"></div>
	</div>
	<div class="owl-carousl <?php echo $widget_custom_id; ?>">
	<?php
		// WP_Query arguments
		$args = array (
			'post_type'              => array( 'post' ),
			'nopaging'               => false,
			'posts_per_page'         => '8',
			'order'                  => 'DESC',
		);

		// The Query
		$blog_carousel = new WP_Query( $args );

		// The Loop
		if ( $blog_carousel->have_posts() ) {
			while ( $blog_carousel->have_posts() ) {
				$blog_carousel->the_post();
				echo '<div class="item">';
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry-content">
						<?php
							the_content( sprintf(
								/* translators: %s: Name of current post. */
								wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'happy-gremlin' ), array( 'span' => array( 'class' => array() ) ) ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							) );
						?>

						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'happy-gremlin' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->

				</article><!-- #post-## -->
				<?php
				echo '</div>';
				
			}
		} else {
			// no posts found
		}

		// Restore original Post Data
		wp_reset_postdata();
		?>
	</div>
</div>

<script type="text/javascript">
(function($) {

	$( document ).ready(function() {

	  	$('.<?php echo $widget_custom_id; ?>').owlCarousel({
		    loop:true,
		    margin:10,
		    nav:true,
		    navContainer: '.arrows.<?php echo $widget_custom_id; ?>',
		    responsive:{
		        0:{
		            items:1
		        },
		        768:{
		            items:3
		        },
		        1000:{
		            items:4
		        }
		    }
		});
	 });
	
})( jQuery );
</script>

<?php echo $args['after_widget']; ?>