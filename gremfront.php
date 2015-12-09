<?php
/**
 * Plugin Name: GremFront: WooCommerce Storefront Customisations
 * Description: A very simple plugin to house theme customisations.
 * Version: 	1.0.0
 * Author: 		The Happy Gremlin Company
 * Author URI: 	http://www.happygremlin.com/
 *
 * @package GremFront_Customisations
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Main GremFront_Customisations Class
 *
 * @class GremFront_Customisations
 * @version	1.0.0
 * @since 1.0.0
 * @package	GremFront_Customisations
 */
final class GremFront_Customisations {

	public function __construct () {
		add_action( 'init', array( $this, 'gremfront_customisations_setup' ), -1 );
	}

	/**
	 * Setup all the things
	 */
	public function gremfront_customisations_setup() {
		add_action( 'wp_enqueue_scripts', array( $this, 'gremfront_customisations_css' ), 999 );
		add_action( 'wp_enqueue_scripts', array( $this, 'gremfront_customisations_js' ) );
		add_filter( 'template_include', array( $this, 'gremfront_customisations_template' ), 11 );

		require_once( 'functions/functions.php' );
	}

	/**
	 * Enqueue the CSS
	 * @return void
	 */
	public function gremfront_customisations_css() {
		wp_enqueue_style( 'roboto', '//fonts.googleapis.com/css?family=Roboto:400,300,500,700' );
		wp_enqueue_style( 'owl-carousel', plugins_url( '/lib/owl-carousel/owl.carousel.css', __FILE__ ) );
		wp_enqueue_style( 'custom-css', plugins_url( '/styles.css', __FILE__ ) );
	}

	/**
	 * Enqueue the Javascript
	 * @return void
	 */
	public function gremfront_customisations_js() {
		wp_enqueue_script( 'owl-carousel', plugins_url( '/lib/owl-carousel/owl.carousel.min.js', __FILE__ ), array( 'jquery' ), true );
		wp_enqueue_script( 'custom-js', plugins_url( '/scripts/scripts.js', __FILE__ ), array( 'jquery' ), true );
	}

	/**
	 * Look in this plugin for template files first.
	 * This works for the top level templates (IE single.php, page.php etc). However, it doesn't work for
	 * template parts yet (content.php, header.php etc).
	 *
	 * Relevant trac ticket; https://core.trac.wordpress.org/ticket/13239
	 *
	 * @param  string $template template string.
	 * @return string $template new template string.
	 */
	public function gremfront_customisations_template( $template ) {
		if ( file_exists( untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/templates/' . basename( $template ) ) ) {
			$template = untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/templates/' . basename( $template );
		}

		return $template;
	}

} // End Class

/**
 * The 'main' function
 * @return void
 */
function __gremfront_customisations_main() {
	new GremFront_Customisations();
}

/**
 * Initialise the plugin
 */
add_action( 'plugins_loaded', '__gremfront_customisations_main' );