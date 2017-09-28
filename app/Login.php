<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Login extends Model
{

	protected $table = 'users';
    public static function user_exits($data) {
	
        $result = DB::table('users')->select('*')->where('email', '=', $data['email'])->where('password','=',md5($data['password']))->first();
		return $result;
		//exit;
        
    }
}
