<footer class="l-footer p-footer">
        <div class="p-footer__inner l-inner">
            <nav class="p-footer__nav p-footer-nav">
                <?php
                wp_nav_menu(
                array(
                    'menu_class' => 'p-footer-nav__lists',
                    'theme_location' => 'footer',
                    'container'       => false,
                )
                );
                ?>
            </nav>
            <a class="p-footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img srcset="<?php echo get_template_directory_uri(); ?>/images/logo-white.svg" alt="きたむらミュージックスクール">
            </a>
            <p class="p-footer__copyright">
                Copyright &copy; 0000 KITAMURA music school Inc. <br class="u-sp">All Rights
            </p>
            <ul class="p-footer__snsbtn">
                <li>
                    <a href="#">
                        <img srcset="<?php echo get_template_directory_uri(); ?>/images/icon-twitter.svg" alt="twitter">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img srcset="<?php echo get_template_directory_uri(); ?>/images/icon-facebook.svg" alt="Facebook">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img srcset="<?php echo get_template_directory_uri(); ?>/images/icon-youtube.svg" alt="YouTube">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img srcset="<?php echo get_template_directory_uri(); ?>/images/icon-instagram.svg" alt="Instagram">
                    </a>
                </li>
            </ul>
        </div>
    </footer>

</div>
<?php wp_footer(); ?>
</body>
</html>