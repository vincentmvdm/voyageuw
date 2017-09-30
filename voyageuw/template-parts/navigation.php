<header>
    <div class="container">
        <div class="container-inner">
            <div class="col-full">
                <div id="nav-wrapper">
                    <a href="/"><span id="logo">Voyage</span></a>
                    <nav>
                        <?php wp_nav_menu( array(
                            'theme_location' => 'menu-primary',
                            'container' => '',
                            'menu_class' => 'hide-xs-down hide-xs hide-sm'
                        ) ); ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <span id="nav-toggle" class="hide-md hide-lg-up">Menu</span>
</header>
