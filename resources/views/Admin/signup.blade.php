@extends('layouts/App')

@section('content')

<form action="/register" method="post">

    @csrf

    <div class="container mt-4" style="width: 40%;">
        <h1>Signup</h1>
        <div class="form-group">
            <input type="email" placeholder="Email" name="email" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <input type="password" placeholder="Password" name="password" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-success">Sign Up</button>
    </div>
</form>
    
@endsection