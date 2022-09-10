<?php

use App\Models\User;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

})->middleware('auth');
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

   User::create([

        'email'=>$request->email,
        'password'=> Hash::make($request->password),

   ]);

   auth()->attempt($request->only('email', 'password'));

   return redirect('/allproducts');

});

Route:: get('/login',function (){

    return view ('Admin/login');
})->name('login');

 Route :: post('/login', function(Request $request){

     if(!auth()->attempt($request->only('email' , 'password'))){

        dd('invalid credentials');


     };

     return redirect("/allproducts");

 });

 Route::get('/createcustomer',function(){
    return view ('customers/create-customers');
 });

 Route::post('/customers',function(Request $request){

    Customer::create([

        'first_name'=> $request->fname,
        'last_name'=> $request->lname,
        'phonenumber'=> $request->phoneno,
        'email'=> $request->email,
    ]);

    return redirect('/allproducts');
    
 });
 Route::get('/allcustomers',function(){

    $customers = Customer::paginate(3);
    return view ('customers/all-customers' , ['customers'=>$customers]);
 });

 Route::get('/showcustomer/{id}',function($id){

    $customer = Customer::find($id);

   
    return view ('customers/show-customer' , ['customer'=>$customer]);
 });

 Route::delete('/deletecustomer/{id}', function ($id) {

    $customer = Customer::find($id);
    $customer->delete();

    return redirect("/allcustomers");
     
 });








