<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageUpload;

class ImageUploadController extends Controller
{
    public function uploadImage(Request $request){
        $uploads = new ImageUpload();


       $productImage = $request->file('image');
       $imageName = $productImage->getClientOriginalName();
       $imageDrectory ='product-images/';
       $productImage->move($imageDrectory,$imageName);
       $imageUrl = $imageDrectory.$imageName;


            $uploads->name =  $request->name;
        

        $uploads->image = $imageUrl;
        $uploads->save();

        return request()->json(1,$file);

    }
}
