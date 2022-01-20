@foreach($comment->child()->where('approved' , 1)->get() as $child)
    <div class="card border-0 shadow-sm mb-3 bg-response-comment mt-2">
        <div class="card-body">
            <div class="media mb-4">
                <img class="mr-3 rounded-pill" src="{{profileImage($child->user->id)}}" width="50px" height="50px" alt="Generic placeholder image">
                <div class="media-body">
                    <div class="row">
                        <div class="col-md-11 col-9">
                            <h5 class="mt-0 text-navy-blue">{{$child->user->name." ".$child->user->last_name}}</h5>

                            <span class="text-navy-blue">{{\Carbon\Carbon::parse($child->created_at)->ago()}}</span>
                        </div>
                        <div class="col-md-1 col-2">
                            <button class="border-0 bg-transparent get-parent-id" type="button" data-toggle="collapse" data-target="#sendComment{{$comment->parent_id+$n}}" aria-expanded="false" aria-controls="sendComment{{$comment->parent_id+$n}}" data-id="{{$comment->parent_id}}">
                                <i class="fa fa-reply-all text-secondary"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <span class="text-dark">
                <h5>
                    {!!$child->comment!!}
                </h5>
            </span>
        </div>
    </div>
@endforeach
