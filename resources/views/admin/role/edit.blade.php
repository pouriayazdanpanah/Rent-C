@component('admin.content',['title' => 'Edit role'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/role">Role</a></li>
        <li class="breadcrumb-item active">Edit role</li>
    @endslot

    @slot('script')
        <script>
            $('#role').select2({
                'placeholder':'Chose permissions'
            })
        </script>
    @endslot
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header bg-indigo card-outline">
                <h3 class="card-title">Edit role</h3>
            </div>
            <!-- /.card-header -->
            <form action="{{route('admin.role.update',$role->id)}}" method="post">
                @method('patch')
                @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="name" >{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name')is-invalid @enderror" name="name" value="{{$role->name}}" autocomplete="name" autofocus placeholder="EX:Admin role">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Permissions</label>
                                <div class="select2-indigo">
                                    <select class="select2" name="permissions[]" id="role" multiple="multiple" data-dropdown-css-class="select2-indigo" style="width: 100%;">
                                        @foreach(\App\Permission::all() as $permission)
                                            <option value="{{ $permission->id }}" {{ in_array($permission->id,$role->permissions->pluck('id')->toArray()) ? 'selected' : ''}}> {{$permission->name}}-{{$permission->label}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label for="label" >{{ __('Label') }}</label>
                                <textarea id="label" type="text" class="form-control @error('label')is-invalid @enderror" name="label"  autocomplete="label" autofocus placeholder="Description">{{$role->label}}</textarea>
                                @error('label')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <footer class="card-footer">
                    <div class="text-center">
                        <button class="btn bg-indigo">Update role</button>
                    </div>
                </footer>
            </form>
        </div>
        <!-- /.card -->
    </div><!-- /.container-fluid -->
@endcomponent
