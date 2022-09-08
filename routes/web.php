<?php

use App\Models\Admin;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route ::get('/register', function(){

    return view ("Admin/signup");

});

Route::post('/register' , function(Request $request){

    Admin::create([

        'email'=>$request->email,
        'password' => Hash::make($request->password),
    ]);

    auth()->attempt([
        'email' => $request->email,
        'password'=> $request->password,
    ]);


});

Route:: get('/login',function (){
    return view ('Admin/login');
});

 Route :: post('/login', function(Request $request){

     auth()->attempt($request->only('email' , 'password'));

    //  dd($request->auth());

     return redirect("/allproducts");

    // dd("hello");
 });



