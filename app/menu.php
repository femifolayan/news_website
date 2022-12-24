<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="../login/upload_passport/<?php echo $session_passport; ?>" height="50px" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $session_fullname; ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $session_designation; ?><b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile_user.php">Profile</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        
                    </div>
                </li>
                <li class="active">
                    <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="profile_user.php"><i class="fa fa-user"></i>Profile</a></li>
                        <li><a href="news_inventory.php">News Archive</a></li>
                        
                    </ul>
                    
                    <ul class="nav nav-second-level collapse">
                         <li><a href="#"><i class="fa fa-bar-chart-o"></i><span class="nav-label">View News<span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li><a data-toggle="modal" data-target="#flipform">By Date</a></li>
                        <li><a data-toggle="modal" data-target="#flipform2">By Category</a></li>                                   
                    </ul>                  
                    </ul>   
                                   
                </li>
            </ul>
        </div>
    </nav>

<!-- Begin of flip form 1 -->
<div class="modal inmodal" id="flipform" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated flipInY">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Report by Date</h4>
                                        </div>
                                        <div class="modal-body">
                                        <form method="post" action="bydate.php">
                                            
                                        <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>From:</label>
                                             <input type="date" id="name" required class="form-control" name="datefrom" title="News Date">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>To:</label>
                                            <input type="date" id="name" required class="form-control" name="dateto" title="News Date">
                                               
                                             </div>
                                        </div>

                                       
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input name="bydate"  type="submit" class="btn btn-primary btn-block">
                                            </div>
                                        </div>
                                    </div>

</form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
<!-- End of flip form -->

<!-- Begin of flip form 2 -->
<div class="modal inmodal" id="flipform2" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated flipInY">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Report by Category</h4>
                                        </div>
                                        <div class="modal-body">
                                        <form method="post" action="bycategory.php">
                                            
                                        <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Datefrom:</label>
                                             <input type="date" id="name" required class="form-control" name="datefrom" title="News Date">
                                        
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Dateto:</label>
                                             <input type="date" id="name" required class="form-control" name="dateto" title="News Date">
                                        
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                            <label>Category:</label>
                                                <select name="category" class="form-control" id="name" required>
                                                <option value="">--Select--</option>
                                                <option value="politics">Politics</option>
                                                <option value="business">Business</option>
                                                <option value="sport">Sport</option>
                                                <option value="fashion">Fashion</option>
                                                <option value="tech">Tech</option>
                                                </select> 
                                             </div>
                                        </div>

                                       

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input name="bycategory" type="submit" class="btn btn-primary btn-block">
                                            </div>
                                        </div>
                                    </div>

</form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
<!-- End of flip form -->



        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            
            
            <form role="search" class="navbar-form-custom" action="search.php" method="post">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome <?php echo $session_fullname; ?></span>
                </li>

                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                
            </ul>

        </nav>
        
        </div>