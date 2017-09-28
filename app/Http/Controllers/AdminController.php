<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
	
	return view('backend/category');
	
	}
	 public function getRevenueMonthly(){
	
	return view('backend/revenuemonthly');
	
	}
	
}
