<?php
ob_start();
include "header.php";
include('function.php');
include('config.php');?>



        <div id="all-output" class="col-md-10">
            <!-- Category Cover Image -->
            <div id="category-cover-image">
            	<div class="image-in">
                	<img src="images/category-img.jpg" alt="">
                </div>
            	<h1 class="title"><i class="fa fa-repeat"></i> 360° Video </h1>
                <ul class="category-info">
                	<li>97,174,199 subscribers </li>
                	<li>255,525,456 Views</li>
                	<li>45,23,65 Channel No</li>
                	<li class="subscribe"><a href="#">Subscribe</a></li>
                </ul>
            </div>
            <!-- // Category Cover Image -->

            <!-- category -->
            <div id="category">
            	<div class="row">
                    <div class="col-md-2">
                        <ul class="category-menu">
                            <li class="active"><a href="home.html">Home</a></li>
                            <li><a href="category_videos.html">videos</a></li>
                            <li><a href="category_chanels.html">Chanels</a></li>
                            <li><a href="category_playlists.html">playlists</a></li>
                            <li><a href="category_about.html">about</a></li>
                        </ul>

                        <div class="share-in">
                        	<h1 class="title">Share in</h1>
                            <ul class="social-link">
                            	<li class="facebook"><a href="#"><i class="fa fa-facebook"></i> 11200 </a></li>
                            	<li class="twitter"><a href="#"><i class="fa fa-twitter"></i> 514 </a></li>
                            	<li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i> 514 </a></li>
                            	<li class="vimeo"><a href="#"><i class="fa fa-vimeo"></i> 155 </a></li>
                            </ul>
                        </div>

                        <div class="advertising-block">
                        	<h1 class="title">Advertising</h1>
                            <div class="advertising-code">
                            	<a href="#"><img src="images/adv.jpg" alt=""></a>
                            </div>
                        </div>

                    </div><!-- // col-md-2 -->

                    <div class="col-md-9">

                        <h1 class="new-video-title"><i class="fa fa-bolt"></i> Trending</h1>
                        <div class="row">

                            <!-- video-item -->
							
							<?php
							$getChannnelDetails = mysql_query("SELECT u.*,c.channel_name FROM uploaded_videos as u
							 JOIN channel_details c ON c.channel_id=u.channel_id
							WHERE status=1
							 ");
							while ($row = mysql_fetch_assoc($getChannnelDetails)) {
							?>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="video-item">
                                    <div class="thumb">
                                        <div class="hover-efect"></div>
										<small class="time"><?php echo $row['video_duration'];?></small>
   
   
                                       
                                        <a href="<?php echo VIDEO_URL.$row['video_name']; ?>"><img src="<?php echo THUMB_URL.$row['thubnail_name'];?>" alt=""></a>
                                    </div>
                                    <div class="video-info">
                                        <a href="#" class="title"><?php echo $row['video_title'];?></a>
                                        <a class="channel-name" href="#"><?php echo $row['channel_name'];?><span>
                                        <i class="fa fa-check-circle"></i></span></a>
                                        <span class="views"><i class="fa fa-eye"></i>2.8M views </span>
                                        <span class="date"><i class="fa fa-clock-o"></i>5 months ago </span>
                                    </div>
                                </div>
                            </div>
                            <!-- // video-item -->

<?php     
    }
	?>
                           



                        </div><!-- // row -->


                        <h1 class="new-video-title"><i class="fa fa-bolt"></i> Trending</h1>
                        <div class="row">

                            <!-- video-item -->
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="video-item">
                                    <div class="thumb">
                                        <div class="hover-efect"></div>
                                        <small class="time">10:53</small>
                                        <a href="#"><img src="images/v4.png" alt=""></a>
                                    </div>
                                    <div class="video-info">
                                        <a href="#" class="title">Lorem Ipsum is simply dummy text of the printing and </a>
                                        <a class="channel-name" href="#">Rabie Elkheir<span>
                                        <i class="fa fa-check-circle"></i></span></a>
                                        <span class="views"><i class="fa fa-eye"></i>2.8M views </span>
                                        <span class="date"><i class="fa fa-clock-o"></i>5 months ago </span>
                                    </div>
                                </div>
                            </div>
                            <!-- // video-item -->


                            <!-- video-item -->
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="video-item">
                                    <div class="thumb">
                                        <div class="hover-efect"></div>
                                        <small class="time">10:53</small>
                                        <a href="#"><img src="images/v5.png" alt=""></a>
                                    </div>
                                    <div class="video-info">
                                        <a href="#" class="title">Lorem Ipsum is simply dummy text of the printing and </a>
                                        <a class="channel-name" href="#">Rabie Elkheir<span>
                                        <i class="fa fa-check-circle"></i></span></a>
                                        <span class="views"><i class="fa fa-eye"></i>2.8M views </span>
                                        <span class="date"><i class="fa fa-clock-o"></i>5 months ago </span>
                                    </div>
                                </div>
                            </div>
                            <!-- // video-item -->


                            <!-- video-item -->
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="video-item">
                                    <div class="thumb">
                                        <div class="hover-efect"></div>
                                        <small class="time">10:53</small>
                                        <a href="#"><img src="images/v6.png" alt=""></a>
                                    </div>
                                    <div class="video-info">
                                        <a href="#" class="title">Lorem Ipsum is simply dummy text of the printing and </a>
                                        <a class="channel-name" href="#">Rabie Elkheir<span>
                                        <i class="fa fa-check-circle"></i></span></a>
                                        <span class="views"><i class="fa fa-eye"></i>2.8M views </span>
                                        <span class="date"><i class="fa fa-clock-o"></i>5 months ago </span>
                                    </div>
                                </div>
                            </div>
                            <!-- // video-item -->



                        </div><!-- // row -->


                        <!-- Loading More Videos -->
                        <div id="loading-more">
                            <i class="fa fa-refresh faa-spin animated"></i> <span>Loading more</span>
                        </div>
                        <!-- // Loading More Videos -->

                    </div>

                    <div class="col-md-1">
                    	<div id="top-channels">
                        	<ul class="channels">
                            	<li><a href="#"><img src="images/c1.jpg" alt=""></a></li>
                            	<li><a href="#"><img src="images/c2.jpg" alt=""></a></li>
                            	<li><a href="#"><img src="images/c3.jpg" alt=""></a></li>
                            	<li><a href="#"><img src="images/c4.jpg" alt=""></a></li>
                            	<li><a href="#"><img src="images/z1.jpg" alt=""></a></li>
                            	<li><a href="#"><img src="images/z2.jpg" alt=""></a></li>
                            	<li><a href="#"><img src="images/z3.jpg" alt=""></a></li>
                            	<li><a href="#"><img src="images/z4.jpg" alt=""></a></li>
                            	<li><a href="#"><img src="images/c1.jpg" alt=""></a></li>
                            	<li><a href="#"><img src="images/c2.jpg" alt=""></a></li>
                            	<li><a href="#"><img src="images/c3.jpg" alt=""></a></li>
                            	<li><a href="#"><img src="images/c4.jpg" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- // row -->
            </div>
            <!-- // category -->

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
