<?php
    $usemin = true;
    if($usemin) {
        echo '<link href="' . $this->webroot . 'css/mainmin.css" rel="stylesheet" type="text/css"/>';
    } else {
?>

<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>css/main.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>profile/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>profile/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>profile/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>profile/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        
<?php } ?>


<link href="<?php echo $this->webroot; ?>profile/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="<?php echo $this->webroot; ?>profile/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>profile/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>profile/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="<?php echo $this->webroot; ?>profile/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo $this->webroot; ?>profile/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>profile/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>profile/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="<?php echo $this->webroot; ?>profile/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>profile/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo $this->webroot; ?>css/timepicker.css" rel="stylesheet">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css"/>
<link rel="stylesheet" href="<?php echo $this->webroot; ?>lightSlider/css/lightSlider.css"/>

<link rel="stylesheet" href="<?php echo $this->webroot; ?>css/styles.css"/>

<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
<!--[if lt IE 9]>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/respond.min.js"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo $this->webroot; ?>profile/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>profile/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>scripts/jqueryui/my_new.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>scripts/jqueryui/my2_new.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>scripts/upload.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>scripts/timepicker.js" type="text/javascript"></script>

<script src="<?php echo $this->webroot; ?>lightSlider/js/jquery.lightSlider.js"></script>


<script type="text/javascript">var switchTo5x = true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({
        publisher: "d062983e-e7fe-4c6c-a80c-c04d91d98519",
        doNotHash: false,
        doNotCopy: false,
        hashAddressBar: false
    });</script>
<!-- END PAGE LEVEL SCRIPTS -->
