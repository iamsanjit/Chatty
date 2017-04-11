<div class="col-xs-6 col-md-3">
	<a href="#">
		<div class="thumbnail">
			<img class="img-responsive" src="{{$user->getAvatarUrl(500)}}" alt="Username">
			<div class="caption">
				<h3>{{$user->getNameorUsername()}}</h3>
				<p>{{$user->location ?: 'Location unavailable'}}</p>
			</div>
		</div>
	</a>
</div>	