@component('admin.content',['title' => 'Access Control List'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/user">User</a></li>
        <li class="breadcrumb-item active">Access Control List</li>
    @endslot

    @slot('script')
        <script>
            $('#role').select2({
                'placeholder':'Chose role'
            });

            $('#permissions').select2({
                'placeholder':'Chose permissions'
            })

        </script>
    @endslot
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">

            <div class="card-header bg-orange">
                <h3 class="card-title text-light">Access Control List</h3>
            </div>
            <!-- /.card-header -->
            <form action="{{ route('admin.user.acl.store',$user->id) }}" method="post">
                @csrf
                <div class="card-body">
                    @if($errors->any())

                        <div class="alert alert-default-danger border-0 shadow-sm">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Roles</label>
                                <div class="select2-orange">
                                    <select class="select2" name="roles[]" id="role" multiple="multiple" data-dropdown-css-class="select2-orange" style="width: 100%;">
                                        @foreach(\App\Role::all() as $role)
                                            <option value="{{ $role->id }}" {{ in_array($role->id,$user->roles->pluck('id')->toArray()) ? 'selected' : ''}}> {{$role->name}}={{$role->label}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Permissions</label>
                                <div class="select2-orange">
                                    <select class="select2" name="permissions[]" id="permissions" multiple="multiple" data-dropdown-css-class="select2-orange" style="width: 100%;">
                                        @foreach(\App\Permission::all() as $permission)
                                            <option value="{{ $permission->id }}" {{ in_array($permission->id,$user->permissions->pluck('id')->toArray()) ? 'selected' : ''}}> {{$permission->name}}={{$permission->label}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="text-center text-light">
                        <button class="btn bg-orange ">Set</button>
                    </div>
                </div>
                <!-- /.card-body -->

            </form>
        </div>
        <!-- /.card -->
    </div><!-- /.container-fluid -->
@endcomponent
