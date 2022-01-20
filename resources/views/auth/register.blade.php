@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="section light-bg">

                <ul class="nav nav-tabs nav-justified" id="myTab">
                    <li class="nav-item active">
                        <a class="nav-link active" data-toggle="tab"  href="#email"><h6>Register E-Mail</h6></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " data-toggle="tab"  href="#phone"><h6>Register PhoneNumber</h6></a>
                    </li>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="email">
                        <div class="card-body p-4">
                            <form class="" method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group">

                                    <label for="name">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control border-0 shadow-sm bg-light @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="form-group ">
                                    <label for="last_name">{{ __('last Name') }}</label>
                                    <input id="last_name" type="text" class="form-control border-0 shadow-sm bg-light @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="name" autofocus>

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="form-group ">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control border-0 shadow-sm bg-light @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="form-group ">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control border-0 shadow-sm bg-light @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form-group ">

                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control border-0 shadow-sm bg-light" name="password_confirmation" required autocomplete="new-password">

                                </div>

                                <div class="form-group">

                                    <x-re-captcha :has-error="$errors->has('g-recaptcha-response')"></x-re-captcha>
                                    @error('g-recaptcha-response')
                                    <span class="invalid-feedback">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="form-group  mb-0 mt-4">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-dark btn-lg">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="phone">
                        <div class="card-body p-4">
                            <form action="{{ route('phone.auth.register') }}" method="post">
                                @csrf

                                <div class="form-group">

                                    <label for="p-name">{{ __('Name') }}</label>
                                    <input id="p-name" type="text" class="form-control border-0 shadow-sm bg-light @error('p-name') is-invalid @enderror" name="p-name" value="{{ old('p-name') }}" required autocomplete="p-name" autofocus>

                                    @error('p-name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="form-group ">
                                    <label for="p-last-name">{{ __('last Name') }}</label>
                                    <input id="p-last-name" type="text" class="form-control border-0 shadow-sm bg-light @error('p-last-name') is-invalid @enderror" name="p-last-name" value="{{ old('p-last-name') }}" required autocomplete="p-last-name" autofocus>

                                    @error('p-last-name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="form-group ">
                                    <label for="phone">{{ __('Phone-Number') }}</label>
                                    <input id="phone" type="text" class="form-control border-0 shadow-sm bg-light @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="name" autofocus>

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="form-group">

                                    <x-re-captcha :has-error="$errors->has('g-recaptcha-response')"></x-re-captcha>
                                    @error('g-recaptcha-response')
                                    <span class="invalid-feedback">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="form-group  mb-0 mt-4">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-dark btn-lg">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        @if($errors->has('p-name') || $errors->has('p-last-name') || $errors->has('phone'))
                        <script>
                            $(function () {
                                $('#myTab li:last-child a').tab('show')
                            })
                        </script>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
