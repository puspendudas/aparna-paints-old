<?php ini_set('display_errors', 'Off');
ini_set('display_errors', 'Off');
ini_set('display_errors','Off');
ini_set('display_errors', 'Off');
ini_set('display_errors', 'Off');
include("lib/config.php"); ?>
<?php include("lib/function.php"); ?>
<?php include("route/route.php"); ?>

    <!DOCTYPE html>

    <!--
    Name: EduInCS Technologies
    Author:
    Website:
    Contact:
    Follow:
    Dribble:
    Like: ph
    Purchase:
    Renew Support:
    -->

    <html lang="en">

        <!--begin::Head-->
        <head>
            <base href="">

        <?php link_head(); ?>

        </head>
        <!--end::Head-->

        <!--begin::Body-->
        <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-minimize-hoverable page-loading">

            <?php include("layout.php");  ?>

            <?php include("partials/_extras/scrolltop.php");  ?>

            <?php //include("partials/_extras/toolbar.php");  ?>

            <?php include("partials/_extras/offcanvas/demo-panel.php");  ?>

        </body>

        <?php script_footer(); ?>

        <!--end::Body-->
    </html>