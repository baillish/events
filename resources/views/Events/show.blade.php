<h1>{{$events->eventname}}</h1>

<form action="/events/{{$events->id}}" method="post">
@csrf
@method('delete') 
<button class="btn btn-danger" type="submit">Delete</button>
</form>

{{-- {{dd($events)}} --}}