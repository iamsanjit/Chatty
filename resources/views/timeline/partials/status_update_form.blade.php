<div class="row">
	<div class="col-md-12">
		
		<form method="POST" action="{{route('status.post')}}">

			{{ csrf_field() }}
			
			<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }} ">
				<textarea class="form-control" rows="3" id="status" name="status" value="{{old('status') ?: '' }}" placeholder="What's new {{Auth::user()->getFirstnameOrUsername()}} ?"></textarea>	

				<span class="help-block">
					@if($errors->has('status'))
						{{ $errors->first('status') }}
					@endif
				</span>
			</div>

			<button type="submit" class="btn btn-default">Update Status</button>
		</form>

		<hr>

	</div>
</div>	