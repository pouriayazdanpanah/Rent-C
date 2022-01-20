@extends('profile.layout',['title'=>'-Personal Info','header_sidebar'=>'Image Profile'])

@section('main')
    <div class="card border-0 shadow mb-lg-5">
        <div class="card-header border-0">
            <div class="text-blue">
                <h5>
                    {{__('Account Details')}}
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
        <form  action="{{ route('personal-info.update',auth()->user()->id) }}" method="post">
            @method('patch')
            @csrf

            <p>
                <button class="btn btn-light btn-block shadow-sm" type="button" data-toggle="collapse" data-target="#collapseinfo" aria-expanded="false" aria-controls="collapseExample">
                   {{ __('Personal info') }}
                </button>
            </p>
            <div class="collapse pl-3 pr-3 mb-5" id="collapseinfo">
               <div class="row">
                   <div class="col">
                       <label for="name">{{__('Name')}}</label>
                       <input id="name" type="text" class="form-control  " name="name" value="{{ auth()->user()->name }}" required autocomplete="name" autofocus placeholder="Enter your name">
                   </div>
                   <div class="col">
                       <label for="last_name">{{__('Last name')}}</label>
                       <input id="last_name" type="text" class="form-control" name="last_name" value="{{ auth()->user()->last_name }}" required autocomplete="last_name" autofocus placeholder="Enter your lastname">
                   </div>
               </div>
            </div>
            <p>
                <button class="btn btn-light btn-block shadow-sm" type="button" data-toggle="collapse" data-target="#collapseEmail" aria-expanded="false" aria-controls="collapseExample">
                    {{ __('E-Mail Address') }}
                </button>
            </p>
            <div class="collapse pl-3 pr-3" id="collapseEmail">
                <div class="form-group ">
                    <label for="email"> {{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ auth()->user()->email}}" required autocomplete="email" {{auth()->user()->email == ''?:"disabled"}}>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
            </div>
            <div class="form-group  mb-0 mt-4">
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn text-light">
                        {{ __('update') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
    </div>


@endsection

@section('sidebar')
@if(!is_null($profile))
    <div class="float-right">
        <div class="btn-group dropleft">
            <i class="fa fa-ellipsis-v text-secondary pointer" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
            <div class="dropdown-menu border-0 shadow-sm" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item pointer" id="delete">Delete image</a>
            </div>
        </div>
    </div>
@endif
<div class="row justify-content-center">
    <div class="col-md-12">
        <img class="rounded-circle mx-auto d-block image" src="{{is_null($profile)?asset('/img/application/profile/undraw_profile_pic_ic5t.svg'):asset($profile->url)}}" width="125px">
    </div>
    <div class="col-md-12">
        <div class="text-center mt-2">
            <span class="text-secondary"><em>JPG or PNG no larger than 5 MB</em></span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="text-center mt-3">
            <form action="{{route('personal-info.image')}}" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="custom-file">
                    <label class="btn btn-success text-white" for="customFile" id="imageFile">
                        Choose Image <input type="file" class="custom-file-input" name="image" id="customFile" hidden>
                    </label>
                    <input type="submit" class="btn btn-blue-premium" value="Upload" id="submit">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function (){
            var submit = $('#submit');
            submit.hide();
            var file = $('#customFile');

            file.change(function (){
                $('#imageFile').hide();
                submit.show();
            })

            $('#delete').on('click' , function (e){
                e.preventDefault();

                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                        'Content-type':'application/json'
                    }
                });

                $.ajax({
                    type:'delete',
                    url:'/profile/personal-info/delete-image',
                    success : function (data){
                        if (data.status) {
                            $('.image').attr('src','{{asset('/img/application/profile/undraw_profile_pic_ic5t.svg')}}')
                        }
                    }

                })
            })
        })
    </script>

@endsection
