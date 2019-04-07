<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Property;
use App\Location;
use App\Like;
use App\Dislike;
use App\Comment;
use App\Profile;
use Auth;

class PropertiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

public function post(){
        $profile = "Null profile";
        $location = Location::all();
        
        return view('properties.property',compact('profile','location'));
        }

public function addProperty(Request $request){
    
        $this->validate($request, [
            "property_title"=>"required",
            "price"=>'required',
            "location_id"=>'required',
            "address"=>'required',
            "description"=>"required",
            "bedroom"=>'required',
            "bathroom"=>'required',
            "status"=>'required',
            "property_image"=>"required",
        ]);
        $property = new Property;
            $property->user_id = Auth::user()->id;
            $property->location_id = $request->input('location_id');
            $property->property_title = $request->input('property_title');
            $property->description = $request->input('description');
            $property->price = $request->input('price');
            $property->address = $request->input('address');
            $property->status = $request->input('status');
            $property->bathroom = $request->input('bathroom');
            $property->bedroom = $request->input('bedroom');
           
            if(Input::hasFile('property_image')){
                $file = Input::file('property_image');
                $file->move(public_path(). '/properties/' , $file->getClientOriginalName());
                $url = URL::to('/') . '/properties/' . $file->getClientOriginalName();
            }

            $property->property_image = $url;
            $property->save();
           return redirect('/home')->with('response','Property added  successfully');
        
     } 

public function view($property_id){
    $properties =Property::where('id', '=', $property_id)->get();
    $likeProperty = Property::find($property_id);
    $commentProperty = Property::find($property_id);
    $likeCounter = Like::where(['property_id' => $likeProperty->id])->count();
    $dislikeCounter = Dislike::where(['property_id' => $likeProperty->id])->count();
    $commentCounter = Comment::where(['property_id' => $commentProperty->id])->count();

    $comments = DB::table('users')
    ->join('comments','users.id','=','comments.user_id')
    ->join('properties','comments.property_id','=', 'properties.id')
    ->where(['properties.id' => $property_id])
    ->select('users.middlename','comments.*')->get();
    // return $comments;
    // exit();
    $locations = Location::all();
    return view('properties.view',compact('properties','locations','likeCounter',
    'dislikeCounter','commentCounter','comments'));
    
}
public function edit($property_id){
    $properties =Property::find($property_id);
     $locations = Location::all();
     $location = Location::find($properties->location_id);
    return view('properties.edit',compact('properties','location','locations'));
}
public function editProperty(Request $request,$property_id){

    $this->validate($request, [
        "property_title"=>"required",
        "price"=>'required',
        "location_id"=>'required',
        "description"=>"required",
        "property_image"=>"required",
    ]);
    $property = new Property;
        $property->user_id = Auth::user()->id;
        $property->location_id = $request->input('location_id');
        $property->property_title = $request->input('property_title');
        $property->description = $request->input('description');
        $property->price = $request->input('price');
       
        if(Input::hasFile('property_image')){
            $file = Input::file('property_image');
            $file->move(public_path(). '/properties/' , $file->getClientOriginalName());
            $url = URL::to('/') . '/properties/' . $file->getClientOriginalName();
        }

        $property->property_image = $url;
        $data = array(
            "user_id"=>$property->user_id,
            "property_title"=>$property->property_title,
            "price"=>$property->price,
            "location_id"=>$property->location_id,
            "description"=>$property->description,
            "property_image"=>$property->property_image
        );
        Property::where('id',$property_id)->update($data);
        $property->update();
       return redirect('/home')->with('response','Property updated  successfully');

 return $property_id;
}
public function delete($property_id){
    Property::where('id',$property_id)->delete();
    return redirect('/home')->with('response','Property deleted  successfully');

}
public function location($property_id){
    $locations = Location::all();
    $properties = DB::table('properties')
    ->join('locations','properties.location_id','=','locations.id')
    ->where(['locations.id' => $property_id])
    ->select('properties.*','locations.*')->paginate(1);

 return view('locations.locationposts',compact('locations','properties'));

}
public function like($id){
    $loggedin_user= Auth::user()->id;
    $like_user = Like::where(['user_id'=>$loggedin_user,'property_id' => $id])->first();
    if(empty($like_user->user_id)){
        $user_id = Auth::user()->id;
        $email = Auth::user()->email;
        $property_id = $id;
        $like = new Like;
        $like->user_id = $user_id;
        $like->email = $email;
        $like->property_id = $property_id;
        $like->save();

        return redirect("/view/{$id}");
    }
    return redirect("/view/{$id}");
    
}
public function dislike($id){
    $loggedin_user= Auth::user()->id;
    $like_user = Dislike::where(['user_id'=>$loggedin_user,'property_id' => $id])->first();
    if(empty($like_user->user_id)){
        $user_id = Auth::user()->id;
        $email = Auth::user()->email;
        $property_id = $id;
        $dislike = new Dislike;
        $dislike->user_id = $user_id;
        $dislike->email = $email;
        $dislike->property_id = $property_id;
        $dislike->save();

        return redirect("/view/{$id}");
    }
    return redirect("/view/{$id}");
    
}
public function addComment(Request $request, $property_id){
    $this->validate($request,[
        'comment'=>'required',
    ]);
    $comment = new Comment;
    $comment->user_id = Auth::user()->id;
    $comment->property_id = $property_id;
    $comment->comment = $request->input('comment');
    $comment->save();
    
    return redirect("/view/{$property_id}");
}
public function search(Request $request){
    $user_id = Auth::user()->id;
    $profile = Profile::find($user_id);
    $keyword = $request->input('search');
    $properties = Property::where('property_title', 'LIKE', '%' . $keyword . '%')->get();
    
    return view('properties.searchposts',compact('profile','properties'));




}
}

