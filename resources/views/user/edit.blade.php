@extends('layout.master')

@section('content')
	<div class="row">
		
		<form class="col-md-6 col-lg-6" method="POST" action="{{ route('profile.update', Auth::user()->username) }}">

			<h3>Update your profile</h3>
			<hr>

			{{ csrf_field() }}

			{{ method_field('PATCH') }}
			
			<div class="row">

				<div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }} col-md-6">
					
					<label class="control-label" for="first_name">First Name</label>

					<input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') ?: Auth::user()->first_name }}">

					<span class="help-block">
						@if($errors->has('first_name'))
							{{ $errors->first('first_name') }}
						@endif
					</span>

				</div>

		
				<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }} col-md-6">

					<label class="control-label" for="last_name">Last Name</label>

					<input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') ?: Auth::user()->last_name }}">
				
					<span class="help-block">
						@if($errors->has('last_name'))
							{{ $errors->first('last_name') }}
						@endif
					</span>

				</div>

			</div>


			<div class="form-group {{ $errors->has('location') ? 'has-error' : '' }} ">

				<label class="control-label" for="location">Location</label>

				<input type="text" class="form-control" id="location" name="location" value="{{old('location') ?: Auth::user()->location}}">
			
				<span class="help-block">
					@if($errors->has('location'))
						{{ $errors->first('location') }}
					@endif
				</span>

			</div>


			<button type="submit" class="btn btn-default">Update profile</button>

		</form>

	</div>
@endsection