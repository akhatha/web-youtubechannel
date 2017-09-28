@include ('common.header')

<div id="all-output" class="col-md-10 upload">
    <div id="upload">
        <div class="row">
            <!-- upload -->
            <div class="col-md-8">
                <h1 class="page-title"><span>Upload</span> Video</h1>

                <form name="uploadVideo" id="uploadVideo" method="post" action="{{ action('HomeController@uploadvideo') }}" enctype="multipart/form-data"  >                 
                    {{ csrf_field() }}
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                    <div class="row">
                        <div class="alert alert-success alert-dismissible" id="formSuccess" role="alert" style="clear:both;display: none">

                        </div>
                        <div class="col-md-6">
                            <label>Post Title</label>
                            <input type="text" class="form-control"  name="title" placeholder="Post Title" required="" value="{{ old('title') }}">
                        </div>
                        <div class="col-md-6">
                            <label>Post Category</label>
                            <input type="text" class="form-control" name="category" placeholder="Post Category" required=""  value="{{ old('category') }}">
                        </div>
                        <div class="col-md-6">
                            <label>Post Tags</label>
                            <input type="text" class="form-control" name="tags" placeholder="Post Tags" required=""  value="{{ old('tags') }}">
                        </div>
                        <div class="col-md-6">
                            <label>Video upload</label>
                            <input id="upload_file" type="file"  class="file" name="video" required="" value="{{ old('video') }}">
                        </div>
                        <div class="col-md-12">
                            <label>Post Excerpt</label>
                            <textarea class="form-control" rows="4" name="post" placeholder="COMMENT" required="" value="{{ old('post') }}"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Post Featured Image</label>
                            <input id="featured_image" type="file" name="fImage" class="file" value="{{ old('fImage') }}">
                        </div>
                            <video id="my_video" controls>
                      
                            </video>
                <br />
                The Canvas
                <br />
                    <canvas id="thecanvas">
                    </canvas>
                        <script>
    
</script>
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
<script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/angular_functions.js') }}"></script>
<script src="http://malsup.github.com/jquery.form.js"></script> 


<script type="text/javascript">

$(document).ready(function () {

    $('#uploadVideo').ajaxForm({
        success: function (data) {
            result = data
            $("#formSuccess").show();
            $("html, body").animate({scrollTop: 0}, "slow");
            $(".help-block").html("");
            if (result.action == "new") {

                $("#formSuccess").html('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>\
      </button>\
      <strong><i class="fa fa-check-circle" aria-hidden="true"></i> Success! </strong>Your Application has been saved.');
                setTimeout(function () {
                    window.location.reload();
                }, 3000)

            }

        },
        error: function (data) {

        }
        //alert("Thank you for your comment!"); 
    });
     $('input[name="video"]').bind('change', function (e) {
            var filename = e. target. files[0]. name;
           var filenames = $('input[name="video"]').val();
           console.log(filename);
          var ext  = filenames.split('.')[1];
           console.log(ext);
            var size =  ($('input[name="video"]')[0].files[0].size / 1024);
            iSize = (Math.round((size / 1024) * 100) / 100);
           
          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
           //$("#my_video").html('<source src="'+ filename +'" type="video/mp4"></source>' );
        $.ajax({
            method: "POST",
            data: {"_token": "{{ CSRF_TOKEN() }}",video:filename,videoExt:ext},
            url: siteUrl + "/upload-video/getVideoName", //change url 
        })
               .done(function (msg) {
                    var data = $.parseJSON(msg);
                 console.log(data);
                });

        });
});
</script>

