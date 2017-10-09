<?php
include "header.php";
include('/function.php');
//include('/config.php');

 $user_id = $_SESSION['user_id'];
?>
<!-- // history-output -->
<div id="all-output" class="col-md-10">
    <div id="history">

        <h1 class="title">history</h1>

        <div class="filter">
            <div class="row">
                <div class="col-md-8">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#watch-history">Watch history</a></li>
                        <!--  <li><a data-toggle="tab" href="#search-history">Search history</a></li>
                          <li><a data-toggle="tab" href="#comments">Comments</a></li>-->
                    </ul>
                </div><!-- // col-md-8 -->
                <div class="col-md-4">
                    <div class="search-form">
                        <form id="search_history" action="#" method="post">
                            <input type="text" placeholder="Search here video posts..."/>
                            <input type="submit" value="Keywords" />
                        </form>
                    </div>
                </div><!-- // col-md-4 -->
            </div><!-- // row -->
        </div><!-- // filter -->

        <div class="tab-content">

            <div id="watch-history" class="tab-pane fade in active">

                <div class="row">
<?php $getChannnelDetails = mysql_query("SELECT * FROM uploaded_videos h join history u on h.`video_id`=u.video_id left join users us on us.id=u.channel_id where u.`channel_id`=$user_id");

while ($row = mysql_fetch_assoc($getChannnelDetails)) {
    ?>



                        <!-- video-item -->
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="video-item">
                                <div class="thumb">
                                    <div class="hover-efect"></div>
                                    <small class="time">10:53</small>
                                    <a href="watch.php?id=<?php echo $row['video_id']?>"><img src="<?php echo THUMB_URL . $row['thubnail_name']; ?>" alt=""></a>
                                </div>
                                <div class="video-info">
                                    <a href="watch.php?id=<?php echo $row['video_id']?>" class="title"><?php echo $row['video_title'] ?></a>
                                    <a class="channel-name" href="watch.php?id=<?php echo $row['video_id']?>"><?php echo $row['channel_name'] ?><span>
                                            <i class="fa fa-check-circle"></i></span></a>
                                    <span class="views"><i class="fa fa-eye"></i>2.8M views </span>
                                    <span class="date"><i class="fa fa-clock-o"></i>5 months ago </span>
                                </div>
                            </div>
                        </div>
                        <!-- // video-item -->
                    <?php } ?>

                </div>

            </div><!-- // watch-history -->

            <!-- <div id="search-history" class="tab-pane fade">

             </div>

             <div id="comments" class="tab-pane fade">

             </div>-->

        </div><!-- // tab-content -->

    </div><!-- // history -->
</div><!-- // history-output -->
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery.sticky-kit.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/grid-blog.min.js"></script>

</body>

</html>
