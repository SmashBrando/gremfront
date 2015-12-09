<?php echo $args['before_widget']; ?>

<div class="feature-widget">
	<div class="feature-widget-left">
		<img src="<?php echo $instance['happygremlin_image'] ?>">
	</div>
	<div class="feature-widget-right">
		<span class="feature-widget-title"><?php echo $instance['happygremlin_title'] ?></span>
		<p class="feature-widget-text"><?php echo $instance['happygremlin_content'] ?></p>
	</div>
</div>
<?php echo $args['after_widget']; ?>