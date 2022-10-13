<h1>Show Event</h1>

<h1>{{$events->eventname}}</h1>
<h1>{{$events->location}}</h1>
<h1>{{$events->first_name}}</h1>
        
<a href="/events/{{$events->id}}/edit" class="btn btn-primary">Update</a>
<form action="/events/{{$events->id}}" method="post">
@csrf
@method('delete') 
<button class="btn btn-danger" type="submit">Delete</button>
</form>

{{-- {{dd($events)}} --}}
