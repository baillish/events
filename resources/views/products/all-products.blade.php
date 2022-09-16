<h1 class="text-center">All products display</h1>

@extends('layouts/App')

@section('content')
<div class="container mt-4" style="width: 40rem; margin-top: 10rem">
    
    <div class="row"> 
    @foreach ($products as $product)
    <div class="col col-lg-4 col-md-4">
   <div class="card align-items-center">
    <img src="{{$product->image}}" class="p-2 " alt="..." width="130px;" height="150px" style="object-fit: cover;">
    <div class="card-body">
      <h5 class="card-title fs-4 text-center" >{{$product->name}}</h5>
      <p class="card-text"></p>
      <a href="/products/{{$product->id}}" class="btn btn-primary">Show item</a>
    </div>
  </div>
</div>
   
       
   @endforeach
</div>
</div>
@endsection