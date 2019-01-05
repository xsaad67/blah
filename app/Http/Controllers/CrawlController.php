<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte;

class CrawlController extends Controller
{
    
    public function index(){
    	$url = "https://www.thetoptens.com/songs/";
    	$crawler = Goutte::request('GET',$url);
    	
    }	
}
