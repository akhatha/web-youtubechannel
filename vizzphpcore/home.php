<?php
//session_start();
include('header.php');
//include('config.php');
include('function.php');
?>
<?php //echo $_SESSION['username'];   ?>
<div id="all-output" class="col-md-10">
    <h1 class="new-video-title"><i class="fa fa-bolt"></i> Trending</h1>
    <div class="row">
        <?php
        $getcategory = mysql_query("SELECT *,u.video_id,count(*) FROM `uploaded_videos` u LEFT JOIN likes c on u.video_id=c.video_id left join users us on u.`channel_id`=us.id where created_date between '2017-10-01' and '2017-10-31' GROUP by c.`video_id` ORDER BY count(*) DESC LIMIT 0,4");
        while ($rows = mysql_fetch_assoc($getcategory)) {
            //$video_title = $rows['video_title'];
            $id = $rows['video_id'];
            $video_duration = $rows['video_duration'];
            $video_title = $rows['video_title'];
            $channel_name = $rows['channel_name'];
                        $created_date = $rows['created_date'];
                        $views= mysql_query("SELECT count(*) as count FROM `history` WHERE `video_id`=$id");
while ($viewss = mysql_fetch_assoc($views)) {
     $view = $viewss['count'];
}

            ?>
            <!-- video-item -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="video-item">
                    <div class="thumb">
                        <div class="hover-efect"></div>
                        <small class="time"><?php echo $rows['video_duration']; ?></small>
                        <a href="watch.php?id=<?php echo $id?>"><img src="<?php echo THUMB_URL . $rows['thubnail_name']; ?>" alt=""></a>
                    </div>
                    <div class="video-info">
                        <a href="watch.php?id=<?php echo $id?>" class="title"><?php echo $rows['video_title']; ?></a>
                        <a class="channel-name" href="watch.php?id=<?php echo $id?>"><?php echo $rows['channel_name']; ?><span>
                                <i class="fa fa-check-circle"></i></span></a>
                        <span class="views"><i class="fa fa-eye"></i><?php echo format($view) ?> views </span>
                        <span class="date"><i class="fa fa-clock-o"></i><?php echo time_elapsed_string($created_date);?></span>
                    </div>
                </div>
            </div>
            <!-- // video-item -->

        <?php } ?>

    </div><!-- // row -->

    <?php
    $limit = 5;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
};
$start_from = ($page - 1) * $limit;
    $getChannnelDetails = mysql_query("SELECT * FROM `_category` LIMIT $start_from, $limit");

    while ($row = mysql_fetch_assoc($getChannnelDetails)) {
        $catName = $row['category_name'];
        //$catId = $row['category_id'];
        $catId = $row['category_id'];
        ?>
        <h1 class="new-video-title"><i class="fa fa-soccer-ball-o"></i> <?php echo $catName; ?></h1>
        <div class="row">
            <?php
            $getcategory = mysql_query("SELECT * FROM `uploaded_videos` u LEFT JOIN _category c on 
    u.category_id=c.category_id  left join users us on u.`channel_id`=us.id where category_name='$catName' LIMIT 0,4");

            while ($rows = mysql_fetch_assoc($getcategory)) {
                //print_r($rows);
                $video_title = $rows['video_title'];
                $id = $rows['video_id'];
                $video_duration = $rows['video_duration'];
                $video_title = $rows['video_title'];
                $channel_name = $rows['channel_name'];
                 $created_date = $rows['created_date'];
                                       $views= mysql_query("SELECT count(*) as count FROM `history` WHERE `video_id`=$id");
while ($viewss = mysql_fetch_assoc($views)) {
     $view = $viewss['count'];
}

                ?>
                <!-- video-item -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="video-item">
                        <div class="thumb">
                            <div class="hover-efect"></div>
                            <small class="time"><?php echo $video_duration; ?></small>
                            <a href="watch.php?id=<?php echo $id?>"><img src="<?php echo THUMB_URL . $rows['thubnail_name']; ?>" alt=""></a>
                        </div>
                        <div class="video-info">
                            <a href="watch.php?id=<?php echo $id?>" class="title"><?php echo $video_title; ?></a>
                            <a class="channel-name" href="#"><?php echo $channel_name; ?><span>
                                    <i class="fa fa-check-circle"></i></span></a>
                            <span class="views"><i class="fa fa-eye"></i><?php echo format($view) ?> views </span>
                            <span class="date"><i class="fa fa-clock-o"></i><?php echo time_elapsed_string($created_date);?></span>
                        </div>
                    </div>
                </div>
                <!-- // video-item -->


            <?php } ?>
        </div><!-- // row -->




    <?php } ?>

     <?php
    $limit = 5;
    $sql = "SELECT COUNT(*) as count FROM _category";
    $rs_result = mysql_query($sql);
    while ($rows = mysql_fetch_assoc($rs_result)) {
        $total_records = $rows['count'];
        $total_pages = ceil($total_records / $limit);
        $pagLink = "<nav><ul class='pagination'>";
        for ($i = 1; $i <= $total_pages; $i++) {
            $pagLink .= "<li><a href='home.php?page=" . $i . "'>" . $i . "</a></li>";
        };
        echo $pagLink . "</ul></nav>";
    }
    ?>

</div>
<?php include('footer.php'); ?>

