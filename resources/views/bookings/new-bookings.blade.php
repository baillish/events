@extends('layouts/App')

@section('content')

<div class="container mt-5" style="width: 50%">

<form action="/bookings" method="post">
    @csrf
    <h1>Bookings Page</h1>

    <select name="events" id="">
        @foreach ($events as $event)
        <option value="{{$event->id}}">{{$event->eventname}}</option>
        @endforeach
    </select>

    <select name="products" id="">

        @foreach ($products as $product)

        <option value="{{$product->id}}">{{$product->name}}</option>
            
        @endforeach
    </select>

    <select name="customers" id="">

        @foreach ($customers as $customer)

        <option value="{{$customer->id}}">{{$customer->first_name}}</option>
            
        @endforeach
    </select>

    <input type="text" name="quantity">


    <button type="submit">book</button>
    
@endsection
</form>
</div>