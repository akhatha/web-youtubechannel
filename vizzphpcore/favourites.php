<?php
include "header.php";
include('/function.php');
//include('/config.php');

  $user_id = $_SESSION['user_id'];
?>
<!-- // history-output -->
<div id="all-output" class="col-md-10">
    <div id="history">

        <h1 class="title">favourites</h1>

        <div class="filter">
            <div class="row">
                <div class="col-md-8">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#watch-history">Watch favourites</a></li>
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
<?php $limit = 12;
                    if (isset($_GET["page"])) {
                        $page = $_GET["page"];
                    } else {
                        $page = 1;
                    };
                    $start_from = ($page - 1) * $limit;

$getChannnelDetails = mysql_query("SELECT * FROM `uploaded_videos` u LEFT JOIN likes c on u.video_id=c.video_id left join users us on u.`channel_id`=us.id where c.liked_by=$user_id LIMIT $start_from, $limit");

while ($row = mysql_fetch_assoc($getChannnelDetails)) {
    $created_date = $row['created_date'];
     $id = $row['video_id'];
                        $views = mysql_query("SELECT count(*) as count FROM `history` WHERE `video_id`=$id");
                        while ($viewss = mysql_fetch_assoc($views)) {
                            $view = $viewss['count'];
                        }
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
                                    <span class="views"><i class="fa fa-eye"></i><?php echo format($view) ?> views </span>
                                    <span class="date"><i class="fa fa-clock-o"></i><?php echo time_elapsed_string($created_date); ?></span>
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
      <?php
    $limit = 12;
    $sql = mysql_query("SELECT * FROM `uploaded_videos` u LEFT JOIN likes c on u.video_id=c.video_id left join users us on u.`channel_id`=us.id where c.liked_by=$user_id");
     $total_records=mysql_num_rows($sql);

    
    
        $total_pages = ceil($total_records / $limit);
        $pagLink = "<nav><ul class='pagination'>";
        for ($i = 1; $i <= $total_pages; $i++) {
            $pagLink .= "<li><a href='favourites.php?page=" . $i . "'>" . $i . "</a></li>";
        };
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
