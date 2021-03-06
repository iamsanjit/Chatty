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
				<a href="{{route('friends.accept', $user->username)}}" class="btn btn-primary">
					Accept Friend Request
				</a>

			@elseif (Auth::user()->isFriendWith($user)) 

				<p>You and {{ $user->getFirstnameOrUsername() }} are friends.</p>

				<form action="{{route('friends.delete', $user->username)}}" method="POST">
					{{csrf_field()}}
					<button type="submit" class="btn btn-primary">Unfriend</button>
				</form>

			@elseif (Auth::user() != $user)
			
				<a href="{{route('friends.add', $user->username)}}" class="btn btn-primary">
					Send friend request
				</a>

			@endif

		@endif

	</div>

	<div class="col-xs-9">
		<div class="row">
			<div class="col-xs-12">
				@foreach($statuses as $status)
					@include('user.partials.status')
				@endforeach
			</div>
		</div>
	</div>
@endsection