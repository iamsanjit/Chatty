<div class="media">

        <a class="pull-left" href="{{route('profile.show', $status->user->username)}}">
                <img class="media-object img-responsive" alt="{{$status->user->getNameOrUsername()}}" src="{{$status->user->getAvatarUrl(50)}}">
        </a>

        <div class="media-body">

                <h4 class="media-heading">
                         <a href="{{route('profile.show', $status->user->username)}}">
                                {{$status->user->getNameOrUsername()}}
                        </a>
                </h4>

                <p>{{$status->body}}</p>

                <ul class="list-inline">
                        <li>{{$status->created_at->diffForHumans()}}</li>
                        <li><a href="#">Like</a></li>
                        <li>10 likes</li>
                </ul>


               {{--Replies--}}
                @foreach($status->replies as $reply)

                        <div class="media">
                                
                                <a class="pull-left" href="{{route('profile.show', $reply->user->username)}}">
                                        <img class="media-object" alt="{{$reply->user->getNameOrUsername()}}" src="{{$reply->user->getAvatarUrl(50)}}">
                                </a>

                                <div class="media-body">
                                        <h5 class="media-heading">
                                                <a href="{{route('profile.show', $reply->user->username)}}">
                                                        {{$reply->user->username}}
                                                </a>
                                        </h5>
                                        <p>{{$reply->body}}</p>
                                        <ul class="list-inline">
                                                <li>
                                                        {{$reply->created_at->diffForHumans()}}
                                                </li>
                                                <li><a href="#">Like</a></li>
                                                <li>4 likes</li>
                                        </ul>
                                </div>

                        </div>

                @endforeach

                @if(Auth::check() && (Auth::user()->isFriendWith($status->user) || Auth::user() == $status->user))
                    <form role="form" action="{{route('status.reply', $status->id)}}" method="post">

                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('reply-' . $status->id) ? 'has-error' : '' }}">
                                    
                                    <textarea name="reply-{{$status->id}}" class="form-control" rows="2" placeholder="Reply to this status"  value=" {{ old('email') ?: '' }} "></textarea>

                                    <span class="help-block">
                                            @if($errors->has('reply-'. $status->id))
                                                    {{ $errors->first('reply-'. $status->id) }}
                                            @endif
                                    </span>

                            </div>

                            <input type="submit" value="Reply" class="btn btn-default btn-sm">

                    </form>
                @endif

        </div>
</div>