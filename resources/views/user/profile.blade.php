@extends('layout.master')

@section('content')
	<div class="col-xs-3">
		<div class="row">
			<div class="col-xs-12">
				@include('user.partials.userblock')
			</div>
		</div>

		@if(Auth::check())

			@if(Auth::user()->hasPendingFriendRequestOf($user))
			
				<strong>Waiting for {{ $user->getFirstnameOrUsername() }} to accept your friend request</strong>

			@elseif (Auth::user()->hasFriendRequestReceivedFrom($user))
				<a href="#" class="btn btn-primary">
					Accept Friend Request
				</a>

			@elseif (Auth::user()->isFriendWith($user)) 

				<p>You and {{ $user->getFirstnameOrUsername() }} are friends.</p>

			@else

				<a href="#" class="btn btn-primary">
					Send friend request
				</a>

			@endif

		@endif

	</div>

	<div class="col-xs-9">
		<div class="row">
			<div class="col-xs-12">
				<h4>Your updates</h4>
				<hr>
			</div>
		</div>
	</div>
@endsection