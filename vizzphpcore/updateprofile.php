<?php
include('config.php');
	 $action=$_GET['action'];
	switch($action)
 {
		case 'updateprofiles': 
					updateprofilesUpdate();
		break;
		case'changepassword':
			changePasswordUpdate();
		break;

	default: 
					echo 'No action found';
		break;
	 }	

function updateprofilesUpdate(){	 
		$user=trim($_POST['uName']);
		$fName=trim($_POST['fName']);
		$lName=trim($_POST['lName']);
		$email=trim($_POST['email']);
		$mobiles=trim($_POST['mobile']);
		$result= mysql_query("UPDATE users SET first_name='$fName' ,last_name='$lName',	mobile='$mobiles' WHERE email = '$email'");
		
		if($result){
			$status= 1;
		}
		else
		{
			$status= 0;
		}
		
		echo $status;
		
		
}

function changePasswordUpdate(){
		session_start();
		 $user=$_SESSION['username'];
		$pass=trim($_POST['pass']);
		$cpass=trim($_POST['cPass']);
		
		$result= mysql_query("UPDATE users  SET password = MD5('$pass')WHERE email = '$user'");
		
		if($result){
			$status= 1;
		}
		else
		{
			$status= 0;
		}
		
		echo $status;
		
		
}

?>