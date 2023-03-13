<header>

    <div class="header-container">

        <a id="logo" href="<?php echo get_bloginfo('url') . '/'; ?>">
            <h1 class="logo"><span>Red Ink Creative</span>
            </h1>

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
            <div class="toggle-btn-container">
                <button class="nav-toggle">
                    <i class="fas fa-bars"></i>
                    <i class="fas fa-times hide"></i>
                </button>
            </div>
        </nav>
    </div><!-- .header-container -->

</header>


<div class="mobile-menu-container">
    <?php
wp_nav_menu(
array(
'theme-location' => 'mobile-menu',
'menu_class' => 'mobile-menu',
)
);
?>
</div>
<!--back to top btn-->
<a href="#" class="scroll-link top-link">
    <i class="fas fa-arrow-up"></i>
</a>