<?php
include('config.php');
include('function.php');
//print_r($_POST);
	$data=array('name'=>$_POST['username'],'email'=>$_POST['email'],'message'=>$_POST['message']
						
					);
$result=dbRowInsert("report",$data);
       sendReportMail($_POST['email'],'VIZZDEO',$_POST['message'],$_POST['username'] ,"Vizzdeo Report Mail");
?>