<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= $title ?> | <?= APP_NAME ?></title>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <?= link_tag('assets/images/favicon.png', 'icon', 'image/x-icon') ?>
        <?= link_tag('assets/images/favicon.png', 'icon', 'apple-touch-icon') ?>
        <?= link_tag('assets/images/favicon.png', 'icon', 'shortcut icon') ?>

        <?= link_tag('assets/css/bootstrap.min.css', 'stylesheet', 'text/css') ?>
        <?= link_tag('assets/css/font-awesome.min.css', 'stylesheet', 'text/css') ?>
        <?= link_tag('assets/css/animate.css', 'stylesheet', 'text/css') ?>
        <?= link_tag('assets/css/owl.carousel.css', 'stylesheet', 'text/css') ?>
        <?= link_tag('assets/css/slick.css', 'stylesheet', 'text/css') ?>
        <?= link_tag('assets/css/off-canvas.css', 'stylesheet', 'text/css') ?>
        <?= link_tag('assets/fonts/linea-fonts.css', 'stylesheet', 'text/css') ?>
        <?= link_tag('assets/fonts/flaticon.css', 'stylesheet', 'text/css') ?>
        <?= link_tag('assets/css/magnific-popup.css', 'stylesheet', 'text/css') ?>
        <?= link_tag('assets/css/rsmenu-main.css', 'stylesheet', 'text/css') ?>
        <?= link_tag('assets/css/rs-spacing.css', 'stylesheet', 'text/css') ?>
        <?= link_tag('assets/css/style.css', 'stylesheet', 'text/css') ?>
        <?= link_tag('assets/css/responsive.css', 'stylesheet', 'text/css') ?>
    </head>
    <body class="defult-home">
        <!--Preloader area start here-->
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class='loader-icon'>
                    <?= img('assets/images/pre-logo.png'); ?>
                </div>
            </div>
        </div>
        <!--Preloader area End here-->
        
        <div class="full-width-header header-style1 home1-modifiy">
            <header id="rs-header" class="rs-header">
                <div class="topbar-area dark-parimary-bg">
                    <div class="container">
                        <div class="row y-middle">
                            <div class="col-md-7">
                                <ul class="topbar-contact">
                                    <li>
                                        <i class="flaticon-email"></i>
                                        <a href="mailto:support@avsanskruti.com">support@avsanskruti.com</a>
                                    </li>
                                    <li>
                                        <i class="flaticon-location"></i>
                                        401 Orchid,Socorbo Gardens Socorbo,Goa
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-5 text-right">
                                <ul class="topbar-right">
                                    <li class="btn-part">
                                        <a class="apply-btn" href="javascript:;" data-toggle="modal" data-target="#registerModal">
                                            Apply For Scholarship
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu-area menu-sticky">
                    <div class="container-fluid">
                        <div class="row y-middle">
                            <div class="col-lg-2">
                                <div class="logo-cat-wrap">
                                    <div class="logo-part">
                                        <?= anchor('', img('assets/images/logo.png')); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-10 text-right">
                                <div class="rs-menu-area">
                                    <div class="main-menu">
                                        <div class="mobile-menu">
                                            <a class="rs-menu-toggle">
                                                <i class="fa fa-bars"></i>
                                            </a>
                                        </div>
                                        <nav class="rs-menu">
                                            <ul class="nav-menu">
                                                <li>
                                                    <?= anchor('', 'Home'); ?>
                                                </li>
                                                <li>
                                                    <?= anchor('about_scholarship', 'About Scholarship'); ?>
                                                </li>
                                                <li>
                                                    <?= anchor('why_av_sanskruti_sansthaa', 'Why AV Sanskruti Sanstha'); ?>
                                                </li>
                                                <li>
                                                    <?= anchor('syllabus', 'Syllabus'); ?>
                                                </li>
                                                <li>
                                                    <?= anchor('supporters', 'Supporters'); ?>
                                                </li>
                                                <li>
                                                    <?= anchor('how_to_apply', ' How to apply'); ?>
                                                </li>
                                                <li>
                                                    <?= anchor('contact', 'Contact'); ?>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="right_menu_togle hidden-md">
                    <div class="close-btn">
                        <div id="nav-close">
                            <div class="line">
                                <span class="line1"></span><span class="line2"></span>
                            </div>
                        </div>
                    </div>
                    <div class="canvas-logo">
                        <?= anchor('', img('assets/images/logo.png')); ?>
                    </div>
                    <div class="canvas-contact">
                        <ul class="social">
                            <li><a href="javascript:;"><i class="fa fa-facebook sidebar_social_icon"></i></a></li>
                            <li><a href="javascript:;"><i class="fa fa-twitter sidebar_social_icon"></i></a></li>
                            <li><a href="javascript:;"><i class="fa fa-pinterest-p sidebar_social_icon"></i></a></li>
                            <li><a href="javascript:;"><i class="fa fa-linkedin sidebar_social_icon"></i></a></li>
                        </ul>
                    </div>
                </nav>
            </header>
        </div>
        <?= $contents ?>
        <footer id="rs-footer" class="rs-footer bg_footer home9-style main-home">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12 footer-widget md-mb-50">
                            <div class="footer-logo mb-30">
                                <?= anchor('', img('assets/images/logo.png')); ?>
                            </div>
                            <ul class="footer_social">
                                <li>
                                    <a href="javascript:;" target="_blank"><span><i class="fa fa-facebook sidebar_social_icon"></i></span></a>
                                </li>
                                <li>
                                    <a href="javascript:;" target="_blank"><span><i class="fa fa-linkedin sidebar_social_icon"></i></span></a>
                                </li>
                                <li>
                                    <a href="javascript:;" target="_blank"><span><i class="fa fa-instagram sidebar_social_icon"></i></span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 footer-widget md-mb-50">
                            <h3 class="widget-title">Distribution head office</h3>
                            <ul class="address-widget">
                                <li>
                                    <i class="flaticon-location"></i>
                                    <div class="desc">401 Orchid,Socorbo Gardens Socorbo,Porvomin Bardez Goa-403501</div>
                                </li>
                                <li>
                                    <i class="flaticon-call"></i>
                                    <div class="desc">
                                        <a href="tel:18002022002">18002022002</a>
                                    </div>
                                </li>
                                <li>
                                    <i class="flaticon-email"></i>
                                    <div class="desc">
                                        <a href="mailto:support@avsanskruti.com">support@avsanskruti.com</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 footer-widget md-mb-50">
                            <h3 class="widget-title">online centers (Pureuniverse)</h3>
                            <ul class="address-widget">
                                <li>
                                    <i class="flaticon-location"></i>
                                    <div class="desc">401 Orchid,Socorbo Gardens Socorbo,Porvomin Bardez Goa-403501</div>
                                </li>
                                <li>
                                    <i class="flaticon-location"></i>
                                    <div class="desc">401 Orchid,Socorbo Gardens Socorbo,Porvomin Bardez Goa-403501</div>
                                </li>
                                <li>
                                    <i class="flaticon-location"></i>
                                    <div class="desc">401 Orchid,Socorbo Gardens Socorbo,Porvomin Bardez Goa-403501</div>
                                </li>
                                <li>
                                    <i class="flaticon-location"></i>
                                    <div class="desc">401 Orchid,Socorbo Gardens Socorbo,Porvomin Bardez Goa-403501</div>
                                </li>
                                <li>
                                    <i class="flaticon-location"></i>
                                    <div class="desc">401 Orchid,Socorbo Gardens Socorbo,Porvomin Bardez Goa-403501</div>
                                </li>
                                <li>
                                    <i class="flaticon-location"></i>
                                    <div class="desc">401 Orchid,Socorbo Gardens Socorbo,Porvomin Bardez Goa-403501</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row y-middle">
                        <div class="col-lg-12">
                            <div class="copyright">
                                <p class="text-center">© Copyright 2022 All Rights Reserved By <a href="javascript:;"><?= APP_NAME ?></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div id="scrollUp" class="orange-color">
            <i class="fa fa-angle-up"></i>
        </div>
        <?php $this->load->view('partials/register-form') ?>
        
        <?= form_hidden('base_url', base_url()); ?>
        <?= form_hidden('csrf_value', $this->security->get_csrf_hash()); ?>
        <input type="hidden" name="razor_key" value="<?= RAZOR_KEY ?>" />

        <?= script('assets/js/modernizr-2.8.3.min.js') ?>
        <?= script('assets/js/jquery.min.js') ?>
        <?= script('assets/js/bootstrap.min.js') ?>
        <?= script('assets/js/rsmenu-main.js') ?>
        <?= script('assets/js/jquery.nav.js') ?>
        <?= script('assets/js/owl.carousel.min.js') ?>
        <?= script('assets/js/slick.min.js') ?>
        <?= script('assets/js/isotope.pkgd.min.js') ?>
        <?= script('assets/js/imagesloaded.pkgd.min.js') ?>
        <?= script('assets/js/wow.min.js') ?>
        <?= script('assets/js/skill.bars.jquery.js') ?>
        <?= script('assets/js/jquery.counterup.min.js') ?>
        <?= script('assets/js/waypoints.min.js') ?>
        <?= script('assets/js/jquery.mb.YTPlayer.min.js') ?>
        <?= script('assets/js/jquery.magnific-popup.min.js') ?>
        <?= script('assets/js/plugins.js') ?>
        <?= script('assets/js/contact.form.js') ?>
        <?= script('assets/js/main.js') ?>
        <?= script("assets/js/blockui.js") ?>

        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <?= script('assets/js/script.js') ?>
    </body>
</html>