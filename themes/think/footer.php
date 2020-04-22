        </section><!-- /.main-section-->
    </main> <!-- /.site-main .container -->

    <footer class="site-footer">
        <div class="footer-mobile">
            <div class="call">
                <a href="tel:+<?php echo preg_replace('/[^0-9]/', '', do_shortcode('[sixsens-contact type="phone" text-only=true]')); ?>">
                    <i class="fas fa-3x fa-mobile-android-alt"></i> <?php echo __('Llamar', 'think'); ?>
                </a>
            </div>
            <div class="whats">
                <a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo preg_replace('/[^0-9]/', '', do_shortcode('[sixsens-contact type="whatsapp" text-only=true]')); ?>">
                    <i class="fab fa-3x fa-whatsapp"></i> <?php echo __('Whatsapp', 'think'); ?>
                </a>
            </div>
            <div class="contact">
                <a href="#" id="social-switch">
                    <i class="fal fa-3x fa-share-alt"></i> <?php echo __('Social', 'think'); ?>
                </a>
            </div>
            <div class="lang">
                <a href="#" id="lang-switch">
                    <i class="fal fa-3x fa-language"></i> <?php echo __('Idiomas', 'think'); ?>
                </a>
            </div>
        </div>
        <div class="container">
            <p><?php echo __('Derechos reservados', 'think'); ?> &copy; <?php bloginfo('name'); ?> 2014-<?php echo date('Y'); ?></p> 
            <p class="footer-desktop">
                <?php echo do_shortcode('[sixsens-contact type="phone" fa-icon="phone"]'); ?> 
                <?php echo do_shortcode('[sixsens-contact type="mobile" fa-icon="mobile"]'); ?> 
                <?php echo do_shortcode('[sixsens-contact type="whatsapp" fa-icon="whatsapp" content="Whatsapp"]'); ?> 
            </p>
        </div>
    </footer>

</div> <!-- /.page-wrapper -->

<?php wp_footer(); ?>

</body>

</html>