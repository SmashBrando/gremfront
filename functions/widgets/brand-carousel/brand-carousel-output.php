<?php echo $args['before_widget']; ?>

<?php
$widget_custom_id = 'brandcar-' . $instance["panels_info"]["id"];

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
	<?php echo do_shortcode('[product_brand_thumbnails]'); ?>
</div>
<script type="text/javascript">
	(function($) {

		(function() {
		  
		  // store the slider in a local variable
		  var $window = $(window),
		      flexslider;
		 
		  // tiny helper function to add breakpoints
		  function getGridSize() {
		    return (window.innerWidth < 300) ? 2 :
		     	   (window.innerWidth < 600) ? 4 :
		           (window.innerWidth < 900) ? 7 : 8;
		  }
		 
		  // $(function() {
		  //   SyntaxHighlighter.all();
		  // });
		 
		  $window.load(function() {
		  	var wid = ".<?php echo $widget_custom_id; ?>";
		  	var cid = ".<?php echo $widget_custom_id; ?> .arrows"
		    $(wid).flexslider({
		      animation: "slide",
		      selector: ".brand-thumbnails > li",
		      slideshow: false,
		      animationLoop: false,
		      itemWidth: 100,
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