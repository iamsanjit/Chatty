@extends('layout.master')

@section('content')
	<div class="row">
		<h3>Search result of "{{request('query')}}"</h3>
		<hr>
	</div>
	<div class="row">
		@if(!$users->count()) 
			<h2>No results found :/</h2>
		@else

			@foreach($users as $user)
				@include('search.partials.userblock')
			@endforeach

		@endif
	</div>

@endsection