<?php include "header.php";
include('function.php');
//include('config.php');
 $val = $_GET['id'];

$getuserdetails = mysql_query("SELECT * FROM `users` where id=$val");

while ($getuser = mysql_fetch_assoc($getuserdetails)) {
   
     $first_name = $getuser['first_name'];
    $last_name = $getuser['last_name'];
     $img_name= $getuser['img_name'];
                $img_type= $getuser['img_type'];
                $subscriberid= $getuser['id'];
               $description= $getuser['description'];
    
}

$getChannnelDetails = mysql_query("SELECT * FROM `uploaded_videos` where channel_id=$val ORDER BY `created_date` DESC LIMIT 4");

?>



        <div id="all-output" class="col-md-10 upload">
        	<div id="upload">
                <div class="col-md-12" style="
    background: #f8f8f8;
    padding: 1%;
">
                    <!-- upload -->
					<div class="col-md-1" style="background-color: #f8f8f8;padding:1px;">
                    	<a href="#"><img src="images/ch-2.jpg" alt=""><h5 class="page-title"><span><?php echo $first_name.' '.$last_name?></span></h5></a>
                    </div><!-- // col-md-8 -->
					 <div class="col-md-11" style="background-color: #f8f8f8;padding:5px;">
						<h3 >About Me</h3>
						<p><?php echo $description ?></p>
						
                    </div><!-- // col-md-8 -->
                    </div><!-- // col-md-8 -->
                   
<div class="col-md-12" style="
    background: #f8f8f8;margin-top:1%;
">
                    <!-- upload -->
					<div class="col-md-12" style="background-color: #f8f8f8;padding:1px;">
                    	<div class="col-md-12">						<h3 class="text-center">Videos</h3>
<?php while ($row = mysql_fetch_assoc($getChannnelDetails)) {

    //$catName = $row['category_name'];
    $video_id = $row['video_id'];
    $channel_id = $row['channel_id'];
    $video_name = $row['video_name'];
    $video_title = $row['video_title'];
    $thubnail_name = $row['thubnail_name'];	
    $user_id = $_SESSION['user_id'];
    $viewed_date = date('Y-m-d H:i:s');
                    $created_date = $rows['created_date'];
                        $views= mysql_query("SELECT count(*) as count FROM `history` WHERE `video_id`=$video_id");
while ($viewss = mysql_fetch_assoc($views)) {
     $view = $viewss['count'];
}
?>
                            <!-- video-item -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="video-item">
                        <div class="thumb">
                            <div class="hover-efect"></div>
                            <small class="time">0.0.5</small>
                            <a href="watch.php?id=<?php echo $video_id; ?>"><img src="<?php echo THUMB_URL . $thubnail_name; ?>" alt=""></a>
                        </div>
                        <div class="video-info">
                            <a href="watch.php?id=<?php $video_id ?>" class="title"><?php echo $video_title ?></a>
                            <a class="channel-name" href="#"><span>
                                    <i class="fa fa-check-circle"></i></span></a>
                           <span class="views"><i class="fa fa-eye"></i><?php echo format($view) ?> views </span>
                        <span class="date"><i class="fa fa-clock-o"></i><?php echo time_elapsed_string($created_date);?></span>
                        </div>
                    </div>
                </div>
                <!-- // video-item -->
<?php } ?>


                    </div>
                    </div><!-- // col-md-8 -->
					
                    </div><!-- // col-md-8 -->
                    <!-- // upload -->
                </div><!-- // row -->
            </div><!-- // upload -->
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
