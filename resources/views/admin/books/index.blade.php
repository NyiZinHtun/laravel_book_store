@extends('layouts.app')
@section('content')
<div class="container">
	<h1 class="btn btn-primary">WELCOME TO MY BOOK STORE</h1>
</div><br>
@foreach($books as $book)
<div class="panel panel-default">
	<div class="panel-heading">
		<img src="../storage/images/{{ $book->cover }} " alt="photo" height="130"><br>
		<b>{{ $book->title }}</b><br>
		by {{ $book->author }}
		(in {{ $book->category->name }})
		${{ $book->price }}<br>
		<div class="panel-body">
			{{ $book->summary }} 
		</div>
		<div>
			<a href="{{ url("admin/books/edit/$book->id") }}" class="btn btn-primary" >Edit</a>
			<a href="{{ url("admin/books/delete/$book->id") }}" class="btn btn-danger">Delete</a>
		</div>
		
	</div>

</div>


@endforeach

@endsection