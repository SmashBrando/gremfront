<?php

// These are just for refference
// add_action( 'storefront_header', 'storefront_skip_links', 				0 );
// add_action( 'storefront_header', 'storefront_social_icons',				10 );
// add_action( 'storefront_header', 'storefront_site_branding',				20 );
// add_action( 'storefront_header', 'storefront_secondary_navigation',		30 );
// add_action( 'storefront_header', 'storefront_product_search',			40 );
// add_action( 'storefront_header', 'storefront_primary_navigation',		50 );
// add_action( 'storefront_header', 'storefront_header_cart',				60 );


add_action( 'storefront_header', 'col_full_start',		-1 );
add_action( 'storefront_header', 'col_full_end',			41 );

function col_full_start() {
  echo '<div class="col-full">';
}

function col_full_end() {
  echo '</div>';
}

add_action( 'storefront_header', 'nav_wrapper_start',		49 );
add_action( 'storefront_header', 'nav_wrapper_end',		61 );

function nav_wrapper_start() {
  echo '<div class="nav-wrapper">';
  echo '<div class="col-full">';

}

function nav_wrapper_end() {
   echo '</div>';
   echo '</div>';
}