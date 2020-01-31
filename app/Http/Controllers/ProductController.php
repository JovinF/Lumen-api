<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //index method returns all available products as a JSON response.   

     public function index(){
     
     $products = Product::all();

     return response()->json($products);

    }

    // create method creates a new product and returns the newly created product as a JSON response.

    public function create(Request $request){

        $product = new Product;

        $product->name=$request->name;
        $product->price=$request->price;
        $product->description=$request->description;

        $product->save();

        return response()->json($product,201);
    
    }

    // show method returns a single product resource by its id. This is also returned as a JSON response.

    public function show($id)
    {
       $product = Product::find($id);

       return response()->json($product);
    }

    // update method updates a single product resource by its id as well.

    public function update(){

        $product= Product::find($id);

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');

        $product->save();

        return response()->json($product,200);

    }

    // delete method deletes a product resource by its id and returns a success message.

    public function destroy(){
        $product= Product::find($id);
        $product->delete();

        return response()->json("Product removed successfully",200);
    }

}