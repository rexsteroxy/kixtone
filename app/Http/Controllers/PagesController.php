<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PagesController extends Controller
{
    
    public function getHome(){ 

    	return view('index');
    }
    public function getTrackPage()
    {
        return view('track');
    }
    public function getServicePage()
    {
        return view('services');
    }
    public function getAboutPage()
    {
        return view('about');
    }
    public function getContactPage()
    {
        return view('contact');
    }
}
