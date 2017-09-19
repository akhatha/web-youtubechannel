@include ('common.header')
<div id="all-output" class="col-md-10 upload">
        	<div id="upload">
                <div class="row">
                    <!-- upload -->
                    <div class="col-md-8">
						<h1 class="page-title"><span>Upload</span> Video</h1>
						<form action="upload-video" method="post" enctype="multipart/form-data">
                                                     {{ csrf_field() }}
                        	<div class="row">
                            	<div class="col-md-6">
                                	<label>Post Title</label>
                                    <input type="text" class="form-control"  name="title" placeholder="Post Title">
                                </div>
                            	<div class="col-md-6">
                                	<label>Post Category</label>
                                    <input type="text" class="form-control" name="category" placeholder="Post Category">
                                </div>
                            	<div class="col-md-6">
                                	<label>Post Tags</label>
                                    <input type="text" class="form-control" name="tags" placeholder="Post Tags">
                                </div>
                            	<div class="col-md-6">
                                	<label>Video upload</label>
                                    <input id="upload_file" type="file" name="file" class="file" name="video">
                                </div>
                            	<div class="col-md-12">
                                	<label>Post Excerpt</label>
                                    <textarea class="form-control" rows="4" name="post" placeholder="COMMENT"></textarea>
                                </div>
                            	<div class="col-md-6">
                                	<label>Post Featured Image</label>
                                    <input id="featured_image" type="file" name="iamge" class="file">
                                </div>
                            	<div class="col-md-6">
                                    <button type="submit" id="contact_submit" class="btn btn-dm">Save your post</button>
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
		@include ('common.footer')