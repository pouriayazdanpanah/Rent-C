@component('admin.content' , ['title' => 'Permission'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="">Home</a></li>
        <li class="breadcrumb-item active">Permission</li>
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
                    <h3 class="card-title">Permission item</h3>
                    <div class="form-inline float-right">
                        @can('create-permissions')
                            <div class="input-group-append ">
                                <a href="{{ route('admin.permission.create') }}" class="btn btn-outline-primary btn-sm ml-3 "><i class="fas fa-plus"></i> Add permission</a>
                            </div>
                        @endcan
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-borderless table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <tr id="exclude">
                            <th class="text-center">ID</th>
                            <th class="text-center">Permission</th>
                            <th class="text-center">Label</th>
                            @can(['edit-permissions','delete-permissions'])
                                <th class="ex">Action</th>
                            @endcan
                        </tr>

                            @foreach($permissions as $permission)
                                <tr >
                                    <td class="text-center">{{$permission->id}}</td>
                                    <td class="text-center">{{$permission->name}}</td>

                                    <td class="text-center">{{$permission->label}}</td>
                                    <td class="text-center  ex" >
                                        <div class="d-flex">
                                            @can('edit-permissions')
                                                <form action="{{route('admin.permission.edit',$permission->id)}}" method="get">
                                                    <button href="" class="border-0 bg-transparent "><i class="text-secondary fas fa-edit"></i></button>
                                                </form>
                                            @endcan
                                            @can('delete-permissions')
                                                <form action="{{route('admin.permission.destroy',$permission->id)}}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="border-0 bg-transparent ml-3"><i class="text-secondary fas fa-times"></i></button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                    </table>
                </div>
                <!-- /.card-body -->
                    <div class="card-footer border-0 ">
                        {{$permissions->render()}}
                    </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endcomponent
