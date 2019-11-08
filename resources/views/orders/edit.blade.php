@extends('layouts.app')
@section('content')
<div class="container">
<form method="POST" action="{{ url('/orders/' . $order->id) }}">
<!-- <form method="POST" action="{{ url('/order/{order}/edit') }}"> -->
    {{ method_field('PATCH') }}
	{{ csrf_field() }}
	<h2>Order Now</h2>
	<div class="form-group">
		<label for="name">Your Name:</label>
		<input type="text" name="name" id="name" class="form-control" value="{{ $order->name }}">
    </div>
		@if ($errors->has('name'))
    		<div class="error text-danger">{{ $errors->first('name') }}</div>
		@endif
	
	<div class="form-group">
		<label for="email">Email:</label>
		<input type="text" name="email" id="email" class="form-control" value="{{ $order->email }}">
		@if ($errors->has('email'))
    		<div class="error text-danger">{{ $errors->first('email') }}</div>
		@endif
	</div>
	<div class="from-group">	
		<label for="phone">Phone:</label>
		<input type="phone" name="phone" id="phone" class="form-control" value="{{ $order->phone }}">
		@if ($errors->has('phone'))
    		<div class="error text-danger">{{ $errors->first('phone') }}</div>
		@endif
	</div>
	<div class="form-gourp">
		<label for="address">Address:</label>
		<textarea name="address" id="address" class="form-control">{{ $order->address }}</textarea>
		@if ($errors->has('address'))
    		<div class="error text-danger">{{ $errors->first('address') }}</div>
		@endif
	</div><br>
		<button type="Submit" class="btn btn-default">Update Order</button>
</form>
</div>

@endsection