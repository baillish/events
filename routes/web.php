<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EventController;
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
Route::get('/products' , [ProductController::class , 'index']);

Route::get('/products/new', [ProductController::class , 'createPage'])->middleware('auth');


Route:: post('/products', [ProductController::class , 'add']);

Route:: get('/products/{id}/edit',[ProductController::class , 'editPage']);

Route:: get('/products/{id}',[ProductController::class , 'showProduct']);

Route::patch('/products/{id}',[ProductController::class , 'update']);

 Route::delete('/products/{id}' , [ProductController::class , 'delete']);

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

     return redirect("/products");

 });

 //Customers Routes

 Route::get('/customers/new',[CustomerController::class , 'createCustomerPage']);

 Route::post('/customers' , [CustomerController::class , 'storeCustomer']);

 Route::get('/customers',[CustomerController::class, 'index']);

 Route::get('/customers/{id}',[CustomerController::class , 'show']);

 Route::delete('/customers/{id}', [CustomerController::class , 'delete']);

 Route::get('/customers/{id}/edit',[CustomerController::class , 'updatePage']);

 Route::patch('/customers/{id}',[CustomerController::class , 'update']);

 Route::get('/events',[EventController::class, 'index']);

Route::get('/events/new',[EventController::class ,'create']);

Route::post('/events',[EventController::class ,'store']);

Route::get('/events/{id}',[EventController::class , 'show']);

Route::get('/events/{id}/edit',[EventController::class , 'edit']);

Route::patch('/events/{id}',[EventController::class , 'update']);

Route::delete('/events/{id}', [EventController::class , 'destroy']);