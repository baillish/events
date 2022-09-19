<h1>show products</h1>

<h1>{{$product->name}}</h1>
<h1>{{$product->quantity}}</h1>
<h1>{{$product->price}}</h1>
<img src="{{$product->image}}" alt="">
<a href="/products/{{$product->id}}/edit" class="btn btn-primary">Update</a>

<form action="/products/{{$product->id}}" method="POST">
@csrf
<input type="hidden" , name="_method" value="DELETE">
<button type="submit">Delete</button>
</form>

