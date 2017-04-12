@extends('layout.master')

@section('content')
	<div class="container">
		<!-- Friend request section, show only if user is authenticated -->
		@if(Auth::check()) 
			<div class="row">
				<h4>Friend requests</h4>
			</div>
		
			<div class="row">
				@if(!$guestUser->friendRequests()->count()) 
					<p>No friends requests.</p>
				@else

					@foreach($guestUser->friendRequests() as $user)
						@include('search.partials.userblock')
					@endforeach

				@endif
			</div>

		@endif

		<hr>

		<!-- Friends, Both guest and authenticated users can see this seciton -->
		<div class="row">
			@if(Auth::Check() && Auth::user()->username == $guestUser->username) 
				<h4>Your friends</h4>
			@else
				<h4>{{$guestUser->getFirstnameOrUsername()}}'s friends</h4>
			@endif
		</div>

		<div class="row">
			@if(!$guestUser->friends()->count()) 
				<p>No friends found.</p>
			@else

				@foreach($guestUser->friends() as $user)
					@include('search.partials.userblock')
				@endforeach

			@endif
		</div>
	</div>
@endsection