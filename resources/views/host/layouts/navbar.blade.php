<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top" >
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item m-0">
                    <div class="{{isActive('host.home','active-link')}}">
                        <a class="nav-link {{isActive('host.home')}}" href="{{route('host.home')}}">{{__('Home')}}</a>
                    </div>
                </li>
                <li class="nav-item m-0">
                    <div class="{{isActive('host.reservation','active-link')}}">
                        <a class="nav-link {{isActive('host.reservation')}}" href="{{route('host.reservation')}}">{{__('Reservation')}}</a>
                    </div>
                </li>
                <li class="nav-item m-0">
                    <div class="{{isActive(['host.listing.index','host.listing.show'],'active-link')}}">
                        <a class="nav-link {{isActive(['host.listing.index','host.listing.show'])}}" href="{{route('host.listing.index')}}">{{__('Listing')}}</a>
                    </div>
                </li>
{{--                <li class="nav-item m-0">--}}
{{--                    <div class="">--}}
{{--                        <a class="nav-link" href="#">{{__('Home')}}</a>--}}
{{--                    </div>--}}
{{--                </li>--}}
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <div class="dropdown">
                    <button class="btn btn-blue-premium shadow-sm rounded-pill dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Auth::user()->name}}
                    </button>
                    <div class="dropdown-menu border-0 shadow-sm" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('profile')}}">{{__('Profile')}}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('host.registration.information')}}">{{__('Add a new listing')}}</a>
                        <a class="dropdown-item" href="{{route('home')}}">{{__('Switch to traveling')}}</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </ul>
        </div>
    </div>
</nav>
