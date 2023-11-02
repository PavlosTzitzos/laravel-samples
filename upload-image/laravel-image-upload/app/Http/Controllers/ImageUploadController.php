<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*You've to use the database model name from your App\Models folder at the top of your controller page*/
use App\Models\Postimage;

class ImageUploadController extends Controller
{
    //Add image
    public function addImage(){
        return view('add_image');
    }
    //Store image
    public function storeImage(Request $request){
       /*Logic to store data*/
       $data= new Postimage();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('images.view');
    }
		//View image
    public function viewImage(){
        $imageData= Postimage::all();
        return view('view_image', compact('imageData'));
    }
}