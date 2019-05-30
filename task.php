<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>MoonCRM</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- logo pic -->
    <link rel="shortcut icon" href="image/mooncrm-Logo.PNG">


    <!-- linked css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- extising css -->
    <link href="public/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="public/assets/css/style.css" rel="stylesheet" type="text/css" />



    <!-- Page specific css/style, it has more priority than other linked css, if you have a few small 
    page specific styles you can add them here-->

    <style type="text/css">
        .content-page {
            margin-left: 180px;
        }
    </style>


</head>



<body class="fixed-left" style="overflow: visible;">


    <!-- Begin page -->
    <div id="wrapper">
        <!-- left Nav Bar link -->
        <?php include 'layouts/navbar.php'; ?>
        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <!-- Top Bar link -->
                <?php include 'layouts/topbar.php'; ?>


                <!-- ==================
                         PAGE CONTENT START
                         ================== -->


                <div class="page-content-wrapper">

                    <div class="container-fluid">

                    <h3>Task</h3>










                    </div><!-- container -->
                </div> <!-- Page content Wrapper -->
            </div> <!-- content -->
            <?php include 'layouts/footer.php'; ?>
        </div>
        <!-- End Right content here -->
    </div>
    <!-- END wrapper -->




    <!-- Footer -->


    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <script src="public/assets/js/modernizr.min.js"></script>
    <script src="public/assets/js/jquery.slimscroll.js"></script>
    <script src="public/assets/js/jquery.nicescroll.js"></script>
    <script src="public/assets/js/jquery.scrollTo.min.js"></script>
    <script src="public/assets/pages/dashboard.js"></script>
    <script src="public/assets/js/app.js"></script>


    <!-- Add Extra JS below-->


    <!-- Add Plugins below-->






</body>

</html>