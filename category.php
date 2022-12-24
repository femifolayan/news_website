<?php
include('db_conn.php');
$today = date("d-M-Y");
if (isset($_REQUEST['category'])) {

	$view_query = "UPDATE `news` SET post_view=post_view + " . 1 . " WHERE category='$_REQUEST[category]'";
	$send_viewquery = mysqli_query($conn, $view_query);


	$sql = "SELECT *, DATE_FORMAT(date, '%a-%d-%b-%Y') as newDate FROM news WHERE category='$_REQUEST[category]'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$category = $row['category'];
}

?>
<!doctype html>
<html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>OnL News | News Category</title>
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
        <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an 
        <strong>outdated</strong> browser. Please 
        <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
    </p>
    <![endif]-->
        <!-- Add your site or application content here -->
        <!-- Preloader Start Here -->
        <?php 
   include ('menu_landing.php');
    ?> 
           <!-- News Info banner below top stories-->
            <section class="breadcrumbs-area" style="background-image: url('img/banner/breadcrumbs-banner.jpg');">
                <div class="container">
                    
                </div>
            </section>
            
            <!-- Breadcrumb Area End Here -->
            <!-- Post Style 1 Page Area Start Here -->
            <section class="bg-body section-space-less30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <div class="row">
                            <?php
                             $sql = "SELECT *, DATE_FORMAT(date, '%a-%d-%b-%Y') as newDate FROM news WHERE category='$_REQUEST[category]'";
                             $result = mysqli_query($conn, $sql);
                           while( $row = mysqli_fetch_array($result)){
                             $category = $row['category'];
            ?>
                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                    <div class="media media-none--lg mb-30">
                                        <div class="position-relative width-40">
                                            <a <?php echo "href='news.php?link=".$row['link'] . "' ";?> class="img-opacity-hover img-overlay-70">
                                                <img src="app/uploads/cover_photo/<?php echo $row['cover_photo'];?>" alt="news" class="img-fluid">
                                            </a>
                                            <div class="topic-box-top-xs">
                                                <div class="topic-box-sm color-cod-gray mb-20"><?php echo $row['category'];?></div>
                                            </div>
                                        </div>
                                        <div class="media-body p-mb-none-child media-margin30">
                                            <div class="post-date-dark">
                                                <ul>
                                                    <li>
                                                        <span>by</span>
                                                       <?php echo $row['user'];?>
                                                    </li>
                                                    <li>
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span><?php echo $row['newDate'];?></li>
                                                </ul>
                                            </div>
                                            <h3 class="title-semibold-dark size-lg mb-15">
                                            <a <?php echo "href='news.php?link=".$row['link'] . "' "; ?>><?php echo$row['headline']; ?></a>
                                            </h3>
                                           
                                        </div>
                                    </div>
                                </div>
                                <?php 
                            } 
                            ?>
                            </div>
                            <div class="row mt-20-r mb-30">
                                <div class="col-sm-6 col-12">
                                    <div class="pagination-btn-wrapper text-center--xs mb15--xs">
                                        <ul>
                                            <li class="active">
                                                <a href="#">1</a>
                                            </li>
                                            <li>
                                                <a href="#">2</a>
                                            </li>
                                            <li>
                                                <a href="#">3</a>
                                            </li>
                                            <li>
                                                <a href="#">4</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="pagination-result text-right pt-10 text-center--xs">
                                        <p class="mb-none">Page 1 of 4</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                            <div class="sidebar-box">
                                <div class="topic-border color-cod-gray mb-30">
                                    <div class="topic-box-lg color-cod-gray">Stay Connected</div>
                                </div>
                                <ul class="stay-connected overflow-hidden">
                                    <li class="facebook">
                                        <a href="#">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                            
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="#">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                            
                                        </a>
                                    </li>
                                    <li class="linkedin">
                                        <a href="#">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                            
                                        </a>
                                    </li>
                                   
                                </ul>
                            </div>
                            <div class="sidebar-box">
                            <form method="post">
                                        <?php
                                        include('db_conn.php');      
                                        error_reporting(E_ALL);
                                        if (isset($_REQUEST["submit"])){
                                            $email=$_REQUEST["email"];
                                           
                                            $check=mysqli_query($conn, "SELECT * FROM email_subscription WHERE email='$email'");
                                            $checkrows=mysqli_num_rows($check);
                                            if($checkrows>0){
                                                echo"<script>alert('already subscribed!')</script>";
                                            }
                                                else{

                                            $sql="INSERT INTO email_subscription(email) VALUES ('$email')";
                                            mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                            $num=mysqli_insert_id($conn);
                                            if(mysqli_affected_rows($conn)!=1){
                                                $message="Error subscribing";
                                            }
                                            echo "<script>alert('subscribed!')</script>";
                                        } 
                                    }                           
                                        ?>
                                <div class="topic-border color-cod-gray mb-30">
                                    <div class="topic-box-lg color-cod-gray">Newsletter</div>
                                </div>
                                <div class="newsletter-area bg-primary">                        
                                    <h2 class="title-medium-light size-xl pl-30 pr-30">Subscribe to our mailing list to get the new updates!</h2>
                                    <img src="img/banner/newsletter.png" alt="newsletter" class="img-fluid m-auto mb-15">
                                    <p>Subscribe our newsletter to stay updated</p>
                                    <div class="input-group stylish-input-group">
                                    
                                        <input type="email" placeholder="Enter your Email*" name="email" class="form-control" required>
                                        <span class="input-group-addon">
                                            <button type="submit" name="submit">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            </button>
                                        </span>
                                    </div>                              
                                </div>
                            </form>
                            </div>
                            


                    </div>
                </div>
            </section>
            <!-- Post Style 1 Page Area End Here -->
            <!-- Footer Area Start Here -->
            <?php
        include ('footer_landing.php');
         include ('navbar.php');
            ?>
            <!-- Footer Area End Here -->
            <!-- Modal Start-->
            
            <!-- Modal End-->
            <!-- Offcanvas Menu Start -->
            
            <!-- Offcanvas Menu End -->
        </div>
        <!-- Wrapper End -->
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
