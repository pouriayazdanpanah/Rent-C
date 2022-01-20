@component('admin.content' , ['title' => 'Comments'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Comments</li>
    @endslot

    @slot('script')
        <script>
            $(function () {

                $('#search').on('keyup',function () {

                    let search = $(this).val();
                    let tr_include = "tr[id !='exclude']";

                    $(tr_include).each(function (){
                        $(this).toggle($(this).text().indexOf(search) != -1)
                    })
                });

            })
        </script>
    @endslot

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <input class="form-control mr-sm-2 mb-3 border-0 shadow-sm" type="search" id="search" placeholder="Search" aria-label="Search">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="card-title">Comment item</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-borderless table-responsive p-0">
                        <table class="table table-hover text-nowrap">

                            <tr id="exclude">
                                <th class="text-center">ID</th>
                                <th class="text-center">User</th>
                                <th class="text-center">Comment</th>
                                <th class="text-center">Approved</th>
{{--                                @can(['edit-permissions','delete-permissions'])--}}
                                    <th class="ex">Action</th>
{{--                                @endcan--}}
                            </tr>

                            <tbody>
                            @foreach($comments as $comment)
                                <tr >
                                    <td class="text-center">{{$comment->id}}</td>
                                    <td class="text-center">{{$comment->user->name.' '.$comment->user->last_name}}</td>
                                    <td class="text-center">{!! $comment->comment !!}</td>
                                    @if($comment->is_approved())
                                        <td class="text-center"><span class="badge badge-success">Approved</span></td>
                                    @endif

                                    <td class="text-center  ex" >
                                        <div class="d-flex">
{{--                                            @can('delete-comments')--}}
                                                <form action="{{route('admin.comment.destroy',$comment->id)}}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="border-0 bg-transparent ml-3"><i class="text-secondary fas fa-d"></i></button>
                                                </form>
{{--                                            @endcan--}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer border-0 ">
                        {{$comments->render()}}
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endcomponent
