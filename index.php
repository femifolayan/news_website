<!doctype html>
<html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>OnL News | Home</title>
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
            <!-- Slider Area Start Here -->
            <section class="section-space-bottom">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-xl-8 col-lg-12">
                            <div class="main-slider1 img-overlay-slider">
                                <div class="bend niceties preview-1">
                                    <div id="ensign-nivoslider-3" class="slides">
                                    <?php
include('db_conn.php');
            $sql = "SELECT *, DATE_FORMAT(date, '%a-%d-%b-%Y') as newDate FROM `news` ORDER BY `id` DESC LIMIT 0, 3";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                                        <img src="app/uploads/cover_photo/<?php echo $row['cover_photo']; ?>" alt="image slider" title="#slider-direction-1">
                                        <!-- <img src="img/banner/slide2.jpg" alt="slider" title="#slider-direction-2">
                                        <img src="img/banner/slide3.jpg" alt="slider" title="#slider-direction-3"> -->
                                        <?php
                }
            }
            ?>
                                    </div>
                                    <!-- direction 1 -->
                                    <!-- <div id="slider-direction-1" class="t-cn slider-direction">
                                    <?php
include('db_conn.php');
            $sql = "SELECT *, DATE_FORMAT(date, '%a-%d-%b-%Y') as newDate FROM `news` ORDER BY `id` DESC LIMIT 0,3";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>

                                        <div class="slider-content s-tb slide-1">
                                            <div class="title-container s-tb-c">
                                                <div class="text-left pl-50 pl20-xs">
                                                    <div class="topic-box-sm color-cinnabar mb-20"><?php echo $row['category'];?></div>
                                                    <div class="post-date-light d-none d-sm-block">
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
                                                    <div class="slider-title"><?php echo $row['headline'];?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                    }
                                    }
                                    ?>
                                    </div>                                    -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-12">
                            <div class="item-box-light-md-less30 ie-full-width">
                                <div class="row">
                                    <?php
                                include('db_conn.php');
            $sql = "SELECT *, DATE_FORMAT(date, '%a-%d-%b-%Y') as newDate FROM `news` ORDER BY `id` DESC LIMIT 0,3";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>

                                    <div class="media mb-30 col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                        <a class="img-opacity-hover" href="news.php?link=<?php echo $row['link'];?>">
                                            <img src="app/uploads/cover_photo/<?php echo $row['cover_photo']; ?>" style="height:200px; width:150px;">
                                        </a>
                                        <div class="media-body media-padding5"><br><br><br>
                                            <div class="post-date-dark">
                                                <ul>
                                                    <li>
                                                        <span >
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span><?php echo $row['newDate'];?></li>
                                                </ul>
                                            </div>
                                            <h3 class="title-medium-dark size-md mb-none">
                                                <a <?php echo "href='news.php?link=".$row['link'] . "' "; ?>><?php echo$row['headline']; ?></a>
                                            </h3>
                                        </div>
                                    </div>
                                    <?php
                }
            }
            ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Slider Area End Here -->
            
            <!-- Latest Articles Area Start Here -->
            <section class="section-space-bottom-less30">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-12 mb-30">
                            <div class="item-box-light-md-less30 ie-full-width">
                                <div class="topic-border color-cinnabar mb-30">
                                    <div class="topic-box-lg color-cinnabar">Headlines</div>
                                </div>
                                <div class="row">
                                <?php
                                include('db_conn.php');
            $sql = "SELECT *, DATE_FORMAT(date, '%a-%d-%b-%Y') as newDate FROM `news` ORDER BY `id` DESC LIMIT 0,4";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                                    <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="media media-none--md mb-30">
                                            <div class="position-relative width-40">
                                            <a <?php echo "href='news.php?link=".$row['link'] . "' "; ?>>
                                                    <img src="app/uploads/cover_photo/<?php echo $row['cover_photo'];?>" alt="image" class="img-fluid">
                                            </a>   
                                            <div class="topic-box-top-xs">
                                                    <div class="topic-box-sm color-cinnabar mb-20"><?php echo $row['category'];?></div>
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
                                                <a <?php echo "href='news.php?link=".$row['link'] . "' "; ?>><?php echo$row['headline'];?></a>
                                                </h3>
                                                                                
                                            </div>              
                                         </div>
                                    </div>   
                                    <?php
                                }}
                                ?> 
                                </div>
                            </div>     
                        </div>
                        <div class="ne-sidebar sidebar-break-lg col-xl-4 col-lg-12">
                            <div class="sidebar-box item-box-light-md">
                                <div class="topic-border color-cinnabar mb-30">
                                    <div class="topic-box-lg color-cinnabar">Stay Connected</div>
                                </div>
                                <ul class="stay-connected-color overflow-hidden">
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
                                    <li class="rss">
                                        <a href="#">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                            
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="sidebar-box item-box-light-md-less30">
                                <ul class="btn-tab item-inline block-xs nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a href="#recent" data-toggle="tab" aria-expanded="true" class="active">Recent</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#popular" data-toggle="tab" aria-expanded="false">Popular</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#common" data-toggle="tab" aria-expanded="false">Common</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active show" id="recent">
                                        <div class="row">
                                        <?php
                                include('db_conn.php');
            $sql = "SELECT *, DATE_FORMAT(date, '%a-%d-%b-%Y') as newDate FROM `news` ORDER BY `id` DESC LIMIT 0,4";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                                            <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-6 mb-25">
                                                <div class="position-relative">
                                                    <div class="topic-box-top-xs">
                                                        <div class="topic-box-sm color-cod-gray mb-20"><?php echo$row['category'];?></div>
                                                    </div>
                                                    <a href="single-news-1.html" class="img-opacity-hover">
                                                        <img src="app/uploads/cover_photo/<?php echo $row['cover_photo'];?>" alt="recent news" class="img-fluid width-100 mb-10">
                                                    </a>
                                                    <h3 class="title-medium-dark size-sm mb-none">
                                                    <a <?php echo "href='news.php?link=".$row['link'] . "' "; ?>><?php echo$row['headline'];?></a>
                                                    </h3>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    }
                                        ?>    
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="popular">
                                        <div class="row">
                                        <?php
                                include('db_conn.php');
            $sql = "SELECT *, DATE_FORMAT(date, '%a-%d-%b-%Y') as newDate FROM `news` ORDER BY `id` ASC LIMIT 0,2";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                                            <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-6 mb-25">
                                                <div class="position-relative">
                                                    <div class="topic-box-top-xs">
                                                        <div class="topic-box-sm color-cod-gray mb-20"><?php echo$row['category'];?></div>
                                                    </div>
                                                    <a href="single-news-1.html" class="img-opacity-hover">
                                                        <img src="app/uploads/cover_photo/<?php echo $row['cover_photo'];?>" alt="popular news" class="img-fluid width-100 mb-10">
                                                    </a>
                                                    <h3 class="title-medium-dark size-sm mb-none">
                                                    <a <?php echo "href='news.php?link=".$row['link'] . "' "; ?>><?php echo$row['headline'];?></a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                        ?>   
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="common">
                                        <div class="row">
                                        <?php
                                include('db_conn.php');
            $sql = "SELECT *, DATE_FORMAT(date, '%a-%d-%b-%Y') as newDate FROM `news` ORDER BY `id` DESC LIMIT 1,3";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                                            <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-6 mb-25">
                                                <div class="position-relative">
                                                    <div class="topic-box-top-xs">
                                                        <div class="topic-box-sm color-cod-gray mb-20"><?php echo$row['category'];?></div>
                                                    </div>
                                                    <a <?php echo "href='news.php?link=".$row['link'] . "' "; ?> class="img-opacity-hover">
                                                        <img src="app/uploads/cover_photo/<?php echo $row['cover_photo'];?>" alt="common news" class="img-fluid width-100 mb-10">
                                                    </a>
                                                    <h3 class="title-medium-dark size-sm mb-none">
                                                    <a <?php echo "href='news.php?link=".$row['link'] . "' "; ?>><?php echo$row['headline'];?></a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
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
