@extends('layouts.app')
@section('content')

<div class="container">
	<form method="post" action="{{url('admin/categories/add')}}">
		{{csrf_field()}}

		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" class="form-control">
		</div>
		<div class="form-group">
			<label>Remark</label>
			<input type="text" name="remark" class="form-control">
		</div>

		<input type="submit" value="Add Category" class="btn btn-primary">
		
	</form>
	
</div>

@endsection