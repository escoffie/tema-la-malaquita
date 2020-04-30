<?php

add_action('after_setup_theme', function () {
    add_theme_support('responsive-embeds');
    add_theme_support('title-tag');
});

add_action('init', function () {
    add_post_type_support('page', 'excerpt');
});

/**
 * Register support for Gutenberg wide images in your theme
 */
function mytheme_setup()
{
    add_theme_support('align-wide');
}
add_action('after_setup_theme', 'mytheme_setup');

/**
 * Woocommerce Support
 *
 */
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );