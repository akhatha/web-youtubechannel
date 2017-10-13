 <?php
 //session_start();
include('header.php');
//include('config.php');

?>
<?php //echo $_SESSION['username']; ?>
<div id="all-output" class="col-md-10">
        	<h1 class="new-video-title"><i class="fa fa-bolt"></i> Trending</h1>
            <div class="row">

                <!-- video-item -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="video-item">
                        <div class="thumb">
                        	<div class="hover-efect"></div>
                            <small class="time">10:53</small>
                            <a href="watch.html"><img src="images/v1.png" alt=""></a>
                        </div>
                        <div class="video-info">
                            <a href="watch.html" class="title">Lorem Ipsum is simply dummy text of the printing and </a>
                            <a class="channel-name" href="#">Rabie Elkheir<span>
                            <i class="fa fa-check-circle"></i></span></a>
                            <span class="views"><i class="fa fa-eye"></i>2.8M views </span>
                            <span class="date"><i class="fa fa-clock-o"></i>5 months ago </span>
                        </div>
                    </div>
                </div>
                <!-- // video-item -->


                <!-- video-item -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="video-item">
                        <div class="thumb">
                        	<div class="hover-efect"></div>
                            <small class="time">10:53</small>
                            <a href="watch.html"><img src="images/v2.png" alt=""></a>
                        </div>
                        <div class="video-info">
                            <a href="watch.html" class="title">Lorem Ipsum is simply dummy text of the printing and </a>
                            <a class="channel-name" href="#">Rabie Elkheir<span>
                            <i class="fa fa-check-circle"></i></span></a>
                            <span class="views"><i class="fa fa-eye"></i>2.8M views </span>
                            <span class="date"><i class="fa fa-clock-o"></i>5 months ago </span>
                        </div>
                    </div>
                </div>
                <!-- // video-item -->


                <!-- video-item -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="video-item">
                        <div class="thumb">
                        	<div class="hover-efect"></div>
                            <small class="time">10:53</small>
                            <a href="watch.html"><img src="images/v3.png" alt=""></a>
                        </div>
                        <div class="video-info">
                            <a href="watch.html" class="title">Lorem Ipsum is simply dummy text of the printing and </a>
                            <a class="channel-name" href="#">Rabie Elkheir<span>
                            <i class="fa fa-check-circle"></i></span></a>
                            <span class="views"><i class="fa fa-eye"></i>2.8M views </span>
                            <span class="date"><i class="fa fa-clock-o"></i>5 months ago </span>
                        </div>
                    </div>
                </div>
                <!-- // video-item -->


                <!-- video-item -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="video-item">
                        <div class="thumb">
                        	<div class="hover-efect"></div>
                            <small class="time">10:53</small>
                            <a href="watch.html"><img src="images/v4.png" alt=""></a>
                        </div>
                        <div class="video-info">
                            <a href="watch.html" class="title">Lorem Ipsum is simply dummy text of the printing and </a>
                            <a class="channel-name" href="#">Rabie Elkheir<span>
                            <i class="fa fa-check-circle"></i></span></a>
                            <span class="views"><i class="fa fa-eye"></i>2.8M views </span>
                            <span class="date"><i class="fa fa-clock-o"></i>5 months ago </span>
                        </div>
                    </div>
                </div>
                <!-- // video-item -->

            </div><!-- // row -->
			
			 <?php  $getChannnelDetails = mysql_query("SELECT * FROM `_category`");

                    while ($row = mysql_fetch_assoc($getChannnelDetails)) {
                        $catName = $row['category_name'];
                        //$catId = $row['category_id'];
                        $catId = $row['category_id'];
                       
                        
                        ?>
        	<h1 class="new-video-title"><i class="fa fa-soccer-ball-o"></i> <?php echo $catName; ?></h1>
            <div class="row">
<?php $getcategory = mysql_query("SELECT * FROM `uploaded_videos` u LEFT JOIN _category c on 
    u.category_id=c.category_id  left join users us on u.`channel_id`=us.id where category_name='$catName'");

while ($rows = mysql_fetch_assoc($getcategory)) {
    //print_r($rows);
     $video_title = $rows['video_title'];
      $id = $rows['video_id'];
     $video_duration = $rows['video_duration'];
     $video_title = $rows['video_title'];
     $channel_name = $rows['channel_name'];
    ?>
                <!-- video-item -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="video-item">
                        <div class="thumb">
                        	<div class="hover-efect"></div>
                            <small class="time"><?php echo $video_duration;?></small>
                            <a href="watch.html"><img src="images/v5.png" alt=""></a>
                        </div>
                        <div class="video-info">
                            <a href="watch.html" class="title"><?php echo $video_title;?></a>
                            <a class="channel-name" href="#"><?php echo $channel_name;?><span>
                            <i class="fa fa-check-circle"></i></span></a>
                            <span class="views"><i class="fa fa-eye"></i>2.8M views </span>
                            <span class="date"><i class="fa fa-clock-o"></i>5 months ago </span>
                        </div>
                    </div>
                </div>
                <!-- // video-item -->


			<?php	 }?>
            </div><!-- // row -->
			
		
     

			<?php	} ?>

            <!-- Loading More Videos -->
            <div id="loading-more">
            	<i class="fa fa-refresh faa-spin animated"></i> <span>Loading more</span>
            </div>
            <!-- // Loading More Videos -->

		</div>
 <?php
include('footer.php'); ?>

