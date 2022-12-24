<?php
include('db_conn.php');
$id = 1;
$sql="SELECT * FROM news  WHERE id='$id'";
$result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
$rows=mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>OnL News | Contact Us</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" href="img/onl2.png">
        <!-- Normalize CSS -->
        <link rel="stylesheet" href="css/normalize.css">
        <!-- Main CSS -->
        <link rel="stylesheet" href="css/main.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="css/animate.min.css">
        <!-- Font-awesome CSS-->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Owl Caousel CSS -->
        <link rel="stylesheet" href="vendor/OwlCarousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendor/OwlCarousel/owl.theme.default.min.css">
        <!-- Main Menu CSS -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
        <!-- Nivo Slider CSS-->
        <link rel="stylesheet" href="vendor/slider/css/nivo-slider.css" type="text/css">
        <link rel="stylesheet" href="vendor/slider/css/preview.css" type="text/css" media="screen">
        <!-- Magnific CSS -->
        <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
        <!-- Switch Style CSS -->
        <link rel="stylesheet" href="css/hover-min.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="style.css">
        <!-- For IE -->
        <link rel="stylesheet" type="text/css" href="css/ie-only.css">
        <!-- Modernizr Js -->
        <script src="js/modernizr-2.8.3.min.js"></script>

    </head>

    <body>

    <?php
    include ('menu_landing.php');
?>
<div class="col-lg-10">
                    <h2></h2>
                    <ol class="breadcrumb">
                        <li class="active">                       
                        <span style="color:green; weight:20px"><a href="index.php"><i class="fa fa-arrow-circle-o-left col-lg-12"></i>HOME</a></span>
                    </ol>
                </div>
<div class="row wrapper border-bottom white-bg page-heading">
               
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                
                            </div>
                            <div class="ibox-content">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Category</th>
                                                <th>Headline</th>
                                                <th>Content</th>                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
        include('db_conn.php');
        if ($_POST) {
            $search = $_REQUEST["search"];
            $error = "Record not found";
            $sql = "SELECT * FROM `news` WHERE category LIKE '%" . $search . "%' OR headline LIKE '%" . $search . "%' OR content LIKE '%" . $search . "%' ORDER by uin";
            // $sql = "SELECT * FROM `student` WHERE fullname == '%" . $search . "%' OR phone == '%" . $search . "%' ORDER by fullname"; email='$search' or uin='$search'
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {

        ?>
                                            <tr class="gradeX">
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['category']; ?></td>
                                                <td><?php echo $row['headline']; ?></td>
                                                <td><?php echo $row['content']; ?></td>
                                                
                                                <td><div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                        
                                    </div></td>
                                            </tr>
                                            <?php  
}
}
else {
    echo "<script>alert('Opps! Record not found')
location.href='index.php'</script>";
}
}

mysqli_close($conn);
?>                                 
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
         <!-- Footer Area Start Here -->
         <?php
        include ('footer_landing.php');
        include ('navbar.php');
            ?>
            <!-- Footer Area End Here -->
            
        </div>
        <!-- jquery-->
        <script src="js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <!-- Plugins js -->
        <script src="js/plugins.js" type="text/javascript"></script>
        <!-- Popper js -->
        <script src="js/popper.js" type="text/javascript"></script>
        <!-- Bootstrap js -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- WOW JS -->
        <script src="js/wow.min.js"></script>
        <!-- Owl Cauosel JS -->
        <script src="vendor/OwlCarousel/owl.carousel.min.js" type="text/javascript"></script>
        <!-- Meanmenu Js -->
        <script src="js/jquery.meanmenu.min.js" type="text/javascript"></script>
        <!-- Srollup js -->
        <script src="js/jquery.scrollUp.min.js" type="text/javascript"></script>
        <!-- jquery.counterup js -->
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/waypoints.min.js"></script>
        <!-- Nivo slider js -->
        <script src="vendor/slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
        <script src="vendor/slider/home.js" type="text/javascript"></script>
        <!-- Isotope js -->
        <script src="js/isotope.pkgd.min.js" type="text/javascript"></script>
        <!-- Magnific Popup -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <!-- Ticker Js -->
        <script src="js/ticker.js" type="text/javascript"></script>
        <!-- Custom Js -->
        <script src="js/main.js" type="text/javascript"></script>
    </body>

</html>
