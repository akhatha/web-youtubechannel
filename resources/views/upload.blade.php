@include ('common.header')
<style>
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid blue;
        border-bottom: 16px solid blue;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }
</style>
<div id="all-output" class="col-md-10 upload">
    <div id="upload">
        <div class="row">
            <!-- upload -->
            <div class="col-md-8">
                <h1 class="page-title"><span>Upload</span> Video</h1>
                <div class="loader" ></div>
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
                        <video width="320" height="240" controls id="video">
                            <source src="http://localhost/youtubechannel/storage/app/uploads/image/videos/test1234.mp4" type="video/mp4">
                        </video>
                        <canvas id="canvas" 
                                width="750px" height="540px"
                                style="display:none;">
                        </canvas>

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
    $('.loader').css('visibility', 'hidden');
    $('#uploadVideo').ajaxForm({
         beforeSubmit : function(arr, $form, options){
             thumbImageCreate(); 
         },
        success: function (data) {
            result = data
            $("#formSuccess").show();
            $("html, body").animate({scrollTop: 0}, "slow");
            $(".help-block").html("");
            if (result.action == "new") {
                // console.log(result.value);

               
                $("#formSuccess").html('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>\
      </button>\
      <strong><i class="fa fa-check-circle" aria-hidden="true"></i> Success! </strong>Your Application has been saved.');
                /*   setTimeout(function () {
                 window.location.reload();
                 }, 3000)*/

            }

        },
        error: function (data) {

        }
        //alert("Thank you for your comment!"); 
    });
    /*$('input[name="video"]').bind('change', function (e) {
        var filename = e.target.files[0].name;
        var filenames = $('input[name="video"]').val();
        console.log(filename);
        var ext = filenames.split('.')[1];
        console.log(ext);
        var size = ($('input[name="video"]')[0].files[0].size / 1024);
        iSize = (Math.round((size / 1024) * 100) / 100);

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        //$("#my_video").html('<source src="'+ filename +'" type="video/mp4"></source>' );
        $.ajax({
            method: "POST",
            data: {"_token": "{{ CSRF_TOKEN() }}", video: filename, videoExt: ext},
            url: siteUrl + "/upload-video/getVideoName", //change url 
        })
                .done(function (msg) {
                    var data = $.parseJSON(msg);
                    console.log(data);
                });

    });*/
});
function thumbImageCreate() {

    var time = 15;
    var scale = 1;
    var video_obj = null;
    // $('.selector').append('<video width="320" height="240" controls id="video1" style="display:none"><source src="'+ value +'"></video>');
    // var a = $("#video1").attr("src");
//console.log("ss"+a);
    //console.log("ss"+ss);
//document.write('<video width="320" height="240" controls id="video1" style="display:none"><source src="'+ value +'"></video>');
    var time = 15;
    var scale = 1;

    var video_obj = null;

    var time = 15;
    var scale = 1;

    var video_obj = null;

    document.getElementById('video').addEventListener('loadedmetadata', function () {
        this.currentTime = time;
        video_obj = this;

    }, false);

    document.getElementById('video').addEventListener('loadeddata', function () {
        var video = document.getElementById('video');

        var canvas = document.createElement("canvas");
        canvas.width = video.videoWidth * scale;
        canvas.height = video.videoHeight * scale;
        canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);

        var img = document.createElement("img");
        var thumb = canvas.toDataURL();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        //$("#my_video").html('<source src="'+ filename +'" type="video/mp4"></source>' );
        $.ajax({
            method: "POST",
            data: {"_token": "{{ CSRF_TOKEN() }}", thumb: thumb },
            url: siteUrl + "/upload-video/getVideoName", //change url 
        })
                .done(function (msg) {
                    var data = $.parseJSON(msg);
                    console.log(data);
                });



        img.src = canvas.toDataURL();
        


        video_obj.currentTime = 0;

    }, false);




}
function thumbs(canvasData) {
    console.log(canvasData);
}
</script>

