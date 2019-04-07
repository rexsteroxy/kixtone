<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;

class PagesController extends Controller
{
    
    public function getHome(){ 

        $properties = Property::paginate(2);

    	return view('index',compact('properties'));
    }
    
}
