@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-lg-5">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header border-0 text-blue  ">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    <div class="alert alert-info border-0">
                        {{ __('Please confirm your password before continuing.') }}
                    </div>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-row justify-content-center">
                            <div class="form-group col-md-6">
                                <label for="password" class="col-form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                       <div class="text-center mb-2">
                           @if (Route::has('password.request'))
                               <a class="btn btn-link" href="{{ route('password.request') }}">
                                   {{ __('Forgot Your Password?') }}
                               </a>
                           @endif
                       </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
