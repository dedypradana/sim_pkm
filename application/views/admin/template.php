<!DOCTYPE html>
<html class="fixed">
    <head>
        <!-- Basic -->
        <meta charset="UTF-8">
        <title>Dashboard | SIM PKM</title>
        <meta name="keywords" content="Sistem Informasi Program Kreativitas Mahasiswa" />
        <meta name="description" content="Sistem Informasi Program Kreativitas Mahasiswa">
        <meta name="author" content="Sim Pkm">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.ico">
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
        <!-- Vendor CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendor/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendor/font-awesome/css/font-awesome.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendor/magnific-popup/magnific-popup.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendor/bootstrap-datepicker/css/datepicker3.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
        <!-- Specific Page Vendor CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendor/morris/morris.css" />
        <!-- Specific Page Vendor CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendor/select2/select2.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendor/pnotify/pnotify.custom.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendor/summernote/summernote.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendor/summernote/summernote-bs3.css" />
        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/stylesheets/theme.css" />
        <!-- Skin CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/stylesheets/skins/default.css" />
        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/stylesheets/theme-custom.css">
        <script src="<?php echo base_url(); ?>assets/backend/vendor/jquery/jquery.js"></script>
        <!-- Head Libs -->
        <script src="<?php echo base_url(); ?>assets/backend/vendor/modernizr/modernizr.js"></script>
    </head>
    <body>
        <section class="body">
            <?php echo $_header; ?>
            <div class="inner-wrapper">
                <?php echo $_menu; ?>
                <section role="main" class="content-body">
                    <header class="page-header">
                        <h2><?php echo @$title ?></h2>

                        <div class="right-wrapper pull-right">
                            <?php echo set_breadcrumb(); ?>
                            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                        </div>
                    </header>
                    <?php echo $_content; ?>
                </section>
            </div>
            <?php echo $_sidebar; ?>
        </section>
        <!-- Vendor -->
        <script src="<?php echo base_url(); ?>assets/backend/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/bootstrap/js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/nanoscroller/nanoscroller.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/magnific-popup/magnific-popup.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/jquery-placeholder/jquery.placeholder.js"></script>

        <!-- Specific Page Vendor -->
        <script src="<?php echo base_url(); ?>assets/backend/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/jquery-appear/jquery.appear.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/flot/jquery.flot.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/flot/jquery.flot.pie.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/flot/jquery.flot.categories.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/flot/jquery.flot.resize.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/jquery-sparkline/jquery.sparkline.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/raphael/raphael.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/morris/morris.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/gauge/gauge.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/snap-svg/snap.svg.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/liquid-meter/liquid.meter.js"></script>
        <!-- Specific Page Vendor -->
        <script src="<?php echo base_url(); ?>assets/backend/vendor/select2/select2.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/pnotify/pnotify.custom.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendor/summernote/summernote.js"></script>

        <script src="<?php echo base_url(); ?>assets/backend/javascripts/tables/examples.datatables.default.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/javascripts/tables/examples.datatables.row.with.details.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/javascripts/tables/examples.datatables.tabletools.js"></script>
        <!-- Specific Page Vendor -->
        <script src="<?php echo base_url(); ?>assets/backend/vendor/jquery-validation/jquery.validate.js"></script>
        <!-- Theme Base, Components and Settings -->
        <script src="<?php echo base_url(); ?>assets/backend/javascripts/theme.js"></script>

        <!-- Theme Custom -->
        <script src="<?php echo base_url(); ?>assets/backend/javascripts/theme.custom.js"></script>

        <!-- Theme Initialization Files -->
        <script src="<?php echo base_url(); ?>assets/backend/javascripts/theme.init.js"></script>


        <!-- Examples -->
        <script src="<?php echo base_url(); ?>assets/backend/javascripts/forms/examples.validation.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/javascripts/dashboard/examples.dashboard.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/javascripts/ui-elements/examples.modals.js"></script>
    </body>
</html>
