<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnL News | Register</title>
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
        <br>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="images/onl.svg" alt="logo">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h5>Don't have an account?</h5>
                        <h6>Create one.</h6>
                        <hr>
                        <form method="post" enctype="multipart/form-data">  
                        <?php
                        // to auto-generate matric number
                        include('db_conn.php');
                         $rand=rand(10, 99);
                         $today=date("dmy");
                         $time=date("H:i:s"); //we can add time to this to make it more unique by adding: $time=date("H:i:s");
                         $uin="blog" . "/" . $rand . "/" . $today . "/" . $time;
                          
                            error_reporting(E_ALL);
                                 if (isset($_REQUEST["submit"])){
                                    $uin=$_REQUEST["uin"];
                                    $fullname=$_REQUEST["fullname"];
                                    $emailreg=$_REQUEST["email"];
                                    $phone=$_REQUEST["phone"];                            
                                    
                                    $designation=$_REQUEST["designation"];                                  
                                    $passwordreg=$_REQUEST["password"]; 
                                   
                                     //function for uploading passport
                                    $passport=$_FILES["passport"]['name'];
                                    $target="upload_passport/";
                                    $target=$target.$_FILES["passport"]['name'];
                                     
                                      

                                    if(move_uploaded_file($_FILES["passport"]['tmp_name'], $target)>0){

                                        //checking for duplicate record
                                    $check=mysqli_query($conn, "SELECT * FROM guest WHERE uin='$uin' OR  email='$emailreg' OR phone='$phone'");
                                        $checkrows=mysqli_num_rows($check);
                                        if($checkrows>0){
                                            echo"<script>alert('account already exists!')</script>";
                                        }
                                            else{

                                                
                                    // to insert into database
                                    $sql="INSERT INTO guest(uin, fullname, email, phone, designation, password, passport) VALUES ('$uin','$fullname','$emailreg','$phone','$designation',PASSWORD('$passwordreg'),'$passport')";

                                    mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                        $num=mysqli_insert_id($conn);
                                        if(mysqli_affected_rows($conn)!=1){
                                            $message="Error creating an account";
                                        }

                                       // echo"<script>alert('info successfully added to Database')</script>";
                                    echo "<script>alert('Dear $fullname, registration successful, proceed to Login.')
                                    location.href='log.php'</script>";
                                  }
                            }
                        }       
                               ?>
                                                 
                           
                            <input type="text" class="form-control" name="uin" placeholder="Enter UIN" value="<?php echo $uin?>" readonly hidden required>
                            
                            <label>Fullname</label>
                            <input type="text" class="form-control" name="fullname" placeholder="Enter Fullname" required>

                            <label>Email Address</label>
                            <input type="email" class="form-control" name="email" placeholder="@email.com" required>

                            <label>Phone</label>
                            <input type="tel" class="form-control" name="phone" placeholder="080xxx" required>

                            <input type="text" class="form-control" name="designation" value="guest" placeholder="Enter Business Name" readonly hidden required>

                            <label>Enter Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter Password" required>

                            <label>Upload Passport</label>
                            <input class="form-control" type="file" name="passport" placeholder="" accept=".jpg,.jpeg,.png,.ico,.gif,.svg,.JPG,.JPEG,.PNG,.ICO,.GIF,.SVG" required>
                            
                            <div class="form-button">
                                <button name="submit" class="ibtn">Register</button>
                            </div>
                        </form>
                      
                        <br>
                        <div class="page-links">
                            <h5> Have an account? <a href="log.php">Login</a></h5>
                           
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