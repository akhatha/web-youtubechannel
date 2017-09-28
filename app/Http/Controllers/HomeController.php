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

    public function upload() {
       
        return view('upload');
    }

    /** upload video and generating thumbnail
     * 
     * @param Request $request
     * return type
     * 
     */
    public function uploadvideo(Request $request) {
       // echo Auth::user()->id;exit;
        $getchannelId = DB::table('channel_details')->where("user_id", "=", Auth::user()->id)->first();

       
        $this->validate($request, [
            'title' => 'required',
            'tags' => 'required',
            'category' => 'required',
            'video' => 'required',
            'post' => 'required',
        ]);
        $action="new";
        $file_name = $request->video->getClientOriginalName();
        $size = $request->video->getSize();
        $file_size = number_format($size / 1048576, 1);
        $file_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_name);
        $extension = $request->video->extension(); //get the extetension 
        $video_path = $request->video->storeAs('uploads/image/videos', $file_name . "" . Carbon::now()->timestamp . "." . $extension);
       
        $saveVideoData["channel_id"] =$getchannelId->channel_id;
        $saveVideoData["category_id"] =1;
        $saveVideoData["video_name"] = $video_path;
        $saveVideoData["video_type"] = $extension;
        $saveVideoData["mb_used"] = $file_size;
        Upload::add($saveVideoData);//inserted videos 
        $id = DB::getPdo()->lastInsertId();
        $getVideoPath=Upload::select('video_name')->where('channel_id','=',$getchannelId->channel_id)->first();
        $video_path= $getVideoPath->video_name;
        dd($video_path);
        return Response::json(array(
                        'success' => TRUE,
                        'errors' => 'Video Uploaded sucessfully',
                        'action' => $action
                            ), 200);
        
       
        
    }

    /**
     * 
     * @param Request $request
     * 
     */
    public function getVideoName(Request $request) {
      
        $file_name = $request->video;
       
        $file_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_name);
        $extension = $request->videoExt; //get the extetension 
        $video_path = 'uploads/image/videos/'.$file_name."".Carbon::now()->timestamp . "." .$extension;
        //$video_path = $request->video->storeAs('uploads/image/videos', $file_name . "" . Carbon::now()->timestamp . "." . $extension);
        dd($video_path);
        echo json_encode($video_path);
        
    }

}
