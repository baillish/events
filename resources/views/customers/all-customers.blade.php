@extends('layouts/App')

@section('content')
<div class="container mt-4">
<table class="table">
    <h1>All Customers</h1>
    <thead class="bg-success">
    <tr>
        <td>Id</td>
        <th>First Name</th>
        <th>last Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Action</th>
       
    </tr>
</thead>

<tbody>

    @if (!$customers->count())

    <h1>No Customers Found</h1>
        
    @else

    @foreach ($customers as $customer)

    <tr>
        <td>{{$customer->id}}</td>
        <td>{{$customer->first_name}}</td>
        <td>{{$customer->last_name}}</td>
        <td>{{$customer->email}}</td>
        <td>{{$customer->phonenumber}}</td>
        <td><a href="/customers/{{$customer->id}}/edit" class="btn btn-outline-info">Update</a> || <a href="/customers/{{$customer->id}}"class="btn btn-outline-primary" >Show</a></td>
    </tr>

    @endforeach
       {{-- <a href="" style="width: 20px;">{{$customers->links()}}</a>  --}}
    @endif
   
</tbody>
</table>
</div>
    
@endsection





    


