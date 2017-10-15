<?php
include "header.php";
include('/function.php');
//include('/config.php');

$val = $_GET['category'];
$getChannnelDetails = mysql_query("SELECT * FROM `_category`");

while ($row = mysql_fetch_assoc($getChannnelDetails)) {
    $catName = $row['category_name'];
    //$catId = $row['category_id'];
    if ($catName == $val) {
        $catId = $row['category_id'];
    }
}
?>

<div id="all-output" class="col-md-10">
    <!-- Category Cover Image -->

    <!-- // Category Cover Image -->

    <!-- category -->
    <div id="category">
        <div class="row">
            <!-- // col-md-2 -->

            <div class="col-md-12">

                <div class="row">
<?php
$limit = 12;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
};
$start_from = ($page - 1) * $limit;

$getcategory = mysql_query("SELECT * FROM `uploaded_videos` u LEFT JOIN _category c on 
    u.category_id=c.category_id  left join users us on u.`channel_id`=us.id where category_name='$val' LIMIT $start_from, $limit");

while ($rows = mysql_fetch_assoc($getcategory)) {
    //print_r($rows);
    $video_title = $rows['video_title'];
    $id = $rows['video_id'];
    $user_id = $rows['id'];
    $video_duration = $rows['video_duration'];
    $video_title = $rows['video_title'];
    $channel_name = $rows['channel_name'];


    $getsubscriber = mysql_query("SELECT count(*) as count FROM `subscription` WHERE `channel_id`=$user_id");
    while ($getsubscribe = mysql_fetch_assoc($getsubscriber)) {
        $subscribers = $getsubscribe['count'];
    }
    ?>
                        <!-- Chanels Item -->
                        <!-- <div class="col-md-3">
                             <div class="chanel-item">
                                 
                                 <div class="chanel-info">
                                     <a class="title" href="#">Rabie Elkheir</a>
                                     <span class="subscribers">436,414 subscribers</span>
                                 </div>
                                 
                             </div>
                          </div>-->
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="video-item">
                                <div class="thumb">
                                    <div class="hover-efect"></div>
                                    <small class="time"><?php echo $video_duration ?></small>
                                    <a href="watch.php?id=<?php echo $id ?>"><img src="<?php echo THUMB_URL . $rows['thubnail_name']; ?>" alt=""></a>
                                </div>
                                <div class="video-info">
                                    <a href="watch.php?id=<?php echo $id ?>" class="title"><?php echo $video_title ?></a>
                                    <a class="channel-name" href="watch.php?id=<?php echo $id ?>"><?php echo $channel_name ?><span></a>
                                    <span class="subscribers"><?php echo $subscribers ?> subscribers</span>
                                  <!--  <i class="fa fa-check-circle"></i></span></a>
                            <span class="views"><i class="fa fa-eye"></i>2.8M views </span>
                            <span class="date"><i class="fa fa-clock-o"></i>5 months ago </span>-->
                                </div>
                            </div>
                        </div>
                        <!-- // Chanels Item -->

<?php } ?>
                </div><!-- // row -->




            </div>


        </div><!-- // row -->
    </div>
    <!-- // category -->
    <?php
    $limit = 12;
    $sql = "SELECT COUNT(*) as count FROM `uploaded_videos` u LEFT JOIN _category c on 
    u.category_id=c.category_id  left join users us on u.`channel_id`=us.id where category_name='$val'";
    $rs_result = mysql_query($sql);
    while ($rows = mysql_fetch_assoc($rs_result)) {
        $total_records = $rows['count'];
        $total_pages = ceil($total_records / $limit);
        $pagLink = "<nav><ul class='pagination'>";
        for ($i = 1; $i <= $total_pages; $i++) {
            $pagLink .= "<li><a href='category_videos.php?category=" . $val . "&page=" . $i . "'>" . $i . "</a></li>";
        };
        echo $pagLink . "</ul></nav>";
    }
    ?>
</div>




</div>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery.sticky-kit.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/grid-blog.min.js"></script>



</html>

