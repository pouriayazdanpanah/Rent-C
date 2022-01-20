@extends('layouts.app',['title' => $product->title ])

@section('meta')
    <meta name="slug" content="{{ $product->slug }}">
@endsection
@section('link')
    <!--silk slider-->
    <link rel='stylesheet' href='{{asset('plugins/slick/css/slick.css')}}'>
    <link rel='stylesheet' href='{{asset('plugins/slick/css/slick-theme.css')}}'>
    <!--owl-carosel-->
    <link rel="stylesheet" href="{{asset('plugins/owl-carousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/owl-carousel/css/owl.theme.default.min.css')}}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- data picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
@endsection
@section('content')

    <div class="container">

        <div class="row mb-3">
            <div class="col-md-8 col-12" >

                <div class="row">
                    <div class="col-md-12">
                        <div class="cSlider cSlider--single shadow">
                            @foreach($images as $image)
                                <div class="cSlider__item">
                                    <img src="{{$image->url}}" style="width: 100%;">
                                </div>
                            @endforeach
                        </div>

                        <div class="cSlider cSlider--nav mt-1">
                            @foreach($images as $image)
                                <div class="cSlider__item">
                                    <img src="{{$image->url}}" style="width: 98%;">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="card border-0 shadow-sm" >

                            <!--card body-->
                            <div class="container">

                                <!--breadcrumb-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb bg-transparent">
                                                <li class="breadcrumb-item breadcrumb-size"><a href="#"><small>Home</small></a></li>
                                                <li class="breadcrumb-item breadcrumb-size"><a href="#"><small>Categories</small></a></li>
                                                <li class="breadcrumb-item breadcrumb-size active" aria-current="page"><a><small>{{$product->title}}</small></a></li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!--end breadcrumb-->

                                <div class="row">
                                    <div class="col-sm-10 mb-3">
                                        <div class="ml-3 mb-3">
                                            <h4 class="card-title title-size mb-3 font-weight-bold">{{$product->title}}</h4>
                                            <span><i class="fas fa-map-marker-alt text-danger"></i>{{$address->formatted_address}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 r-hide">
                                        <img src="{{profileImage($user->id)}}" width="60" height="60" class=" rounded-circle d-inline-block align-top" alt="">
                                    </div>
                                </div>
                            </div>
                            <!--end card body-->

                        </div>
                    </div>
                </div>


                <div class="row mb-4">
                    <div class="col-md-12 col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <!--icons-->
                                <div class="row mb-5 pb-5 border-bottom">
                                    <div class="col-md-3 col-6">
                                        <div class="text-center">
                                            <h1><i class="fas fa-home icon-secondary"></i></h1>
                                            <h5><small>Category</small></h5>
                                            <div class="font-weight-bolder">{{$product->categories}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="text-center">
                                            <h1><i class="fas fa-user icon-secondary"></i></h1>
                                            <h5><small>Accomodation</small></h5>
                                            <div class="font-weight-bolder"> {{$product->number_of_guest}} Guests</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6 ">
                                        <div class="text-center">
                                            <h1><i class="fas fa-bed icon-secondary"></i></h1>
                                            <h5><small>Bedrooms</small></h5>
                                            <div class="font-weight-bolder"> {{$product->number_of_bed}} Bedrooms</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="text-center">
                                            <h1><i class="fas fa-shower icon-secondary"></i></h1>
                                            <h5><small>Bathrooms</small></h5>
                                            <div class="font-weight-bolder"> {{$product->number_of_bathroom}} Full</div>
                                        </div>
                                    </div>
                                </div>

                                <!--end icons-->

                                <!--description-->
                                <div class="row mb-5 pb-5 border-bottom">
                                    <div class="col-md-12 col-12">
                                        <div class="card border-0">
                                            <h5 class="card-title ml-2"><strong>{{__('About This Home')}}:</strong></h5>
                                            <p class="card-text ml-4 ml-4 text-secondary">
                                                {!! $product->description !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--end description-->

                                <!--Details-->
                                <div class="row mb-5 pb-3 border-bottom">
                                    <div class="col-md-12 col-12">
                                        <div class="card border-0">
                                            <h5 class="card-title ml-2"><strong>{{__('Details')}}:</strong></h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul>
                                                        <ol>
                                                            <small>
                                                                <i class="fas fa-chevron-right mb-3 text-secondary"></i>
                                                            </small>
                                                            <span>ID: <strong>{{$product->id}}</strong></span>
                                                        </ol>
                                                        <ol>
                                                            <small>
                                                                <i class="fas fa-chevron-right mb-3 text-secondary"></i>
                                                            </small>
                                                            <span>Guests: <strong>{{$product->number_of_guest}} Member</strong></span>
                                                        </ol>
                                                        <ol>
                                                            <small>
                                                                <i class="fas fa-chevron-right mb-3 text-secondary"></i>
                                                            </small>
                                                            <span>Bedroom: <strong>{{$product->number_of_room}}</strong></span>
                                                        </ol>
                                                        <ol>
                                                            <small>
                                                                <i class="fas fa-chevron-right mb-3 text-secondary"></i>
                                                            </small>
                                                            <span>Bathroom: <strong>{{$product->number_of_bathroom}}</strong></span>
                                                        </ol>
                                                    </ul>
                                                </div>

                                                <div class="col-md-6">
                                                    <ul>
                                                        <ol>
                                                            <small>
                                                                <i class="fas fa-chevron-right mb-3 text-secondary"></i>
                                                            </small>
                                                            <span>Bed: <strong>{{$product->number_of_bed}}</strong></span>
                                                        </ol>
                                                        <ol>
                                                            <small>
                                                                <i class="fas fa-chevron-right mb-3 text-secondary"></i>
                                                            </small>
                                                            <span>Size: <strong>{{$product->sqft}}</strong></span>
                                                        </ol>
                                                        <ol>
                                                            <small>
                                                                <i class="fas fa-chevron-right mb-3 text-secondary"></i>
                                                            </small>
                                                            <span>Type: <strong>{{$product->categories}}</strong></span>
                                                        </ol>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end Details-->

                                <!--Sleeping arrangements-->
                                @if(!$bedInfos->isEmpty())
                                    <div class="row mb-4 pb-5 border-bottom">
                                        <div class="col-md-12">
                                            <div class="card border-0">
                                                <h5 class="ml-2 "><strong>{{__('Sleeping arrangements')}}:</strong></h5>
                                                <div class="row mt-4 ml-3">
                                                    @php
                                                        $n = 0;
                                                    @endphp
                                                    @foreach($bedInfos as $bedInfo)
                                                        <div class="col-md-4 mb-2">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="text-center">
                                                                        <h1><i class="fas fa-bed icon-secondary"></i></h1>
                                                                        <div class="font-weight-bolder mb-1">Bedroom : {{$n+=1}}</div>
                                                                        <h5><small> {{$bedInfo->number_of_bed}} {{$bedInfo->type_of_bed}}</small></h5>
                                                                        <h5><small> {{$bedInfo->number_of_guests}} Guests</small></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!--end Sleeping arrangements-->

                                <!--features-->
                                @if(!$product->features()->get()->isEmpty())
                                    <div class="row mb-3 ">
                                        <div class="col-md-12 col-12">
                                            <div class="card border-0">
                                                <h5 class="card-title ml-2"><strong>{{__('Features:')}}</strong></h5>
                                                <div class="row">
                                                    @foreach($product->features()->get()->chunk(4) as $features)
                                                        <div class="col-md-6">
                                                            <ul>
                                                                @foreach($features as $feature)
                                                                    <ol>
                                                                        <small>
                                                                            <i class="fas fa-chevron-right mb-3 text-secondary"></i>
                                                                        </small>
                                                                        <span class="text-secondary">{{$feature->name}}</span>
                                                                    </ol>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <!--end features-->

                                <!--map-->
                                <div class="row p-0">
                                    <div style="width:100%; height: 400px;" id="map"></div>
                                </div>
                                <!--end map-->

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="card border-0 shadow-sm" >

                            <!--card body-->
                            <div class="container">

                                <!--breadcrumb-->
                                <div class="row pt-4">
                                    <div class="col-md-12 border-bottom pb-2">
                                        <ul class="list-unstyled">
                                            <li class="media">
                                                <img class="mr-3 rounded-circle" src="{{profileImage($user->id)}}"  width="70px" height="70px" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="mt-2 mb-2 title-size">{{$user->name}}</h5>
                                                    <span class="small-text"><i class="fas fa-map-marker-alt text-danger"></i> California</span>
                                                    <span class="ml-4 small-text"> <i class="fa fa-bookmark text-info"></i> Super Host</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--end breadcrumb-->
                                <div class="row mt-4">
                                    <div class="col-md-12 mb-3">
                                        <button type="button" class="btn btn-outline-secondary btn-block" data-toggle="modal" data-target="#contact"> Contanct the Host </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="contact" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header border-0">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Contact Form</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form id="sendMessage">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control border-0 bg-light shadow-sm" name="user" value="{{auth()->user()->id}}" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Phone</label>
                                                                <input type="number" class="form-control border-0 bg-light shadow-sm" name="phone">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlTextarea1">Example textarea</label>
                                                                <textarea class="form-control border-0 bg-light shadow-sm" name="message" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Send</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-10 mb-3">
                                        <div class="ml-3 mb-3">
                                        </div>
                                    </div>
                                </div>
                                <!--end card body-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm mb-3" style="position: sticky; top: 80px">
                    <div class="card-header bg-secondary border-0 ">
                        <div class="text-white">
                            <h4>{{$product->price}}<small>/<sub>night</sub></small></h4>
                        </div>
                    </div>

                    @if(!(auth()->user()->reservation()->get()->isEmpty()))
                        @if(!(auth()->user()->reservation->product->first()->id == $product->id))
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Date range:</label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                            <span class="input-group-text border-0 shadow-sm">
                                              <i class="far fa-calendar-alt"></i>
                                            </span>
                                                </div>
                                                <input type="text" name="data" class="form-control float-right border-0 bg-light shadow-sm" id="reservation">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>
                                            <button class="btn btn-light btn-block shadow-sm" type="button" data-toggle="collapse" data-target="#collapsePersonNumber" aria-expanded="false" aria-controls="collapsePersonNumber">
                                                <i class="far fa-user"></i> <span class="btn-val"></span>
                                            </button>
                                        </p>
                                        <div class="collapse" id="collapsePersonNumber">
                                            <div class="card card-body  border-0 shadow-sm">
                                                <div class="row justify-content-center mb-3">
                                                    <div class="col-md-6 col-6 pt-1">
                                                        <h5><span class="per_counter ">1</span> <small>Adults</small></h5>
                                                    </div>
                                                    <div class="col-md-6 col-6">
                                                        <div class="float-right">
                                                            <div class="d-block">
                                                                <button class="btn btn-navy-blue btn-sm rounded-circle per_btn_dec">
                                                                    <i class="fa fa-minus text-white"></i>
                                                                </button>
                                                                <button class="btn btn-navy-blue btn-sm rounded-circle per_btn_inc">
                                                                    <i class="fa fa-plus text-white"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center mb-3">
                                                    <div class="col-md-6 col-6 pt-1">
                                                        <h5><span class="gue_counter">0</span> <small>Guests</small></h5>
                                                    </div>
                                                    <div class="col-md-6 col-6 pt-1">
                                                        <div class="float-right">
                                                            <div class="d-block">
                                                                <button class="btn btn-navy-blue btn-sm rounded-circle gue_btn_dec">
                                                                    <i class="fa fa-minus text-white"></i>
                                                                </button>
                                                                <button class="btn btn-navy-blue btn-sm rounded-circle gue_btn_inc">
                                                                    <i class="fa fa-plus text-white"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center mb-3">
                                                    <div class="col-md-12">
                                                        <button class="btn btn-sm btn-yellow btn-block"  id="apply">
                                                            <span class="spinner-border spinner-border-sm" id="loading"></span>
                                                            <span id="txt" class="text-white">Aplly</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-3">
                                    <div class="col-md-12" id="refresh">
                                        @if(request()->cookie('data_price'))

                                            @foreach(json_decode(request()->cookie('data_price')) as $key=>$value)
                                                @if($key != 'status' && $key!='Date Start' && $key!='Date End')
                                                    <div class="row {{($key=='Total price')?'mb-2':'mb-1'}}">
                                                        <div class="col-md-6 col-6">
                                                            <span class="{{($key=='Total price')?'font-weight-bold':'font-weight-normal'}}">{{$key}}</span>
                                                        </div>
                                                        <div class="col-md-6 col-6">
                                                            <span class="{{($key=='Total price')?'text-success font-weight-bold':''}} float-right">{{$value}}{{ $key !='Number of guests' && $key !='Number of adults'?'$':''}}</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                @if(!$product->user_id == auth()->user()->id)
                                    <div class="row">
                                        <div class="col">
                                            <form action="{{route('product.instance',$product->slug)}}">
                                                <button type="submit" class="btn btn-success btn-block">
                                              <span class="text-white">
                                                {{__('Instant Booking')}}
                                              </span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                                <hr>
                                <div class="row">
                                    @if($product->user_id == auth()->user()->id)
                                        <div class="col-md-12 mb-3">
                                            <a href="{{route('host.listing.show',$product->slug)}}"  class="btn btn-blue-premium shadow-sm btn-block">
                                                Edit information listing
                                            </a>
                                        </div>
                                    @else
                                        <div class="col-md-12 mb-3" >
                                            @if($product->favorite()->where('user_id',auth()->user()->id)->get()->isEmpty())
                                                <button class="btn btn-outline-secondary btn-block" id="favorite" data-id="1">
                                                    <i class="far fa-heart"></i> <span class="title">Add as your favorite</span>
                                                </button>
                                            @else
                                                <button class="btn btn-red-light btn-block" id="favorite" data-id="0">
                                                    <i class="far fa-heart"></i> <span class="title"> Your favorite</span>
                                                </button>
                                            @endif
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <button type="button" class="btn btn-outline-secondary btn-block" data-toggle="modal" data-target="#contact">
                                                Contact the host
                                            </button>
                                        </div>

                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="card-body">
                                <button disabled class="btn btn-success btn-block">
                              <span class="text-white">
                                {{__('You was reserved this place')}}
                              </span>
                                </button>
                            </div>
                        @endif
                    @else
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Date range:</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text border-0 shadow-sm">
                                              <i class="far fa-calendar-alt"></i>
                                            </span>
                                            </div>
                                            <input type="text" name="data" class="form-control float-right border-0 bg-light shadow-sm" id="reservation">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p>
                                        <button class="btn btn-light btn-block shadow-sm" type="button" data-toggle="collapse" data-target="#collapsePersonNumber" aria-expanded="false" aria-controls="collapsePersonNumber">
                                            <i class="far fa-user"></i> <span class="btn-val"></span>
                                        </button>
                                    </p>
                                    <div class="collapse" id="collapsePersonNumber">
                                        <div class="card card-body  border-0 shadow-sm">
                                            <div class="row justify-content-center mb-3">
                                                <div class="col-md-6 col-6 pt-1">
                                                    <h5><span class="per_counter ">1</span> <small>Adults</small></h5>
                                                </div>
                                                <div class="col-md-6 col-6">
                                                    <div class="float-right">
                                                        <div class="d-block">
                                                            <button class="btn btn-navy-blue btn-sm rounded-circle per_btn_dec">
                                                                <i class="fa fa-minus text-white"></i>
                                                            </button>
                                                            <button class="btn btn-navy-blue btn-sm rounded-circle per_btn_inc">
                                                                <i class="fa fa-plus text-white"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center mb-3">
                                                <div class="col-md-6 col-6 pt-1">
                                                    <h5><span class="gue_counter">0</span> <small>Guests</small></h5>
                                                </div>
                                                <div class="col-md-6 col-6 pt-1">
                                                    <div class="float-right">
                                                        <div class="d-block">
                                                            <button class="btn btn-navy-blue btn-sm rounded-circle gue_btn_dec">
                                                                <i class="fa fa-minus text-white"></i>
                                                            </button>
                                                            <button class="btn btn-navy-blue btn-sm rounded-circle gue_btn_inc">
                                                                <i class="fa fa-plus text-white"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center mb-3">
                                                <div class="col-md-12">
                                                    <button class="btn btn-sm btn-yellow btn-block"  id="apply">
                                                        <span class="spinner-border spinner-border-sm" id="loading"></span>
                                                        <span id="txt" class="text-white">Aplly</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-3">
                                <div class="col-md-12" id="refresh">
                                    @if(request()->cookie('data_price'))

                                        @foreach(json_decode(request()->cookie('data_price')) as $key=>$value)
                                            @if($key != 'status' && $key!='Date Start' && $key!='Date End')
                                                <div class="row {{($key=='Total price')?'mb-2':'mb-1'}}">
                                                    <div class="col-md-6 col-6">
                                                        <span class="{{($key=='Total price')?'font-weight-bold':'font-weight-normal'}}">{{$key}}</span>
                                                    </div>
                                                    <div class="col-md-6 col-6">
                                                        <span class="{{($key=='Total price')?'text-success font-weight-bold':''}} float-right">{{$value}}{{ $key !='Number of guests' && $key !='Number of adults'?'$':''}}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            @if(!($product->user_id == auth()->user()->id))
                                <div class="row">
                                    <div class="col">
                                        <form action="{{route('product.instance',$product->slug)}}">
                                            <button type="submit" class="btn btn-success btn-block">
                                              <span class="text-white">
                                                {{__('Instant Booking')}}
                                              </span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                            <hr>
                            <div class="row">
                                @if($product->user_id == auth()->user()->id)
                                    <div class="col-md-12 mb-3">
                                        <a href="{{route('host.listing.show',$product->slug)}}"  class="btn btn-blue-premium shadow-sm btn-block">
                                            Edit information listing
                                        </a>
                                    </div>
                                @else
                                    <div class="col-md-12 mb-3" >
                                        @if($product->favorite()->where('user_id',auth()->user()->id)->get()->isEmpty())
                                            <button class="btn btn-outline-secondary btn-block" id="favorite" data-id="1">
                                                <i class="far fa-heart"></i> <span class="title">Add as your favorite</span>
                                            </button>
                                        @else
                                            <button class="btn btn-red-light btn-block" id="favorite" data-id="0">
                                                <i class="far fa-heart"></i> <span class="title"> Your favorite</span>
                                            </button>
                                        @endif
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <button type="button" class="btn btn-outline-secondary btn-block" data-toggle="modal" data-target="#contact">
                                            Contact the host
                                        </button>
                                    </div>

                                @endif
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <div class="border-bottom mb-4">
                    <h5 class="hr-title-med">Recommended:</h5>
                </div>
                <div class="card-deck">
                  @foreach($recommendedProducts as $items)
                      @if(round($items['similarity']*100) > get_static_option('similarity_rate'))
                            <div class="card mb-3 border-0 shadow-sm" >
                                <img  class="card-img-top" src="{{render_image_cover_URL_attachment_id($items['id'])}}" alt="...">
                                <div class="card-body">
                                    <div class="row mb-1">
                                        <div class="col-10">
                                            <div class="text-secondary">
                                                <span>{{$items['number_of_bed']}}Bed . {{$items['number_of_bathroom']}}Bath</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-12">
                                        <span>
                                             <a class="card-link text-dark" href="{{route('product', $items['slug'])}}">
                                                 <h5>{{$items['title']}}</h5>
                                             </a>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="row mb-1 ">
                                        <div class="col">
                                        <span class="text-success">
                                          <h5>${{$items['price']}}<small class="text-dark">/<sub>night</sub></small></h5>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <span class="text-secondary">Similarity : </span>
                                            @if(round($items['similarity']*100) >= 70)
                                                 <span class="text-green">{{round($items['similarity']*100)."%"}}</span>
                                            @else
                                                <span class="text-blue-500">{{round($items['similarity']*100)."%"}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                  @endforeach
              </div>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-md-12">
                @if(!$product->comments()->where(['parent_id'=>0 , 'approved'=>1])->get()->isEmpty())
                <div class="border-bottom mb-4">
                    <h5 class="hr-title-min">Reviews:</h5>
                </div>
                @endif
{{--                {{dd($product->user_id == auth()->user()->id)}}--}}
                @if(!($product->user_id == auth()->user()->id))
                    <div class="card border-0 shadow-sm bg-light-yellow mb-3" id="commentBody">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <span class="text-dark mt-2"><h5>Comment your viewpoint</h5></span>
                                        </div>
                                        <div class="col-md-3">
                                            <button class="btn btn-navy-blue text-white shadow-sm float-right sendComment" type="button" data-toggle="collapse" data-target="#sendComment" aria-expanded="false" aria-controls="sendComment">
                                                Create new comment
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="card border-0 bg-white">
                                        <div class="collapse" id="sendComment">
                                            <div class="alert alert-info mt-3" role="alert">
                                                Your comment will be displayed in the comments section after approval.
                                            </div>
                                            <form class="sendCommentForm">
                                                <div class="card ">
                                                    <input type="hidden" name="parent_id" value="0">
                                                    <textarea name="comment" class="textarea" placeholder="Place some text here"></textarea>
                                                </div>
                                                <div class="text-right mt-3 ">
                                                    <button class="btn btn-light shadow-sm" type="button" data-toggle="collapse" data-target="#sendComment" aria-expanded="false" aria-controls="sendComment">
                                                        Cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-navy-blue text-white shadow-sm">Send</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endif
                @include('app.comments.comment',['comments'=>$product->comments()->where(['parent_id'=>0 , 'approved'=>1])->get()])
            </div>
        </div>


    </div>


@endsection
@section('script')
    <script src="{{asset('js/single_product.js')}}"></script>
    <!--sikck-js-->
    <script src='https://cdn.jsdelivr.net/npm/slick-carousel@1.7.1/slick/slick.js'></script>
    <script  src="{{asset('plugins/slick/js/script.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!--datapicker-->
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!--owl-carosel-->
    <script src="{{asset('plugins/owl-carousel/js/owl.carousel.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!--mapbox-js-->
    <script src="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css" rel="stylesheet" />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css" type="text/css"/>
    <!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>

    <script type="text/javascript">
        mapboxgl.accessToken = 'pk.eyJ1IjoicG91c3BhcmtlciIsImEiOiJja2gweXhvNjMwOWY0MnhxZmJybHhtNzhxIn0.lPwI2EFr7P0dOVtPjMzXUg';
        mapboxgl.setRTLTextPlugin(
            'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js',
            null,
            true // Lazy load the plugin
        );
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/outdoors-v11',
            center: [{{$address->lng}}, {{$address->lat}}],
            zoom: 13
        });

        var geojson = {
            type: 'FeatureCollection',
            features: [{
                type: 'Feature',
                geometry: {
                    type: 'Point',
                    coordinates: [{{$address->lng}},{{$address->lat}}],
                },
                properties: {
                    title: 'CQ Flooring',
                    description: '<div class="text-danger">hello</d>'
                }
            },
            ]
        };
        /**mapbox tools*/
        geojson.features.forEach(function(marker) {

            // create a HTML element for each feature
            var el = document.createElement('div');
            el.className = 'marker';

            // make a marker for each feature and add to the map
            new mapboxgl.Marker(el)
                .setLngLat(marker.geometry.coordinates)
                .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups
                    .setHTML('<h5>' + marker.properties.title + '</h5>' + marker.properties.description))
                .addTo(map);
        });

    </script>



@endsection

