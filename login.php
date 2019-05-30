<?php
//Code reference： https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php


// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to Home page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: home.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: home.php");
                        } else {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

    <style type="text/css">
        body {
            font: 14px sans-serif;
            background-color: #2c2f33
        }

        .wrapper {
            width: 420px;
            padding: 55px;
            padding-top: 70px;
            margin-left: auto;
            margin-right: auto;
            text-align: center
        }

        .title-color {
            color: #FED766
        }

        .button {
            width: 145px;
            padding: 6px;
            background-color: #2c2f33;
            color: #FED766;
            outline: #FED766
        }
    </style>

</head>



<body>

    <div class="row">
        <div class="col">
            <div class="wrapper">


                <img src="image/mooncrm-Logo.PNG" class="rounded" class="center" width="130" height="130">

                <h2 class="title-color">Welcome to MoonCRM</h2>



                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <label></label>
                        <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $username; ?>">
                        <span class="help-block"><?php echo $username_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label></label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <span class="help-block"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label class="text-muted" class="form-check-label">
                                <input class="form-check-input" type="checkbox"> Remember me</label>
                            <li></li>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="button" type="submit" value="Login">
                        <li></li>
                    </div>
                    <div>
                        <p><a class="text-muted" class="d-block small" href="forgot-password.php">Forgot Password?</a></p>
                        <p><a class="text-muted" class="d-block small mt-3" href="register.php">Register an Account</a></p>
                    </div>
                </form>


            </div>
        </div>
    </div>
</body>

</html>