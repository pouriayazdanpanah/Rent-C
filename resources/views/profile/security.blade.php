@extends('profile.layout',['header'=>'Security','header_sidebar' => 'Two Factor Authentication'])

@section('main')
    <div class="card border-0 shadow mb-5">
        <div class="card-header border-0">
            <div class="text-blue">
                <h5>
                    {{__('Security')}}
                </h5>
            </div>
        </div>
        <div class="card-body p-5">
        @if($errors->any())
            <div class="alert alert-danger shadow-sm border-0">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-width">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form  action="{{route('profile.security.update',auth()->user()->id)}}" method="post">
                @method('put')
                @csrf
                <div class="form-group ">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control border-0 shadow-sm bg-light" name="password" required autocomplete="new-password">
                </div>
                <div class="form-group ">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control border-0 shadow-sm bg-light" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="form-group  mb-0 mt-4">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn text-light">
                            {{ __('Update Password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card border-0 shadow mb-lg-5">
        <div class="card-header border-0">
            <div class="text-blue">
                <h5>
                    {{__('Active session')}}
                </h5>
            </div>
        </div>
        <div class="card-body p-5">
            <table class="table table-borderless table-responsive-lg">
                <tbody>
                    @foreach($session as $item)
                        <tr>
                            <td>
                                <div class="d-flex">
                                    <i class="fa fa-info-circle text-blue mr-2 p-1"></i>
                                     {{get_session_user_agent($item->user_agent)}}
                                </div>
                            </td>
                            <td>{{$item->ip_address}}</td>
                            <td>{{\Carbon\Carbon::parse($item->last_activity)->diffForHumans()}}</td>
                            <td>
                                @if(! is_session_set($item->id))
                                    <form action="{{route('profile.security.delete.session',$item->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-red-danger">Delete</button>
                                    </form>
                                @else
                                    <button disabled class="btn btn-blue-premium">Online</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


@section('sidebar')
    <div class="text-center mb-2">
        <h3 class="text-blue">
            <i class="fas fa-unlock-alt text-blue"></i>
        </h3>
    </div>
    <div class="text-center">
        <p class="text-secondary mb-1 p-2">Add another level of security to your account by enabling it</p>
    </div>
    <div class="text-center mt-1">
        <a href="{{route('profile.twofactorauth.index')}}" class="btn btn-success text-white">Active it</a>
    </div>
@endsection
