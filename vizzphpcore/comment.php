<?php

include('/config.php');
//print_r($_POST);
$comment=$_POST['comment'];
$video_id=$_POST['video_id'];
$user_id=$_POST['user_id'];
 $created_date=date('Y-m-d H:i:s');
$sql = "INSERT INTO comment
    (video_id,comment,user_id,created_date)
    VALUES($video_id,'$comment',$user_id,'$created_date')";
$query = mysql_query($sql);
echo 'success';
?>
