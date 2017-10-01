<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UploadVideos;
use App\model\Upload;
use FFMpeg\FFMpeg;
use Lakshmaji\Thumbnail;
use Image;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home');
    }

    public function trending() {
       
        return view('three_sixty_video');
    }
    
    public function history() {
       
        return view('history');
    }
    
     public function edit_profile()
     {
        return view('edit_profile');
    }
    
    
    public function upload() {

        return view('upload');
    }
    
    
    public function videoupload()
    {
         return view('videoupload');
    }
    
    public function videouploadaction(Request $request)
    {
        print_r($request->all());
         $file = $request->file('video');
          $file_name=  $file->getClientOriginalName();
        //$file_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_name);
        $extension = $file->getClientOriginalExtension(); //get the extetension 
       $thumbnail_path   = base_path() . '/public/uploads/images';

     //$path  = base_path() . '/public/uploads/video/'.$file_name.'.'.$extension;
      
               $upload_status= $file->move(
                        base_path() . '/public/uploads/video', $file_name.".".$extension
                );

        //$path = 'uploads/videos/' . $file_name . "" . Carbon::now()->timestamp . "." . $extension;
        
        $paths = base_path() . '/public/uploads/images/';
$width='100';
        $height='100';
// creating a canvas
$canvas = Image::canvas($width, $height);


$image = Image::make($paths,$upload_status)->resize($width, $height, 
    function ($constraint) {
        $constraint->aspectRatio();
});

$canvas->insert($image, 'center');

// pass the full path. Canvas overwrites initial image with a logo
$canvas->save($paths . $file_name . ".png");
    }

    /** upload video and generating thumbnail
     * 
     * @param Request $request
     * return type
     * 
     */
    public function uploadvideo(Request $request) {
        // echo Auth::user()->id;exit;
        /* $getchannelId = DB::table('channel_details')->where("user_id", "=", Auth::user()->id)->first();


          $this->validate($request, [
          'title' => 'required',
          'tags' => 'required',
          'category' => 'required',
          'video' => 'required',
          'post' => 'required',
          ]);
          $action = "new";
          $file = $request->file('video');
          // get file type
          $extension_type = $file->getClientMimeType();

          // set storage path to store the file (actual video)
          $destination_path = storage_path() . '/uploads';

          // get file extension
          $extension = $file->getClientOriginalExtension();


          $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
          $file_name = $timestamp . "." . $extension;

          $upload_status = $file->move($destination_path, $file_name);

          if ($upload_status) {
          // file type is video
          // set storage path to store the file (image generated for a given video)
          $thumbnail_paths = storage_path() . '/images';

          $video_path = $destination_path . '/' . $file_name;

          // set thumbnail image name
          $thumbnail_image = $timestamp . ".jpg";
          $thumbnail_path = $thumbnail_paths . '/' . $thumbnail_image;
          // set the thumbnail image "palyback" video button
          $water_mark = storage_path() . '/watermark/p.png';

          // get video length and process it
          // assign the value to time_to_image (which will get screenshot of video at that specified seconds)
          $time_to_image = 1;

          $thumb = new Thumbnail\Thumbnail;
          $thumbnail_status = $thumb->getThumbnail($video_path, $thumbnail_path, $thumbnail_image, $time_to_image);
          if ($thumbnail_status) {
          echo "Thumbnail generated";
          } else {
          echo "thumbnail generation has failed";
          }
          }

          exit; */
        $action = "new";
        $file_name = $request->video->getClientOriginalName();
        $size = $request->video->getSize();
        $file_size = number_format($size / 1048576, 1);
        $file_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_name);
        $extension = $request->video->extension(); //get the extetension 
        $video_path = $request->video->storeAs('uploads/image/videos', $file_name . "" . Carbon::now()->timestamp . "." . $extension);
 $value = $video_path;
       /* $saveVideoData["channel_id"] = $getchannelId->channel_id;
        $saveVideoData["category_id"] = 1;
        $saveVideoData["video_name"] = $video_path;
        $saveVideoData["video_type"] = $extension;
        $saveVideoData["mb_used"] = $file_size;
        $value = $video_path;
        Upload::add($saveVideoData); //inserted videos */
        /* $id = DB::getPdo()->lastInsertId();
          // $getVideoPath = Upload::select('video_name')->where('channel_id', '=', $getchannelId->channel_id)->first();
          // $video_path = $getVideoPath->video_name;
          // dd($video_path); */
        return Response::json(array(
                    'success' => TRUE,
                    'errors' => 'Video Uploaded sucessfully',
                    'action' => $action,
                    'value' => $value,
                        ), 200);
    }

    /**
     * 
     * @param Request $request
     * 
     */
    public function getVideoName(Request $request) {
        dd($request->all());
        $file_name = $request->video;

        $file_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_name);
        $extension = $request->videoExt; //get the extetension 
        $video_path = 'uploads/image/videos/' . $file_name . "" . Carbon::now()->timestamp . "." . $extension;
        //$video_path = $request->video->storeAs('uploads/image/videos', $file_name . "" . Carbon::now()->timestamp . "." . $extension);
        dd($video_path);
        echo json_encode($video_path);
    }

    public function videotest() {
        $filename = 'test.mp4';
        $frame = 10;
        $thumbnail = 'thumbnail.png';
        $mov = new FFMpeg($filename);
        $frame = $mov->getFrame($frame);
        if ($frame) {
            $gd_image = $frame->toGDImage();
            if ($gd_image) {
                imagepng($gd_image, $thumbnail);
                imagedestroy($gd_image);
                echo '<img src="' . $thumbnail . '">';
            }
        }
    }

}
