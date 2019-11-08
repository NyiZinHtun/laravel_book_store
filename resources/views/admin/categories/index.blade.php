@extends('layouts.app')
@section('content')
    <div class="container">
        <ul class="list-group">
            <h1>Category List</h1><br>
                @foreach($categories as $category)
                	<li class="list-group-item">
                		 {{ $category->name }} <br>
                  		<b>Remark:</b>{{ $category->remark }}               	

                	<div class="pull-right">
                        <a href="{{ url("admin/categories/edit/$category->id") }}" >Edit</a>|
                		<a href="{{ url("admin/categories/delete/$category->id") }}" class="text-danger">Delete</a>
                	</div>
                	</li>
                @endforeach
        </ul>

        <a href="{{ url('admin/categories/add') }}" class="btn btn-primary">+ New Category</a>
    </div>
@endsection