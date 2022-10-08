@extends('layouts/App')

@section('content')

<div class="container mt-4" style="width: 40rem; margin-top: 10rem">
  <h1 class="text-center">All Events</h1>
    <div class="row"> 
    @foreach ($events as $event)
    <div class="col col-lg-4 col-md-4">
   <div class="card align-items-center">
       <div class="card-body">
      <h5 class="card-title fs-4 text-center" >{{$event->eventname}}</h5>
      <p class="card-text"></p>
      <a href="/events/{{$event->id}}" class="btn btn-primary">Show item</a>
    </div>
  </div>
</div>
   
       
   @endforeach
</div>
</div>
@endsection