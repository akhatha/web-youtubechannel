<?php
ob_start();
include "header.php";
include('function.php');
//include('config.php');
?>



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


            <div class="col-md-9">

                <h1 class="new-video-title"><i class="fa fa-bolt"></i> Trending</h1>
                <div class="row">

                    <!-- video-item -->
                    <?php
                    $limit = 10;
                    if (isset($_GET["page"])) {
                        $page = $_GET["page"];
                    } else {
                        $page = 1;
                    };
                    $start_from = ($page - 1) * $limit;
                    $fromdate=date('Y-m-01');
                    $todate=date('Y-m-31');
                    $getcategory = mysql_query("SELECT *,u.video_id,count(*) FROM `uploaded_videos` u LEFT JOIN likes c on u.video_id=c.video_id left join users us on u.`channel_id`=us.id where created_date between '$fromdate' and '$todate' GROUP by c.`video_id` ORDER BY count(*) DESC LIMIT $start_from, $limit");
                    while ($rows = mysql_fetch_assoc($getcategory)) {
                        //$video_title = $rows['video_title'];
                        $id = $rows['video_id'];
                        $video_duration = $rows['video_duration'];
                        $video_title = $rows['video_title'];
                        $channel_name = $rows['channel_name'];
                        $created_date = $rows['created_date'];
                        $views = mysql_query("SELECT count(*) as count FROM `history` WHERE `video_id`=$id");
                        while ($viewss = mysql_fetch_assoc($views)) {
                            $view = $viewss['count'];
                        }
                        ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="video-item">
                                <div class="thumb">
                                    <div class="hover-efect"></div>
                                    <small class="time"><?php echo $rows['video_duration']; ?></small>



                                    <a href="watch.php?id=<?php echo $id ?>"><img src="<?php echo THUMB_URL . $rows['thubnail_name']; ?>" alt=""></a>
                                </div>
                                <div class="video-info">
                                    <a href="watch.php?id=<?php echo $id ?>" class="title"><?php echo $rows['video_title']; ?></a>
                                    <a class="channel-name" href="watch.php?id=<?php echo $id ?>"><?php echo $rows['channel_name']; ?><span>
                                            <i class="fa fa-check-circle"></i></span></a>
                                    <span class="views"><i class="fa fa-eye"></i><?php echo format($view) ?> views </span>
                                    <span class="date"><i class="fa fa-clock-o"></i><?php echo time_elapsed_string($created_date); ?></span>
                                </div>
                            </div>
                        </div>
                        <!-- // video-item -->

                        <?php
                    }
                    ?>




                </div><!-- // row -->



            </div>
            <!-- // category -->
     
        </div>
        
    </div>
           <?php
    $limit = 10;
    $sql = mysql_query("SELECT *  FROM `uploaded_videos` u LEFT JOIN likes c on u.video_id=c.video_id left join users us on u.`channel_id`=us.id where created_date between '$fromdate' and '$todate' GROUP by c.`video_id` ORDER BY count(*) DESC");
    $total_records=mysql_num_rows($sql);

    
    
        $total_pages = ceil($total_records / $limit);
        $pagLink = "<nav><ul class='pagination'>";
        for ($i = 1; $i <= $total_pages; $i++) {
            $pagLink .= "<li><a href='trending.php?page=" . $i . "'>" . $i . "</a></li>";
        };
        echo $pagLink . "</ul></nav>";
    
    ?>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery.sticky-kit.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/grid-blog.min.js"></script>

</body>

</html>
