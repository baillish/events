<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Customer;
use Illuminate\Http\Request;

class EventController extends Controller
{
 
    public function index()
    {

        $events = Events::get();
        return view('Events/index', ['events'=>$events]);
        
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
        $event=Events::find($id);


        return view('Events/show' , ['events'=> $event]);
    }

  
    public function edit($id)
    {
        $events = Events::find($id);
        
        $customers = Customer::get();

      return view ('Events/update' ,['events'=>$events ,'customers'=>$customers]);
    }

  
    public function update(Request $request, $id)
    {

        $events = Events ::find ($id);

        $events->eventname = $request->name;
        $events->location = $request->location;
        $events->customer_id = $request->customer;

        $events->save();

        return redirect ('/events');
         
    }

    public function destroy($id)
    {
        $events = Events ::find ($id);

        $events -> delete();

        return redirect('/events');


}

}
