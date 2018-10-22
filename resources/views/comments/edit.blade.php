@extends('main')

@section('content')
	<div class="row">	
		<div class="col-md-8 col-md-offset-2">
			<h1>Edit Comment</h1>
			{{Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT'])}}
			
				{{Form::label('name', 'Name:')}}
				{{Form::text('name', null, ['class'=>'form-control', 'disabled'=>''])}}

				{{Form::label('email', 'Email:')}}
				{{Form::text('email', null, ['class'=>'form-control', 'disabled'=>''])}}
				
				{{Form::label('comment', 'Comment:')}}
				{{Form::text('comment', null, ['class'=>'form-control'])}}
				
				{{Form::submit('Update comment', ['class'=>'btn btn-primary', 'style'=>'margin-top:15px;'])}}
					
			{{Form::close()}}
		</div>
	</div>
@endsection