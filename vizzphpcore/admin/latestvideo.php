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
                            <span>Latest Video</span>
                        </li>
                        
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    Latest Video
                </h2>
                <small>latest uploded videos</small>
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
                    <th>Video Name</th>
                    <th>Link</th>
                    <th>Channel Name</th>
					<th></th>
                </tr>
                </thead>
				<tbody>
                     <?php
                          $getlatestVideo=  displayLatestVideos();
						  $i=1;
						  if($getlatestVideo)
						  {
                          foreach($getlatestVideo as $row)
                                {
								?>
										<tr data-user-id=<?php echo $row['video_id']?> id="<?php echo $row['video_id']?>">
											   <td class="hidden-xs"><?php echo $row['video_title']?></td>
											   <td class="hidden-xs"><a href="<?php echo SITE_URL ."/uploads/videos/" .$row['video_name']?>" target="_blank;"><?php echo $row['video_name']?></a></td>
											   <td class="hidden-xs"><?php echo $row['channel_name']?></td>
											  
											   
											  <td> <form method="get" class="form-horizontal"><div >
											<div class="col-sm-6">
											<select id="status<?php echo $row['video_id']?>" class="form-control m-b " name="status" onchange="saveVideoStatus(<?php echo $row['video_id']?>)">
											
											<option value="">Select</option>
												<option <?php if($row['status']==1)  {
												echo 'Selected'; 
												}?> value="1">Accept</option>
												<option <?php if($row['status']==0)  {
												echo 'Selected'; 
												}?> value="0">Reject</option>
												
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

function saveVideoStatus(userid){
	
	var videostatus= document.getElementById('status'+userid).value;
	//alert(userstatus);
	
    $.ajax({
        url: 'Videostatusupdate.php',
		type:'POST',
        data: {status:videostatus,id:userid},
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
