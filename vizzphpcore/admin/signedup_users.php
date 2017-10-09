<?php 
include "common/header.php";
include('function.php');
include('../config.php');
?>
<!-- Main Wrapper -->
<div id="wrapper">

    <div class="normalheader ">
        <div class="hpanel">
            <div class="panel-body">
                <a class="small-header-action" href="">
                    <div class="clip-header">
                        <i class="fa fa-arrow-up"></i>
                    </div>
                </a>

                <div id="hbreadcrumb" class="pull-right m-t-lg">
                    <ol class="hbreadcrumb breadcrumb">
                        <li><a href="index.html">Dashboard</a></li>
                        <li>
                            <span>Users</span>
                        </li>
                        
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    Users
                </h2>
                <small>Add Users names</small>
            </div>
        </div>
    </div>


<div class="content">



    <div class="row">
        <div class="col-lg-12">
            

            <div class="hpanel">
               
                <div class="panel-body">
                <table id="signup_users" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>FirstName</th>
                    <th>LastNmae</th>
                    <th>Email</th>
                     <th>Mobile Number</th>
					   <th></th>
                </tr>
                </thead>
				<tbody>
                     <?php
                          $table_name='users';
                          $selectCategory=displayResult($table_name);
						  $i=1;
						  if($selectCategory)
						  {
                          foreach($selectCategory as $row)
                                {
								?>
										<tr data-user-id=<?php echo $row['id']?> id="<?php echo $row['id']?>">
										<td class="hidden-xs"><?php echo $row['first_name']?></td>
											   <td class="hidden-xs"><?php echo $row['last_name']?></td>
											   <td class="hidden-xs"><?php echo $row['email']?></td>
											   <td class="hidden-xs"><?php echo $row['mobile']?></td>
											   
											  <td> <form method="get" class="form-horizontal"><div >
											<div class="col-sm-6">
											<select id="status<?php echo $row['id']?>" class="form-control m-b " name="account" onchange="saveChanges(<?php echo $row['id']?>)">
											
											<option value="">Select</option>
												<option <?php if($row['status']==1)  {
												echo 'Selected'; 
												}?> value="1">Activate</option>
												<option <?php if($row['status']==0)  {
												echo 'Selected'; 
												}?> value="0">Deactivate</option>
												
											</select>
											</div>
										</div>
										</form></td>
								  
										</tr>
								<?php		$i++;
                               }
							   }
							   
							   ?>
                            
                </tbody>
                </table>

                </div>
            </div>
        </div>

    </div>
    </div>

    <!-- Footer-->
    <footer class="footer">
        <span class="pull-right">
          @coyright 2017
        </span>
    </footer>

</div>

<?php include "common/footer.php" ?>
<script type="text/javascript">

function saveChanges(userid){
	
	var userstatus= document.getElementById('status'+userid).value;
	// alert(userstatus);
	
    $.ajax({
        url: 'statusupdate.php',
		type:'POST',
        data: {status:userstatus,id:userid},
        cache: false,
        error: function(e){
            alert(e);
        },
        success: function(data){
            //A response to say if it's updated or not
              location.reload();
        }
    });   
}
</script>

