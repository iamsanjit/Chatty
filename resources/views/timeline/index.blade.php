@extends('layout.master')

@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				@include('timeline.partials.status_update_form')

				
			</div>
		</div>
	</div>

@endsection