@extends('layouts/App')

@section('content')
   
    <div class="container mt-4" style="width: 40rem; margin-top: 10rem">

    <form action="/customers" method="post">
        @csrf

        <h1>Create Customer</h1>

        <div class="form-group">
            <input type="text" name="fname" placeholder="First Name" class="form-control">
        </div>
        <br>

        <div class="form-group">
            <input type="text" name="lname" placeholder="lastname" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <input type="text" name="phoneno" placeholder="phone number" class="form-control" >
        </div>
        <br>
        <div class="form-group">
            <input type="email" name="email" placeholder="email" class="form-control" >
        </div>
        <br>
        <button type="submit" class="btn btn-outline-success">Register Customer</button>

    </form>
</div>
@endsection