<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{


    public function index(){
        $products =  Product::orderBy('id','desc')->paginate(5);
        return request()->json(100,$products);
    }



    public function store(Request $request){
        $product = new Product();

        $exploded = explode(',',$request->image);

        $decode = base64_decode($exploded[1]);

        if(str_contains($exploded[0],'jpeg')){
            $extention = 'jpg';
        }else{
            $extention = 'png';
        }

        $fileName = str_random().'.'.$extention;

        $path = public_path().'/'.'product-images/'.$fileName;
       
        file_put_contents($path,$decode);


        // insert image info into database

        $dbPath = 'product-images/';
        $imgUrl = $dbPath.$fileName;

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image = $imgUrl;
        $product->save();
    }

    public function edit($id){
        $product =  Product::find($id);
        return $product;
    }




    public function update(Request $request){
        $product =  Product::find($request->id);

            
        $exploded = explode(',',$request->image);

        $decode = base64_decode($exploded[1]);

        if(str_contains($exploded[0],'jpeg')){
            $extention = 'jpg';
        }else{
            $extention = 'png';
        }

        $fileName = str_random().'.'.$extention;

        $path = public_path().'/'.'product-images/'.$fileName;
       
        file_put_contents($path,$decode);


        // insert image info into database

        $dbPath = 'product-images/';
        $imgUrl = $dbPath.$fileName;
        $product->image = $imgUrl;
       

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        
        $product->save();
    }


















}
