<?php session_start(); 
include('config.php');

//$usertype=$user['user_type'];

if(!isset($_SESSION['user_id']))
{
	header('location:log_in_page.php');
}

  $user_id=$_SESSION['user_id'];
$getChannnelDetails = mysql_query("SELECT * FROM `users` where id=$user_id");
while ($row = mysql_fetch_assoc($getChannnelDetails)) {
     $first_name = $row['first_name'];
     $last_name = $row['last_name'];
     
}
$getChannnelDetail = mysql_query("SELECT count(*) as count FROM `subscription` WHERE `channel_id`=$user_id");
while ($rows = mysql_fetch_assoc($getChannnelDetail)) {
    $subscribers = $rows['count'];
}

?>
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
                        <li><a href="home.php">home</a></li>
                        <li><a href="trending.php">trending</a></li>
                        <li><a href="history.php">history</a></li>
                    </ul>
                </div><!-- // col-md-4 -->
              
                <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs hidden-sm">
					  <div class="dropdown">
                        <a data-toggle="dropdown" href="#" class="user-area">
                            <div class="thumb"><img src="images/user-1.png" alt=""></div>
                            <h2><?php echo $first_name.' '.$last_name?></h2>
                            <h3><?php echo $subscribers; ?> subscribers</h3>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu account-menu">
                           <li><a href="myaccount.php"><i class="fa fa-edit color-1"></i>Edit profile</a></li>
                           <li><a href="upload.php"><i class="fa fa-video-camera color-2"></i>add video</a></li>
                           <li><a href="favourites.php"><i class="fa fa-star color-3"></i>Favorites</a></li>
                           <li><a href="logout.php"><i class="fa fa-sign-out color-4"></i>sign out</a></li>
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
                       <li class="color-1"><a href="category_videos.php?category=music"><i class="fa fa-music"></i>Music</a></li>
                        <li class="color-2"><a href="category_videos.php?category=sports"><i class="fa fa-soccer-ball-o"></i>Sports</a></li>
                        <li class="color-3"><a href="category_videos.php?category=gaming"><i class="fa fa-gamepad"></i>Gaming</a></li>
                        <li class="color-4"><a href="category_videos.php?category=news"><i class="fa fa-globe"></i>News</a></li>
                        <li class="color-1"><a href="category_videos.php?category=live"><i class="fa fa-play-circle-o"></i>Live</a></li>
                        <li class="color-1"><a href="category_chanels.php">View more</a></li>
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
                	<li><a href="home.php"><i class="fa fa-home"></i>Home</a></li>
                	<li><a href="trending.php"><i class="fa fa-bolt"></i>Trending</a></li>
                	<li><a href="history.php"><i class="fa fa-clock-o"></i>History</a></li>
                	<!-- <li><a href="blog.html"><i class="fa fa-file-text"></i>blog</a></li>  -->
                	<li><a href="upload.php"><i class="fa fa-upload"></i>upload</a></li>
                </ul>
            	<ul class="menu-sidebar">
                	<li><a href="edit_profile.php"><i class="fa fa-edit"></i>edit profile</a></li>
                	<li><a href="logout.php"><i class="fa fa-sign-out"></i>sign out</a></li>
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
