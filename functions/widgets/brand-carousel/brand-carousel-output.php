<?php echo $args['before_widget']; ?>

<?php
$widget_custom_id = 'brandcar-' . $instance["panels_info"]["id"];

?>
		


<div class="brand-carousel" style="">
	<div class="carousel-header">
	<h1>
		<?php if ( ! empty( $instance['happygremlin_title'] ) ) {
				echo $args['happygremlin_title'] . apply_filters( 'happygremlin_title', $instance['happygremlin_title'] ). $args['happygremlin_title'];
			}
		?>
	</h1>
	<div class="arrows  <?php echo $widget_custom_id; ?>"></div>
	</div>
	<div class="<?php echo $widget_custom_id; ?>">
	<?php echo do_shortcode('[product_brand_thumbnails]'); ?>
	</div>
</div>
<script type="text/javascript">
(function($) {

	$( document ).ready(function() {

	  	$('.<?php echo $widget_custom_id; ?> > .brand-thumbnails').owlCarousel({
		    loop:true,
		    margin:10,
		    nav:true,
		    navContainer: '.arrows.<?php echo $widget_custom_id; ?>',
		    responsive:{
		        0:{
		            items:2
		        },
		        768:{
		            items:4
		        },
		        1000:{
		            items:6
		        }
		    }
		});
	 });
	
})( jQuery );
</script>

<?php echo $args['after_widget']; ?>