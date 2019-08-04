<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Parcel;
use Auth;

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
    public function getParcel(Request $request)
    {
        $keyword = $request->input('tracking_id');
        $parcels = Parcel::where('tracking_id', '=', $keyword)->get();
        return view('parcelview',compact('parcels'));
    }
}
