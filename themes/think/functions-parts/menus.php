<?php

// Menús
function sixsens_menus() {
    register_nav_menus(array(
        'menu-header-1'     => __( 'Main Menu', 'think' ),
        'menu-footer-1'     => __( 'Footer Menu', 'think' ),
        'menu-social-1'     => __( 'Social Menu', 'think' ),
        'menu-legal-1'     => __( 'Legal Menu', 'think' ),
    ));
}

add_action( 'init', 'sixsens_menus' );
