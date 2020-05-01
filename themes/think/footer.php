        </section><!-- /.main-section-->
    </main> <!-- /.site-main .container -->

    <footer class="site-footer">
        <div class="footer-grid">
            <div class="col-spacer"></div>
            <div class="col-a">
                <?php
                $args = array(
                    'theme_location'    =>  'menu-social-1',
                    'container'         =>  'nav',
                    'container_class'   =>  'menu-social',
                );
                wp_nav_menu($args);
                ?>
                <?php
                $args = array(
                    'theme_location'    =>  'menu-legal-1',
                    'container'         =>  'nav',
                    'container_class'   =>  'menu-legal',
                );
                wp_nav_menu($args);
                ?>

                <p><?php echo __('Copyright', 'think'); ?> &copy; <?php bloginfo('name'); ?> 2019-<?php echo date('Y'); ?></p> 
            </div>
            <div class="col-b">
                <?php
                $args = array(
                    'theme_location'    =>  'menu-footer-1',
                    'container'         =>  'nav',
                    'container_class'   =>  'menu-footer',
                );
                wp_nav_menu($args);
                ?>                
            </div>

            <div class="col-c">
                <strong><?php echo __('Find us at', 'think'); ?></strong>
                <p><?php echo do_shortcode('[think-contact type="address" fa-icon="map-marker"]'); ?></p> 
                <p><?php echo do_shortcode('[think-contact type="phone" fa-icon="phone"]'); ?></p>
                <p><?php echo do_shortcode('[think-contact type="email" fa-icon="envelope"]'); ?></p> 
                <p><?php echo do_shortcode('[think-contact type="url" fa-icon="browser"]'); ?></p> 
            </div>
        </div>
    </footer>

</div> <!-- /.page-wrapper -->

<?php wp_footer(); ?>

</body>

</html>