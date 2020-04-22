<?php

// Menús
function sixsens_menus() {
    register_nav_menus(array(
        'menu-header-1'     => __( 'Menú cabecera 1', 'think' ),
        'menu-social-1'     => __( 'Menú social 1', 'think' ),
        'menu-mobile-social'     => __( 'Menú social móviles', 'think' ),
        'menu-mobile-lang'     => __( 'Menú idiomas móviles', 'think' ),
    ));
}

add_action( 'init', 'sixsens_menus' );
