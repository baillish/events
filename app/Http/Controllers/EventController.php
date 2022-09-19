<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Customer;
use Illuminate\Http\Request;

class EventController extends Controller
{
 
    public function index()
    {
        
    }

    public function create()
    {

        $customers = Customer::get();
        return view('Events/new' , ['customers'=>$customers]);
    }

    public function store(Request $request)
    {
        Events::create(['eventname'=>$request->name, 'location'=>$request->location, 'customer_id'=>$request->customer]);

        return redirect('/events/new');
    }

 
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        
    }
}
