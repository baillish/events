@extends('layouts/App')

@section('content')
   
    <div class="container mt-4" style="width: 40rem; margin-top: 10rem">


    <form action="/products/{{$product->id}}" method="post">
        @csrf
        @method('patch')
        <h1>Update Products...</h1>

        <div class="form-group">
            <input type="text" name="name" placeholder="Name of product" class="form-control" value='{{$product->name}}'>
        </div>
        <br>

        <div class="form-group">
            <input type="text" name="quantity" placeholder="quantity of product" class="form-control" value='{{$product->quantity}}'>
        </div>
        <br>
        <div class="form-group">
            <input type="text" name="price" placeholder="price of product" class="form-control" value='{{$product->price}}'>
        </div> 
    <br>
        <div class="form-group">
            <input type="text" name="image" placeholder="image of product" class="form-control" value='{{$product->image}}'> 
        </div>


        <br>
        <button type="submit" class="btn btn-outline-success">update</button>

    </form>
</div>
@endsection