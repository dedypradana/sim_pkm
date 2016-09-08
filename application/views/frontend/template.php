<!DOCTYPE html>
<html>
    <head>
        <!-- Basic -->
        <meta charset="utf-8">
        <title>SIM PKM</title>		
        <meta name="keywords" content="Sistem Informasi PKM" />
        <meta name="description" content="Sistem Informasi Program Kreativitas Mahasiswa">
        <meta name="author" content="Sim Pkm">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.ico">
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
        <!-- Vendor CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendor/bootstrap/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendor/fontawesome/css/font-awesome.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendor/owlcarousel/owl.carousel.min.css" media="screen">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendor/owlcarousel/owl.theme.default.min.css" media="screen">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendor/magnific-popup/magnific-popup.css" media="screen">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendor/bootstrap-datepicker/css/datepicker3.css" />
        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/theme.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/theme-elements.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/theme-blog.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/theme-shop.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/theme-animate.css">
        <!-- Current Page CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendor/rs-plugin/css/settings.css" media="screen">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendor/circle-flip-slideshow/css/component.css" media="screen">
        <!-- Skin CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/skins/default.css">
        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/custom.css">
        <!-- Head Libs -->
        <script src="<?php echo base_url(); ?>assets/frontend/vendor/modernizr/modernizr.js"></script>

        <!-- Vendor -->
        <script src="<?php echo base_url(); ?>assets/frontend/vendor/jquery/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/vendor/jquery.appear/jquery.appear.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/vendor/jquery.easing/jquery.easing.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/vendor/jquery-cookie/jquery-cookie.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/vendor/bootstrap/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/vendor/common/common.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/vendor/jquery.validation/jquery.validation.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/vendor/jquery.stellar/jquery.stellar.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/vendor/jquery.gmap/jquery.gmap.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/vendor/isotope/jquery.isotope.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/vendor/owlcarousel/owl.carousel.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/vendor/jflickrfeed/jflickrfeed.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/vendor/magnific-popup/jquery.magnific-popup.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/vendor/vide/vide.js"></script>

        <!-- Theme Base, Components and Settings -->
        <script src="<?php echo base_url(); ?>assets/frontend/js/theme.js"></script>

        <!-- Specific Page Vendor and Views -->
        <script src="<?php echo base_url(); ?>assets/frontend/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/vendor/circle-flip-slideshow/js/jquery.flipshow.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/js/views/view.home.js"></script>

        <!-- Theme Custom -->
        <script src="<?php echo base_url(); ?>assets/frontend/js/custom.js"></script>

        <!-- Theme Initialization Files -->
        <script src="<?php echo base_url(); ?>assets/frontend/js/theme.init.js"></script>
    </head>
    <body>
        <div class="body">
            <header id="header" class="narrow" data-plugin-options='{"alwaysStickyEnabled": true, "stickyEnabled": true, "stickyWithGap": false, "stickyChangeLogoSize": false}'>
                <?php echo $_header ?>
                <div class="navbar-collapse nav-main-collapse collapse">
                    <div class="container">
                        <?php echo $_menu; ?>
                    </div>
                </div>
            </header>
            <div role="main" class="main">
                <?php if( ($this->uri->segment(1) == 'dashboard' && $this->uri->segment(2) == '')  || $this->uri->segment(1)==''){echo $_slider;}?>
                <div role="main" class="main">
                    <section class="page-top">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="breadcrumb" style="color: #0088cc;">
                                                <li><?php echo @$title_small?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h1><?php echo @$title;?></h1>
                                </div>
                            </div>
                        </div>
                    </section>

                    <div class="container">
                        <?php echo $_content;?>
                    </div>
                </div>
            </div>

            <?php echo $_footer;?>
        </div>
    </body>
</html>
