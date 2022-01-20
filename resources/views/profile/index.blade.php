@extends('layouts.app',['title'=>'Profile'])

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10 ">
                <h5 class="text-secondary mb-3"> {{ __('You are logged in!') }}</h5>
                <h5 class="text- mb-1">
                    {{auth()->user()->name.' '.auth()->user()->last_name}}
                </h5>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-10">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-4  col-12 mb-4 ">
                        <a class="card-link text-secondary" href="{{route('personal-info.index')}}">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                    <h4 class="text-dark card-title">
                                        <i class="fas fa-user-edit text-blue-700"></i>
                                        <span class="text-blue-500">{{ __('Personal info') }}</span>
                                    </h4>
                                    <p class="text-secondary">{{__('Provide personal details and how we can reach you')}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-12 mb-4 ">
                        <a class="card-link text-secondary" href="{{route('profile.twofactorauth.index')}}">
                            <div class="card border-0 shadow h-100">
                                <div class="card-body">
                                     <h4 class="text-dark card-title">
                                         <i class="fas fa-unlock-alt text-blue-700"></i>
                                         <span class="text-blue-500">{{ __('Two-step verification') }}</span>
                                     </h4>
                                    <p class="text-secondary">{{__('Add another level of security to your account by enabling it')}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-12 mb-4 ">
                        <a class="card-link text-secondary" href="{{route('profile.security')}}">
                            <div class="card border-0 shadow h-100">
                                <div class="card-body">
                                    <h4 class="text-dark card-title">
                                        <i class="fas fa-shield-alt text-blue-700"></i>
                                        <span class="text-blue-500">{{__('Security')}}</span>
                                    </h4>
                                    <p class="text-secondary">{{__('Update your password and secure your account')}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-12 mb-3 ">
                        <div class="card border-0 shadow h-100">
                            <div class="card-body">
                                <h4 >
                                    <i class="far fa-credit-card text-blue-700"></i>
                                    <span class="text-blue-500">{{ __('Payments') }}</span>
                                </h4>
                                <p class="text-secondary">{{__('Review payments, payouts, coupons, gift cards, and taxes')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 mb-3 ">
                        <a class="card-link text-secondary" href="{{route('profile.bookmark')}}">
                            <div class="card border-0 shadow h-100">
                                <div class="card-body">
                                    <h4 class="text-dark card-title">
                                        <i class="fas fa-bookmark text-blue-700"></i>
                                        <span class="text-blue-500">{{ __('Bookmark') }}</span>
                                    </h4>
                                    <p class="text-secondary">
                                       {{__('Choose one of the items you have saved')}}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-12 mb-3">
                        <div class="card border-0 shadow h-100">
                            <div class="card-body ">
                                <h4 class="card-subtitle mb-2 card-title">
                                    <i class="fas fa-clinic-medical text-blue-700"></i>
                                    <span class="text-blue-500">{{ __('Host') }}</span>
                                </h4>
                                <p class="text-secondary">{{__('Get professional tools if you manage several properties ')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


{{--    <div class="card border-light shadow">--}}
{{--        <img src="{{asset('/img/nicolas-horn-MTZTGvDsHFY-unsplash.jpg')}}" class="shadow card-img-top mt-4 rounded-circle mx-auto d-block w-50" alt="...">--}}
{{--        <div class="card-body">--}}
{{--            <h4 class="card-title text-center mb-3">{{auth()->user()->name}} {{auth()->user()->last_name}}</h4>--}}
{{--            <h5 class="text-secondary mb-3"> {{ __('You are logged in!') }}</h5>--}}
{{--            <h5 class="text- mb-1"> {{auth()->user()->email}}</h5>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
