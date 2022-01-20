@extends('profile.layout',['title'=>'-Two Factor Authentication','header_sidebar'=>'Security'])

@section('main')
    <div class="card border-0 shadow mb-lg-5">
        <div class="card-header border-0">
            <div class="text-blue">
                <h5>
                    {{__('Two Factor Authentication')}}
                </h5>
            </div>
        </div>
        <div class="card-body">
        @if($errors->any())

            <div class="alert alert-danger border-0 shadow-sm">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>

        @endif
            <form action="" method="POST">
                @csrf
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        <label for="type">Type</label>
                        <select  name="type" id="type" class="form-control border-0 shadow-sm bg-light ">
                            @foreach(config('twofactor.types') as $key => $name)
                                <option value="{{ $key }}" {{ old('type') == $key || auth()->user()->twoFactor($key) ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" id="phone" class="form-control border-0 shadow-sm bg-light" placeholder="Please enter your phone number" value="{{  (auth()->user()->twoFactor('sms') == 1 || auth()->user()->phone!=null) ? auth()->user()->phone : '' }}">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group clo-md-4 ">
                        <input type="submit" class="btn btn-outline-success form-control" value="Update">
                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection

@section('sidebar')
    <div class="text-center mb-2">
        <h3 class="text-blue">
            <i class="fas fa-shield-alt text-blue"></i>
        </h3>
    </div>
    <div class="text-center">
        <p class="text-secondary mb-1 p-2">Update your password and secure your account</p>
    </div>
    <div class="text-center mt-1">
        <a href="{{route('profile.security')}}" class="btn btn-success text-white">Go to Security</a>
    </div>
@endsection
