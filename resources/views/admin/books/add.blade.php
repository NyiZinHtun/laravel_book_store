@extends('layouts.app')
@section('content')
	<div class="container">
		<form method="post" action="{{ url('admin/books/add') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<!-- {{ csrf_token() }} -->
			<h1>Book</h1>

			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control">
			</div>
			<div class="form-group">
				<label>author</label>
				<input type="text" name="author" class="form-control">
			</div>
			<div class="form-group">
				<label>Summary</label>
				<input type="text" name="summary" class="form-control">
			</div>
			<div class="form-group">
				<label>Price</label>
				<input type="text" name="price" class="form-control">
			</div>
			<div class="form-group">
				<label>Category</label>
				<select name="category_id" class="form-control">
					<option value="0">Choose Category</option>
					@foreach($categories as $category)

						<option value="{{ $category->id }}">
							{{ $category->name }}
						</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Cover</label>
				<input type="file" name="cover" class="form-control">
			</div>
			<input type="Submit" value="Add Book" class="btn btn-primary">
			
		</form>
			
	</div>



@endsection