<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Booking;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $data = DB::table('bookings')->join('customers' , 'bookings.customer_id' , 'customers.id')
        ->join('events' , 'bookings.event_id' , 'events.id')
        ->join('products' , 'bookings.product_id' , 'products.id')->get(['bookings.id' , 'bookings.quantity' , 'bookings.price', 'customers.id', 'customers.first_name','customers.last_name','products.id', 'products.name', 'events.id','events.eventname']);
       
        return view ('bookings/index' , ['data'=>$data]);  
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Events::get();
        $products = Product::get();
        $customers= Customer::get();

        return view('bookings/new-bookings' , ['events'=>$events , 'products'=>$products, 'customers'=>$customers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = Product::find($request->products);
        Booking::create(["event_id"=>$request->events, "product_id"=>$request->products, "customer_id"=>$request->customers, "quantity"=>$request->quantity,"price"=>(130*$product->price/100)*$request->quantity]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $events = Events::find($id);
        $product =  Product::find($id);


       
        return view ('bookings/new-bookings' , ['events'=>$events , 'products'=> $product]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $events = Events::find($id);
        $product =  Product::find($id);
    

      return view ('bookings/new-bookings' , ['events'=>$events , 'products'=> $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
       
        $events = Events::find($id);
        $product =  Product::find($id);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $events = Events::find($id);
        $product =  Product::find($id);
        
        $events->$product ->delete();
    
         return view ('bookings/new-bookings' , ['events'=>$events , 'products'=> $product]);    
        //
    }
}
