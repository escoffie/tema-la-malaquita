<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="page-wrapper">

        <header class="site-header">
            <div class="row">
                    <div class="main-logo column">
                        <?php the_custom_logo(); ?>
                    </div>
                    <div class="main-nav column">
                        <div class="burger-open">
                            <i class="far fa-ellipsis-v"></i>
                        </div>
                        <?php
                        $args = array(
                            'theme_location'    =>  'menu-header-1',
                            'container'         =>  'nav',
                            'container_class'   =>  'menu-header',
                        );
                        wp_nav_menu($args);
                        ?>
                    </div>
            </div>
        </header>

        <main class="site-main">

            <section class="main-section">
                <?php
                if ( function_exists('yoast_breadcrumb') and !is_front_page() ) {
                    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                }

                set_query_var('the_gradient', 'linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0), rgba(255, 255, 255, 1)), ');
                ?>