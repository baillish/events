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

        $data = DB::table('bookings')->join('customers' , 'customers.id' , 'bookings.customer_id')
        ->join('events' , 'events.id' ,'=', 'bookings.event_id')
        ->join('products' , 'products.id' ,'=', 'bookings.product_id')
        ->get(['bookings.id' , 'bookings.price' , 'bookings.quantity' , 'bookings.customer_id'  ,'customers.first_name', 'customers.last_name' , 'bookings.event_id', 'events.eventname' , 'bookings.product_id' , 'products.name']);
     
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
        return redirect('/bookings');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = Booking::find($id);
        return view ('bookings/show' , ['data'=>$data]);
    }
  
    public function edit($id){

        $booking = Booking::find($id);
        $events = Events::get();
        $product =  Product::get();
        $customers = Customer::get();


        return view ('bookings/edit' , ['events'=>$events , 'products'=> $product , 'customers'=>$customers , 'booking' => $booking]);
    }

    public function update(Request $request, $id){
       
        $booking = Booking::find($id);
        $booking->event_id = $request->events;
        $booking->customer_id = $request->customers;
        $booking->product_id = $request->products;
        $booking->quantity = $request->quantity;
        $booking->save();
        return redirect("/bookings");
    }

    public function destroy($id){
        $booking = Booking::find($id);

        $booking->delete();
       
        return redirect('/bookings');
    }
}
