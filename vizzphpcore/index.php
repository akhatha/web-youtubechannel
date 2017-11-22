<?php include('config.php'); 
include('function.php'); ?>
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

    <!--<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/B28EACD4-88DF-5347-ABA5-4B40A9FA04F3/main.js" charset="UTF-8"></script>-->
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
                        <a href="index.php"><img src="images/logo.png" alt=""></a>
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
                <div class="col-lg-5 col-md-6 col-sm-5 hidden-xs hidden-sm">
                    <ul class="top-menu">
                        <li><a href="index.php">home</a></li>
                        <li><a href="trending.php">trending</a></li>
                   <!--     <li><a href="history.html">history</a></li>  -->
<li><a href="sign_up_page.php">SignUp</a></li>
<li><a href="log_in_page.php">SignIn</a></li>
                    </ul>
                </div><!-- // col-md-4 -->
               
                
            </div><!-- // row -->
        </div><!-- // container-full -->
      </header><!-- // header -->
<?php
 
$getChannnelDetails = mysql_query("SELECT * FROM `users`");
while ($row = mysql_fetch_assoc($getChannnelDetails)) {
     $first_name = $row['first_name'];
     $last_name = $row['last_name'];
     
}
$getChannnelDetail = mysql_query("SELECT count(*) as count FROM `subscription`");
while ($rows = mysql_fetch_assoc($getChannnelDetail)) {
    $subscribers = $rows['count'];
}

?>
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
                	<li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
                	<li><a href="trending.php"><i class="fa fa-bolt"></i>Trending</a></li>
                	<!--  <li><a href="history.html"><i class="fa fa-clock-o"></i>History</a></li>
                	 <li><a href="blog.html"><i class="fa fa-file-text"></i>blog</a></li>  
                	<li><a href="upload.html"><i class="fa fa-upload"></i>upload</a></li>  -->
                </ul>
            <!--	<ul class="menu-sidebar">
                	<li><a href="#"><i class="fa fa-edit"></i>edit profile</a></li>
                	<li><a href="#"><i class="fa fa-sign-out"></i>sign out</a></li>
                </ul>  -->
            	<ul class="menu-sidebar">
            <li><a href="#"><i class="fa fa-gear"></i>Privacy</a></li>
                	<li><a href="#"><i class="fa fa-question-circle"></i>Terms & Conditions</a></li>
                	<li><a href="#"><i class="fa fa-send-o"></i>Send feedback</a></li>
                </ul>
                </div><!-- // sidebar-stick -->
                <div class="clear"></div>
            </div><!-- // left-sidebar -->
        </div><!-- // col-md-2 -->
