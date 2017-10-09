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
                     <th>Subscribed Channel Name</th>
					 <th>Amount</th>
					 <th></th> 
                </tr>
                </thead>
					<tbody>
                     <?php
                         $getRevenue=  displayMonthlyRevenue();
						  $i=1;
						  if($getRevenue)
						  {
                          foreach($getRevenue as $row)
                                {
								?>
										<tr data-user-id=<?php echo $row['subscription_id']?> id="<?php echo $row['subscription_id']?>">
										<td class="hidden-xs"><?php echo $row['first_name']?></td>
											   <td class="hidden-xs"><?php echo $row['email']?></td>
											   <td class="hidden-xs"><?php echo $row['channel_name']?></td>
											   <td class="hidden-xs"><?php echo $row['amount']?></td>
											   
											  <td> <form method="POST" class="form-horizontal"><div >
											<div class="col-sm-6">
							<select id="is_payed<?php echo $row['subscription_id']?>" class="form-control m-b " name="is_payed" onchange="savePay(<?php echo $row['subscription_id']?>,<?php echo $row['amount']?>,<?php echo $row['channel_id']?>,<?php echo $row['subscribed_user_id']?>)">
											
											<option value="">Select</option>
												<option <?php if($row['is_payed']==1)  {
												echo 'Selected'; 
												}?> value="1">YES</option>
												<option <?php if($row['is_payed']==0)  {
												echo 'Selected'; 
												}?> value="0">NO</option>
												
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

function savePay(subscriptionid,amount,channel_id,subscribed_user_id){
	
	var is_payed= document.getElementById('is_payed'+subscriptionid).value;
    $.ajax({
        url: 'revenuePay.php',
		type:'POST',
        data: {pay:is_payed,id:subscriptionid,wallet_amount:amount,videoChannel_id:channel_id,user_subscribed:subscribed_user_id},
        cache: false,
        error: function(e){
            alert(e);
        },
        success: function(data){
		console.log(data);
            //A response to say if it's updated or not
              // location.reload();
        }
    });   
}
</script>