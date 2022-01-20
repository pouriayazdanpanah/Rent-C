@component('admin.content' , ['title' => 'Role'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Role</li>
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
                        <h3 class="card-title">Role item</h3>
                        <div class="form-inline float-right">
                           @can('create-roles')
                                <div class="input-group-append ">
                                    <a href="{{ route('admin.role.create') }}" class="btn btn-outline-primary btn-sm ml-3 shadow-sm"><i class="fas fa-plus"></i> Add role</a>
                                </div>
                           @endcan
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-borderless table-responsive p-0">
                        <table class="table table-hover text-nowrap">

                            <tr id="exclude">
                                <th class="text-center">ID</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Description</th>
                                @can(['edit-permissions','delete-permissions'])
                                    <th class="ex">Action</th>
                                @endcan
                            </tr>

                            <tbody>
                            @foreach($roles as $role)
                                <tr >
                                    <td class="text-center">{{$role->id}}</td>
                                    <td class="text-center">{{$role->name}}</td>

                                    <td class="text-center">{{$role->label}}</td>
                                    <td class="text-center  ex" >
                                        <div class="d-flex">

                                            @can('edit-user')
                                                <form action="{{route('admin.role.edit',$role->id)}}" method="get">
                                                    <button  class="border-0 bg-transparent "><i class="text-secondary fas fa-edit"></i></button>
                                                </form>
                                            @endcan
                                            @can('delete-roles')
                                                <form action="{{route('admin.role.destroy',$role->id)}}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="border-0 bg-transparent ml-3"><i class="text-secondary fas fa-times"></i></button>
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
                        {{$roles->render()}}
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endcomponent
