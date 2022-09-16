<?php

use App\Http\Controllers\ProductController;
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
Route::get('/products' , function(){
    $products = Product::get();
    return view('products/all-products' , ['products'=>$products]);
});

Route::get('/products/new', function(){

    return view ('products/create-product'); 

})->middleware('auth');

Route::get('/products/{id}',function(){
     return view ('products/show-product');
});


Route:: post('/products', function(Request $request){

       Product::create([

            'name' => $request->name,
            'price' => $request->price,
            'quantity'=> $request->quantity,
            'image'=>$request->image,
       ]);

       return redirect('/products');
    
});
Route:: get('/products/{id}/edit',function ($id){
    $product =  Product::find($id);

    return view ('products/edit-product' , ['product'=>$product]);
});
Route:: get('/products/{id}',function ($id){

   $product =  Product::find($id);

    return view ('products/show-product' , ['product'=>$product]);
});

Route::patch('/products/{id}',function(Request $request , $id){
    $product = Product::find($id);
    $product->name = $request->name;
    $product->quantity = $request->quantity;
    $product->price = $request->price;
    $product->image = $request->image;
    $product->save();
     return redirect('/products');

 });

 Route::delete('/products{id}' , [ProductController::class , 'delete']);

//Authentication

Route ::get('/register', function(){

    return view ("Admin/signup");

});

Route::post('/register' , function(Request $request){
   User::create([

        'email'=>$request->email,
        'password'=> Hash::make($request->password),
   ]);

   auth()->attempt($request->only('email', 'password'));

   return redirect('/products');

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

 //Customers Routes

 Route::get('/customers/new',function(){
    return view ('customers/create-customers');
 });

 Route::post('/customers',function(Request $request){

    Customer::create([

        'first_name'=> $request->fname,
        'last_name'=> $request->lname,
        'phonenumber'=> $request->phoneno,
        'email'=> $request->email,
    ]);

    return redirect('/products');
    
 });
 Route::get('/customers',function(){

    $customers = Customer::paginate(3);
    return view ('customers/all-customers' , ['customers'=>$customers]);
 });

 Route::get('/customers/{id}',function($id){

    $customer = Customer::find($id);

   
    return view ('customers/show-customer' , ['customer'=>$customer]);
 });

 Route::delete('/customers/{id}', function ($id) {

    $customer = Customer::find($id);
    $customer->delete();

    return redirect("/customers");
     
 });

 Route::get('/customers/{id}/edit',function(Request $request , $id){

    $customer = Customer::find($id);

    return view('customers/update-customers' , ['customer'=>$customer]);

    
 });
 Route::patch('/customers/{id}',function(Request $request , $id){
    $customer = Customer::find($id);
    $customer->first_name = $request->fname;
    $customer->last_name = $request->lname;
    $customer->phonenumber = $request->phoneno;
    $customer->email = $request->email;
    $customer->save();
     return redirect('/customers');
    
 });









