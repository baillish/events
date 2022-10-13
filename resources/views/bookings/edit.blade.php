@extends('layouts/App')

@section('content')
<div class="container mt-5" style="width: 50%">

<form action="/bookings/{{$booking->id}}" method="post">
    @csrf
    @method('patch')
    <h1>Bookings Page</h1>

    <div class="form-group">
        <select name="events" id="" class="form-select">
            @foreach ($events as $event)
            <option value="{{$event->id}}">{{$event->eventname}}</option>
            @endforeach
        </select>
    </div>
    <br>
<div class="form-group">

    <select name="products" id="" class="form-select">

        @foreach ($products as $product)

        <option value="{{$product->id}}">{{$product->name}}</option>
            
        @endforeach
    </select>
</div>
    <br>
    <div class="form-group">

        <select name="customers" id="" class="form-select">
    
            @foreach ($customers as $customer)
    
            <option value="{{$customer->id}}">{{$customer->first_name}}</option>
                
            @endforeach
        </select>
    </div>
    <br>
    <input type="text" name="quantity" class="form-control" {{$booking->quantity}}">

    <button type="submit" class="btn btn-info mt-3">Update Booking</button>
   
@endsection
</form>
</div>