<?php
add_action( 'wp_enqueue_scripts', 'clean_child_theme_enqueue_styles' );

function clean_child_theme_enqueue_styles() { 
  $parent_style = 'parent-style';

  wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

  wp_enqueue_style( 'child-style',
    get_stylesheet_uri(),
    array( $parent_style ),
    '1621796175'
  );
}

/**
 * Opening div for our content wrapper
 */
add_action('woocommerce_before_main_content', 'clean_open_div', 5);

function clean_open_div() {
  if ( is_product() ) {
    echo '<div id="page"><article class="article"><div id="content_box" >';
  } else {
    // do nothing
  }
}

/**
 * Closing div for our content wrapper
 */
add_action('woocommerce_after_main_content', 'clean_close_div', 50);

function clean_close_div() {
  if ( is_product() ) {
    echo '</div></div></div>';
  } else {
    // do nothing
  }
  
}