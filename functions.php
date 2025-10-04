<?php
// Theme setup
function suzuki_theme_setup() {
    add_theme_support('woocommerce');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'suzuki_theme_setup');

// Enqueue theme stylesheet
function suzuki_theme_assets() {
    wp_enqueue_style('suzuki-style', get_stylesheet_uri());
    // Example: Add additional CSS if needed
    // wp_enqueue_style('custom-css', get_template_directory_uri() . '/assets/custom.css');
}
add_action('wp_enqueue_scripts', 'suzuki_theme_assets');
?>
