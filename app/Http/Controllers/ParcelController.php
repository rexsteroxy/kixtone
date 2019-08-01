<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParcelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get(){
       
        return view('parcels.parcel');
        }
}
