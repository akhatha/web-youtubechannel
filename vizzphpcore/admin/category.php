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
// if(isset($_POST['delete']))
// {  

				// $catId=$_POST['category_id'];
					
				// $uId='';
				// $query=mysql_query("SELECT * FROM _category WHERE category_id=$catId");
				// while($row=mysql_fetch_array($query))
				// {
					
					// $uId=$row['category_id'];

				// }
				// if($uId)
				// {
					// echo $uId;
					// $mess="<div class='alert alert-success fade in' id='success'>
					// <a href='#' class='close' data-dismiss='alert'>&times;</a>
						// <strong>Success! </strong> Sucessfully Deleted
						// </div>";
						// $query=mysql_query("DELETE FROM _category WHERE category_id =$uId");
						// header("Refresh: 1;category.php");
				// }
			
				// else
				// {
					// echo $uId;
					// $mess="<div class='alert alert-danger fade in' id='success'>
						// <strong>Danger! </strong> Something went wrong, go back and try again!
						// </div>";
						// header("Refresh: 1;category.php");
				// }
// }
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
                        <li><a href="category.php">Dashboard</a></li>
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
                <table id="categoryTable" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Category Name</th>
                    <th></th>
                    <th></th>
                    
                </tr>
                </thead>
                
				
				<tbody>
                        <?php $table_name='_category';
                          $selectCategory=displayResult($table_name);
						  $i=1;
						  if($selectCategory)
						  {
                          foreach($selectCategory as $row)
                                {?>
                        <tr>
                            <td><?php echo $row['category_name']; ?></td>
                            <td class="text-center"><button class="btn btn-info  categoryupdate" type="button" data-toggle="modal"   title="Modify" data-catid="<?php echo $row['category_id']; ?>" data-categoryname="<?php echo $row['category_name']; ?>" ><span class="glyphicon glyphicon-pencil"></span></button></td>
                            <td class="text-center"><button data-toggle="modal"  class="btn btn-danger  categorydelete" data-catid="<?php echo $row['category_id']; ?>" title="Delete"><span class="glyphicon glyphicon-trash"></span></button></td>
                        </tr>
						
                        <?php $i++; }}?>

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
<!-- Modify Modal-->

<div class="modal fade modal-middle"  tabindex="-1" id="editModalCategory" role="dialog" style="display: none;">
    <div class="modal-dialog modal-md">

        <!-- Popup contents-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title">Edit Category</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-field-margin" id="categorylist">                             
                           
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="control-label" for="position">Category Name</label>
                                </div>
                                <input type="hidden"  id="category_id" name="category_id" class="category_id">
                                <div class="col-md-6">
                                    <input type="text" id="categoryModalname" name="category_name" class="form-control category" required class="category_name"><br>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>											

            </div>

            <div class="modal-footer">
                <button type="reset" id="edit_category" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
            </div>
        </div>

    </div>
</div>

<div class="clearfix"></div><br><br>
<!-- Delete Modal-->

<div class="modal fade modal-middle" id="delete" role="dialog" style="display: none;">
    <div class="modal-dialog modal-sm">

        <!-- Popup contents-->
        <div class="modal-content">
            <div class="modal-header delete-modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Delete Category</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="deletecat">
                           
                            <input type="hidden" name="catid" class="id" id="catid">
                            <p class="text-center">Are you sure want to delete this item?</p>
                        </form>
                    </div>

                </div>											

            </div>

            <div class="modal-footer">
                <button type="button" id="delete_category" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                <button type="reset" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
            </div>
        </div>

    </div>
</div>
<!-- /.Delete Modal-->
<?php include "common/footer.php" ?>

<script type="text/javascript">
$(document).ready(function () {
	$('#categoryTable').on('click', '.categorydelete', function () {
		var id = $(this).data('catid');
		
		$(".modal-body #catid").val(id);
		$('#delete').modal('show');
	});
	$('#categoryTable').on('click', '.categoryupdate', function () {
			var catid = $(this).data('catid');
			var catname = $(this).data('categoryname');
			$(".modal-body #categoryModalname").val(catname);
			$(".modal-body #category_id").val(catid);
			$('#editModalCategory').modal('show');
	});
	
$("#edit_category").click(function () {
	var categoryid = $('#category_id').val();
	var catname = $('#categoryModalname').val();
	$.ajax({
    type:'POST',
    url:'editCategory.php',
    data:{category_id:categoryid,category_name:catname},
    success: function(data){
         if(data=="YES"){
             alert("hiiiiiiiii");
         }else{
             alert("can't delete the row");
         }
		 $('#editModalCategory').modal('hide');
                location.reload();
    }
	});   
    });
	
$("#delete_category").click(function () {
	var categoryid = $('.id').val();
	$.ajax({
    type:'POST',
    url:'deleteCategory.php',
    data:{category_id:categoryid},
    success: function(data)
	{
		
         if(data=="YES"){
             // alert("hiiiiiiiii");
         }else{
             alert("can't delete the row");
         }
		 $('#editModalCategory').modal('hide');
                location.reload();
	}

    });
});

});
</script>
