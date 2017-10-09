<?php
ob_start();
include "header.php";
include('function.php');
//include('config.php');
$val = $_GET['id'];
$user_id = $_SESSION['user_id'];
$user = mysql_query("SELECT count(*) as count FROM `likes` WHERE `video_id`=$val and liked_by=$user_id");
while ($usercounts = mysql_fetch_assoc($user)) {
    $usercount = $usercounts['count'];
}
$usergoldlikes = mysql_query("SELECT count(*) as count FROM `likes` WHERE `video_id`=$val and `like_type`='gold' and liked_by=$user_id");
while ($usergoldlike = mysql_fetch_assoc($usergoldlikes)) {
    $usergold = $usergoldlike['count'];
}
$usersilverlikes = mysql_query("SELECT count(*) as count FROM `likes` WHERE `video_id`=$val and `like_type`='silver' and liked_by=$user_id");
while ($usersilverlike = mysql_fetch_assoc($usersilverlikes)) {
    $usersilver = $usersilverlike['count'];
}
$userbroncelikes = mysql_query("SELECT count(*) as count FROM `likes` WHERE `video_id`=$val and `like_type`='bronce' and liked_by=$user_id");
while ($userbroncelike = mysql_fetch_assoc($userbroncelikes)) {
    $userbronce = $userbroncelike['count'];
}


$goldlikes = mysql_query("SELECT count(*) as count FROM `likes` WHERE `video_id`=$val and `like_type`='gold'");
while ($goldlike = mysql_fetch_assoc($goldlikes)) {
    $gold = $goldlike['count'];
}
$silverlikes = mysql_query("SELECT count(*) as count FROM `likes` WHERE `video_id`=$val and `like_type`='silver'");
while ($silverlike = mysql_fetch_assoc($silverlikes)) {
    $silver = $silverlike['count'];
}
$broncelikes = mysql_query("SELECT count(*) as count FROM `likes` WHERE `video_id`=$val and `like_type`='bronce'");
while ($broncelike = mysql_fetch_assoc($broncelikes)) {
    $bronce = $broncelike['count'];
}


