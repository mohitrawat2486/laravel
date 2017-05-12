<?php
namespace App\Http\Controllers;
use App\url;
use Validator;
use Illuminate\Http\Request;

class url_shortner extends Controller
{
    public function getUrl(Request $request)
	{
		
		$url = $request->input('url');
		
		//Validate the url
		$validator = Validator::make(array('url'=>$url), array('url'=>'required|url'));
		
		
		if($validator->fails())
		{
			return redirect('/')->withErrors($validator); 
		}	
		else 
		{
			//If the url is already is in table return it
			$record = url::whereurl($url)->first();
						
			if($record){
				return view('home.result')->with('shortened',$record->shortened);
			}	
			//otherwise add a new row, and returned the shortened url
			$urlObj = new url;
			$urlObj->url = $url;
			$urlObj->shortened = url::get_unique_short_url();
			if($urlObj->save())
			{
				return view('home.result')->with('shortened',$urlObj->shortened);
			}	
		}
		
		//Create A result view,and present the shortened url	
	}
	
	public function urlProcess (Request $request)
	{
		$shortenedUrl = $request->any;
		
		//Query the db for the row with that short url
		$row = url::whereshortened($shortenedUrl)->first();
		
		//if not found redirect to home page
		if(is_null($row)) return redirect('/');
		
		//otherwise fetch the url and redirect
		return redirect($row->url);
	}
	
	public function index()
	{
		echo "hii";
	}
	
	
}
