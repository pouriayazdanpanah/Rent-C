@php $n = 0; @endphp
@foreach($comments as $comment)
    @php $n++; @endphp
    <div class="card border-0 shadow-sm mb-3">
        <div class="card-body">
            <div class="media mb-4">
                <img class="mr-3 rounded-pill" src="{{profileImage($comment->user->id)}}" width="50px" height="50px" alt="Generic placeholder image">
                <div class="media-body">
                    <div class="row">
                        <div class="col-md-11 col-9">
                            <h5 class="mt-0 text-secondary">{{$comment->user->name." ".$comment->user->last_name}}</h5>
                            <span class="text-secondary">{{\Carbon\Carbon::parse($comment->created_at)->ago()}}</span>
                        </div>
                        <div class="col-md-1 col-2">
                            <button class="border-0 bg-transparent get-parent-id" type="button" data-toggle="collapse" data-target="#sendComment{{$comment->parent_id+$n}}" aria-expanded="false" aria-controls="sendComment{{$comment->parent_id+$n}}" data-id="{{$comment->parent_id}}">
                                <i class="fa fa-reply-all text-secondary"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <h5>
              {!! $comment->comment !!}
            </h5>
            @include('app.comments.replay-comment')
            <div class="collapse" id="sendComment{{$comment->parent_id+$n}}">
                <div class="card border-0 shadow-sm mb-3 bg-response-comment mt-4">
                    <div class="card-body">
                        <div class="media">
                            <img class="mr-3 rounded-pill" src="{{profileImage(auth()->user()->id)}}" width="50px" height="50px" alt="Generic placeholder image">
                            <div class="media-body">
                                <div class="row">
                                    <div class="col-md-11 col-9">
                                        <h5 class="mt-0 text-navy-blue">{{auth()->user()->name . " " . auth()->user()->last_name}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-info mt-3" role="alert">
                            Your comment will be displayed in the comments section after approval.
                        </div>
                        <form class="sendCommentForm">
                            <div class="card mt-3">
                                <input type="hidden" name="parent_id" value="{{$comment->id}}">
                                <textarea name="comment" class="textarea" placeholder="Place some text here"></textarea>
                            </div>
                            <div class="text-right mt-3 ">
                                <button class="btn btn-light show-sm" type="button" data-toggle="collapse" data-target="#sendComment{{$comment->parent_id+$n}}" aria-expanded="false" aria-controls="sendComment{{$comment->parent_id+$n}}" data-id="{{$comment->parent_id}}">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-navy-blue text-white shadow-sm">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endforeach
