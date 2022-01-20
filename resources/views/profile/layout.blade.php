@extends('layouts.app')

@section('content')
    <div class="container" >
        @include('breadcrumb')
        <div class="row  justify-content-center">
            <div class="col-md-4 mb-5">
                <div class="card border-0 shadow ">
                    <div class="card-header border-0">
                       <div class="text-blue">
                            <h5>{{$header_sidebar}}</h5>
                       </div>
                    </div>
                    <div class="card-body">
                       @section('sidebar')

                        @show
                    </div>
                </div>
            </div>
            <div class="col-md-8">

                    @yield('main')

            </div>
        </div>
    </div>



@endsection
