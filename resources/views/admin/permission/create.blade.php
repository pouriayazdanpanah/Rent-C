@component('admin.content',['title' => 'Add permission'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/permission">Permission</a></li>
        <li class="breadcrumb-item active">Add permission</li>
        @endslot

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-teal card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Add Permission</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <!-- form start -->
                        <form action="{{route('admin.permission.store')}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name" >{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name')is-invalid @enderror" name="name"  autocomplete="name" autofocus placeholder="EX:edit-user">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">{{ __('label') }}</label>
                                    <input type="text" class="form-control @error('label')is-invalid @enderror" id="last_name" name="label"   autocomplete="label" onfocusout placeholder="description">
                                    @error('label')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                              <div class="text-center">
                                  <button type="submit" class="btn bg-teal ">Add permission</button>
                              </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcomponent
