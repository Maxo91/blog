@extends('main')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading"><h1>Reset password:</h1> </div>
				
				<div class="panel-body">
					
					{!! Form::open(['url'=>'password/reset', 'method'=>'post']) !!}
					
						{{ Form::hidden('token', $token) }}
						
						{{ Form::label('email', 'Email:') }}
						{{ Form::email('email', null, ['class'=>'form-control']) }}
						
						{{ Form::label('password', 'New Password:') }}
						{{ Form::password('password', ['class'=>'form-control']) }}
						
						{{ Form::label('password_confirmation', 'Confirm new password:') }}
						{{ Form::password('password_confirmation', ['class'=>'form-control']) }}
						<br>
						{{ Form::submit('Reset password', ['class'=>'btn btn-primary btn-block']) }}
						
					{!! Form::close() !!}
					
				</div>
			</div>
		</div>
	</div>
	
@endsection