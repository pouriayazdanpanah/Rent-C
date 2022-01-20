@component('admin.content',['title' => 'Edit User'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/user">User</a></li>
        <li class="breadcrumb-item active">Edit User</li>
        @endslot

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-indigo">
                    <div class="card-header">
                        <h3 class="card-title">Edit user</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @csrf
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                    <!-- form start -->
                        <form action="{{route('admin.user.update',$user->id)}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name" >{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}"  autocomplete="name" autofocus>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">{{ __('Last Name') }}</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}"  autocomplete="last_name" onfocusout>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control " name="email" value="{{ $user->email }}"  autocomplete="email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">{{ __('Optional') }}</label>
                                        <p>
                                            <button class="btn btn-light btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                Change Password
                                            </button>
                                        </p>
                                        <div class="collapse" id="collapseExample">
                                            <div class="card card-body">
                                                <div class="form-group">
                                                    <label for="password">{{ __('Password') }}</label>
                                                    <input id="password" type="password" class="form-control " name="password"  autocomplete="new-password">
                                                </div>

                                                <div class="form-group">
                                                    <label for="password-confirm" >{{ __('Confirm Password') }}</label>
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                                </div>
                                            </div>
                                        </div>

                                </div>
                            </div>
                            @if(! $user->email_verified_at)
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="verify" name="verify">
                                        <label class="form-check-label" for="verify">
                                            Verified E-Mail for this user
                                        </label>
                                    </div>
                                </div>
                                @endif
                            <div class="text-center">
                                <button type="submit" class="btn bg-indigo ">Update</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcomponent
