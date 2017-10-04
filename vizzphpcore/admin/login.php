<?php
include('function.php');
include('../config.php');

if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$userExist=user_exist($username,$password);//cheking user already exist or not
	$mess=null;
 
	
	if($userExist )
	{
		session_start();
		$_SESSION['username'] = $_POST['username'];
		header('Location:category.php');//if user exist it redirects to dashboard
		
	}
	else
	{
		$mess='user doesnot exist';
	}

	
}
session_start();

if(isset($_SESSION['username']))
{
	header('location:category.php');
}
?>


<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>Video  |Admin Panel</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->
  <!-- Vendor styles -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css">

</head>
<body class="fixed-navbar sidebar-scroll">

<!-- Simple splash screen-->
<div class="splash"> <div class="color-line"></div><div class="splash-title"><h1>Vizzdeo</h1>
<div class="spinner"> <div class="rect1"></div> <div class="rect2"></div> <div class="rect3"></div> <div class="rect4"></div> <div class="rect5"></div> </div> </div> </div>

<div class="color-line"></div>



<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md"><h1>Vizzdeo</h1>
                <h3>PLEASE LOGIN TO APP</h3>
            </div>
            <div class="hpanel">
                <div class="panel-body">
                        <form action="" id="loginForm" method="POST">
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="email" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">
                               
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                              
                            </div>
                          <input class="btn btn-success btn-block" type="submit" name="submit" value="Login" required>
                        </form>
					 <p class="text-danger text-center"><?php if(isset($mess)){echo $mess;}?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <strong>VIZZDEO</strong>  <br/> 2017 Copyright 
        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>