<div class="col-xs-4 col-md-2">
	<div class="thumbnail">
		<img class="img-responsive" src="{{$user->getAvatarUrl(500)}}" alt="Username">
		<div class="caption">
			<h5>
				<a href="{{ route('profile.show', $user->username) }}">
					{{$user->getNameorUsername()}}
				</a>
			</h5>
			<p>{{$user->location ?: 'Location unavailable'}}</p>
		</div>
	</div>
</div>	