<?php
include('db_conn.php');
$today = date("d-M-Y");
if (isset($_REQUEST['link'])) {

	$view_query = "UPDATE `news` SET post_view=post_view + " . 1 . " WHERE link='$_REQUEST[link]'";
	$send_viewquery = mysqli_query($conn, $view_query);


	$sql = "SELECT *, DATE_FORMAT(date, '%a-%d-%b-%Y') as newDate FROM news WHERE link='$_REQUEST[link]'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$newcategory = $row['category'];
    $uinn = $row['uin'];

}

?>
<?php
include('db_conn.php');
if (isset($_REQUEST['uin'])) {

	$sql = "SELECT * FROM comment WHERE uin='$_REQUEST[uin]'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$comment = $row['comment'];
}

?>
<!doctype html>
<html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>OnL News | News</title>
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
        
    <?php 
   include ('menu_landing.php');
    ?> 
            <!-- News Info banner below top stories-->
            <section class="breadcrumbs-area" style="background-image: url('img/banner/breadcrumbs-banner.jpg');">
                <div class="container">
                    
                </div>
            </section>
            

            <!-- Begin of News content -->
            <section class="bg-body section-space-less30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 mb-30">
                            <div class="news-details-layout1">
                        <?php
                             $sql = "SELECT *, DATE_FORMAT(date, '%a-%d-%b-%Y') as newDate FROM news WHERE link='$_REQUEST[link]'";
                             $result = mysqli_query($conn, $sql);
                             $row = mysqli_fetch_array($result);
                             $newcategory = $row['category'];
                         ?>
                                <div class="position-relative mb-30">
                                    <img src="app/uploads/cover_photo/<?php echo $row['cover_photo'];?>" alt="news-image" class="img-fluid">
                                    <div class="topic-box-top-sm">
                                        <div class="topic-box-sm color-cinnabar mb-20"><?php echo $row['category'];?></div>
                                    </div>
                                </div>
                                <h2 class="title-semibold-dark size-c30"><?php echo $row['headline'];?></h2>
                                <ul class="post-info-dark mb-30">
                                    <li>
                                            <span>By</span> <?php echo $row['user'];?>
                                    </li>
                                    <li>
                                            <i class="fa fa-calendar" aria-hidden="true"></i><?php echo $row['newDate'];?>
                                    </li>
                                    <li>
                                            <i class="fa fa-eye" aria-hidden="true"></i><?php echo $row['post_view'];?>
                                    </li>
                                </ul>
                                <p><?php echo $row['content'];?></p>
                                <?php
                ?>
                                   
                                <!-- <img src="img/news/news178.jpg" alt="news-details" class="img-fluid pull-left mr-40 mb-15"> -->


                                  <!-- Share news to social media -->
                                <div class="post-share-area mb-40 item-shadow-1">
                                    <p>You can share this post!</p>
                                    <ul class="social-default item-inline">
                                        <li>
                                            <a href="https://www.facebook.com/login" class="facebook">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.twitter.com/login" class="twitter">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/login" class="google">
                                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>


                                  <!-- begin DIV of previous and next article -->
                                <div class="row no-gutters divider blog-post-slider">

                                <!-- begin of previous  article -->
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
             <?php
                include('db_conn.php');
                $sql = "SELECT *, DATE_FORMAT(date, '%a-%d-%b-%Y') as newDate FROM `news` ORDER BY `id` DESC LIMIT 1, 1";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                                        <a  <?php echo "href='news.php?link=" . $row['link'] . "' "; ?>class="prev-article">
                                            <i class="fa fa-angle-left" aria-hidden="true"></i>Previous article</a>
                                        <h3 class="title-medium-dark pr-50"><?php echo $row['headline']; ?></h3>
            <?php
                }}
            ?>
                                    </div>
                                        <!-- end of previous  article -->

                                       <!-- begin of Next  article -->
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-right">
            <?php
                    include('db_conn.php');
                $sql = "SELECT *, DATE_FORMAT(date, '%a-%d-%b-%Y') as newDate FROM `news` ORDER BY `id` DESC LIMIT 0, 1";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                                         <a  <?php echo "href='news.php?link=" . $row['link'] . "' "; ?>class="next-article">Next news
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                        <h3 class="title-medium-dark pl-50"><?php echo $row['headline']; ?></h3>
            <?php
                }}
            ?>
                                    </div>
                                    <!-- end of Next  article -->
                                </div>


                                <!-- begin of original  Author -->
                                
                                <!-- begin of check comment -->
                                <div class="comments-area">
                                    <h2 class="title-semibold-dark size-xl border-bottom mb-40 pb-20">Comments</h2>
                                    <ul>
                                        <li>
                                        <?php
                                                include('db_conn.php');
                                                $sql = "SELECT * FROM `comment` WHERE uin = '$uinn' ORDER BY `id`";
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <div class="media media-none-xs">
                                      
                                                <div class="media-body comments-content media-margin30">
                                                    <h3 class="title-semibold-dark">
                                                        <a href="#"><?php echo $row['name'];?>
                                                     <span><?php echo $row['date'];?></span>
                                                        </a>
                                                    </h3>
                                                    <p><?php echo $row['comment'];?></p>
                                                </div>
                                            </div>
                                        <?php
                                         }
                                        }
                                        ?>  
                                        </li>
                                    </ul>
                                </div>


                                <!-- Type comment -->
                                <div class="leave-comments">
                                    <h2 class="title-semibold-dark size-xl mb-40">Leave Comments</h2>
                                    <form id="leave-comments" method="post">
                                    <?php
                                        include('db_conn.php');
                                        
                                        error_reporting(E_ALL);
                                        if (isset($_REQUEST["submit"])){

                                            $uin=$_REQUEST["uin"];
                                            $name=$_REQUEST["name"];
                                            $email=$_REQUEST["email"];
                                            $comment=$_REQUEST["comment"];
                                            $today = date('d-m-y');


                                            $sql="INSERT INTO comment(uin, name, email, comment,date) VALUES ('$uin','$name','$email','$comment','$today')";

                                            mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                            $num=mysqli_insert_id($conn);
                                            if(mysqli_affected_rows($conn)!=1){
                                            }
                                                echo "<script>alert('Done!')
                                    location.href=''</script>";
                                        }
                                        ?>

                                        <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <input placeholder="Name*" class="form-control" type="text"  name="name" required> 
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <input placeholder="Email*" class="form-control" type="email"  name="email" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>


                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                <?php
                             $sql = "SELECT *, DATE_FORMAT(date, '%a-%d-%b-%Y') as newDate FROM news WHERE link='$_REQUEST[link]'";
                             $result = mysqli_query($conn, $sql);
                             $row = mysqli_fetch_array($result);
                            
                             ?>
                                                <input  value = "<?php echo $row['uin'];?>" class="form-control" type="hidden"  name="uin"  readonly required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>

                                            <?php
                             $sql = "SELECT *, DATE_FORMAT(date, '%M-%d-%Y') as newDate FROM news WHERE link='$_REQUEST[link]'";
                             $result = mysqli_query($conn, $sql);
                             $row = mysqli_fetch_array($result);
                             $newcategory = $row['category'];
            ?>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea placeholder="Message*" class="textarea form-control" id="form-message"  name="comment" rows="8" cols="20" required></textarea>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="form-group mb-none">
                                                    <button type="submit" name="submit" class="btn-ftg-ptp-45">Post Comment</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        
                        <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                        
                            <!-- begin of Newsletter -->
                            <div class="sidebar-box">
                                <form method="post">
                                <?php
                                        include('db_conn.php');      
                                        error_reporting(E_ALL);
                                        if (isset($_REQUEST["send"])){
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
                                        <button type="submit" name="send">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                </form>
                            </div>

                            
                            
                            <!-- begin of tags -->
                            <div class="sidebar-box">
                                <div class="topic-border color-cod-gray mb-25">
                                   
                                </div>
                            </div>
    

                        </div>
                    </div>
                </div>
            </section>
         
            <!-- Footer Area and Nav drop-down -->
            <?php
        include ('footer_landing.php');
        include ('navbar.php');
            ?>
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
