@extends('layouts.app')
@section('content')

<div class="container">
	<form method="post" action="{{ url('admin/categories/edit/'.$category->id) }}">
		{{csrf_field()}}
		<!-- {{method_field('PUT')}} -->
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" class="form-control" value="{{ $category->name }}">
		</div>
		<div class="form-group">
			<label>Remark</label>
			<input type="text" name="remark" class="form-control" value="{{ $category->remark }}">
		</div>

		<input type="submit" value="Update Category" class="btn btn-primary">
		
	</form>
	
</div>

@endsection