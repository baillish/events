<h1>show customer</h1>



<h1>first_name:{{$customer->first_name}}</h1>
<h1>last_name:{{$customer->last_name}}</h1>
<h1>email:{{$customer->email}}</h1>
<h1>phonenumber:{{$customer->phonenumber}}</h1>

<form action="/deletecustomer/{{$customer->id}}" method="POST">
    @method('delete')
    @csrf

    <button type="submit">Delete</button>
</form>

    
