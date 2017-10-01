<?php include "header.php" ?>

        <div id="all-output" class="col-md-10 upload">
        	<div id="upload">
                <div class="row">
                    <!-- upload -->
                    <div class="col-md-8">
						<h1 class="page-title"><span>Upload</span> Video</h1>
						<form>
                        	<div class="row">
                            	<div class="col-md-6">
                                	<label>Post Title</label>
                                    <input type="text" class="form-control" placeholder="Post Title">
                                </div>
                            	<div class="col-md-6">
                                	<label>Post Category</label>
                                    <input type="text" class="form-control" placeholder="Post Category">
                                </div>
                            	<div class="col-md-6">
                                	<label>Post Tags</label>
                                    <input type="text" class="form-control" placeholder="Post Tags">
                                </div>
                            	<div class="col-md-6">
                                	<label>Video upload</label>
                                    <input id="upload_file" type="file" class="file">
                                </div>
                            	<div class="col-md-12">
                                	<label>Post Excerpt</label>
                                    <textarea class="form-control" rows="4"  placeholder="COMMENT"></textarea>
                                </div>
                            	<div class="col-md-6">
                                	<label>Post Featured Image</label>
                                    <input id="featured_image" type="file" class="file">
                                </div>
                            	<div class="col-md-6">
                                    <button type="button" id="contact_submit" class="btn btn-dm">Save your post</button>
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
