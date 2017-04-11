<div class="col-xs-6 col-md-3">
		<div class="thumbnail">
			<img class="img-responsive" src="{{$user->getAvatarUrl(500)}}" alt="Username">
			<div class="caption">
				<h3>
					<a href="{{ route('profile', $user->username) }}">
						{{$user->getNameorUsername()}}
					</a>
				</h3>
				<p>{{$user->location ?: 'Location unavailable'}}</p>
			</div>
		</div>
</div>	