<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#">Laravel blog</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			  <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/" class="nav-link">Home</a></li>
			  <li class="{{ Request::is('blog') ? "active" : "" }}"><a href="/blog" class="nav-link">Blog</a></li>
			  <li class="{{ Request::is('about') ? "active" : "" }}"><a href="/about" class="nav-link">About</a></li>
			  <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="/contact" class="nav-link">Contact</a></li>
			</ul>
			<div class="dropdown">
			@if(Auth::check())
			
				<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Hello {{ Auth::user()->email }}
				</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class="dropdown-item" href="{{route('posts.index')}}">Posts</a>
				<a class="dropdown-item" href="{{route('categories.index')}}">Categories</a>
				<a class="dropdown-item" href="{{url('auth/logout')}}">Logout</a>
			</div>
			
			@else
				
				<a href="{{route('login')}}" class="btn btn-primary">Log In</a>
				<a href="{{route('register')}}" class="btn btn-primary">Register</a>
			
			@endif
			</div>
		  </div>
	</nav>