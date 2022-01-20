@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card border-light shadow">
                <div class="card-header border-light">{{ __('Login') }}</div>

                <div class="card-body p-5">
                           <div class="row justify-content-center">
                               <div class="col-md-6 text-center mb-3">
                                   <a class="btn btn-light shadow-sm" href="{{route('google.auth')}}">
                                       <svg id="Capa_1" enable-background="new 0 0 512 512" height="30" viewBox="0 0 512 512" width="30" xmlns="http://www.w3.org/2000/svg"><g><path d="m120 256c0-25.367 6.989-49.13 19.131-69.477v-86.308h-86.308c-34.255 44.488-52.823 98.707-52.823 155.785s18.568 111.297 52.823 155.785h86.308v-86.308c-12.142-20.347-19.131-44.11-19.131-69.477z" fill="#fbbd00"/><path d="m256 392-60 60 60 60c57.079 0 111.297-18.568 155.785-52.823v-86.216h-86.216c-20.525 12.186-44.388 19.039-69.569 19.039z" fill="#0f9d58"/><path d="m139.131 325.477-86.308 86.308c6.782 8.808 14.167 17.243 22.158 25.235 48.352 48.351 112.639 74.98 181.019 74.98v-120c-49.624 0-93.117-26.72-116.869-66.523z" fill="#31aa52"/><path d="m512 256c0-15.575-1.41-31.179-4.192-46.377l-2.251-12.299h-249.557v120h121.452c-11.794 23.461-29.928 42.602-51.884 55.638l86.216 86.216c8.808-6.782 17.243-14.167 25.235-22.158 48.352-48.353 74.981-112.64 74.981-181.02z" fill="#3c79e6"/><path d="m352.167 159.833 10.606 10.606 84.853-84.852-10.606-10.606c-48.352-48.352-112.639-74.981-181.02-74.981l-60 60 60 60c36.326 0 70.479 14.146 96.167 39.833z" fill="#cf2d48"/><path d="m256 120v-120c-68.38 0-132.667 26.629-181.02 74.98-7.991 7.991-15.376 16.426-22.158 25.235l86.308 86.308c23.753-39.803 67.246-66.523 116.87-66.523z" fill="#eb4132"/></g></svg>
                                       <strong> Login with Google</strong>
                                   </a>
                               </div>
                              <div class="col-md-6 text-center mb-3">
                                  <button type="button" class="btn btn-light shadow-sm" data-toggle="modal" data-target="#staticBackdrop">
                                      <svg version="1.1" id="Capa_1" width="30" height="30" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 405.333 405.333" style="enable-background:new 0 0 405.333 405.333;" xml:space="preserve"><path style="fill:#009688;" d="M373.333,266.88c-24.696,0.048-49.241-3.856-72.704-11.563c-10.971-3.831-23.161-1.25-31.637,6.699l-46.037,34.731c-49.441-24.823-89.557-64.931-114.389-114.368l33.813-44.928c8.537-8.543,11.59-21.136,7.915-32.64C142.558,81.316,138.633,56.735,138.667,32c0-17.673-14.327-32-32-32H32C14.327,0,0,14.327,0,32c0.235,206.089,167.244,373.098,373.333,373.333c17.673,0,32-14.327,32-32V298.88C405.333,281.207,391.006,266.88,373.333,266.88z"/></svg>
                                      <strong>Login with Phone</strong>
                                  </button>
                              </div>
                               <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                   <div class="modal-dialog">
                                       <div class="modal-content border-0 shadow p-2">
                                           <div class="modal-header border-0">
                                               <h5 class="modal-title" id="staticBackdropLabel">Login with phone</h5>
                                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                               </button>
                                           </div>
                                           <div class="modal-body">
                                               <form action="{{ route('phone.auth.login') }}" method="post">
                                                   @csrf
                                                    <div class="form-group">
                                                        <input type="number" name="phone" class="form-control border-0 bg-light shadow-sm @error('phone') is-invalid @enderror" required >
                                                        @error('phone')
                                                        <script>
                                                          $(function () {
                                                              $('#staticBackdrop').modal('show')
                                                          })
                                                        </script>
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-dark">Get code</button>
                                                        </div>
                                                    </div>
                                               </form>
                                           </div>

                                       </div>
                                   </div>
                               </div>
                           </div>
                    <hr class="my-3"/>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control border-light shadow-sm bg-light @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control border-light shadow-sm bg-light @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <small class="form-text text-muted">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </small>

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
                        <div class="form-group">
                            <div class="col-md-6 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Login') }}
                                </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
