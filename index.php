<?php
ob_start();
date_default_timezone_set("Asia/Jakarta");
?>
<html lang="en">

<head>
    <?php include 'config/conn.php'; ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>SI | Rental Mandiri Ciptra Sejahtera</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

    <!-- jack -->
    <link rel="stylesheet" href="assets/css/jack-listview.css" />
    <link rel="stylesheet" href="assets/css/jack-panelfilter.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <link rel="stylesheet" href="assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

    <!-- ace settings handler -->
    <script src="assets/js/ace-extra.min.js"></script>
    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />


    <!-- text fonts -->
    <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
    <link rel="stylesheet" href="assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery-2.1.4.min.js"></script>
    <!-- dataTables -->
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
    <script src="assets/js/dataTables.buttons.min.js"></script>
    <script src="assets/js/dataTables.select.min.js"></script>

    <script type="text/javascript">
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }

        function hanyaHuruf(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (((charCode < 65) || (charCode == 32)) && (charCode != 8))
                return false;
            return true;
        }
    </script>


    <style media="screen">
        .box-shadow {
            box-shadow: 0px 0px 10px;
        }
    </style>
</head>

<body class="no-skin">

    <?php session_start(); ?>

    <?php
        require_once 'pages/navbar.php';
        require_once 'pages/sidebar.php';
        ?>
        <div class="main-content">
            <?php require_once 'routing/master.php';?>
        </div>
        <?php  require_once 'pages/footbar.php';?>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="assets/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <!-- ace scripts -->
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>
        <script src="assets/js/bootstrap-datepicker.min.js" charset="utf-8"></script>



        <script type="text/javascript">
            $(document).ready(function() {
                $('#list').click(function(event) {
                    event.preventDefault();
                    $('#products .item').addClass('list-group-item');
                });
                $('#grid').click(function(event) {
                    event.preventDefault();
                    $('#products .item').removeClass('list-group-item');
                    $('#products .item').addClass('grid-group-item');
                });
            });
            //datepicker plugin
            //link
            $('.date-picker').datepicker({
                    autoclose: true,
                    todayHighlight: true
                })
                //show datepicker when clicking on the icon
                .next().on(ace.click_event, function() {
                    $(this).prev().focus();
                });
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
        <!-- jack -->
        <script src="assets/js/jack-panelfilter.js" charset="utf-8"></script>
        <script src="assets/js/jack-dynamicform.js" charset="utf-8"></script>
</body>

</html>
