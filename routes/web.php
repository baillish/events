<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/allproducts' , function(){

    return view('products/all-products');
});

Route::get('/showproducts',function(){
     return view ('products/show-product');
});

Route::get('/createproduct', function(){

    return view ('products/create-product'); 
});
Route:: post('/products', function(Request $request){

       Product::create([

            'name' => $request->name,
            'price' => $request->price,
            'quantity'=> $request->quantity
       ]);


    
});
