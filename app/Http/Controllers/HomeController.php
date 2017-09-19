<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    public function upload()
    {
          return view('upload');
    }
    
    public function uploadvideo(Request $request)
    {
        $requests=$request->all();
     print_r($requests); 
    // get file from input data
    $file             = $requests->file('video');
echo $file;
exit;
    // get file type
    //$extension_type   = $request->file('video')->getClientMimeType();
    
    // set storage path to store the file (actual video)
    $destination_path = base_path() . '/public/uploads';
   /* $fileName = uniqid() . '.' .
                $request->file('Resume')->getClientOriginalExtension();
        $avoCareer->resume = $fileName;
        if ($request->file('Ceb')) {
            $fileNames = uniqid() . '.' .
                    $request->file('Ceb')->getClientOriginalExtension();


            $avoCareer->CEB_score = $fileNames;
        }
        $avoCareer->save();


        $request->file('Resume')->move(
                base_path() . '/public/uploads/resume', $fileName
        );
        if ($request->file('Ceb')) {
            $request->file('Ceb')->move(
                    base_path() . '/public/uploads/ceb', $fileNames
            );
        }*/

    // get file extension
    //$extension        = $file->getClientOriginalExtension();


    $timestamp        = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
    $file_name        = $timestamp;
    
    //$upload_status    = $file->move($destination_path, $file_name);   
    $upload_status    = $requests->file('video')->move(base_path() . '/public/uploads/video', $file_name);

    if($upload_status)
    {
      // file type is video
      // set storage path to store the file (image generated for a given video)
      $thumbnail_path   = base_path() . '/images';

      $video_path       = $destination_path.'/'.$file_name;

      // set thumbnail image name
      $thumbnail_image  = $fb_user_id.".".$timestamp.".jpg";
      
      // set the thumbnail image "palyback" video button
      $water_mark       = base_path() . '/watermark/p.png';

      // get video length and process it
      // assign the value to time_to_image (which will get screenshot of video at that specified seconds)
      $time_to_image    = floor(($data['video_length'])/2);


      $thumbnail_status = Thumbnail::getThumbnail($video_path,$thumbnail_path,$thumbnail_image,$time_to_image);
      if($thumbnail_status)
      {
        echo "Thumbnail generated";
      }
      else
      {
        echo "thumbnail generation has failed";
      }
    }
        exit;
    }
    }

