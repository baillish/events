@extends('layouts/App')

@section('content')

<div class="container mt-5" style="width: 50%">

<form action="/bookings" method="post">
    @csrf
    <h1>Bookings Page</h1>
    <select name="events" id="" class="form-select">
    <div class="form-group">
        @foreach ($events as $event)
        <option value="{{$event->id}}">{{$event->eventname}}</option> 
        @endforeach

        <div class="form-check">
        
            @foreach ($products as $product)
            <input class="form-check-input" name="products[]" type="checkbox" value="{{$product->id}}" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">{{$product->name}}</label>
                
            @endforeach
         
        </div>
            
        </select>
        <input type="submit" value="Book Now" class="btn btn-info">

    
</form>
</div>
    
@endsection