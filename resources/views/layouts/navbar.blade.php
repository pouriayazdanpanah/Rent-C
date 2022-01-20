<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top" >
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>

                    @endif
                @else
                        <li class="nav-item mr-2">
                            @if(auth()->user()->isAdminUser() || auth()->user()->isStaffUser())
                                <a class="btn btn-gray-700 shadow-sm rounded-pill mt-1" href="{{ route('admin.home') }}">{{ __('Admin panel')}}</a>
                            @endif
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown navbar-brand" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                <img src="{{is_null(Auth::user()->image)?asset('/img/application/profile/undraw_profile_pic_ic5t.svg'):asset(Auth::user()->image->url)}}" width="30" height="30" class="rounded-circle d-inline-block align-top image" alt="">
                                {{ Auth::user()->name }}

                            </a>
                            <div class="dropdown-menu dropdown-menu-right border-0 shadow-sm" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item {{isActive('home','bg-light')}}" href="{{route('home')}}">{{ __('Home') }}</a>
                                <a class="dropdown-item {{isActive('profile','bg-light')}}" href="{{route('profile')}}">{{ __('Profile') }}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <div class="dropdown-divider"></div>
                                @if(Auth::user()->isHostUser())
                                    <a class="dropdown-item" href="{{route('host.home')}}">
                                        <strong>Host panel</strong>
                                    </a>
                                @else
                                    <a class="dropdown-item" href="{{route('host.home')}}">
                                        <strong>Become Host</strong>
                                    </a>
                                @endif
                            </div>
                        </li>

                @endguest
            </ul>
        </div>
    </div>
</nav>