<div id="all-output" class="col-md-10">
    <h1 class="new-video-title"><i class="fa fa-bolt"></i> Trending</h1>
    <div class="row">
        <?php
        $getcategory = mysql_query("SELECT *,u.video_id,count(*) FROM `uploaded_videos` u LEFT JOIN likes c on u.video_id=c.video_id left join users us on u.`channel_id`=us.id where created_date between '2017-10-01' and '2017-10-31' GROUP by c.`video_id` ORDER BY count(*) DESC LIMIT 0,4");
        while ($rows = mysql_fetch_assoc($getcategory)) {
            //$video_title = $rows['video_title'];
            $id = $rows['video_id'];
            $video_duration = $rows['video_duration'];
            $video_title = $rows['video_title'];
            $channel_name = $rows['channel_name'];
                        $created_date = $rows['created_date'];
                        $views= mysql_query("SELECT count(*) as count FROM `history` WHERE `video_id`=$id");
while ($viewss = mysql_fetch_assoc($views)) {
     $view = $viewss['count'];
}

            ?>
            <!-- video-item -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="video-item">
                    <div class="thumb">
                        <div class="hover-efect"></div>
                        <small class="time"><?php echo $rows['video_duration']; ?></small>
                        <a href="watch.php?id=<?php echo $id?>"><img src="<?php echo THUMB_URL . $rows['thubnail_name']; ?>" alt=""></a>
                    </div>
                    <div class="video-info">
                        <a href="watch.php?id=<?php echo $id?>" class="title"><?php echo $rows['video_title']; ?></a>
                        <a class="channel-name" href="watch.php?id=<?php echo $id?>"><?php echo $rows['channel_name']; ?><span>
                                <i class="fa fa-check-circle"></i></span></a>
                        <span class="views"><i class="fa fa-eye"></i><?php echo format($view) ?> views </span>
                        <span class="date"><i class="fa fa-clock-o"></i><?php echo time_elapsed_string($created_date);?></span>
                    </div>
                </div>
            </div>
            <!-- // video-item -->

        <?php } ?>

    </div><!-- // row -->

    <?php
    $limit = 5;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
};
$start_from = ($page - 1) * $limit;
    $getChannnelDetails = mysql_query("SELECT * FROM `_category` LIMIT $start_from, $limit");

    while ($row = mysql_fetch_assoc($getChannnelDetails)) {
        $catName = $row['category_name'];
        //$catId = $row['category_id'];
        $catId = $row['category_id'];
        ?>
        <h1 class="new-video-title"><i class="fa fa-soccer-ball-o"></i> <?php echo $catName; ?></h1>
        <div class="row">
            <?php
            $getcategory = mysql_query("SELECT * FROM `uploaded_videos` u LEFT JOIN _category c on 
    u.category_id=c.category_id  left join users us on u.`channel_id`=us.id where category_name='$catName' LIMIT 0,4");

            while ($rows = mysql_fetch_assoc($getcategory)) {
                //print_r($rows);
                $video_title = $rows['video_title'];
                $id = $rows['video_id'];
                $video_duration = $rows['video_duration'];
                $video_title = $rows['video_title'];
                $channel_name = $rows['channel_name'];
                 $created_date = $rows['created_date'];
                                       $views= mysql_query("SELECT count(*) as count FROM `history` WHERE `video_id`=$id");
while ($viewss = mysql_fetch_assoc($views)) {
     $view = $viewss['count'];
}

                ?>
                <!-- video-item -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="video-item">
                        <div class="thumb">
                            <div class="hover-efect"></div>
                            <small class="time"><?php echo $video_duration; ?></small>
                            <a href="watch.php?id=<?php echo $id?>"><img src="<?php echo THUMB_URL . $rows['thubnail_name']; ?>" alt=""></a>
                        </div>
                        <div class="video-info">
                            <a href="watch.php?id=<?php echo $id?>" class="title"><?php echo $video_title; ?></a>
                            <a class="channel-name" href="#"><?php echo $channel_name; ?><span>
                                    <i class="fa fa-check-circle"></i></span></a>
                            <span class="views"><i class="fa fa-eye"></i><?php echo format($view) ?> views </span>
                            <span class="date"><i class="fa fa-clock-o"></i><?php echo time_elapsed_string($created_date);?></span>
                        </div>
                    </div>
                </div>
                <!-- // video-item -->


            <?php } ?>
        </div><!-- // row -->




    <?php } ?>

     <?php
    $limit = 5;
    $sql = "SELECT COUNT(*) as count FROM _category";
    $rs_result = mysql_query($sql);
    while ($rows = mysql_fetch_assoc($rs_result)) {
        $total_records = $rows['count'];
        $total_pages = ceil($total_records / $limit);
        $pagLink = "<nav><ul class='pagination'>";
        if($total_records>10)
        {
        for ($i = 1; $i <= $total_pages; $i++) {
            $pagLink .= "<li><a href='index.php?page=" . $i . "'>" . $i . "</a></li>";
        };
        }
        echo $pagLink . "</ul></nav>";
    }
    ?>

</div>
      </div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery.sticky-kit.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/grid-blog.min.js"></script>


	</body>
</html>
