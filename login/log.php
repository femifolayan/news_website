<?php
	require('db_conn.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['email'])){

		$email = stripslashes($_REQUEST['email']); // removes backslashes
		$email = mysqli_real_escape_string($conn,$email); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($conn,$password);

	//Checking is user existing in the database or not
        $query = "SELECT * FROM `guest` WHERE email='$email' AND designation='guest' AND password=PASSWORD('$password')";
		$result = mysqli_query($conn,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['email'] = $email;
			echo '<script type="text/javascript"> window.open("../app/index.php","_self");</script>'; // Redirect user to index.php
            }{
    echo "<script>alert('Invalid email or password! ')
	location.href='log.php'</script>";
   }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnL News | Login</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme18.css">
    <link rel="shortcut icon" href="images/onl2.png">
</head>
<body>
    <div class="form-body without-side">
    <div class="website-logo">
        <a href="../">   
            <img src="images/onl4.svg" alt="logo"> 
        </a>
    </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="images/graphic3.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Login to account</h3>
                        
                        <form method="post">  
                            <input class="form-control" type="email" name="email" placeholder="xx@gmail.com" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <button name="submit" class="ibtn">Login</button> <a href="forget_password.php">Forget password?</a>
                            </div>
                        </form>
                       
                        <br>
                        <div class="page-links">
                            <a href="reg.php">Register new account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>