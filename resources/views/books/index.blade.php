@extends('layouts.app')
@section('content')

@if(session()->has('message'))
    <div class="alert alert-danger">
        {{ session()->get('message') }}
    </div>
@endif

	<?php
		$res = 0;
		if(session('cart')) {
			foreach(session('cart') as $result) {
				$res += $result['qty'];
			} 
		}
	?>
	<div class="container">
		<h1>Book Store<a href="{{ url('cart_view') }}" class="pull-right">({{ $res }}) Book in your cart</a></h1>
		@foreach($books as $book)		
		<div class="col">		
			<div class="col-md-4">
				<img src="{{'storage/images/'.$book->cover}}" alt="photo" height="250">
				<div class="panel-body">
					Title:{{ $book->title }} <br>
					Price:${{ $book->price }}
				</div>			
				<a href="{{ url('/add_to_cart/'.$book->id) }}" class="btn btn-primary">Add To Cart</a><br>
			</div>
		</div>
		@endforeach
	</div>

@endsection