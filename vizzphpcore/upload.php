<?php
ob_start();
include "header.php";
include('function.php');
//include('config.php');

if (isset($_POST['video_submit'])) {

    $email = $_SESSION['username'];
   
    $channelId = $_SESSION['user_id'];

    $target_dir = "uploads/videos/";
    $video = '';

    if (isset($_FILES["fileToUpload"]["name"])) {
        $date = date('Y-m-d');
        $videoExt = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
        $size = $_FILES["fileToUpload"]['size'];
        $file_size = number_format($size / 1048576, 2); //get video size
        $name = $_POST["pTitle"];
        $catSelect = $_POST["catSelect"];
        $time = $_POST["f_du"]; //get video time duration
        $temp = explode(".", $_FILES["fileToUpload"]["name"]);
        $newfilename = time() . '_' . rand(100, 999) . '.' . end($temp);
        $fileName = $newfilename;
        $target_file = $target_dir . "" . $fileName;
        $videoupload = uploadFile($target_file); //upload a file if file doesnot exist
        $url = SITE_URL . "uploads/videos/" . $fileName;

        $VideoUrl = $fileName;

        $data = array(
            'channel_id ' => $channelId,
            'category_id' => $catSelect,
            'video_title' => $name,
            'video_name' => $VideoUrl,
            'video_type' => $videoExt,
            'video_duration' => $time,
            'mb_used' => $file_size,
            'status' => 0,
            'created_date' => $date,
        );
        $getuploaLimit = mysql_query("SELECT SUM(`mb_used`) as total_mb FROM `uploaded_videos` WHERE `channel_id`='$channelId' AND `created_date` ='$date'");
        while ($rows = mysql_fetch_assoc($getuploaLimit)) {

            $totalMb = $rows['total_mb'];
        }
         $getuploaLimit = mysql_query("SELECT value FROM `config` WHERE `name`='video_name'");
        while ($upload = mysql_fetch_assoc($getuploaLimit)) {

            $totalval = $upload['value'];
        }
        
        if ($totalMb < $totalval) {
			
            $result = dbRowInsert('uploaded_videos', $data);
            if ($result) {
                $mess = "<div class='alert alert-success fade in' id='success'>
						<strong>Success!</strong> Sucessfully Inserted.
						</div>";
                header("Refresh: 1;upload.php");
            } else {
                $mess = "<div class='alert alert-danger fade in' id='success'>
										<strong>Danger! </strong> Something went wrong, go back and try again!
										</div>";
                header("Refresh: 1;upload.php");
				
            }
            $last_id = mysql_insert_id();
			$saveHistory = array(
            'video_id' => $last_id,
            'channel_id' => $channelId,
            
        );
			//dbRowInsert('history', $saveHistory);
        } else {
            $mess = "<div class='alert alert-danger fade in' id='success'>
										<strong>Danger! </strong>... Your upload limit exceeded ...
										</div>";
            header("Refresh: 1;upload.php");
        }
    }
	
}

?>


<input type="hidden" name="hiddenId" id="hiddenId" value="<?php echo $last_id; ?>">
<?php if(isset($videoExt) =='mp4' || isset($videoExt) =='MP4'){?>
<video width="320" height="240" controls id="video" style="display:none">
    <source src="<?php echo $url; ?>" type="video/mp4">
</video>
<?php }?>
<?php if(isset($videoExt) =='ogv' ||isset($videoExt) =='ogg'){?>
<video width="320" height="240" controls id="video" style="display:none">
    <source src="<?php echo $url; ?>" type="video/ogg">
</video>
<?php }?>
<?php if(isset($videoExt) =='webm' || isset($videoExt) =='WEBM'){?>
<video width="320" height="240" controls id="video" style="display:none">
    <source src="<?php echo $url; ?>" type="video/webm">
</video>
<?php }?>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> 
<script type="text/javascript">

    var time = 15;
    var scale = 1;

    var video_obj = null;

    document.getElementById('video').addEventListener('loadedmetadata', function () {
        this.currentTime = time;
        video_obj = this;

    }, false);

    document.getElementById('video').addEventListener('loadeddata', function () {
        var video = document.getElementById('video');

        var canvas = document.createElement("canvas");
        canvas.width = 250;
        canvas.height = 150;
        canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
        canvasData = canvas.toDataURL("image/png");
        thumb(canvasData);
        video_obj.currentTime = 0;
    }, false);

    function thumb(canvasData)
    {
        var siteUrl = "<?php echo SITE_URL; ?>";

        var thumb = canvasData;
        var id = document.getElementById('hiddenId').value;
        $.post(
                siteUrl + "createthumb.php",
                {name: thumb, id: id},
                function (data) {

                }
        );
    }


