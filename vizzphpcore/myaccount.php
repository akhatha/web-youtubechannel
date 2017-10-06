<?php include "header.php" ?>


        <div id="all-output" class="col-md-10">
   
  <div class="row">
    <div class="col-md-12">
      <div class="tabs-left">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#a" data-toggle="tab">View Profile</a></li>
          <li><a href="#b" data-toggle="tab">Edit Profile</a></li>
          <li><a href="#c" data-toggle="tab">Wallet</a></li>
          <li><a href="#d" data-toggle="tab">Change Password</a></li>
          <li><a href="#" >Logout</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="a">
            <h3>These are your info</h3>
            <ul class="list-group pull-left col-md-4">
              <li class="list-group-item">
                <h4>First Name<span class="badge pull-right">Liston S</span></h4>
              </li>
              <li class="list-group-item">
                 <h4>Last Name<span class="badge pull-right">Liston S</span></h4>
              </li>
              <li class="list-group-item">
                <h4>User Name<span class="badge pull-right">ListonS</span></h4>
              </li>
              <li class="list-group-item">
                <h4>Email ID<span class="badge pull-right">abcd@gmail.com</span></h4>
              </li>
              <li class="list-group-item">
                <h4>Mobile<span class="badge pull-right">1234567893</span></h4>
              </li>
            </ul>
          </div>
          <div class="tab-pane" id="b">
            <div class="post-comments single-comments">
                        	
                            


                        	<h3 class="post-box-title">Edit Your Comments</h3>
                            <form>
                               <input type="text" class="form-control"  placeholder="YOUR FIRST NAME">
 <input type="text" class="form-control"  placeholder="YOUR LAST NAME">
 <input type="text" class="form-control" id="Name" placeholder="YOUR USERNAME">
                               <input type="email" class="form-control" id="Email" placeholder="EMAIL">
                               <input type="text" class="form-control" placeholder="MOBILE NUMBER">
                               <button type="button" id="contact_submit" class="btn btn-dm">SUBMIT</button>
                           </form>
                        </div>
          </div>
          <div class="tab-pane" id="c">
<div class="row">

				<div class="col-md-4">
<h1 class="error-no">CONGRATULATIONS!!</h1><br/>
<h2 class="error-text">Your Wallet is having $35</h2>
                </div><!-- // col-md-4 -->

</div>
        </div><!-- /tab-content -->
    <div class="tab-pane" id="d">
            <div class="post-comments single-comments">
                        	
                            


                        	<h3 class="post-box-title">Change Password</h3>
                            <form>
                               <input type="text" class="form-control"  placeholder="NEW PASSWORD">
 <input type="text" class="form-control"  placeholder="CONFIRM NEW PASSWORD">
                               <button type="button" id="contact_submit" class="btn btn-dm">SUBMIT</button>
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
    </body>

</html>
