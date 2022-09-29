<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Product;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $events = Events::get();
        $products = Product::get();

        return view ('bookings/all-bookings' , ['events'=>$events , 'products'=>$products]);  
        
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

        return view('bookings/new-bookings' , ['events'=>$events , 'products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Events::find($request->events)->products()->attach([$request -> products]);


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
