<?php
 session_start();
?>
<body>
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                <img width="100px" src="images/logo.png" alt="">
                   Baber store
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="index.php?page=nhan_vien">
                        <i class="pe-7s-graph"></i>
                        <p>Nhân viên</p>
                    </a>
                </li>
                <li>
                    <a href="index.php?page=khach-hang">
                        <i class="pe-7s-user"></i>
                        <p>Khách hàng</p>
                    </a>
                </li>
                <li>
                    <a href="?page=dich-vu">
                        <i class="pe-7s-note2"></i>
                        <p>Dịch vụ</p>
                    </a>
                </li>
                <li>
                    <a href="?page=lich-hen">
                        <i class="pe-7s-news-paper"></i>
                        <p>Lịch hẹn</p>
                    </a>
                </li>
                <li>
                    <a href="?page=slide">
                        <i class="pe-7s-science"></i>
                        <p>Slide</p>
                    </a>
                </li>
                <li>
                    <a href="?page=bai-viet">
                        <i class="pe-7s-map-marker"></i>
                        <p>Tóc đẹp</p>
                    </a>
                </li>
                <li>
                    <a href="?page=introduct">
                        <i class="pe-7s-map-marker"></i>
                        <p>Giới thiệu</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../index.php">Trang chủ</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-lg hidden-md"></b>
									<p class="hidden-lg hidden-md">
										5 Notifications
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>
                
                    <ul class="nav navbar-nav navbar-right">
                           <img src="images/user.png"  width = "40px"alt="">
                           <a href="">
                               <?php
                                  if(isset($_SESSION['auth'])){
                                      $userInfo = $_SESSION['auth'];
                                      echo "<h5 class = 'user' style='color:#9A9393'>".$userInfo['ten_nv'].'</h5><br>';
                                      echo "<a href = '../?abc=logout'>Log out</a>";
                                  }
                               ?>
                            </a>
                    </ul>
                </div>
            </div>
        </nav>


    