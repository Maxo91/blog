@extends('main')

@section('title', '|Categories')

@section('content')
	
	<div class="row">
		<div class="col-md-8">
			<h1>All categories: </h1>
			<table class="table">
				<thead>
					<th>#</th>
					<th>Name</th>
				</thead>
				<tbody>
				@foreach($categories as $category)
					<tr>
						<td>{{$category->id}}</td>
						<td>{{$category->name}}</td>
					<tr>
				</tbody>
				@endforeach
			</table>
		</div>
		<div class="col-md-3">
			<div class="well">
				{!! Form::open(['routes'=>'categories.store', 'method'=>'POST' ]) !!}
					<h2>New category</h2>
					{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null, ['class'=>'form-control']) }}
					
					{{ Form::submit('Create category', ['class'=>'btn btn-primary']) }}
					
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	
@endsection