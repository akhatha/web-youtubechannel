<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use Carbon\Carbon;
use Response;

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
        $this->validate($request, [
            'title' => 'required',
            'tags' => 'required',
            'category' => 'required',
            'video' => 'required',
            'post' => 'required',
        ]);
        $file_name = $request->video->getClientOriginalName();
        $size = $request->video->getSize();
        $file_size = number_format($size / 1048576, 1);
        $file_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_name);
        $extension = $request->video->extension(); //get the extetension 
        $video_path = $request->video->storeAs('uploads/image/videos', $file_name . "" . Carbon::now()->timestamp . "." . $extension);
        $saveVideoData["video_name"] = $video_path;
        $saveVideoData["video_type"] = $extension;
        $saveVideoData["mb_used"] = $file_size;
    }

    /**
     * 
     * @param Request $request
     * 
     */
    public function getVideoName(Request $request) {
        $file_name = $request->video->getClientOriginalName();
        $size = $request->video->getSize();
        $file_size = number_format($size / 1048576, 1);
        $file_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_name);
        $extension = $request->video->extension(); //get the extetension 
        $video_path = $request->video->storeAs('uploads/image/videos', $file_name . "" . Carbon::now()->timestamp . "." . $extension);
        echo json_encode($video_path);
        
    }

}
