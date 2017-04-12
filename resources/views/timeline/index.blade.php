@extends('layout.master')

@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				@include('timeline.partials.status_update_form')

				@if(!$statuses->count())
					<p>There's no status in your timeline, yet.</p>
				@else
					@foreach($statuses as $status)
						@include('timeline.partials.status')
						<hr>
					@endforeach

					{{$statuses->render()}}
				@endif

			</div>
		</div>
	</div>

@endsection