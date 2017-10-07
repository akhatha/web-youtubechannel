<?php
include('config.php');
include('function.php');
$video_id=$_POST['video_id'];
$liked_by=$_POST['liked_by'];
$likes=$_POST['likes'];
$query=mysql_query("DELETE FROM likes
WHERE video_id = $video_id and liked_by = $liked_by");
