
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Vizzdeo</title>
        <meta name="keywords" content="Blog website templates" />
        <meta name="description" content="Author - Personal Blog Wordpress Template">
        <meta name="author" content="Rabie Elkheir">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Owl Carousel Assets -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet"  type="text/css" />

        <!--Google Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800|Raleway:400,500,700|Roboto:300,400,500,700,900|Ubuntu:300,300i,400,400i,500,500i,700" rel="stylesheet">
        <!-- Main CSS -->
        <link rel="stylesheet" href="css/style.css" />
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="css/responsive.css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

	<script>
    var siteUrl = '<?php echo url('/'); ?>';
  </script> 
    </head>

    <body>
      <!--======= header =======-->
      <header>
        <div class="container-full">
        	<div class="row">
                <div class="col-lg-2 col-md-2 col-sm-12">
					<a id="main-category-toggler" class="hidden-md hidden-lg hidden-md"  href="#">
                    	<i class="fa fa-navicon"></i>
                    </a>
					<a id="main-category-toggler-close" class="hidden-md hidden-lg hidden-md" href="#">
                    	<i class="fa fa-close"></i>
                    </a>
                    <div id="logo">
                        <a href="home.html"><img src="images/logo.png" alt=""></a>
                    </div>
                </div><!-- // col-md-2 -->
                <div class="col-lg-3 col-md-3 col-sm-6 hidden-xs hidden-sm">
                    <div class="search-form">
                        <form id="search" action="#" method="post">
                            <input type="text" placeholder="Search here video posts..."/>
                            <input type="submit" value="Keywords" />
                        </form>
                    </div>
                </div><!-- // col-md-3 -->
                <div class="col-lg-3 col-md-3 col-sm-5 hidden-xs hidden-sm">
                    <ul class="top-menu">
                        <li><a href="home">home</a></li>
                        <li><a href="#">trending</a></li>
                        <li><a href="history.html">history</a></li>
                    </ul>
                </div><!-- // col-md-4 -->
                <div class="col-lg-2 col-md-2 col-sm-4 hidden-xs hidden-sm">
                    <ul class="notifications">
                        <li class="dropdown">
                        <a href="#"  data-toggle="dropdown"><i class="fa fa-users"></i>
                        	<span class="badge badge-color1 header-badge">3</span>
                        </a>
                              <ul class="dropdown-menu dropdown-menu-friend-requests ">
                                <li>
                                	<div class="friend-requests-info">
                                        <div class="thumb"><a href="#"><img src="images/z1.jpg" alt=""></a></div>
                                        <a href="#" class="name">Ahmed Saleh </a>
                                        <span>Ahmed Saleh : Follow you now</span>
                                    </div>
                                </li>
                                <li>
                                	<div class="friend-requests-info">
                                        <div class="thumb"><a href="#"><img src="images/z2.jpg" alt=""></a></div>
                                        <a href="#" class="name">Ahmed Saleh </a>
                                        <span>Ahmed Saleh : Follow you now</span>
                                    </div>
                                </li>
                                <li>
                                	<div class="friend-requests-info">
                                        <div class="thumb"><a href="#"><img src="images/z3.jpg" alt=""></a></div>
                                        <a href="#" class="name">Ahmed Saleh </a>
                                        <span>Ahmed Saleh : Follow you now</span>
                                    </div>
                                </li>
                                <li>
                                	<div class="friend-requests-info">
                                        <div class="thumb"><a href="#"><img src="images/z4.jpg" alt=""></a></div>
                                        <a href="#" class="name">Ahmed Saleh </a>
                                        <span>Ahmed Saleh : Follow you now</span>
                                    </div>
                                </li>
                              </ul>
                        </li>
                        <li class="dropdown">
                        <a href="#" data-toggle="dropdown"><i class="fa fa-info-circle"></i>
                        	<span class="badge badge-color2 header-badge">4</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-help-cnter">
                        	<li>
                            	<h2 class="title">Help center</h2>
                                <div class="search-form">
                                    <form id="search-2" action="#" method="post">
                                        <input type="text" placeholder="Search here video posts..."/>
                                        <input type="submit" value="Keywords" />
                                    </form>
                                </div>
                            </li>
                            <li>
                            	<h2 class="title">Help on</h2>
                                <ul class="help-cat-link">
                                	<li><a href="#">the video</a></li>
                                	<li><a href="#">Copyrights</a></li>
                                	<li><a href="#">Members</a></li>
                                	<li><a href="#">Register</a></li>
                                	<li><a href="#">Comments</a></li>
                                </ul>
                            </li>
                        </ul>
                        </li>
                        <li class="dropdown">
                        <a href="#" data-toggle="dropdown"><i class="fa fa-bell-o"></i>
                        	<span class="badge badge-color3 header-badge">9</span>
                        </a>
						<ul class="dropdown-menu dropdown-notifications-items ">
                        	<li>
                            	<div class="notification-info">
                                    <a href="#"><i class="fa fa-video-camera color-1"></i>
                                    <strong>Rabie Elkheir</strong> Add a new <span>Video</span>
                                    <h5 class="time">4 hours ago</h5>
                                    </a>
                                </div>
                            </li>
                        	<li>
                            	<div class="notification-info">
                                    <a href="#"><i class="fa fa-thumbs-up color-2"></i>
                                    <strong>Rabie Elkheir</strong> Add a new <span>Video</span>
                                    <h5 class="time">4 hours ago</h5>
                                    </a>
                                </div>
                            </li>
                        	<li>
                            	<div class="notification-info">
                                    <a href="#"><i class="fa fa-comment color-3"></i>
                                    <strong>Rabie Elkheir</strong> Add a new <span>Video</span>
                                    <h5 class="time">4 hours ago</h5>
                                    </a>
                                </div>
                            </li>
                        	<li>
                            	<div class="notification-info">
                                    <a href="#"><i class="fa fa-video-camera color-1"></i>
                                    <strong>Rabie Elkheir</strong> Add a new <span>Video</span>
                                    <h5 class="time">4 hours ago</h5>
                                    </a>
                                </div>
                            </li>
                            <li>
                            	<a href="#" class="all_notifications">All Notifications</a>
                            </li>
                        </ul>

                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs hidden-sm">
					  <div class="dropdown">
                        <a data-toggle="dropdown" href="#" class="user-area">
                            <div class="thumb"><img src="images/user-1.png" alt=""></div>
                            <h2>Rabie Elkheir</h2>
                            <h3>25 subscribers</h3>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu account-menu">
                           <li><a href="#"><i class="fa fa-edit color-1"></i>Edit profile</a></li>
                           <li><a href="#"><i class="fa fa-video-camera color-2"></i>add video</a></li>
                           <li><a href="#"><i class="fa fa-star color-3"></i>Favorites</a></li>
                           
						    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           
                                        <i class="fa fa-sign-out color-4"></i>sign out</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li></li>
                        </ul>
    				</div>
                </div>
            </div><!-- // row -->
        </div><!-- // container-full -->
      </header><!-- // header -->

      <div id="main-category">
        <div class="container-full">
        	<div class="row">
                <div class="col-md-12">
                    <ul class="main-category-menu">
                       <li class="color-1"><a href="music.html"><i class="fa fa-music"></i>Music</a></li>
                        <li class="color-2"><a href="sports.html"><i class="fa fa-soccer-ball-o"></i>Sports</a></li>
                        <li class="color-3"><a href="gaming.html"><i class="fa fa-gamepad"></i>Gaming</a></li>
                        <li class="color-4"><a href="news.html"><i class="fa fa-globe"></i>News</a></li>
                        <li class="color-1"><a href="live.html"><i class="fa fa-play-circle-o"></i>Live</a></li>
                    </ul>
                </div><!-- // col-md-14 -->
              </div><!-- // row -->
          </div><!-- // container-full -->
      </div><!-- // main-category -->

	  <div class="site-output">
      	<div class="col-md-2 no-padding-left hidden-sm hidden-xs">
        	<div class="left-sidebar">
            	<div id="sidebar-stick" >
            	<ul class="menu-sidebar">
                	<li><a href="home"><i class="fa fa-home"></i>Home</a></li>
                	<li><a href="#"><i class="fa fa-bolt"></i>Trending</a></li>
                	<li><a href="history.html"><i class="fa fa-clock-o"></i>History</a></li>
                	<!-- <li><a href="blog.html"><i class="fa fa-file-text"></i>blog</a></li>  -->
                	<li><a href="upload"><i class="fa fa-upload"></i>upload</a></li>
                </ul>
            	<ul class="menu-sidebar">
                	<li><a href="#"><i class="fa fa-edit"></i>edit profile</a></li>
                	<li><a href="#"><i class="fa fa-sign-out"></i>sign out</a></li>
                </ul>
            	<ul class="menu-sidebar">
            <li><a href="#"><i class="fa fa-gear"></i>Privacy</a></li>
                	<li><a href="#"><i class="fa fa-question-circle"></i>Terms & Conditions</a></li>
                	<li><a href="#"><i class="fa fa-send-o"></i>Send feedback</a></li>
                </ul>
                </div><!-- // sidebar-stick -->
                <div class="clear"></div>
            </div><!-- // left-sidebar -->
        </div><!-- // col-md-2 -->