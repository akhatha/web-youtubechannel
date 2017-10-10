<style>
.error{
	color:red;
}
</style>

<?php 
ob_start();

include('header.php');
include('function.php');
$user=$_SESSION['username'];
$getUserDetails = mysql_query("SELECT *  FROM users WHERE email = '$user'");
if($getUserDetails){
	
while ($row = mysql_fetch_assoc($getUserDetails)) {

        $first_name = $row['first_name'];
		$userId = $row['id'];
		$last_name = $row['last_name'];
		$channel_name = $row['channel_name'];
		$mobile = $row['mobile'];
		$email = $row['email'];
			
		  
    }
}
else
{
		$first_name = '';
		$last_name = '';
		$mobile = '';
		$channel_name='';
		$email ='';
}
if(isset($_POST['profile']))
{
	$user=trim($_POST['uName']);
	$fName=trim($_POST['fName']);
	$lName=trim($_POST['lName']);
	$email=trim($_POST['email']);
	$mobiles=trim($_POST['mobile']);
	$result= mysql_query("UPDATE users SET first_name='$fName' ,last_name='$lName',	mobile='$mobiles' WHERE email = '$email'");
	if($result)
	{
		$mess="<div class='alert alert-success fade in' id='success'>
						<strong>Success!</strong> Sucessfully Updated.
						</div>";
						header("Refresh: 1;myaccount.php");
	}
	else {
                $mess = "<div class='alert alert-danger fade in' id='success'>
										<strong>Danger! </strong> Something went wrong, go back and try again!
										</div>";
                header("Refresh: 1;myaccount.php");
            }
}
?>


        <div id="all-output" class="col-md-10">
   
  <div class="row">
    <div class="col-md-12">
      <div class="tabs-left">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#a" data-toggle="tab">View Profile</a></li>
          <li><a href="#b" data-toggle="tab">Edit Profile</a></li>
          <li><a href="#c" data-toggle="tab">Wallet</a></li>
          <li><a href="#d" data-toggle="tab">Change Password</a></li>
          <li><a href="logout.php" >Logout</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="a">
            <h3>These are your info</h3>
            <ul class="list-group pull-left col-md-4">
              <li class="list-group-item">
                <h4>First Name<span class="badge pull-right"><?php echo $first_name;?></span></h4>
              </li>
              <li class="list-group-item">
                 <h4>Last Name<span class="badge pull-right"><?php echo $last_name;?></span></h4>
              </li>
              <li class="list-group-item">
                <h4>User Name<span class="badge pull-right"><?php echo $channel_name;?></span></h4>
              </li>
              <li class="list-group-item">
                <h4>Email ID<span class="badge pull-right"><?php echo $email;?></span></h4>
              </li>
              <li class="list-group-item">
                <h4>Mobile<span class="badge pull-right"><?php echo $mobile;?></span></h4>
              </li>
            </ul>
          </div>
          <div class="tab-pane" id="b">
            <div class="post-comments single-comments">
                        	
                            


                        	<h3 class="post-box-title">Edit Your Comments</h3>
                            <form id="profileForm" method="post">
							<div id="mess"></div>
                               <input required="" id="fName" name="fName" required="" value="<?php echo $first_name;?>" type="text" class="form-control"  placeholder="YOUR FIRST NAME">
 <input name="lName"  id="lName"value="<?php echo $last_name;?>" required="" type="text" class="form-control"  placeholder="YOUR LAST NAME">
 <input name="uName" id="uName" value="<?php echo $channel_name;?>"readonly type="text" class="form-control" placeholder="YOUR USERNAME">
                               <input value="<?php echo $email;?>"name="email" readonly type="email" class="form-control" id="email" placeholder="EMAIL">
                               <input value="<?php echo $mobile;?>"name="mobile" id="mobile"required="" type="text" class="form-control" placeholder="MOBILE NUMBER">
                               <button type="submit" id="profile" name="profile" class="btn btn-dm"> Submit</button>                          </form>
                        </div>
          </div>
          <div class="tab-pane" id="c">
<div class="row">

				<div class="col-md-4">
<h1 class="error-no">CONGRATULATIONS!!</h1><br/>
<?php
$getwalletDetails = mysql_query("SELECT sum(wallet_amount) as amount  FROM wallet WHERE channel_id = '$userId'");
if(isset($getwalletDetails)){
while ($wallet = mysql_fetch_assoc($getwalletDetails)) {
	$amounts=$wallet['amount'];
}
}
else
{
	$amounts='';
}

