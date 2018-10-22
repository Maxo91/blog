@extends('main')

@section('title', '|Edit post')

@section('stylesheets')
	<link rel="stylesheet" href="css/select2.min.css" crossorigin="anonymous">
@endsection

@section('content')

	<div class="container">
	
		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method'=>'PUT']) !!}
			<div class="row">	
				<div class="col-md-8">	
					{{Form::label('title', 'Title:')}}
					{{Form::text('title', null, array('class'=>'form-control', 'required'=>''))}}
					
					{{Form::label('slug', 'Slug:')}}
					{{Form::text('slug', null, array('class'=>'form-control', 'required'=>''))}}
					
					{{Form::label('category_id', 'Category:')}}
					{{Form::select('category_id', $categories, null, ['class' => 'form-control'])}}	
					
					{{Form::label('body', 'Body:', ['style'=>'margin-top:30px;'])}}
					{{Form::textarea('body', null, array('class'=>'form-control', 'required'=>''))}}
				</div>
				
				<div class="col-md-4">
					<div class="shadow-none p-3 mb-5 bg-light rounded">
						<dl>
							<dt>Created at:</dt>
							<dd>{{date('M j, Y h:ia', strtotime($post->created_at))}}</dd>
						</dl>
						<dl>
							<dt>Last upadated:</dt>
							<dd>{{date('M j, Y h:ia', strtotime($post->updated_at))}}</dd>
						</dl>
						<hr>
						<div class="row">
							<div class="col-sm-6">
								{!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
							</div>
							<div class="col-sm-6">
								{{ Form::submit('Save changes', ['class'=>'btn btn-primary btn-block']) }}
							</div>
						</div>
					</div>
				</div>
			</div>	
		{!! Form::close() !!}
	</div>

@endsection

@section('scripts')
	<script src="js/select2.min.js"></script>
@endsection