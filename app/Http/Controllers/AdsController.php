<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function showAllAds(){
    	return view('ads.home');
    }
}
