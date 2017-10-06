<?php
include('../config.php');
$video_id=$_POST['id'];
$videoStatus=$_POST['status'];
$qry = "UPDATE uploaded_videos SET status='$videoStatus' WHERE video_id=$video_id";
$result=mysql_query($qry);
if(isset($result)) {
   echo "YES";
} else {
   echo "NO";
}
?>