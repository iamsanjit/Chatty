@extends('layout.master')

@section('content')
	<div class="row">
		@if(Auth::user()->username == $user->username) 
			<h4>Your friends</h4>
		@else
			<h4>{{$user->getFirstnameOrUsername()}}'s friends</h4>
		@endif
		<hr>
	</div>
	<div class="row">
		@if(!$user->friends()->count()) 
			<h2>You have no friends.</h2>
		@else

			@foreach($user->friends() as $user)
				@include('search.partials.userblock')
			@endforeach

		@endif
	</div>
@endsection