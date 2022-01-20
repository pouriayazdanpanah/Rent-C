@component('admin.content',['title' => 'User Create'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/user">User</a></li>
        <li class="breadcrumb-item active">Create User</li>
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
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-teal card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Create a new user</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.user.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-default-danger border-0 shadow-sm">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="name" >{{ __('Name') }}</label>
                                            <input id="name" type="text" class="form-control" name="name"  autocomplete="name" autofocus required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="last_name">{{ __('Last Name') }}</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name"   autocomplete="last_name" onfocusout required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="email">{{ __('E-Mail Address') }}</label>
                                            <input id="email" type="email" class="form-control " name="email"   autocomplete="email" required>
                                        </div>
                                    </div>
                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label for="position" >{{ __('Position') }}</label>
                                            <select name="position" class="form-control">
                                                <option value="admin">Admin</option>
                                                <option value="staff">Staff</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="password">{{ __('Password') }}</label>
                                            <input id="password" type="password" class="form-control " name="password"  autocomplete="new-password" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="password-confirm" >{{ __('Confirm Password') }}</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" required>
                                        </div>
                                    </div>

                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="verify" name="verify">
                                                <label class="form-check-label" for="verify">
                                                    Verified E-Mail for this user
                                                </label>
                                            </div>
                                        </div>
                                    <p>
                                        <button class="btn btn-light border-0 shadow-sm btn-block"  type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Role and Permissions</button>
                                    </p>
                                    <div class="collapse" id="collapseExample">
                                        <div class="card card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Roles</label>
                                                        <div class="select2-teal">
                                                            <select class="select2" name="roles[]" id="role" multiple="multiple" data-dropdown-css-class="select2-teal" style="width: 100%;">
                                                                @foreach(\App\Role::all() as $role)
                                                                    <option value="{{ $role->id }}" > {{$role->name}} = {{$role->label}} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Permissions</label>
                                                        <div class="select2-teal">
                                                            <select class="select2" name="permissions[]" id="permissions" multiple="multiple" data-dropdown-css-class="select2-teal" style="width: 100%;">
                                                                @foreach(\App\Permission::all() as $permission)
                                                                    <option value="{{ $permission->id }}" > {{$permission->name}} = {{$permission->label}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- /.col -->
                                            </div>
                                        </div>
                                    </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                           <div class="text-center">
                               <input type="submit" class="btn bg-teal" value="{{ __('Register') }}">
                           </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endcomponent
