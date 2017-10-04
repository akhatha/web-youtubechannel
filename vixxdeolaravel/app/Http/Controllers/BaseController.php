<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use DB;

/**
 * 	File Name:		DashboardController
 * 	Description:		Dashboard related functions
 * 	Created By:		
 * 	Created Date:		14-July-2017
 * 	Last Modified By:	
 * 	Last Modified Date:	25-July-2017
 * 	Change Log:		V 1.0 - Initial Version

 * 	
 */
class BaseController extends Controller {

    public function index() {
		return view('index');
	}
}
