@extends('layout.master')

@section('content')
	<div class="col-xs-3">
		<div class="row">
			<div class="col-xs-12">
				@include('user.partials.userblock')
			</div>
		</div>
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