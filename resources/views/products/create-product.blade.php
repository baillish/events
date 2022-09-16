@extends('layouts/App')

@section('content')
   
    <div class="container mt-4" style="width: 40rem; margin-top: 10rem">


    <form action="/products" method="post">
        @csrf

        <h1>Creating Products...</h1>

        <div class="form-group">
            <input type="text" name="name" placeholder="Name of product" class="form-control">
        </div>
        <br>

        <div class="form-group">
            <input type="text" name="quantity" placeholder="quantity of product" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <input type="text" name="price" placeholder="price of product" class="form-control" >
        </div> 
    <br>
        <div class="form-group">
            <input type="text" name="image" placeholder="image of product" class="form-control" >
        </div>


        <br>
        <button type="submit" class="btn btn-outline-success">Submit</button>

    </form>
</div>
@endsection