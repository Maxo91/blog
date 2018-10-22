@extends('main')

@section('content')
   		
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		  <h1>{{ $post->title }}</h1>
			<h5>Blog Post:</h5>
				  <p>{{ $post->body }}</p>
				  <hr>
				 <p>Posted in: {{ $post->category->name }}</p>
		</div>	
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>  
			{{ $post->comments()->count() }} Comments</h3>
			@foreach($post->comments as $comment)
				<div class="comment">
					<p><em>Name:</em> {{$comment->name}}</p>
					<p><em>Comment:</em> <br>{{$comment->comment}}</p>
				</div>
			@endforeach
		</div>
	</div>	
	<hr>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		{{ Form::open(['route' => ['comments.store'], 'method' => 'POST']) }}
				{{ Form::hidden('post_id', $post->id) }}
			<div class="col-md-6">
				{{Form::label('name', "Name:")}}
				{{Form::text('name', null, ['class' => 'form-control'])}}
			</div>
			<div class="col-md-6">
				{{Form::label('email', "Email:")}}
				{{Form::text('email', null, ['class' => 'form-control'])}}
			</div>
			<div class="col-md-12">
				{{Form::label('comment', "Comment:")}}
				{{Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5'])}}
			</div>
			<div class="col-md-12">
				{{ Form::submit('Add comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px']) }}
			</div>
		{{ Form::close() }}
		</div>	
	</div>
@endsection