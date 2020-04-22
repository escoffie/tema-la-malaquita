<?php

// Cargar scripts y styles
function sixsens_scripts_styles() {

    // CSS principal
    wp_enqueue_style('style', get_stylesheet_uri(), array(), '0.9');

    // JS
    wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/dacd798f5f.js', array(), '5', true);
    wp_enqueue_script('app', get_template_directory_uri() . '/js/app.js', array('jquery'), '2', true);
}

add_action( 'wp_enqueue_scripts', 'sixsens_scripts_styles' );

function add_gutenberg_assets() {
    wp_enqueue_style( 'style-gutenberg', get_theme_file_uri( '/gutenberg.css' ), false );
}

add_action( 'enqueue_block_editor_assets', 'add_gutenberg_assets');