</script>
<div id="all-output" class="col-md-10 upload">
    <div id="upload">
        <div class="row">
            <!-- upload -->
            <div class="col-md-8">
                <h1 class="page-title"><span>Upload</span> Video</h1>
                <div class="mess" ><?php
if (isset($mess)) {
    echo $mess;
}
?></div>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-6">
                            <label>Post Title</label>
                            <input name="pTitle" required="" type="text" class="form-control" placeholder="Post Title">
                        </div>
                        <div class="col-md-6">
                            <label>Post Category</label>

                            <select required=""  class="form-control select2me  CCHasDefault "  id="changeEvent" name="catSelect" required>
                                <option id="select_inst" select="selected" value="">-----please select option------</option>
                                <?php
                                $getCatList = displayResult('_category', 'category_id');

                                foreach ($getCatList as $row) {
                                    ?>
                                    <option  value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <!-- <div class="col-md-6">
                             <label>Post Tags</label>
                             <input name="pTag" required="" type="text" class="form-control" placeholder="Post Tags">
                         </div>-->
                        <div class="col-md-6">
                            <label>Video upload</label>
                            <input type="file" name="fileToUpload" id="fileToUpload"  accept="video/*">
                        </div>
                        <input type="hidden" name="f_du" id="f_du" size="5" /> 
                        <!-- <div class="col-md-12">
                             <label>Post Excerpt</label>
                             <textarea name="pComment" required="" class="form-control" rows="4"  placeholder="COMMENT"></textarea>
                         </div>-->

                        <div class="col-md-6">
                            <button type="submit" name="video_submit" id="video_submit" class="btn btn-dm">Save your post</button>
                        </div>
                    </div>
                </form>
                <audio id="audio" style="display:none"></audio>

            </div><!-- // col-md-8 -->

            <div class="col-md-4">
                <a href="#"><img src="images/upload-adv.png" alt=""></a>
            </div><!-- // col-md-8 -->
            <!-- // upload -->
        </div><!-- // row -->
    </div><!-- // upload -->
</div>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery.sticky-kit.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/grid-blog.min.js"></script>
<script>
// Code to get duration of audio /video file before upload - from: http://coursesweb.net/
//register canplaythrough event to #audio element to can get duration
    var f_duration = 0;  //store duration
    document.getElementById('audio').addEventListener('canplaythrough', function (e) {
        fh_duration = parseInt(e.currentTarget.duration / 3600);
        fm_duration = parseInt(e.currentTarget.duration % 3600 / 60);
        fs_duration = Math.round(e.currentTarget.duration % 3600 % 60);
        document.getElementById('f_du').value = fh_duration + "." + fm_duration + "." + fs_duration;
        URL.revokeObjectURL(obUrl);
    });

//when select a file, create an ObjectURL with the file and add it in the #audio element
    var obUrl;
    document.getElementById('fileToUpload').addEventListener('change', function (e) {
        var file = e.currentTarget.files[0];
        //check file extension for audio/video type
        if (file.name.match(/\.(avi|mp3|mp4|wmv|mpeg|ogg|flv)$/i)) {
            obUrl = URL.createObjectURL(file);
            document.getElementById('audio').setAttribute('src', obUrl);
        }
    });
</script>
</body>

</html>
