<?php echo $args['before_widget']; ?>

<?php
$widget_custom_id = 'blogcar-' . $instance["panels_info"]["id"];

?>
		


<div class="flexslider <?php echo $widget_custom_id; ?>" style="">
	<div class="carousel-header">
	<h1>
		<?php if ( ! empty( $instance['happygremlin_title'] ) ) {
				echo $args['happygremlin_title'] . apply_filters( 'happygremlin_title', $instance['happygremlin_title'] ). $args['happygremlin_title'];
			}
		?>
	</h1>
	<div class="arrows"></div>
	</div>
	<ul class="slides">
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
				echo '<li>';
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
				echo '</li>';
				
			}
		} else {
			// no posts found
		}

		// Restore original Post Data
		wp_reset_postdata();
			?>
	</ul>
</div>
<script type="text/javascript">
	(function($) {

		(function() {
		  
		  // store the slider in a local variable
		  var $window = $(window),
		      flexslider;
		 
		  // tiny helper function to add breakpoints
		  function getGridSize() {
		    return (window.innerWidth < 300) ? 1 :
		     	   (window.innerWidth < 600) ? 2 :
		           (window.innerWidth < 900) ? 3 : 4;
		  }
		 
		  // $(function() {
		  //   SyntaxHighlighter.all();
		  // });
		 
		  $window.load(function() {
		  	var wid = ".<?php echo $widget_custom_id; ?>";
		  	var cid = ".<?php echo $widget_custom_id; ?> .arrows"
		    $(wid).flexslider({
		      animation: "slide",
		      slideshow: false,
		      animationLoop: false,
		      itemWidth: 300,
		      itemMargin: 10,
		      nextText: ">",
		      prevText: "<",
		      minItems: getGridSize(), // use function to pull in initial value
		      maxItems: getGridSize(), // use function to pull in initial value
		      controlNav: false,
		      controlsContainer: cid,
		      start: function (slider) {
			        flexslider = slider; //Initializing flexslider here.
			    }
		    });
		  });
		 
		  // check grid size on resize event
		  $window.resize(function() {
		    var gridSize = getGridSize();
		 
		    flexslider.vars.minItems = gridSize;
		    flexslider.vars.maxItems = gridSize;
		  });

		}());

	})(jQuery);
</script>

<?php echo $args['after_widget']; ?>