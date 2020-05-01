<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- #site-wrapper start -->
    <div id="site-wrapper" class="site-wrapper home-main">
        <!-- #header start -->
        <header id="header" class="main-header header-sticky header-sticky-smart header-style-01 header-float text-uppercase">
            <div class="header-wrapper sticky-area">
                <div class="container container-1720">
                    <nav class="navbar navbar-expand-xl">
                        <div class="header-mobile d-flex d-xl-none flex-fill justify-content-between align-items-center">
                            <div class="navbar-toggler toggle-icon" data-toggle="collapse" data-target="#navbar-main-menu">
                                <span></span>
                            </div>
                            <a class="navbar-brand navbar-brand-mobile" href="<?php echo get_site_url() ?>">
                                <img src="<?php echo bloginfo('template_url') ?>/img/logo-black.png" alt="Rainforest Cruises">
                            </a>
                            <a class="mobile-button-search" href="#search-popup" data-gtf-mfp="true" data-mfp-options='{"type":"inline","mainClass":"mfp-move-from-top mfp-align-top search-popup-bg","closeOnBgClick":false,"showCloseBtn":false}'><i class="far fa-search"></i></a>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-main-menu">
                            <a class="navbar-brand d-none d-xl-block mr-auto" href="<?php echo get_site_url() ?>">
                                <img src="<?php echo bloginfo('template_url') ?>/img/logo.png" alt="Rainforest Cruises">
                            </a>
                            <!-- Nav Menu Items -->
                            <!-- custom classes added in function.php -->
                            <?php wp_nav_menu(array(
                                'theme_location' => 'my_main_menu',
                                'container' => '',
                                'menu_class' => 'navbar-nav'
                            )); ?>
                            <div class="header-customize justify-content-end align-items-center d-none d-xl-flex">

                                <div class="header-customize-item button">
                                    <a href="page-submit-listing.html" class="btn btn-primary btn-icon-right">Search Travel
                                        <i class="far fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- #header end -->