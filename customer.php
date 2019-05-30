<?php
// Initialize the session
session_start();

// TURN THIS BACK ON AT THE END LOL
// Check if the user is logged in, if not then redirect him to login page
// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
//    header("location: login.php");
//    exit;
//}

$con = mysqli_connect("localhost","root","","mysql");
if (mysqli_connect_errno())
{
	echo "failed to connect" . mysqli_connect_error;
}

/*
// set it on debug mode and check for any errors that exist
ini_set('display_errors', 1);
error_reporting(E_ALL);
// these are the login details for mysql
$db_host = 'localhost';
$db_user = 'root';
$db_pwd = '';

// this sets where the database is + where the table is
$database = 'mysql';
$table = 'customer';
*/

// checks if you can connect to the database or not (mysql connection)
// if (!mysql_connect($db_host, $db_user, $db_pwd))
//	die("Can't connect, something went wrong!");

// checks if you can go into the database or not (privilege issues or database missing)
// if (!mysql_select_db($database))
//	die("Can't select database");

// login to mysql
// mysqli_connect("localhost","root","","database");

// if something went wrong in the login to mysql, then  holyshit may god be with you
if (!mysqli_connect("localhost","root","","mysql"))
	die("holycrap something went wrong");

// if you push the submit button (clicked)
if (isset($_POST['submit']))
{
	// first you check the file name if it exists
	$fname = $_FILES['customer']['name'];
	echo 'upload file name: '.$fname.' ';
	// then you separate the file using explode (boom baby!)
	$chk_ext = explode(".",$fname);
	
	// check if it is a csv file or not
	if(strtolower(end($chk_ext)) == "csv")
	{
		$filename =$_FILES['customer']['tmp_name'];
		$handle = fopen($filename, "r");
		
		// then you get the data line by line
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
		{
			$sql = "INSERT into customer(cust_no,first_name,last_name,email,phone,address,city,postcode,country) 
            values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]')";
			mysqli_query($con,$sql);
			
			
			// $sql = "INSERT into customer(customerID,name,email,phone) values('$data[0]','$data[1]','$data[2]','$data[3]')";
			// mysql_query($sql) or die(mysql_error());
			
			
			
			//mysql_query("INSERT into customer(customerID,name,email,phone) values('$data[0]','$data[1]','$data[2]','$data[3]')")
			//or die("insert values did not work. well.... shit");
			
			// $sql = "INSERT into customer(customerID,name,email,phone) values('$data[0]','$data[1]','$data[2]','$data[3]')";
			// mysql_query($sql) or die("insert values did not work. well.... shit");
		}
		
		fclose($handle);
		echo "FUK YEAAAAAAA!!! WOOOOOOOO!!!!!!!!!!!!!";
	}
	
	// if it is not a .csv file then this will print out
	else
	{
		echo "wtf you trying to do. its not a csv file yo...";
	}
    
    
	
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

                         <!-- ==================
                         this will be the import function						 
                         ================== -->
                            </br>
							<h1>Import CSV File</h1>
							<form action='<?php echo $_SERVER["PHP_SELF"];?>'
							method='post'
							enctype="multipart/form-data">
							Import File : <input type='file' name='customer' size='20'>
							<input type='submit' name='submit' value='submit'>
							</form>

                            </br>
                        <!-- ==================
                         this will be the export function						 
                         ================== -->
                            
                        <?php
                         // THIS IS FOR EXPORT MAYBE

                         
    $Squery = "SELECT * FROM customer;";
    
    $result = mysqli_query($con, $Squery);

    $resultCheck = mysqli_num_rows($result);
	
	// if ($resultCheck > 0) {
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         echo $row['customerID']."<br>";
    //         echo $row['name'];
    //         echo $row['email'];
    //         echo $row['phone'];

    //     }
    // }
?>


                        <!-- ==================
                         displays existing data from mysql						 
                         ================== -->
<!-- <form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form> -->
                            <!-- <form method="post" action="export.php" align="center">  
                            <input type="submit" name="export" value="CSV Export" class="btn btn-success" />  
                            </form>   -->

                            <div class="table-responsive" id="employee_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">Customer ID</th>  
                               <th width="10%">First Name</th>  
                               <th width="10%">Last Name</th>  
                               <th width="10%">Email</th>  
                               <th width="10%">Phone</th>  
                               <th width="10%">Address</th>  
                               <th width="10%">City</th>  
                               <th width="10%">Post Code</th>  
                               <th width="10%">Country</th>  
                          </tr> 
                            



                          <?php  
                     while($row = mysqli_fetch_array($result))  

                     {  
                     ?>  
                          <tr>  
                               <td><?php echo $row['cust_no']; ?></td>  
                               <td><?php echo $row['first_name']; ?></td>  
                               <td><?php echo $row['last_name']; ?></td>  
                               <td><?php echo $row['email']; ?></td>  
                               <td><?php echo $row['phone']; ?></td>  
                               <td><?php echo $row['address']; ?></td>  
                               <td><?php echo $row['city']; ?></td>  
                               <td><?php echo $row['postcode']; ?></td>  
                               <td><?php echo $row['country']; ?></td>  
                          </tr>  
                     <?php       
                     }


                    
                     ?>
                     </table>


                     
                    <!-- export button referecing to hopefullyWorking.php -->
                     <a href="hopefullyWorking.php" target="_blank">Download customer data</a>


                     <!-- <input type="submit" name="dbToCSV" value="Export Database to CSV" <?php if     (isset($_GET['dbToCSV']))
                    {
                        $SEquery = "SELECT * FROM customer";
                        $resultE = mysqli_query($con, $SEquery);

                        $number_of_fields = mysqli_num_fields($resultE);
                        $headers = array();
                        for ($i = 0; $i < $number_of_fields; $i++) {
                            $headers[] = mysqli_field_name($resultE , $i);
                        }
                        $fp = fopen('php://output', 'w');
                        if ($fp && $resultE) {
                            header('Content-Type: text/csv');
                            header('Content-Disposition: attachment; filename="export.csv"');
                            header('Pragma: no-cache');
                            header('Expires: 0');
                            fputcsv($fp, $headers);
                            while ($row = $resultE->fetch_array(MYSQLI_NUM)) {
                                fputcsv($fp, array_values($row));
                            }
                            die;
                        }

                        function mysqli_field_name($resultE, $field_offset)
                        {
                            $properties = mysqli_fetch_field_direct($resultE, $field_offset);
                            return is_object($properties) ? $properties->name : null;
                        }
                    }
                    else
                    {
                        echo "Error!";
                    } ?>><br /> -->










                     


                    
                     










                    <div class="page-content-wrapper">

                    <div class="container-fluid">





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