<div class="row">
	<div class="col-12">
		
		<form class="col-12" method="POST" action="">

			{{ csrf_field() }}
			
			<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} ">
				<textarea class="form-control" rows="3" id="status" name="status" value="" placeholder="What's new {{Auth::user()->getFirstnameOrUsername()}} ?"></textarea>	
			</div>

			<button type="submit" class="btn btn-default">Update Status</button>
		</form>

		<hr>

	</div>
</div>	