@extends('layouts.app')
@section('content')

<div class="container">
<button class="btn btn-secondary"><a href="{{ url('/books') }}">Continue Shopping</a></button>
<button class="btn btn-danger"><a href="{{ url('/clear_cart') }}">Clear Shopping</a></button><br><br>
	<table class="table table-bordered">
		<tr class="thead-light">
			<th>Book Title</th>
			<th>Quantity</th>
			<th>Unit Price</th>
			<th>Price</th>
		</tr>
		<?php $total=0; ?>

		@if(session('cart'))
			@foreach(session('cart') as $id=>$details)
			<?php $total += $details['price'] * $details['qty'] ?>
			<tr>
				<td>{{ $details['name'] }}</td>
				<td>{{ $details['qty'] }}</td>
				<td>{{ $details['price'] }}</td>
				<td>{{ $details['price']*$details['qty'] }}</td>
			</tr>
			@endforeach
		@endif
		<tr>
			<td colspan="3" align="right"><b>Total:</b></td>
			<td>${{$total}}</td>
		</tr>
	</table>
<form method="POST" action="{{ url('/orders') }}">
	{{ csrf_field() }}
	<h2>Order Now</h2>
	<div class="form-group">
		<label for="name">Your Name:</label>
		<input type="text" name="name" id="name" class="form-control">
		@if ($errors->has('name'))
    		<div class="error text-danger">{{ $errors->first('name') }}</div>
		@endif
	</div>
	<div class="form-group">
		<label for="email">Email:</label>
		<input type="text" name="email" id="email" class="form-control">
		@if ($errors->has('email'))
    		<div class="error text-danger">{{ $errors->first('email') }}</div>
		@endif
	</div>
	<div class="from-group">	
		<label for="phone">Phone:</label>
		<input type="phone" name="phone" id="phone" class="form-control">
		@if ($errors->has('phone'))
    		<div class="error text-danger">{{ $errors->first('phone') }}</div>
		@endif
	</div>
	<div class="form-gourp">
		<label for="address">Address:</label>
		<textarea name="address" id="address" class="form-control"></textarea>
		@if ($errors->has('address'))
    		<div class="error text-danger">{{ $errors->first('address') }}</div>
		@endif
	</div><br>
		<button type="Submit" class="btn btn-default">Submit Order</button>
		<button class="btn btn-default"><a href="{{ url('/books') }}">Continue Shopping</a></button>
</form>
	
</div>
@endsection	

<!-- <script>
var price = document.getElementsByClassName('total');
// loop classes
var i;
for(i=0;i<price.length;i++){
	console.log(price[i]);
}
// change price to int
// sum the price
// show in 
</script> -->