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

               {{--  <div class="media">

                        <a class="pull-left" href="#">
                                <img class="media-object" alt="" src="">
                        </a>

                        <div class="media-body">
                                <h5 class="media-heading"><a href="#">Billy</a></h5>
                                <p>Yes, it is lovely!</p>
                                <ul class="list-inline">
                                        <li>8 minutes ago.</li>
                                        <li><a href="#">Like</a></li>
                                        <li>4 likes</li>
                                </ul>
                        </div>
                </div> --}}


                <form role="form" action="#" method="post">

                        <div class="form-group">
                                <textarea name="reply-1" class="form-control" rows="2" placeholder="Reply to this status"></textarea>
                        </div>

                        <input type="submit" value="Reply" class="btn btn-default btn-sm">

                </form>

        </div>
</div>