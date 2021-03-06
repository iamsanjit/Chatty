<nav class="navbar navbar-default" role="navigation">

	<div class="container">

		<div class="navbar-header">
			<a class="navbar-brand" href="{{route('home')}}">Chatty</a>
		</div>

		<div class="collapse navbar-collapse">
		        
		       @if (Auth::check())
	       		        <ul class="nav navbar-nav">
	       				<li><a href="#">Timeline</a></li>
	       				<li>
	       					<a href="{{route('friends.index', Auth::user()->username)}}">
	       						Friends
	       					</a>
	       				</li>
	       		        </ul>
	       		        
	       		        <form class="navbar-form navbar-left" role="search" method="get" action="{{route('search') }}">
	       				<div class="form-group">
	       					<input type="text" name="query" class="form-control" placeholder="Find people">
	       				</div>
	       				<button type="submit" class="btn btn-default">Search</button>
	       		        </form>
		       @endif
		    
			<ul class="nav navbar-nav navbar-right">
				@if(Auth::check())

					<li>
						<a href="{{route('profile.show', Auth::user()->username)}}">
							{{Auth::user()->getNameOrUsername()}}
						</a>
					</li>

					<li>
						<a href="{{route('profile.edit', Auth::user()->username)}}">
							Update profile
						</a>
					</li>
					
					<li>
						<a href="{{route('logout')}}">Sign out</a>
					</li>

				@else
					<li><a href="{{route('registration')}}">Create new Account</a></li>
					<li><a href="{{route('login')}}">Login</a></li>
				@endif
			</ul>

		</div>

	</div>
	
</nav>
