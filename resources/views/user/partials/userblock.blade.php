<div class="thumbnail">
	<img class="img-responsive" src="{{$user->getAvatarUrl(500)}}" alt="Username">
	<div class="caption">
		<h3>{{$user->getNameorUsername()}}</h3>
		<p>{{$user->username}}</p>
		<p>{{$user->location ?: 'Location unavailable'}}</p>
	</div>
</div>