<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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




    <style type="text/css">

      .butn {
  -webkit-border-radius: 6 !important;
  -moz-border-radius: 6 !important;
  border-radius: 6px;
  font-family: Roboto;
  background: #d9d9d9 !important;
  color: #555 !important;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.butn:hover {
  background: #bbb !important ;
  }
        /* Remove margins and padding from the list */
        ul.todolist {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        /* Style the list items */
        ul.todolist li {

            cursor: pointer;
            position: relative;
            padding: 12px 8px 12px 40px;
            background: #eee;
            font-size: 18px;
            transition: 0.2s;
            /* make the list items unselectable */
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Set all odd list items to a different color (zebra-stripes) */
        ul.todolist li:nth-child(odd) {
            background: #f9f9f9 !important;
        }

        /* When clicked on, add a background color and strike out text */
        ul.todolist li.checked {
            background: #888;
            color: #fff;
            text-decoration: line-through;
        }

        /* Add a "checked" mark when clicked on */
        ul.todolist li.checked::before {
            content: '';
            position: absolute;
            border-color: #fff;
            border-style: solid;
            border-width: 0 2px 2px 0;
            top: 10px;
            left: 16px;
            transform: rotate(45deg);
            height: 15px;
            width: 7px;
        }

        /* Style the close button */
        .close {
            position: absolute;
            right: 0;
            top: 0;
            padding: 12px 16px 12px 16px;
        }

        .close:hover {
            background-color: #f44336;
            color: white;
        }

        /* Style the header */
        .header {
            background-color: #f44336;
            padding: 30px 40px;
            color: white;
            text-align: center;
        }

        /* Clear floats after the header */
        .header:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Style the input */
        input {
            margin: 0;
            border: none;
            border-radius: 0;
            width: 75%;
            padding: 10px;
            float: left;
            font-size: 16px;
        }

        /* Style the "Add" button */
        .addBtn {
            padding: 10px;
            width: 25%;
            background: #d9d9d9;
            color: #555;
            float: left;
            text-align: center;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            border-radius: 0;
        }

        .addBtn:hover {
            background-color: #bbb;
        }
    </style>


    <!-- logo pic -->
    <link rel="shortcut icon" href="image/mooncrm-Logo.PNG">


    <!-- linked css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">

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




                        <div class="row">

                            <div class="col-md-6 col-xl-4">
                                <div class="mini-stat clearfix bg-white" style=" height: 480px">
                                        <div class="gmap_canvas"><iframe width="400" height="420" id="gmap_canvas" src="https://maps.google.com/maps?q=Melbourne&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe> <a href="https://www.embedgooglemap.net">embedgooglemap.net</a></div>
                                        <style>
                                            .gmap_canvas {
                                                overflow: hidden;
                                                text-align: center;
                                                background: none !important;
                                                height: 420px;
                                                width: 315px;
                                            }
                                        </style>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4">
                                <div class="mini-stat clearfix bg-white" style=" height: 480px">


                                    <h5>To Do List</h5>
                                    <input type="text" id="myInput" placeholder="Title...">
                                    <span onclick="newElement()" class="addBtn">Add</span>

                                    <br>
                                    <br>
                                    <br>
                                    <ul id="myUL" class="todolist">
<li class="listitem">Call Jane</li>
<li class="listitem">Pay invoices</li>
<li class="listitem">Meet George</li>
<li class="listitem">Sell TV</li>
<li class="listitem">Read a book</li>
<li class="listitem">Organize office</li>
</ul>


                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4">
                                <div class="mini-stat clearfix bg-white" style=" height: 480px">
                                    <div class="mini-stat-info">
                                        <span class="counter text-black">Add a widget here!</span>
                                        ABC
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                        </div>
                        <!-- end first row -->

<div class="row">
<div class="col-md-6 col-xl-4">
<form class="widgetcheck">

<input type="checkbox" name="widget1" value="Map">
</form>
</div>

<div class="col-md-6 col-xl-4">
<form>
<input type="checkbox" name="widget1" value="Map">

</div>
<div class="col-md-6 col-xl-4">


</div>
<button type="submit" class="butn">Submit</button>
<!-- end 2nd row -->
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

    <script>
        // Create a "close" button and append it to each list item
        var myNodelist = document.getElementsByClassName("listitem");
        var i;
        for (i = 0; i < myNodelist.length; i++) {
            var span = document.createElement("SPAN");
            var txt = document.createTextNode("\u00D7");
            span.className = "close";
            span.appendChild(txt);
            myNodelist[i].appendChild(span);
        }
        // Click on a close button to hide the current list item
        var close = document.getElementsByClassName("close");
        var i;
        for (i = 0; i < close.length; i++) {
            close[i].onclick = function() {
                var div = this.parentElement;
                div.style.display = "none";
            }
        }
        // Add a "checked" symbol when clicking on a list item
        var list = document.querySelector('ul');
        list.addEventListener('click', function(ev) {
            if (ev.target.tagName === 'LI') {
                ev.target.classList.toggle('checked');
            }
        }, false);
        // Create a new list item when clicking on the "Add" button
        function newElement() {
            var li = document.createElement("li");
            var inputValue = document.getElementById("myInput").value;
            var t = document.createTextNode(inputValue);
            li.appendChild(t);
            if (inputValue === '') {
                alert("You must write something!");
            } else {
                document.getElementById("myUL").appendChild(li);
            }
            document.getElementById("myInput").value = "";
            var span = document.createElement("SPAN");
            var txt = document.createTextNode("\u00D7");
            span.className = "close";
            span.appendChild(txt);
            li.appendChild(span);
            for (i = 0; i < close.length; i++) {
                close[i].onclick = function() {
                    var div = this.parentElement;
                    div.style.display = "none";
                }
            }
        }
    </script>

    <!-- Add Extra JS below-->


    <!-- Add Plugins below-->






</body>

</html>
