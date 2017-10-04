<?php 
include "common/header.php";
include('function.php');
include('../config.php');



if(isset($_POST['save_category']))
{
	$catid=$_POST['catid'];
	$result='';
	$categoryName=null;
	$mess=null;
	$color=null;
	$categoryName=$_POST['category'];
	$existInstitue=getName("_category","category_name",$categoryName);
	if($existInstitue && (!$catid))//checking institution_name already exist or not
	{
		$mess="<div class='alert alert-danger fade in' id='success'>
						<strong>Danger! </strong> Category Name Already Exist!
						</div>";
	}
	else
	{
		$data=array(
						'category_name '=>$categoryName,
						
					);
					if($catid)//if Id already exist update institute data
					{
							$result=updateName("_category",$data,$catid);	
							$mess="<div class='alert alert-success fade in' id='success'>
									<strong>Success!</strong> Updated Successfully.
									</div>";
										//header("Refresh: 1;category.php");
					}
					else
					{
							$result=dbRowInsert("_category",$data);//if Id already doesnot exist insert data	
							$mess="<div class='alert alert-success fade in' id='success'>
									<strong>Success!</strong> Sucessfully Inserted.
									</div>";
									//header("Refresh: 1;category.php");
					}
	
		if(empty($result))
		{
			$mess="<div class='alert alert-danger fade in' id='success'>
						<strong>Danger! </strong> Something went wrong, go back and try again!
						</div>";
						header("Refresh: 1;category.php");
		}
		
	}

}
if(isset($_POST['delete']))
{  
							
				
				$catId=$_POST['category_id'];
					
				$uId='';
				$query=mysql_query("SELECT * FROM _category WHERE category_id=$catId");
				while($row=mysql_fetch_array($query))
				{
					
					$uId=$row['category_id'];

				}
				if($uId)
				{
					echo $uId;
					$mess="<div class='alert alert-success fade in' id='success'>
					<a href='#' class='close' data-dismiss='alert'>&times;</a>
						<strong>Success! </strong> Sucessfully Deleted
						</div>";
						$query=mysql_query("DELETE FROM _category WHERE category_id =$uId");
						header("Refresh: 1;category.php");
				}
			
				else
				{
					echo $uId;
					$mess="<div class='alert alert-danger fade in' id='success'>
						<strong>Danger! </strong> Something went wrong, go back and try again!
						</div>";
						header("Refresh: 1;category.php");
				}
}
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
                            <span>Category</span>
                        </li>
                        
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    Category
                </h2>
                <small>Add category names</small>
            </div>
        </div>
    </div>


<div class="content">



    <div class="row">
        <div class="col-lg-12">
             <div class="hpanel">
               
                <div class="panel-body">
				<h2 class="font-light m-b-xs">
                    Add New Category Here
                </h2>
					<form method="POST">
					<input type="hidden" name="catid" id="catid" value="">
					<input type="text" class="form-control" placeholder="Add Category here" name="category"/><br/>
					<input type="submit"  class="btn btn-info" value="Save" name="save_category">
					</form>
				</div>
				
				</div>

            <div class="hpanel">
               
                <div class="panel-body">
			
				 <p class="text-danger text-center"><?php if(isset($mess)){echo $mess;}?></p>
                <table id="example2" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Category Name</th>
                    <th></th>
                    <th></th>
                    
                </tr>
                </thead>
                
				
				<tbody>
                     <?php
                          $table_name='_category';
                          $selectCategory=displayResult($table_name);
						  $i=1;
						  if($selectCategory)
						  {
                          foreach($selectCategory as $row)
                                {
								?>
										<tr data-user-id=<?php echo $row['category_id']?>>
										<?php
											   echo '<td class="hidden-xs">'.$row['category_name'].'</td>
											   <td align="center">
												<button type="button" class="btn  btn-info" value='.$row['category_id'].'><i class="fa fa-paste"></i> Edit</button>  </td>
												<td><form method="POST"><input type="hidden" name="category_id" value='.$row['category_id'].'><input type="submit" class="btn  btn-danger" value="delete" name="Delete"/> </form> </td>
								  
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