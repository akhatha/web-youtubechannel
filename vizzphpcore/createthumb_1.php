<?php


//file for creating video thumb and updating into databse
	include('function.php');
	include('config.php');
	$id=$_POST['id'];
	$thumb_image=$_POST['name'];

	$data = str_replace('data:image/png;base64,', '', $thumb_image);
	$data = str_replace(' ', '+', $data);
	$data = base64_decode($data);
	$uniqueImage=uniqid() . '.png';
	$file = 'uploads/thumb_video/'.$uniqueImage ;
	$success = file_put_contents($file, $data);
	$thumImageUrl=SITE_URL."uploads/thumb_video/".$uniqueImage;
	$thumImage=$uniqueImage;
	$data=array("thubnail_name"=>$thumImage );
	updateVideo("uploaded_videos",$data,$id);

?>