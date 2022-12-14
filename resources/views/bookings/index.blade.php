@extends('layouts/App')

@section('content')
<div class="container mt-4">
<table class="table">
    <h1>All Bookings</h1>
    <thead class="bg-success">
    <tr>
        <th>id</th>
        <th>customer First Name</th>
        <th>customer last Name</th>
        <th>Event Name</th>
        <th>quantity</th>
        <th>price</th>
        <th>Actions</th>
               
    </tr>
</thead>

<tbody>

    @if (!$data->count())

    <h1>No Bookings Available</h1>
        
    @else

    @foreach ($data as $data)

    <tr>
        <td>{{$data->id}}</td>
        <td>{{$data->first_name}}</td>
        <td>{{$data->last_name}}</td>
        <td>{{$data->eventname}}</td>
        <td>{{$data->quantity}}</td>
        <td>{{$data->price}}</td>
        <td><a href="/bookings/{{$data->id}}/edit" class="btn btn-outline-info">Update</a> || <a href="/bookings/{{$data->id}}"class="btn btn-outline-primary" >Show</a>|| <form action="/bookings/{{$data->id}}" method="post" class="d-inline"> @csrf @method('delete') <button type="submit" class="btn btn-outline-danger d-inline">delete</button></form></td>
    </tr>

    @endforeach
       {{-- <a href="" style="width: 20px;">{{$customers->links()}}</a>  --}}
    @endif
   
</tbody>
</table>
</div>
    
@endsection





    


