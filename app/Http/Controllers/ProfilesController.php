<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Profile;
use Auth;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(){
        return view('profiles.profile');
    }

    public function addProfile(Request $request){
        $this->validate($request,[
            'profile_image'=>'image|nullable|max:1999'

        ]);
            $profile = new Profile;
            $profile->user_id = Auth::user()->id;

            
            if(Input::hasFile('profile_image')){
                $file = Input::file('profile_image');
                $file->move(public_path(). '/uploads/' , $file->getClientOriginalName());
                $url = URL::to('/') . '/uploads/' . $file->getClientOriginalName();
            }

            $profile->profile_image = $url;
            $profile->save();
           return redirect('/home')->with('response','Profile created successfully');
            
       
    }
}
 