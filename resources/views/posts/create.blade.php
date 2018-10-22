@extends('main')

@section('title', '|Create new  post')

@section('stylesheets')
	
	<link rel="stylesheet" href="css/parsley.css" crossorigin="anonymous">
	
@endsection

@section('content')
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
			<hr>
			{!! Form::open(array('route' => 'posts.store', 'data-parsley-validate'=>'')) !!}
				{{Form::label('title', 'Title:')}}
				{{Form::text('title', null, array('class'=>'form-control', 'required'=>''))}}
				
				{{Form::label('slug', 'Slug:')}}
				{{Form::text('slug', null, array('class'=>'form-control', 'required'=>'', 'minlength' => '5', 'maxlength'=>'255'))}}
				
				{{Form::label('category_id', 'Category:')}}
				<select class="form-control" name="category_id">
					@foreach($categories as $category)
						<option value='{{$category->id}}'>{{$category->name}}</option>
					@endforeach
				</select>
				
				{{Form::label('body', 'Body:')}}
				{{Form::textarea('body', null, array('class'=>'form-control', 'required'=>''))}}
				
				{{Form::submit('Create Post', array('class'=>'btn btn-primary btn-lg btn-block', 'style'=>'margin-top:20px'))}}
			{!! Form::close() !!}
		</div>
	</div>
	
@endsection

@section('scripts')
	
	<script src="js/parsley.min.js"></script>

@endsection