<?php

namespace App\Http\Controllers\theme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PageController extends Controller
{
    
	public function index(){

       

		return view('index');
	}

}
