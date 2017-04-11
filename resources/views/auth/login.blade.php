@extends('layout.master')

@section('content')

	<div class="row">
		
		<form class="col-md-6 col-lg-6" method="POST" action="{{ route('login') }}">

			<h3>Login</h3>
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

			<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }} ">

				<label class="control-label" for="password">Passoword</label>
				<input type="password" class="form-control" id="password" name="password">

				<span class="help-block">
					@if($errors->has('password'))
						{{ $errors->first('password') }}
					@endif
				</span>

			</div>

			<div class="form-group">

				<input class="form-check-input" type="checkbox" id="remember" name="remember"> 
				<label class="form-check-label" for="remember">Remember me</label>
				
			 </div>



			<button type="submit" class="btn btn-default">Login</button>

		</form>

	</div>
@endsection