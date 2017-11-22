<?php
include "header.php";
include('function.php');
//include('/config.php');

 $user_id = $_SESSION['user_id'];
?>
<!-- // history-output -->
<div id="all-output" class="col-md-10">
    <div id="history">

        <h1 class="title">Subscribed channel videos</h1>

        <div class="filter">
            <div class="row">
                <div class="col-md-8">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#watch-history">Watch history</a></li>
                        <!--  <li><a data-toggle="tab" href="#search-history">Search history</a></li>
                          <li><a data-toggle="tab" href="#comments">Comments</a></li>-->
                    </ul>
                </div><!-- // col-md-8 -->
               
            </div><!-- // row -->
        </div><!-- // filter -->

        <div class="tab-content">

            <div id="watch-history" class="tab-pane fade in active">

                <div class="row">
<?php 
 $limit = 12;
                    if (isset($_GET["page"])) {
                        $page = $_GET["page"];
                    } else {
                        $page = 1;
                    };
                    $start_from = ($page - 1) * $limit;

$getChannnelDetails = mysql_query("SELECT channel_id FROM subscription where subscribed_user_id=$user_id");

while ($row = mysql_fetch_assoc($getChannnelDetails)) {
   
     $id[] = $row['channel_id'];
}

$ids = join(",",$id); 
//print_r($ids);
                        $views = mysql_query("SELECT * FROM `uploaded_videos` c JOIN users u ON u.id = c.`channel_id` WHERE c.`channel_id` IN($ids) LIMIT $start_from, $limit");
                        while ($viewss = mysql_fetch_assoc($views)) {
                            $view = $viewss['video_id'];
                            $created_date = $viewss['created_date'];
                       
    ?>



                        <!-- video-item -->
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="video-item">
                                <div class="thumb">
                                    <div class="hover-efect"></div>
                                    <small class="time">10:53</small>
                                    <a href="watch.php?id=<?php echo $viewss['video_id']?>"><img src="<?php echo THUMB_URL . $viewss['thubnail_name']; ?>" alt=""></a>
                                </div>
                                <div class="video-info">
                                    <a href="watch.php?id=<?php echo $viewss['video_id']?>" class="title"><?php echo $viewss['video_title'] ?></a>
                                    <a class="channel-name" href="watch.php?id=<?php echo $viewss['video_id']?>"><?php echo $viewss['channel_name'] ?><span>
                                            <i class="fa fa-check-circle"></i></span></a>
                                    <span class="views"><i class="fa fa-eye"></i><?php echo format($view) ?> views </span>
                                    <span class="date"><i class="fa fa-clock-o"></i><?php echo time_elapsed_string($created_date); ?></span>
                                </div>
                            </div>
                        </div>
                        <!-- // video-item -->
                  <?php  } ?>

                </div>

            </div><!-- // watch-history -->

            <!-- <div id="search-history" class="tab-pane fade">

             </div>

             <div id="comments" class="tab-pane fade">

             </div>-->

        </div><!-- // tab-content -->

    </div><!-- // history -->
       <?php
    $limit = 12;
    $sql = mysql_query("SELECT * FROM `uploaded_videos` c JOIN users u ON u.id = c.`channel_id` WHERE c.`channel_id` IN($ids)");
     $total_records=mysql_num_rows($sql);

    
    
        $total_pages = ceil($total_records / $limit);
        $pagLink = "<nav><ul class='pagination'>";
        if($total_records>10)
        {
        for ($i = 1; $i <= $total_pages; $i++) {
            $pagLink .= "<li><a href='subscribedchannel.php?page=" . $i . "'>" . $i . "</a></li>";
        };
        }
        echo $pagLink . "</ul></nav>";
    
    ?>
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
