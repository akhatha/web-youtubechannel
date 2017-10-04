<?php
include "header.php";
include('/function.php');
include('/config.php');
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
$getcategory = mysql_query("SELECT * FROM `uploaded_videos` u LEFT JOIN _category c on 
    u.category_id=c.category_id where category_name='$val'");

while ($rows = mysql_fetch_assoc($getcategory)) {
    //print_r($rows);
     $video_title = $rows['video_title'];
     $video_duration = $rows['video_duration'];
     $video_title = $rows['video_title'];
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
                                <a href="#"><img src="images/v3.png" alt=""></a>
                            </div>
                            <div class="video-info">
                                <a href="#" class="title"><?php echo $video_title ?></a>
                                <a class="channel-name" href="#">Rabie Elkheir<span>
                                        <span class="subscribers">436,414 subscribers</span>
                                      <!--  <i class="fa fa-check-circle"></i></span></a>
                                <span class="views"><i class="fa fa-eye"></i>2.8M views </span>
                                <span class="date"><i class="fa fa-clock-o"></i>5 months ago </span>-->
                            </div>
                        </div>
                    </div>
							<!-- // Chanels Item -->

							
                                                     <?php   } ?>


							
                            
							


							
                            
							


							
                            
							


							
                            
							



							
                            
							



							
                            
							


                        </div><!-- // row -->


                        <!-- Loading More Videos -->
                        <div id="loading-more">
                            <i class="fa fa-refresh faa-spin animated"></i> <span>Loading more</span>
                        </div>
                        <!-- // Loading More Videos -->

                    </div>


                </div><!-- // row -->
            </div>
            <!-- // category -->

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
