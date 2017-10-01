<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;

class LoginController extends Controller
{
    public function index(){
	
	return view('backend/login');
	}
	
	public function postLogin(Request $request){
		
		$data['email'] = $request->email;
		$data['password'] = $request->password;
		$checkuser = Login::user_exits($data);
		//dd($checkuser);
		if(isset($checkuser))
		{
		return view('backend/Category');
		}
		else
		{
			//echo 0;
			return redirect('vizzdeoadmin');
		}
		//return view('backend/Category');
	}
}
