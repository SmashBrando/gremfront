<?php
require_once( 'nav-container/nav-container.php' );

require_once( 'widgets/blog-carousel/blog-carousel.php' );

require_once( 'widgets/brand-carousel/brand-carousel.php' );

add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );
function wcs_woo_remove_reviews_tab($tabs) {
 unset($tabs['reviews']);
 return $tabs;
}