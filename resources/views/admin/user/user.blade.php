@component('admin.content' , ['title' => 'User'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">user</li>
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
                    <h3 class="card-title">User list</h3>
                    <div class="form-inline float-right">
                        @can('show-admin')
                            <div class="input-group-append float-right mr-3">
                                <a href="{{ route('admin.user.index',['admin' => 1]) }}" class="btn btn-outline-info btn-sm ml-3 "><i class="fas fa-user-shield"></i> Admins</a>
                            </div>
                        @endcan
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-borderless table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead >
                        <tr id="exclude">
                            <th class="text-center">ID</th>
                            <th class="text-center">User</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Mail</th>
                            <th class="text-center">Mail Verify</th>
                            <th class="text-center">Register Date</th>
                            @can('access-control')
                                <th class="ex">Action</th>
                            @elsecan('edit-user')
                                <th class="ex">Action</th>
                            @elsecan('delete-user')
                                <th class="ex">Action</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr >
                                    <td class="text-center">{{$user->id}}</td>
                                    <td class="text-center">{{$user->name}}</td>
                                    <td class="text-center">{{$user->phone}}</td>
                                    <td class="text-center">{{$user->email}}</td>
                                    @if($user->email_verified_at)
                                        <td class="text-center"><span class="badge badge-success">Approved</span></td>
                                    @else
                                        <td class="text-center"><span class="badge badge-danger">NotApproved</span></td>
                                    @endif
                                    <td class="text-center">{{$user->created_at}}</td>
                                    <td class="text-center ex" >
                                        <div class="d-flex">
                                            @can('edit-user')
                                                <form action="{{route('admin.user.edit',$user->id)}}" method="get">
                                                    <button href="" class="border-0 bg-transparent ml-2"><i class="text-secondary fas fa-user-edit"></i></button>
                                                </form>
                                            @endcan
                                            @can('access-control')
                                                @if($user->isStaffUser() || $user->isAdminUser())
                                                    <form action="{{route('admin.user.acl',$user->id)}}" method="get">

                                                        <button class="border-0 bg-transparent ml-2 " data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="text-gray fas fa-low-vision"></i></button>
                                                    </form>
                                                @endif
                                            @endcan
                                            @can('delete-user')
                                                <form action="{{route('admin.user.destroy',$user->id)}}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="border-0 bg-transparent ml-2"><i class="text-secondary fas fa-user-times"></i></button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                    <div class="card-footer border-0 ">
                        {{$users->render()}}
                    </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endcomponent
