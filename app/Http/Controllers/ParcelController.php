<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use JD\Cloudder\Facades\Cloudder;
use App\Image;
use App\Parcel;
use Auth;
class ParcelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get(){
       
        return view('parcels.parcel');
    }


public function addParcel(Request $request){
       
        
        $this->validate($request, [
            "tracking_id"=>"required",
            "reciever_name"=>'required',
            "reciever_phonenumber"=>'required',
            "reciever_address"=>'required',
            "shipment_fee"=>"required",
            "current_location"=>'required',
            "sender_name"=>'required',
            "sender_location"=>'required',
            'filename' => 'required',
            'filename.*' => 'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
            //mimikken@siberask.com
            //Tonygozie.22
        ]);

            $files = $request->file('filename');
            $picture =$files[0]->getClientOriginalName();
            $picture_name = $files[0]->getRealPath();;

            Cloudder::upload($picture_name, null);

            list($width, $height) = getimagesize($picture_name);

            $link= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
            
            $parcel = new Parcel;
            $parcel->user_id = Auth::user()->id;
            $parcel->tracking_id = $request->input('tracking_id');
            $parcel->reciever_name = $request->input('reciever_name');
            $parcel->parcel_image = $link;
            $parcel->reciever_phonenumber = $request->input('reciever_phonenumber');
            $parcel->reciever_address = $request->input('reciever_address');
            $parcel->shipment_fee = $request->input('shipment_fee');
            $parcel->current_location = $request->input('current_location');
            $parcel->sender_name = $request->input('sender_name');
            $parcel->sender_location = $request->input('sender_location');
            $parcel->save();

            if($request->hasfile('filename'))
            {
   
               foreach($request->file('filename') as $img)  
               {
                   $name = $img->getClientOriginalName();
                   $image_name = $img->getRealPath();
   
                   Cloudder::upload($image_name, null);
   
                   list($width, $height) = getimagesize($image_name);
   
                   $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
   
                   //save to uploads directory
                   $img->move(public_path("uploads"), $name);
                   
                   $image = new Image;
                   $image->parcel_id = $parcel->id;
                   $image->images = $image_url;
                   $image->save(); 
               }
               
           }
            
           return redirect('/home')->with('response','Parcel uploaded  successfully');
    }
//edit
public function edit($parcel_id){
    $parcel =Parcel::find($parcel_id);
    return view('parcels.edit',compact('parcel'));
}
public function editParcel(Request $request,$parcel_id){

    $this->validate($request, [
        "tracking_id"=>"required",
        "reciever_name"=>'required',
        "reciever_phonenumber"=>'required',
        "reciever_address"=>'required',
        "shipment_fee"=>"required",
        "current_location"=>'required',
        "sender_name"=>'required',
        "sender_location"=>'required',
        //'filename' => 'required',
        //'filename.*' => 'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
        //mimikken@siberask.com
        //Tonygozie.22
    ]);
            $parcel = new Parcel;
            $parcel->user_id = Auth::user()->id;
            $parcel->tracking_id = $request->input('tracking_id');
            $parcel->reciever_name = $request->input('reciever_name');
            $parcel->reciever_phonenumber = $request->input('reciever_phonenumber');
            $parcel->reciever_address = $request->input('reciever_address');
            $parcel->shipment_fee = $request->input('shipment_fee');
            $parcel->current_location = $request->input('current_location');
            $parcel->sender_name = $request->input('sender_name');
            $parcel->sender_location = $request->input('sender_location');
       
        // $files = $request->file('filename');
        //     $picture =$files[0]->getClientOriginalName();
        //     $picture_name = $files[0]->getRealPath();;

        //     Cloudder::upload($picture_name, null);

        //     list($width, $height) = getimagesize($picture_name);

        //     $link= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);

        //     $parcel->parcel_image = $link;;
        $data = array(
            "user_id"=>$parcel->user_id,
            "tracking_id"=> $parcel->tracking_id,
            "reciever_name"=>$parcel->reciever_name,
            "reciever_phonenumber"=>$parcel->reciever_phonenumber,
            "reciever_address"=>$parcel->reciever_address,
            "shipment_fee"=>$parcel->shipment_fee,
           "current_location"=>$parcel->current_location,
           "sender_name"=>$parcel->sender_name,
           "sender_location"=>$parcel->sender_location
            //"parcel_image"=>$parcel->parcel_image
        );
        Parcel::where('id',$parcel_id)->update($data);
        $parcel->update();
       return redirect('/home')->with('response','Parcel updated  successfully');

 return $parcel_id;
}
//delete
public function delete($parcel_id){
    Parcel::where('id',$parcel_id)->delete();
    Image::where('parcel_id',$parcel_id)->delete();
    return redirect('/home')->with('response','Parcel deleted  successfully');

}
//view
public function view($parcel_id){
    $parcels =Parcel::where('id', '=', $parcel_id)->get();
    // $parcel = DB::table('parcels')->
    //      join('images','parcels.id', '=' , 'images.parcel_id')
    //      ->select('images.*')
    //      ->where(['images.parcel_id' => $property_id ])
    //      ->get();
     
    return view('parcels.view',compact('parcels'));
    
} 
//search
public function search(Request $request){
    
    $keyword = $request->input('search');
    $parcels = Parcel::where('tracking_id', 'LIKE', '%' . $keyword . '%')->get();
    
    return view('parcels.searchid',compact('profile','parcels'));

}
}
