<?php echo $args['before_widget']; ?>

<?php
$widget_custom_id = 'woocar-' . $instance["panels_info"]["id"];

if(! function_exists('carouselProductBefore')){
	add_action('woocommerce_before_shop_loop_item', 'carouselProductBefore');
	function carouselProductBefore() {
		echo '<div class="product-carousel-item">';
	}
}

if(! function_exists('carouselProductAfter')){
	add_action('woocommerce_after_shop_loop_item', 'carouselProductAfter');
	function carouselProductAfter() {
		echo '</div>';
	}
}

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
			$this_meta_key = $instance['happygremlin_product_feed'];
			$args = array(
				'post_type' => 'product',
				'posts_per_page' => 12,
				'meta_key' => $this_meta_key
				);
			$loop = new WP_Query( $args );
			if ( $loop->have_posts() ) {
				while ( $loop->have_posts() ) : $loop->the_post();
					wc_get_template_part( 'content', 'product' );
				endwhile;
			} else {
				echo __( 'No products found' );
			}
			wp_reset_postdata();
		?>
	</ul><!--/.products-->
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