$getChannnelDetails = mysql_query("SELECT * FROM `uploaded_videos` where video_id=$val");
while ($row = mysql_fetch_assoc($getChannnelDetails)) {

    //$catName = $row['category_name'];
    $video_id = $row['video_id'];
    $channel_id = $row['channel_id'];
    $video_name = $row['video_name'];
    $video_title = $row['video_title'];
    $user_id = $_SESSION['user_id'];
    $viewed_date = date('Y-m-d H:i:s');
    if ($user_id != $channel_id) {
        $query = mysql_query("SELECT COUNT( * ) as total
		FROM history 
		WHERE channel_id =$user_id and video_id=$video_id");
        $result = mysql_fetch_assoc($query);

        if ($result['total'] == 0) {
            $saveHistory = array(
                'video_id' => $video_id,
                'channel_id' => $user_id,
                'viewed_date' => $viewed_date
            );
            dbRowInsert('history', $saveHistory);
        }
    }

    $getuserdetails = mysql_query("SELECT * FROM `users` where id=$user_id");
    while ($getuser = mysql_fetch_assoc($getuserdetails)) {
        $first_name = $getuser['first_name'];
        $last_name = $getuser['last_name'];
    }

    $getsubscriber = mysql_query("SELECT count(*) as count FROM `subscription` WHERE `channel_id`=$user_id");
    while ($getsubscribe = mysql_fetch_assoc($getsubscriber)) {
        $subscribers = $getsubscribe['count'];
    }
    //$thubnail_name = $row['thubnail_name'];
}
?>





<div id="all-output" class="col-md-10">
    <div class="row">
        <!-- Watch -->
        <div class="col-md-8">
            <div id="watch">

                <!-- Video Player -->
                <h1 class="video-title"><?php echo $video_title; ?></h1>
                <div class="video-code">
                    <iframe width="100%" height="415" src="<?php echo VIDEO_URL . $video_name; ?>" frameborder="0" allowfullscreen></iframe>
                </div><!-- // video-code -->

                <div class="video-share">
                    <ul class="like">
                        <?php if ($usergold == 0) { ?>
                            <li><a class="like" href="#" onclick="insert_likes('gold',<?php echo $video_id ?>,<?php echo $user_id ?>)"> <i class="fa fa-star fa-2x  " style="color:#C98910"></i><br/><?php echo $gold; ?></a></li>
                        <?php } else { ?>  
                            <li><a class="like" href="#" onclick="delete_likes('gold',<?php echo $video_id ?>,<?php echo $user_id ?>)"> <i class="fa fa-star  fa-2x " style="color:#C98910"></i><br/><?php echo $gold; ?></a></li>
                        <?php } ?>
                        <?php if ($usersilver == 0) { ?>
                            <li><a class="like" href="#" onclick="insert_likes('silver',<?php echo $video_id ?>,<?php echo $user_id ?>)"> <i class="fa fa-star fa-2x  " style="color:#A8A8A8"></i><br/><?php echo $silver; ?></a></li>
                        <?php } else { ?>  
                            <li><a class="like" href="#" onclick="delete_likes('silver',<?php echo $video_id ?>,<?php echo $user_id ?>)"> <i class="fa fa-star  fa-2x " style="color:#A8A8A8"></i><br/><?php echo $silver; ?></a></li>
                        <?php } ?>
                        <?php if ($userbronce == 0) { ?>

                            <li><a class="like" href="#" onclick="insert_likes('bronce',<?php echo $video_id ?>,<?php echo $user_id ?>)"> <i class="fa fa-star  fa-2x "  style="color:#965A38"></i><br/><?php echo $bronce; ?></a></li>
                         <?php  } else { ?>
                            <li><a class="like" href="#" onclick="delete_likes('bronce',<?php echo $video_id ?>,<?php echo $user_id ?>)"> <i class="fa fa-star  fa-2x "  style="color:#965A38"></i><br/><?php echo $bronce; ?></a></li>
                           <?php } ?>
                        </ul>
                        <ul class="social_link">
                            <li><a class="facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a class="youtube" href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                            <li><a class="linkedin" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a class="google" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a class="twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a class="rss" href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                        </ul><!-- // Social -->
                    </div><!-- // video-share -->
                    <!-- // Video Player -->


                    <!-- Chanels Item -->
                    <div class="chanel-item">
                        <div class="chanel-thumb">
                            <a href="#"><img src="images/ch-1.jpg" alt=""></a>
                        </div>
                        <div class="chanel-info">
                            <a class="title" href="#"><?php echo $first_name . ' ' . $last_name ?></a>
                            <span class="subscribers"><?php echo $subscribers; ?> subscribers</span>                     
                        </div>
                        <a href="watch.html"class="subscribe">Subscribe</a>
                    </div>
                    <!-- // Chanels Item -->


                    <!-- Comments -->
                    <div id="comments" class="post-comments">
                        <h3 class="post-box-title"><span>19</span> Comments</h3>
                        <ul class="comments-list">
                            <li>
                                <div class="post_author">
                                    <div class="img_in">
                                        <a href="#"><img src="images/c1.jpg" alt=""></a>
                                    </div>
                                    <a href="watch.html"class="author-name">Rabie Elkheir</a>
                                    <time datetime="2017-03-24T18:18">July 27, 2014 - 11:00 PM</time>
                                </div>
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>
                                <a href="watch.html"class="reply">Reply</a>

                                <ul class="children">
                                    <li>
                                        <div class="post_author">
                                            <div class="img_in">
                                                <a href="#"><img src="images/c2.jpg" alt=""></a>
                                            </div>
                                            <a href="watch.html"class="author-name">Salam Ahmmed</a>
                                            <time datetime="2017-03-24T18:18">July 27, 2014 - 11:00 PM</time>
                                        </div>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>
                                        <a href="watch.html"class="reply">Reply</a>
                                    </li>
                                </ul>


                            </li>
                            <li>
                                <div class="post_author">
                                    <div class="img_in">
                                        <a href="#"><img src="images/c2.jpg" alt=""></a>
                                    </div>
                                    <a href="watch.html"class="author-name">Salam Ahmmed</a>
                                    <time datetime="2017-03-24T18:18">July 27, 2014 - 11:00 PM</time>
                                </div>
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>
                                <a href="watch.html"class="reply">Reply</a>
                            </li>

                        </ul>


                        <h3 class="post-box-title">Add Comments</h3>
                        <form>
                            <input type="text" class="form-control" id="Name" placeholder="YOUR NAME">
                            <input type="email" class="form-control" id="Email" placeholder="EMAIL">
                            <textarea class="form-control" rows="8" id="Message" placeholder="COMMENT"></textarea>
                            <button type="button" id="contact_submit" class="btn btn-dm">Post Comment</button>
                        </form>
                    </div>
                    <!-- // Comments -->


                </div><!-- // watch -->
            </div><!-- // col-md-8 -->
            <!-- // Watch -->

            <!-- Related Posts-->
            <div class="col-md-4">
                <div id="related-posts">

                    <!-- video item -->
                    <div class="related-video-item">
                        <div class="thumb">
                            <small class="time">10:53</small>
                            <a href="#"><img src="images/v1.png" alt=""></a>
                        </div>
                        <a href="watch.html"class="title">Lorem Ipsum is simply dummy text of the printing and </a>
                        <a class="channel-name" href="#">Rabie Elkheir<span>
                                <i class="fa fa-check-circle"></i></span></a>
                    </div>
                    <!-- // video item -->


                    <!-- video item -->
                    <div class="related-video-item">
                        <div class="thumb">
                            <small class="time">10:53</small>
                            <a href="#"><img src="images/v2.png" alt=""></a>
                        </div>
                        <a href="watch.html"class="title">Lorem Ipsum is simply dummy text of the printing and </a>
                        <a class="channel-name" href="#">Rabie Elkheir<span>
                                <i class="fa fa-check-circle"></i></span></a>
                    </div>
                    <!-- // video item -->


                    <!-- video item -->
                    <div class="related-video-item">
                        <div class="thumb">
                            <small class="time">10:53</small>
                            <a href="#"><img src="images/v3.png" alt=""></a>
                        </div>
                        <a href="watch.html"class="title">Lorem Ipsum is simply dummy text of the printing and </a>
                        <a class="channel-name" href="#">Rabie Elkheir<span>
                                <i class="fa fa-check-circle"></i></span></a>
                    </div>
                    <!-- // video item -->


                    <!-- video item -->
                    <div class="related-video-item">
                        <div class="thumb">
                            <small class="time">10:53</small>
                            <a href="#"><img src="images/v4.png" alt=""></a>
                        </div>
                        <a href="watch.html"class="title">Lorem Ipsum is simply dummy text of the printing and </a>
                        <a class="channel-name" href="#">Rabie Elkheir<span>
                                <i class="fa fa-check-circle"></i></span></a>
                    </div>
                    <!-- // video item -->


                    <!-- video item -->
                    <div class="related-video-item">
                        <div class="thumb">
                            <small class="time">10:53</small>
                            <a href="#"><img src="images/v5.png" alt=""></a>
                        </div>
                        <a href="watch.html"class="title">Lorem Ipsum is simply dummy text of the printing and </a>
                        <a class="channel-name" href="#">Rabie Elkheir<span>
                                <i class="fa fa-check-circle"></i></span></a>
                    </div>
                    <!-- // video item -->


                    <!-- video item -->
                    <div class="related-video-item">
                        <div class="thumb">
                            <small class="time">10:53</small>
                            <a href="#"><img src="images/v6.png" alt=""></a>
                        </div>
                        <a href="watch.html"class="title">Lorem Ipsum is simply dummy text of the printing and </a>
                        <a class="channel-name" href="#">Rabie Elkheir<span>
                                <i class="fa fa-check-circle"></i></span></a>
                    </div>
                    <!-- // video item -->

                    <!-- video item -->
                    <div class="related-video-item">
                        <div class="thumb">
                            <small class="time">10:53</small>
                            <a href="#"><img src="images/v1.png" alt=""></a>
                        </div>
                        <a href="watch.html"class="title">Lorem Ipsum is simply dummy text of the printing and </a>
                        <a class="channel-name" href="#">Rabie Elkheir<span>
                                <i class="fa fa-check-circle"></i></span></a>
                    </div>
                    <!-- // video item -->


                    <!-- video item -->
                    <div class="related-video-item">
                        <div class="thumb">
                            <small class="time">10:53</small>
                            <a href="#"><img src="images/v4.png" alt=""></a>
                        </div>
                        <a href="watch.html"class="title">Lorem Ipsum is simply dummy text of the printing and </a>
                        <a class="channel-name" href="#">Rabie Elkheir<span>
                                <i class="fa fa-check-circle"></i></span></a>
                    </div>
                    <!-- // video item -->


                    <!-- video item -->
                    <div class="related-video-item">
                        <div class="thumb">
                            <small class="time">10:53</small>
                            <a href="watch.html"><img src="images/v3.png" alt=""></a>
                        </div>
                        <a href="watch.html" class="title">Lorem Ipsum is simply dummy text of the printing and </a>
                        <a class="channel-name" href="#">Rabie Elkheir<span>
                                <i class="fa fa-check-circle"></i></span></a>
                    </div>
                    <!-- // video item -->

                </div>
            </div><!-- // col-md-4 -->
            <!-- // Related Posts -->
        </div><!-- // row -->
    </div>
    <?php include "footer.php"; ?>

<script type="text/javascript">


                            function insert_likes(likes, video_id, liked_by)
                            {
                                //alert(video_id);
                                var video_id = video_id;
                                var likes = likes;
                                //alert(likes);
                                $.ajax({
                                    type: "POST",
                                    url: 'likes.php',
                                    data: {video_id: video_id, likes: likes, liked_by: liked_by},
                                    success: function () {
                                        //alert("in");
                                        location.reload();
                                        //alert( "Data Saved: " + msg ); //Anything you want
                                    }
                                });
                            }
                            function delete_likes(likes, video_id, liked_by)
                            {
                                //alert(video_id);
                                var video_id = video_id;
                                var likes = likes;
                                //alert(likes);
                                $.ajax({
                                    type: "POST",
                                    url: 'delete_likes.php',
                                    data: {video_id: video_id, likes: likes, liked_by: liked_by},
                                    success: function () {
                                        //alert("in");
                                        location.reload();
                                        //alert( "Data Saved: " + msg ); //Anything you want
                                    }
                                });
                            }
</script>
