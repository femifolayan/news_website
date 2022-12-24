
            <!-- Footer Area Start Here -->
<footer>
                <div class="footer-area-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="footer-box">
                                    <h2 class="title-bold-light title-bar-left text-uppercase">Most Viewed Posts</h2>
                                    <ul class="most-view-post">
                                    <?php
                                include('db_conn.php');
            $sql = "SELECT *, DATE_FORMAT(date, '%a-%d-%b-%Y') as newDate FROM `news` ORDER BY `id` DESC LIMIT 0,1";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                                        <li>
                                            <div class="media">
                                            <a <?php echo "href='news.php?link=".$row['link'] . "' "; ?>> 
                                                    <img src="app/uploads/cover_photo/<?php echo $row['cover_photo'];?>" alt="post" class="img-fluid" style="height:100px;">
                                                </a>
                                                <div class="media-body"> 
                                                    <h3 class="title-medium-light size-md mb-10">
                                                    <a <?php echo "href='news.php?link=".$row['link'] . "' "; ?>><?php echo$row['headline'];?></a>
                                                    </h3>
                                                    <div class="post-date-light">
                                                        <ul>
                                                            <li>
                                                                <span>
                                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                                </span><?php echo$row['newDate'];?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php
                }
            }
            ?>
                                        
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12">
                                <div class="footer-box">
                            
                                    <h2 class="title-bold-light title-bar-left text-uppercase">Popular Categories</h2>
                                    <?php
                                include('db_conn.php');
            $sql = "SELECT *, DATE_FORMAT(date, '%a-%d-%b-%Y') as newDate FROM `news` ORDER BY `id` DESC LIMIT 0,5";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                                    <ul class="popular-categories">
                                        <li>
                                        <a <?php echo "href='news.php?link=".$row['link'] . "' "; ?>><?php echo$row['category'];?>
                                                <span><?php echo$row['post_view'];?></span>
                                            </a>
                                        </li>
                                    </ul>
                                    <?php
                                }
                            }
                            ?>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-5 col-md-12 col-sm-12">
                                <div class="footer-box">
                                    <h2 class="title-bold-light title-bar-left text-uppercase">Post Gallery</h2>
                                    
                                    <ul class="post-gallery shine-hover ">
                                    <?php
                                include('db_conn.php');
            $sql = "SELECT *, DATE_FORMAT(date, '%a-%d-%b-%Y') as newDate FROM `news` ORDER BY `id` ASC LIMIT 0,6";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                                        <li>
                                            <a <?php echo "href='news.php?link=".$row['link'] . "' "; ?>>
                                                <figure>
                                                    <img src="app/uploads/cover_photo/<?php echo $row['cover_photo'];?>"  style="height:100px;">
                                                </figure>
                                            </a>
                                        </li>  
                                        <?php
                                }
                            }
                            ?>
                                    </ul>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-area-bottom">
                    <div class="container">
                        <div class="row">             
                        <div class="col-4">
                                <a href="index.php">
                                    <img src="img/55.png" alt="logo" style="height:150px; margin-left:480px; margin-bottom:10px;">
                                </a>
                                </div>

                                <div class="col-12 text-center">
                                <ul class="footer-social">
                                    <li>
                                        <a href="https://www.facebook.com" title="facebook">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.twitter.com" title="twitter">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com" title="instagram">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    
                                </ul>
                                <p>© 2022 OnL News Website designed by Femi S. All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>