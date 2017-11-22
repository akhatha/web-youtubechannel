<?php
ob_start();
include "header.php";
include('function.php');
//include('config.php');
$val = $_GET['id'];
$user_id = $_SESSION['user_id'];
$category_id = mysql_query("SELECT u.category_id FROM `uploaded_videos` u left join _category c on c.category_id=u.category_id  WHERE `video_id`=$val");
while ($category = mysql_fetch_assoc($category_id)) {
    $cat = $category['category_id'];
}


$user = mysql_query("SELECT count(*) as count FROM `follow` WHERE `video_id`=$val and user_id=$user_id");
while ($followcounts = mysql_fetch_assoc($user)) {
    $followcount = $followcounts['count'];
}
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


    //$thubnail_name = $row['thubnail_name'];
}
$getuserdetails = mysql_query("SELECT * FROM `users` where id=$user_id");
while ($getuser = mysql_fetch_assoc($getuserdetails)) {
    $first_name = $getuser['first_name'];
    $last_name = $getuser['last_name'];
     $img_name= $getuser['img_name'];
                $img_type= $getuser['img_type'];
                $subscriberid= $getuser['id'];
    
}

$getsubscriber = mysql_query("SELECT count(*) as count FROM `subscription` WHERE `channel_id`=$channel_id");
while ($getsubscribe = mysql_fetch_assoc($getsubscriber)) {
    $subscribers = $getsubscribe['count'];
}

