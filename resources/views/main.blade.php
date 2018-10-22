<!doctype html>
<html lang="en">

		@include('partials._head')
		
		@yield('stylesheets')
 
<body>

		@include('partials._nav')	
	
	<br>
	<br>
	<div class="container">
		@include('partials._messages')
	
		@yield('content')
			
		@include('partials._footer')
	</div>
  
		@include('partials._javascript')
	
		@yield('scripts')
</body>
</html>