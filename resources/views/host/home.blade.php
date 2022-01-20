@extends('host.layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h5 class="text-secondary mb-3"> {{ __('Dashboard!') }}</h5>
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
                    <div class="col-md-5  col-12 mb-4 ">
                        <a class="card-link text-secondary" href="{{route('personal-info.index')}}">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                    <h4 class="text-dark card-title">
                                        <i class="fas fa-home text-blue-700"></i>
                                        <span class="text-blue-500">{{ __('Total listing') }}</span>
                                    </h4>
                                    <div class="text-center">
                                        <h2 class="text-secondary">{{$products->count()}}</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-5 col-12 mb-4 ">
                        <a class="card-link text-secondary" href="{{route('profile.twofactorauth.index')}}">
                            <div class="card border-0 shadow h-100">
                                <div class="card-body">
                                    <h4 class="text-dark card-title">
                                        <i class="fas fa-eye text-blue-700"></i>
                                        <span class="text-blue-500">{{__('View count')}}</span>
                                    </h4>
                                    <div class="text-center">
                                        <h2 class="text-secondary">{{$view_count}}</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-5 col-12 mb-3 ">
                        <div class="card border-0 shadow h-100">
                            <div class="card-body">
                                <h4 >
                                    <i class="fas fa-exchange-alt text-blue-700"></i>
                                    <span class="text-blue-500">{{ __('Reservation') }}</span>
                                </h4>
                                <div class="text-center">
                                    <h2 class="text-secondary">{{$reservationCount}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-12 mb-3 ">
                        <a class="card-link text-secondary" href="{{route('profile.bookmark')}}">
                            <div class="card border-0 shadow h-100">
                                <div class="card-body">
                                    <h4 class="text-dark card-title">
                                        <i class="fas fa-comment-alt text-blue-700"></i>
                                        <span class="text-blue-500">{{ __('Total Comment') }}</span>
                                    </h4>
                                   <div class="text-center">
                                       <h2 class="text-secondary">
                                           {{$commentNumber}}
                                       </h2>
                                   </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