$commentvideo = mysql_query("SELECT count(*) as count FROM `comment` WHERE `video_id`=$video_id");
while ($comments = mysql_fetch_assoc($commentvideo)) {
    $comment = $comments['count'];
}
$displaycomment = mysql_query("SELECT first_name,last_name,channel_name,comment,created_date from comment left join users on users.id=comment.user_id where comment.`video_id`=$video_id order by comment.created_date DESC");
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
<?php } else { ?>
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
                        <a target="_blank" href="myprofile.php?id=<?php echo $subscriberid?>"><img src="<?php echo PROF_URL . $img_name.'.'.$img_type ?>" alt=""></a>
                    </div>
                    <div class="chanel-info">
                        <a target="_blank" class="title" href="myprofile.php?id=<?php echo $subscriberid?>"><?php echo $first_name . ' ' . $last_name ?></a>
             
                        <span class="subscribers"><?php echo $subscribers; ?>Subscribers</span>                     
                    </div>
                    <a href="supportme.php?videoid=<?php echo $val?>" class="subscribe">Support me</a>
                    <a href="subsciptionpage.php?channel=<?php echo $subscriberid?>" class="subscribe">Subscribe</a>
                <?php if($followcount==0)  
                    {?>   
                    <a href=""  onclick="follow(<?php echo $video_id ?>,<?php echo $user_id ?>)" class="subscribe">Follow</a> 
                        <?php }  else 
                    { ?> <a href=""  onclick="unfollow(<?php echo $video_id ?>,<?php echo $user_id ?>)" class="subscribe">Unfollow</a><?php } ?>
                </div>
                <!-- // Chanels Item -->


                <!-- Comments -->
                <div id="comments" class="post-comments">
                    <h3 class="post-box-title"><span><?php echo $comment ?></span> Comments</h3>
                    <ul class="comments-list">
                        <li>
<?php
while ($display_comment = mysql_fetch_assoc($displaycomment)) {
    $comment = $display_comment['comment'];
    $channel_name = $display_comment['channel_name'];
    $first_name = $display_comment['first_name'];
    $last_name = $display_comment['last_name'];
    $created_date = $display_comment['created_date'];
    ?>
                                <div class="post_author">
                                    <div class="img_in">
                                        <a href="#"><img src="images/c1.jpg" alt=""></a>
                                    </div>
                                    <a href="watch.html"class="author-name"><?php echo $first_name . ' ' . $last_name ?></a>
                                    <time datetime="2017-03-24T18:18"><?php echo $created_date ?></time>
                                </div>
                                <p><?php echo $comment; ?></p>
                                <?php }
                            ?>
                            <h3 class="post-box-titcle">Add Comments</h3>
                            <form  method="post">
                                <input type="hidden" id="videoid" value="<?php echo $video_id ?>">
                                <input type="hidden" id="userid" value="<?php echo $user_id ?>">
                                <textarea class="form-control" rows="8" id="Message" placeholder="COMMENT"></textarea>
                                <button type="submit" id="contact_submit" class="btn btn-dm">Post Comment</button>
                            </form>
                            </div>
                            <!-- // Comments -->


                            </div><!-- // watch -->
                            </div><!-- // col-md-8 -->
                            <!-- // Watch -->

                            <!-- Related Posts-->
                            <div class="col-md-4">
                                <div id="related-posts">
                                    <?php
                                    $category_id = mysql_query("SELECT * FROM `uploaded_videos` u left join users us on u.`channel_id`=us.id  WHERE `category_id`=$cat  and `video_id`!=$val order by created_date");
                                    while ($category = mysql_fetch_assoc($category_id)) {
                                        $cat = $category['video_name'];
                                        $video_title = $category['video_title'];
                                        $id = $category['video_id'];
                                        $video_duration = $category['video_duration'];
                                        $video_title = $category['video_title'];
                                        $channel_name = $category['channel_name'];
                                        ?>

                                        <!-- video item -->
                                        <div class="related-video-item">
                                            <div class="thumb">
                                                <small class="time"><?php echo $video_duration ?></small>
                                                <a href="watch.php?id=<?php echo $id ?>"><img src="<?php echo THUMB_URL . $category['thubnail_name']; ?>" alt=""></a>
                                            </div>
                                            <a href="watch.php?id=<?php echo $id ?>" class="title"><?php echo $video_title ?></a>
                                            <a class="channel-name" href="watch.php?id=<?php echo $id ?>"><?php echo $channel_name; ?><span>
                                                    <i class="fa fa-check-circle"></i></span></a>
                                        </div>
                                        <!-- // video item -->
                                    <?php } ?>
                                </div>
                            </div><!-- // col-md-4 -->
                            <!-- // Related Posts -->
                            </div><!-- // row -->
                            </div>
                            <?php include "footer.php"; ?>

                            <script type="text/javascript">
                                 function follow(video_id, user_id)
                                {
                                  
                                    var video_id = video_id;
                                    var user_id = user_id;
                                    //alert(likes);
                                    $.ajax({
                                        type: "POST",
                                        url: 'follow.php',
                                        data: {video_id: video_id,user_id: user_id},
                                        success: function () {
                                            //alert("in");
                                            location.reload();
                                            //alert( "Data Saved: " + msg ); //Anything you want
                                        }
                                    });
                                }
                                 function unfollow(video_id, user_id)
                                {
                                  
                                    var video_id = video_id;
                                    var user_id = user_id;
                                    //alert(likes);
                                    $.ajax({
                                        type: "POST",
                                        url: 'unfollow.php',
                                        data: {video_id: video_id,user_id: user_id},
                                        success: function () {
                                            //alert("in");
                                            location.reload();
                                            //alert( "Data Saved: " + msg ); //Anything you want
                                        }
                                    });
                                }

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





                                $('form').on('submit', function (e) {
                                    e.preventDefault();
                                    var comment = $("#Message").val();
                                    var video_id = $("#videoid").val();
                                    var user_id = $("#userid").val();
                                    alert(comment);
                                    alert(user_id);
                                    alert(video_id);


                                    $.ajax({
                                        url: 'comment.php',
                                        type: 'POST',
                                        data: {user_id: user_id, video_id: video_id, comment: comment},

                                        success: function (datas) {

                                            window.location = "watch.php?id=" + video_id;
                                        }
                                    });

                                });



                            </script>
