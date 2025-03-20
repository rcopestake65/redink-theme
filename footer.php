</div>

<!--close container for full width bg to footer-->

<div class="footer-container">

    <div class="container">

        <div class="footer-content">
            <div class="footer-navigation">
                <a id="logo" href="<?php echo get_bloginfo('url') . '/'; ?>">
                    <h4 class="logo"><span>Red Ink Creative</span>
                    </h4>

                </a>
                <nav role="navigation">

                    <?php
wp_nav_menu(
array(
'theme-location' => 'main-menu',
'menu_class' => 'menu',
)
);
?>
            </div>

            <div class="address">
                <a href="/contact">Contact us</a>
                <p class="address">
                    <a href="tel:020 8102 0776">020 8102 0776</a><br />
                    St. Margaret's House<br />
                    21 Old Ford Road<br />
                    London<br />
                    E2 9PL
                </p>
            </div>
            <div>
                <p><a href="/privacy-policy">Privacy Policy</a></p>
                <div class="trust-pilot">

                    <a href="https://uk.trustpilot.com/review/redink.co.uk" target="_blank">
                        <img src="/wp-content/uploads/trust-pilot-logo-white.svg" alt="Trust Pilot"></a>
                    <a href="https://uk.trustpilot.com/review/redink.co.uk" target="_blank"><img
                            src="/wp-content/uploads/stars-4.5.svg" alt="Trust Pilot stars"></a>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; Copyright <span id="date"></span> Red Ink Creative
                </p>
            </div>

        </div>

    </div>


</div>
<!--end footer container-->



<?php wp_footer(); ?>
<script type="module" src="<?php echo get_template_directory_uri(); ?>/js/gsap.js"></script>
<script type="module" src="<?php echo get_template_directory_uri(); ?>/js/app.js"></script>
</body>

</html>