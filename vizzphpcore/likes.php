<?php
include('config.php');
include('function.php');
$video_id=$_POST['video_id'];
$likes=$_POST['likes'];
$liked_by=$_POST['liked_by'];
$query=mysql_query("DELETE FROM likes
WHERE video_id = $video_id and liked_by = $liked_by");
$data=array('video_id '=>$video_id,'like_type'=>$likes,'liked_by'=>$liked_by);
dbRowInsert('likes', $data);
return 'ddff';
?>