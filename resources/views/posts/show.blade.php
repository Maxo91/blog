@extends('main')

@section('title', '|View post')

@section('content')
	<div class="row">
		<div class="col-md-8">	
			<h1>{{ $post->title }}</h1>
			
			<p class="lead">{{$post->body}}</p>
			<hr>
			
			<div id="comments">
				<h3>Comments <small> {{$post->comments->count()}} total </small></h3>
				
				<table class="table">
					<thead>
						<th>Name </th>
						<th>Email</th>
						<th>Comment</th>
						<th></th>
					</thead>
					
					<tbody>
						@foreach($post->comments as $comment)
							<tr>
								<td>{{ $comment->name }}</td>
								<td>{{ $comment->email }}</td>
								<td>{{ $comment->comment }}</td>
								<td><a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-comment"></span></a><a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="shadow-none p-3 mb-5 bg-light rounded">
				<dl>
					<dt>URL slug:</dt>
					<dd><a href="{{route('blog.single', $post->slug)}}">{{route('blog.single', $post->slug)}}</a></dd>
				</dl>
				<dl>
					<dt>Category:</dt>
					<dd>{{ $post->category['name'] }}</dd>
				</dl>
				<dl>
					<dt>Created at:</dt>
					<dd>{{date('M j, Y h:ia', strtotime($post->created_at))}}</dd>
				</dl>
				<dl>
					<dt>Last updated:</dt>
					<dd>{{date('M j, Y h:ia', strtotime($post->updated_at))}}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'DELETE']) !!}
						
						{!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}
						
						{!! Form::close() !!}
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						{!! Html::linkRoute('posts.index', '<<See all posts', [], array('class' => 'btn btn-primary btn-block', 'style'=>'margin-top:20px;')) !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection