@extends('layouts/App')

@section('content')
   
    <div class="container mt-4" style="width: 40rem; margin-top: 10rem">

    <form action="/customers/{{$customer->id}}" method="post">
        @method('patch')
        @csrf
        <h1>Update Customer</h1>

        <div class="form-group">
            <input type="text" name="fname" placeholder="First Name" class="form-control" value="{{$customer->first_name}}">
        </div>
        <br>

        <div class="form-group">
        <input type="text" name="lname" placeholder="lastname" class="form-control" value="{{$customer->last_name}}">
        </div>
        <br>
        <div class="form-group">
            <input type="text" name="phoneno" placeholder="phone number" class="form-control" value="{{$customer->phonenumber}}">
        </div>
        <br>
        <div class="form-group">
            <input type="email" name="email" placeholder="email" class="form-control" value="{{$customer->email}}" >
        </div>
        <br>
        <button type="submit" class="btn btn-outline-success">Update Customer</button>

    </form>
</div>
@endsection