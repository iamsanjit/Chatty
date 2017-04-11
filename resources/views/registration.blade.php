@extends('layout.master')

@section('content')
	<div class="row">
		
		<form class="col-md-6 col-lg-6" method="POST" action="{{ route('registration') }}">

			<h3>Create an account</h3>
			<hr>

			{{ csrf_field() }}
		
			<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} ">
				
				<label class="control-label" for="email">Your email</label>	
				<input type="email" class="form-control" id="email" name="email" value=" {{ old('email') ?: '' }} ">

				<span class="help-block">
					@if($errors->has('email'))
						{{ $errors->first('email') }}
					@endif
				</span>

			</div>

 
			<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }} ">

				<label class="control-label" for="username">Choose a  username</label>
				<input type="text" class="form-control" id="username" name="username" value=" {{ old('username') ?: '' }} ">
			
				<span class="help-block">
					@if($errors->has('username'))
						{{ $errors->first('username') }}
					@endif
				</span>

			</div>



			<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }} ">

				<label class="control-label" for="password">Passoword</label>
				<input type="password" class="form-control" id="password" name="password">

				<span class="help-block">
					@if($errors->has('password'))
						{{ $errors->first('password') }}
					@endif
				</span>

			</div>


			<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }} ">

				<label class="control-label" for="password_confirmation">Password confirmation</label>
				<input type="password" class="form-control" id="password_confirmation" name="password_confirmation">

				<span class="help-block">
					@if($errors->has('password_confirmation'))
						{{ $errors->first('password_confirmation') }}
					@endif
				</span>

			</div>


			<button type="submit" class="btn btn-default">Sign up</button>

		</form>

	</div>

@endsection