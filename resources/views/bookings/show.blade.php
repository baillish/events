@extends('layouts/App')

@section('content')
<div class="container mt-4">
<table class="table">
    <h1>All Bookings</h1>
    <thead class="bg-success">
    <tr>
        <th>id</th>
        <th>Event id</th>
        <th>customer id</th>
        <th>Product id</th>
        <th>quantity</th>
        <th>price</th>
               
    </tr>
</thead>

<tbody>


    <tr>
        <td>{{$data->id}}</td>
        <td>{{$data->event_id}}</td>
        <td>{{$data->customer_id}}</td>
        <td>{{$data->product_id}}</td>
        <td>{{$data->quantity}}</td>
        <td>{{$data->price}}</td>
        
    </tr>

       {{-- <a href="" style="width: 20px;">{{$customers->links()}}</a>  --}}
   
</tbody>
</table>
</div>
    
@endsection





    


