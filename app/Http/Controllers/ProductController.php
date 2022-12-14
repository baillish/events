<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    function index(){
        $products = Product::get();
        return view('products/all-products' , ['products'=>$products]);
    }
    // function generatePdf(){

    //     $product = Product::all();
    //     $pdf->loadView('pdf_view' , [$product]);
    //     return $pdf->download('products.pdf');
    // }
    function createPage(){

        return view ('products/create-product'); 
    
    }
    function add(Request $request){

        Product::create([
 
             'name' => $request->name,
             'price' => $request->price,
             'quantity'=> $request->quantity,
             'image'=>$request->image,
        ]);
 
        return redirect('/products');
     
 }
//     function  show(){
//         return view ('products/show-product');
//    }

   function showProduct ($id){

    $product =  Product::find($id);
 
     return view ('products/show-product' , ['product'=>$product]);
 }

   function editPage($id){

    $product =  Product::find($id);

    return view ('products/edit-product' , ['product'=>$product]);
}

function update(Request $request , $id){
    $product = Product::find($id);
    $product->name = $request->name;
    $product->quantity = $request->quantity;
    $product->price = $request->price;
    $product->image = $request->image;
    $product->save();
     return redirect('/products');

 }

    function delete ($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect ('/products');
    }
}
