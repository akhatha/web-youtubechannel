<?php

namespace App\model;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'uploaded_videos';
    protected $primaryKey = 'video_id';
    protected $fillable = ['video_id', 'channel_id', 'category_id', 'video_name', 'video_type', 'mb_used'];
    public $timestamps = false;

    public static function add($data) {

        Upload::create($data);
    }

}
