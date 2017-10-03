<?php
ob_start();
include('header.php');
include('function.php');
include('config.php');
$user=$_SESSION['username'];
$getUserDetails = mysql_query("SELECT *  FROM users WHERE email = '$user'");
if($getUserDetails){
	
while ($row = mysql_fetch_assoc($getUserDetails)) {

        $first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$mobile = $row['mobile'];
		  
    }
}
else
{
		$first_name = '';
		$last_name = '';
		$mobile = '';
}

if(isset($_POST['profile']))
{
	$user=$_SESSION['username'];
	$pass=trim($_POST['pass']);
	$cpass=trim($_POST['cPass']);
	$fName=trim($_POST['fName']);
	$lName=trim($_POST['lName']);
	$mobiles=trim($_POST['mobile']);
	
	if($pass != $cpass)
	{
		$mess="<div class='alert alert-danger fade in' id='success'>
						<strong>Danger! </strong> Passwords do not match!
						</div>";
						header("Refresh: 1;edit_profile.php");
						
	}
	$result= mysql_query("UPDATE users SET password = MD5('$pass'),	first_name='$fName' ,		last_name='$lName',	mobile='$mobiles' WHERE email = '$user'");
	if($result)
	{
		$mess="<div class='alert alert-success fade in' id='success'>
						<strong>Success!</strong> Sucessfully Updated.
						</div>";
						header("Refresh: 1;edit_profile.php");
	}
	else {
                $mess = "<div class='alert alert-danger fade in' id='success'>
										<strong>Danger! </strong> Something went wrong, go back and try again!
										</div>";
                header("Refresh: 1;edit_profile.php");
            }
	
}
?>
<div id="all-output" class="col-md-10 upload">
    <div id="upload">
        <div class="row">
            <!-- upload -->
            <div class="col-md-8">
                <h1 class="page-title"><span>Edit</span> Profile</h1>
                <div class="mess" ><?php
if (isset($mess)) {
    echo $mess;
}
?></div>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-6">
                            <label>First Name</label>
                            <input name="fName"  value="<?php echo $first_name;?>"required="" type="text" class="form-control" placeholder="First Name">
                        </div>
						 <div class="col-md-6">
                            <label>Last Name</label>
                            <input name="lName"  value="<?php echo $last_name;?>"required="" type="text" class="form-control" placeholder="Last Name">
                        </div>
						 <div class="col-md-6">
                            <label>Chnage Password</label>
                            <input name="pass" type="text" required=""class="form-control" placeholder="Chnage Password">
                        </div>
						
						 <div class="col-md-6">
                            <label>Confirm Password</label>
                            <input name="cPass"  type="text" required=""class="form-control" placeholder="Confirm Password">
                        </div>
						
						 <div class="col-md-6">
                            <label>Email</label>
                            <input name="email" value="<?php echo $_SESSION['username']?>" type="email" class="form-control" placeholder="abc@abc.com" readonly>
                        </div>
						
						 <div class="col-md-6">
                            <label>Mobile Number</label>
                            <input name="mobile" required="" value="<?php echo $mobile;?>" type="text" class="form-control" placeholder="9898787878">
                        </div>
						
                        
                        <div class="col-md-6">
                            <button type="submit" name="profile" id="profile" class="btn btn-dm">Save your post</button>
                        </div>
                    </div>
                </form>
               

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
</body>

</html>
