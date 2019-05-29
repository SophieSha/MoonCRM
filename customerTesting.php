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
			$sql = "INSERT into customer(customerID,name,email,phone) values('$data[0]','$data[1]','$data[2]','$data[3]')";
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

    <!-- custom css -->
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



<form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
                            <!-- <form method="post" action="export.php" align="center">  
                            <input type="submit" name="export" value="CSV Export" class="btn btn-success" />  
                            </form>   -->

                            <div class="table-responsive" id="employee_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">customerID</th>  
                               <th width="20%">Name</th>  
                               <th width="20%">Email</th>  
                               <th width="10%">Phone</th>  
                          </tr> 
                            



                          <?php  
                     while($row = mysqli_fetch_array($result))  

                     {  
                     ?>  
                          <tr>  
                               <td><?php echo $row['customerID']; ?></td>  
                               <td><?php echo $row['name']; ?></td>  
                               <td><?php echo $row['email']; ?></td>  
                               <td><?php echo $row['phone']; ?></td>  
                          </tr>  
                     <?php       
                     }


                    
                     ?>
                     </table>
















                     <div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            Members list
            <a href="exportData.php" class="btn btn-success pull-right">Export Members</a>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                      <th>CustomerID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      
                    </tr>
                </thead>
                <tbody>
                <?php

                    
                    //get records from database
                    $Squery = "SELECT * FROM customer;";
                    if($Squery->num_rows > 0){ 
                        while($row = $Squery->fetch_assoc()){ ?>                
                    <tr>
                      <td><?php echo $row['customerID']; ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['phone']; ?></td>
                    </tr>
                    <?php } }else{ ?>
                    <tr><td colspan="5">No member(s) found.....</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>




                     <?php
                    
                    //get records from database
                    $Squery = "SELECT * FROM customer;";

                    if($Squery->num_rows > 0){
                        $delimiter = ",";
                        $filename = "members_" . date('Y-m-d') . ".csv";
                        
                        //create a file pointer
                        $f = fopen('php://memory', 'w');
                        
                        //set column headers
                        $fields = array('CustomerID', 'Name', 'Email', 'Phone');
                        fputcsv($f, $fields, $delimiter);
                        
                        //output each row of the data, format line as csv and write to file pointer
                        while($row = $query->fetch_assoc()){
                            
                            $lineData = array($row['customerID'], $row['name'], $row['email'], $row['phone']);
                            fputcsv($f, $lineData, $delimiter);
                        }
                        
                        //move back to beginning of file
                        fseek($f, 0);
                        
                        //set headers to download file rather than displayed
                        header('Content-Type: text/csv');
                        header('Content-Disposition: attachment; filename="' . $filename . '";');
                        
                        //output all remaining data on a file pointer
                        fpassthru($f);
                    }
                    exit;

                    ?>


                    
                     










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