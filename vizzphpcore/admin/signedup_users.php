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
                <div class="panel-heading">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        <a class="closebox"><i class="fa fa-times"></i></a>
                    </div>
                   
                </div>
                <div class="panel-body">
                <table id="example2" class="table table-striped table-bordered table-hover">
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
										<tr data-user-id=<?php echo $row['id']?>>
										<?php
											   echo '<td class="hidden-xs">'.$row['id'].'</td>
											   <td class="hidden-xs">'.$row['first_name'].'</td>
											   <td class="hidden-xs">'.$row['last_name'].'</td>
											   <td class="hidden-xs">'.$row['email'].'</td>
											   <td class="hidden-xs">'.$row['mobile'].'</td>
											  <td> <form method="get" class="form-horizontal"><div ><label class="col-sm-6 control-label">Select</label>
											<div class="col-sm-6"><select class="form-control m-b" name="account">
												<option>Activate</option>
												<option>Deactivate</option>
												
											</select>
											</div>
										</div>
										</form></td>
								  
										</tr>';
										$i++;
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

