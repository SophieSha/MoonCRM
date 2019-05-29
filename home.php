<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

include 'config.php';
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
    <link rel="stylesheet" href="css/custom.css">

    <!-- extising css -->
    <link href="public/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="public/assets/css/style.css" rel="stylesheet" type="text/css" />

    <!-- custom css -->
    <link href="css/custom.css" rel="stylesheet" type="text/css" />


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

                        <h1>Dashboard</h1>

                        <div class="d-flex flex-column">
                            <div class="p-2">
                                <div class="d-flex flex-row mx-2 mb-5">
                                    <div class="p-2 flex-fill dashed">
                                        <p class="text-center d-inline-block align-middle">
                                            <?php
                                                $query = mysqli_real_escape_string($link,"SELECT * from users inner join department on users.department_id=department.department_id");
                                                $result3 = mysqli_query($link, $query);
                                                $rows3 = mysqli_fetch_all($result3,MYSQLI_ASSOC);

                                                foreach ($rows3 as $user) {

                                                        if ($user['department_name'] == "Finance") {
                                                            echo "Finance Widget goes here";
                                                        }
                                                        if ($user['department_name'] == "Sales") {
                                                            include 'layouts/sales_target.php';
                                                        }
                                                        if ($user['department_name'] == "Marketing") {
                                                            echo "Marketing Widget goes here";
                                                        }
                                                     
                                                    }
               
                                            ?>
                                        </p>
                                    </div>
                                    <div class="p-2 flex-fill dashed mx-2">

                                    </div>
                                    <div class="p-2 flex-fill dashed">
                                        <p class="text-center d-inline-block align-middle">No card has been selected</p>
                                    </div>
                                </div>

                            </div>
                            <div class="p-2">
                                <div class="d-flex flex-row mx-2">
                                    <div class="p-2 flex-fill dashed">
                                        <p class="text-center d-inline-block align-middle">No card has been selected</p>
                                    </div>
                                    <div class="p-2 flex-fill dashed mx-2">
                                        <p class="text-center d-inline-block align-middle">No card has been selected</p>
                                    </div>
                                    <div class="p-2 flex-fill dashed">
                                        <p class="text-center d-inline-block align-middle">No card has been selected</p>
                                    </div>
                                </div>
                            </div>
                        </div>









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