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
                            <span>Revenue Montly</span>
                        </li>
                        
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    Revenue Montly
                </h2>
                <small>Check the  Montly revenues of the user</small>
            </div>
        </div>
    </div>

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            

            <div class="hpanel">
                
                <div class="panel-body">
                <table id="monthlyRevenue" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                     <th>Subscribed Channel NAme</th>
					 <th>Amount</th>
					   
                </tr>
                </thead>
               
                     <tbody>
				  <?php
							$getRevenue=  displayMonthlyRevenue();
							  $i=1;
							  if($getRevenue){
							    foreach($getRevenue as $row)
                                {
									?>
									<tr data-user-id=<?php echo $row['id']?>>
									<?php
											echo ' 
											<td class="hidden-xs">'.$row['first_name'].'</td>
											<td class="hidden-xs">'.$row['email'].'</td>
											<td class="hidden-xs">'.$row['channel_name'].'</td>
											<td class="hidden-xs">'.$row['amount'].'</td>
									 </tr>';
										$i++;
								}}
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