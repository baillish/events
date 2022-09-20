@extends('layouts/App')

@section('content')
   
    <div class="container mt-4" style="width: 40rem; margin-top: 10rem">


    <form action="/events/{{$events->id}}" method="post">
        @csrf
        @method('patch')
        <h1>Update events...</h1>

        <div class="form-group">
            <input type="text" name="name" placeholder="Name of Events" class="form-control" value="{{$events->eventname}}">
        </div>
        <br>

        <div class="form-group">
            <input type="text" name="location" placeholder="location" class="form-control"value="{{$events->location}}" >
        </div>
        <br>

        <div class="form-group">

            <select name="customer" id="" class="form-select">
                @foreach ($customers as $customer)

                <option value="{{$customer->id}}">{{$customer->first_name}}</option>
                    
                @endforeach

                
            </select>
            
        </div>

       

       
       
        <br>
        <button type="submit" class="btn btn-outline-success">Update events</button>

    </form>
</div>
@endsection