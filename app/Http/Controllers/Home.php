<?php
namespace App\Http\Controllers;
use App\url;
use Validator;
use Illuminate\Http\Request;

class Home extends Controller
{
	
	public function index(){
		return view('home.index');
	}
}