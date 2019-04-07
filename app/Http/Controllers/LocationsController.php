<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
class LocationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function location(){
        return view('locations.location');
    }

    public function addLocation(Request $request){
        $this->validate($request,[
            'location'=>'required'
        ]);
            $location = new Location;
            $location->location = $request->input('location');
            $location->save();
        return redirect('/location')->with('response','Location added successfully');
    }
}
