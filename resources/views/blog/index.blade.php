@extends('main')



@section('content')

	<div class="row">
		<div class="col-md-12 col-md-offset-2">
			<h1>Blog</h1>
		</div>
	</div>
	
	@foreach($posts as $post)
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3>{{ $post->title }}</h3>
				<h6>Published: {{date('M j, Y', strtotime($post->created_at))}}</h6>
				
				<p>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body))>50 ? "...":" "}}</p>
				<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read more</a>
				<hr>
			</div>
		</div>
	@endforeach
	
	<div class="row">
		<div class="text-center">
		{!! $posts->links() !!}
		</div>
	</div>
	
@endsection