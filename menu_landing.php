   
        <div id="wrapper">
            <!-- Header Area Start Here -->
            <header>
                <div id="header-layout2" class="header-style7">
                    <div class="header-top-bar">
                        <div class="top-bar-top bg-primarytextcolor border-bottom">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8 col-md-12">
                                        <ul class="news-info-list text-center--md">
                                        <li>
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>Lagos</li>
                                            <li>
                                                <i class="fa fa-calendar" aria-hidden="true"></i><span id="current_date"></span></li>
                                            <li>
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>Last update <?php date_default_timezone_set("Africa/Lagos"); echo date("H:i:sa");?></li>
                                          
                                                <li>
                                                <i class="fa fa-user" aria-hidden="true"></i><a href="login/log.php" style="color:white">Sign in</a>
                                                </li>                                                
                                        </ul>
                                    </div>
                                    <div class="col-lg-4 d-none d-lg-block">
                                        <ul class="header-social">
                                            <li>
                                                <a href="#" title="facebook">
                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="twitter">
                                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="instagram">
                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-menu-area bg-body border-bottom" id="sticker">
                        <div class="container">
                            <div class="row no-gutters d-flex align-items-center">
                                <div class="col-lg-2 col-md-2 d-none d-lg-block">
                                    <div class="logo-area">
                                        <a href="index.php" class="img-fluid">
                                            <img src="img/onl2.png" alt="logo" class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-8 d-none d-lg-block position-static min-height-none">
                                    <div class="ne-main-menu">
                                        <nav id="dropdown">
                                            <ul>                        
                                                <li>
                                                    <a <?php echo "href='category.php?category=" . 'politics'. "' "; ?>>Politics</a>
                                                </li>
                                                <li>
                                                <a <?php echo "href='category.php?category=" . 'business'. "' "; ?>>Business</a>
                                                </li>
                                                <li>
                                                <a <?php echo "href='category.php?category=" . 'sport'. "' "; ?>>Sport</a>
                                                </li>
                                                <li>
                                                <a <?php echo "href='category.php?category=" . 'fashion'. "' "; ?>>Fashion</a>
                                                </li>
                                                <li>
                                                <a <?php echo "href='category.php?category=" . 'tech'. "' "; ?>>Tech</a>
                                                </li>
                                                <li>
                                               </i><a href="login/reg.php">Register</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 text-right position-static">
                                    <div class="header-action-item on-mobile-fixed">
                                        <ul>
                                            <li>
         <form id="top-search-form" class="header-search-dark" action="search_news_index.php" method="post">
    <input type="text" class="search-input" placeholder="Search...." style="display: none;" name="search">
                                                    <button class="search-button" name="search">
                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </li>

                                            <li class="d-none d-sm-block d-md-block d-lg-none">
                                                <button type="button" class="login-btn" data-toggle="modal" data-target="#myModal">
                                                    <i class="fa fa-user" aria-hidden="true"></i>Sign in
                                                </button>
                                            </li>
                                            <li>
                                                <div id="side-menu-trigger" class="offcanvas-menu-btn offcanvas-btn-repoint">
                                                    <a href="#" class="menu-bar">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </a>
                                                    <a href="#" class="menu-times close">
                                                        <span></span>
                                                        <span></span>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Header Area End Here -->
            <!-- News Feed Area Start Here -->
            <section class="container">
                <div class="bg-body-color ml-15 pr-15 mb-10 mt-10">
                    <div class="row no-gutters d-flex align-items-center">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                            <div class="topic-box">Top Stories</div>
                        </div>
                        <div class="col-lg-10 col-md-9 col-sm-8 col-7">
                            <div class="feeding-text-light2">
                                <ol id="sample" class="ticker">
                                <?php
include('db_conn.php');
            $sql = "SELECT *, DATE_FORMAT(date, '%a-%d-%b-%Y') as newDate FROM `news` ORDER BY `id` DESC LIMIT 0, 5";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
          
                                    <li>
                                        <!-- ticker -->
                                        
                                        <a  <?php echo "href='news.php?link=" . $row['link'] . "' "; ?>><?php echo$row['headline']; ?></a>
                                    </li>
                                    <?php
                }
            }
            ?>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>