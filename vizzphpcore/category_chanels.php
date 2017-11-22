<?php
include "header.php";
include('/function.php');
//include('/config.php');?>
<div id="all-output" class="col-md-10">
    <!-- Category Cover Image -->
    <!-- // Category Cover Image -->
    <!-- category -->
    <div id="category">
        <div class="row">
            <!-- // col-md-2 -->
            <div class="col-md-12">
                <div class="row">
                    <!-- Chanels Item -->
                    <?php
                    $getChannnelDetails = mysql_query("SELECT * FROM `_category`");

                    while ($row = mysql_fetch_assoc($getChannnelDetails)) {
                        $catName = $row['category_name'];
                        //$catId = $row['category_id'];
                        $catId = $row['category_id'];
                       
                        
                        ?>
                    
                    
                        <div class="col-md-3">
                            <div class="chanel-item">
                                <div class="chanel-info">
                                    
                                   <a class="title" href="category_videos.php?category=<?php echo $catName ?>"><?php echo $catName; ?></a>                                   
                                </div>
                            </div>
                        </div>
                <?php } ?>                  
                </div><!-- // row -->
                <!-- Loading More Videos -->
               <!-- <div id="loading-more">
                    <i class="fa fa-refresh faa-spin animated"></i> <span>Loading more</span>
                </div>-->
                <!-- // Loading More Videos -->
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
</html>
