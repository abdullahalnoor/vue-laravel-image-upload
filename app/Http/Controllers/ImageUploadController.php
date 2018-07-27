<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageUpload;
use App\SubImage;

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
        $productId = $uploads->id;
         $productImages = $request->file('images');
         foreach($productImages as $productSubImage){
           $subImageName = $productSubImage->getClientOriginalName();
           $subImageDirectory = 'product-sub-images/';
           $productSubImage->move($subImageDirectory,$subImageName);
           $subImageUrl =$subImageDirectory.$subImageName;
           $subImage = new SubImage();
           $subImage->parent_id = $productId;
           $subImage->name = $subImageUrl;
           $subImage->save();
         }




        return request()->json(1,$file);

    }

    
    public function getFIles(){
        $subImage =  SubImage::get();
        $uploads  =  ImageUpload::get();
        return request()->json(1,[
            'uploads'=>$uploads,
            'subImage'=>$subImage
            ]);
    }













}