?>
<h2 class="error-text">Your Wallet is having $<?php echo $amounts;?></h2>
                </div><!-- // col-md-4 -->

</div>
        </div><!-- /tab-content -->
    <div class="tab-pane" id="d">
            <div class="post-comments single-comments">
                        	
                            


                        	<h3 class="post-box-title">Change Password</h3>
                            <form id="changePasswordForm" method="post">
							<div id="pmess"></div>
                               <input required name="pass" id="pass" type="password" class="form-control"  placeholder="NEW PASSWORD">
 <input required name="cPass" id="cPass"type="password" class="form-control"  placeholder="CONFIRM NEW PASSWORD">
                               <button type="submit" id="changePassword" class="btn btn-dm">SUBMIT</button>
                           </form>
                        </div>
          </div>
      </div><!-- /tabbable -->
    </div><!-- /col -->
  </div><!-- /row -->

		</div>
      </div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery.sticky-kit.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/grid-blog.min.js"></script>
<!-- jQuery for Reaction system -->
		<script type="text/javascript" src="js/reaction.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>	
		<script type="text/javascript">
		// A $( document ).ready() block.
$( document ).ready(function() {
    $("#profile").click(function(){
		 $("#profileForm").submit(function(e) {
    e.preventDefault();
});
    $("#profileForm").validate();
	 var isValid =$("#profileForm").valid();
	 if(isValid){
		var siteUrl = "<?php echo SITE_URL; ?>";

        var uName = $('#uName').val();
		var fName = $('#fName').val();
		var lName = $('#lName').val();
		var email = $('#email').val();
		var mobile = $('#mobile').val();
        $.post(
                siteUrl + "updateprofile.php?action=updateprofiles",
                {uName: uName, fName: fName, lName: lName, email: email, mobile: mobile},
                function (mess) {
		if(mess == 1){
			 $("#mess").html('');
			 $("#mess").fadeIn();
		 $("#mess").append("<div class='alert alert-success'><strong>Success! Sucessfully Updated</strong></div>");
		 
		   setTimeout(function(){ $('#mess').fadeOut() }, 1000);
		    
		}
		if(mess == 0){
			$("#mess").html('');
			 $("#mess").fadeIn();
			 $("#mess").append("<div class='alert alert-danger '><strong>Danger! Something went wrong, go back and try again!</strong></div>");
			  setTimeout(function(){ $('#mess').fadeOut() }, 1000);
			  
		}
                }
        );	
	 }
	
});


   $("#changePassword").click(function(){
	   $("#changePasswordForm").submit(function(e) {
    e.preventDefault();
});
    $("#changePasswordForm").validate();
	 var isValid =$("#changePasswordForm").valid();
	 if(isValid){
		var siteUrl = "<?php echo SITE_URL; ?>";

        var pass = $('#pass').val();
		var cPass = $('#cPass').val();
		 if (pass != cPass) {
			  $("#pmess").html('');
			 $("#pmess").fadeIn();
		 $("#pmess").append("<div class='alert alert-warning'><strong>warning! Passwords do not match.</strong></div>");
		 
		   setTimeout(function(){ $('#pmess').fadeOut() }, 1000);
		    
		 }
		 else
		 {
        $.post(
                siteUrl + "updateprofile.php?action=changepassword",
                {pass: pass, cPass: cPass},
                function (mess) {
		if(mess == 1){
			 $("#pmess").html('');
			 $("#pmess").fadeIn();
		 $("#pmess").append("<div class='alert alert-success'><strong>Success! Sucessfully Changed password</strong></div>");
		 
		   setTimeout(function(){ $('#pmess').fadeOut() }, 1000);
		    
		}
		if(mess == 0){
			$("#pmess").html('');
			 $("#pmess").fadeIn();
			 $("#pmess").append("<div class='alert alert-danger '><strong>Danger! Something went wrong, go back and try again!</strong></div>");
			  setTimeout(function(){ $('#pmess').fadeOut() }, 1000);
			  
		}
                }
        );
	 }	
	 return true;
	 }	 
	
});
});
		</script>
    </body>

</html>
