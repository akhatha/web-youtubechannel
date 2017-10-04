<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UploadVideos;
use App\model\Upload;
use FFMpeg\FFMpeg;
use Thumbnail;
use Image;


/**
 * -----------------------------------------------------------------------------
 *   ThumbnailTest - a class illustarting the usage og Thumbnail package 
 * -----------------------------------------------------------------------------
 * This class having the functionality to upload a video file 
 * and generate corresponding thumbnail
 *
 * @since    1.0.0
 * @version  1.0.0
 * @author   lakshmaji <lakshmajee88@gmail.com>
 */
class ThumbnailTest extends Controller
{
  public function testThumbnail(Request $request)
  {
    // get file from input data
    $file             = $request->file('video');

    // get file type
   // $extension_type   = $file->getClientMimeType();
    
    // set storage path to store the file (actual video)
    //$destination_path = storage_path().'/uploads';

    // get file extension
    $extension        = $file->getClientOriginalExtension();


    $timestamp        = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
    $file_name        = $timestamp.'.'.$extension;
    
               $upload_status= $file->move(
                        base_path() . '/public/uploads/video/', $file_name
                );
    //$upload_status    = $file->move($destination_path, $file_name);         

    if($upload_status)
    {
      // file type is video
      // set storage path to store the file (image generated for a given video)
      $thumbnail_path   = base_path() . '/public/uploads/images/';

      $video_path       = base_path() . '/public/uploads/video/'.$file_name;

      // set thumbnail image name
      $thumbnail_image  = $timestamp.".jpg";
      
      // set the thumbnail image "palyback" video button
     // $water_mark       = storage_path().'/watermark/p.png';

      // get video length and process it
      // assign the value to time_to_image (which will get screenshot of video at that specified seconds)
      //$time_to_image    = floor(($data['video_length'])/2);


      $thumbnail_status = Thumbnail::getThumbnail($video_path,$thumbnail_path,$thumbnail_image);
      
      if($thumbnail_status)
      {
        echo "Thumbnail generated";
      }
      else
      {
        echo "thumbnail generation has failed";
      }
    }
  }
}
// end of class ThumbnailTest
// end of file ThumbnailTest.php  
