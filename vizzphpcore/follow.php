<?php
include('config.php');
include('function.php');
$video_id=$_POST['video_id'];
$user_id=$_POST['user_id'];
$query=mysql_query("DELETE FROM follow
WHERE video_id = $video_id and user_id = $user_id");
$data=array('video_id '=>$video_id,'user_id'=>$user_id);
dbRowInsert('follow', $data);
return 'ddff';
?>