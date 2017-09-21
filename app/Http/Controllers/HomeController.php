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
     //   dd($request->all());
        $uniqueName = (integer) microtime(); // For unique naming vaideo/poster
        echo "$uniqueName" . $uniqueName;
        $videoSrc = "";
        $thumbnailSrc = "";
        $file = $request->file('video');
         $fileName = $uniqueName.'.'. $file->getClientOriginalExtension();
       // $destinationPath = $request->video->storeAs('uploads/video', $file_name . "" . Carbon::now()->timestamp . "." . $extension);

        //  $file = $request->video;
        echo "files" . $fileName;
        /*   $action = "new";
          return Response::json(array(
          'success' => TRUE,
          'errors' => 'Appication Saved!',
          'action' => $action
          ), 200); */
    }

}
