@extends('layouts.app',['title' =>'Instance'])

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-1">
                <div class="card border-0 shadow-sm" >
                    <div class="card-header bg-light border-0">
                        Start Booking
                    </div>
                    <img class="card-img-top" src="{{render_image_cover_URL_attachment_id($product->id)}}">
                    <div class="card-body">

                            <div class="row ">
                                <div class="col-md-8 col-8 mb-2">
                                    <div class="text-secondary">
                                        <h5><span >{{$product['number_of_bed']}} Bed . {{$product['number_of_bathroom']}} Bath</span></h5>
                                    </div>
                                </div>
                                <div class="col-md-4 col-4">
                                    <div class="text-right">
                                        <span class="text-success">
                                            <h5>${{$product['price']}}<sub class="text-secondary"> / night</sub></h5>
                                          </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-1 border-bottom">
                                <div class="col-md-12 mb-4">
                                  <span>
                                    <a href="{{route('product', $product['slug'])}}" class="card-link text-dark">
                                        <h5><strong>{{$product['title']}}</strong></h5>
                                    </a>
                                  </span>
                                </div>
                            </div>
                        <div class="row pt-4">
                            <div class="col-md-12 mt-4 pb-2">
                                <ul class="list-unstyled">
                                    <li class="media">
                                        <img class="mr-3 rounded-circle" src="{{profileImage($user->id)}}"  width="70px" height="70px" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="mt-2 mb-2 title-size">{{$user->name." " .$user->last_name}}</h5>
                                            <span class="small-text"><i class="fas fa-map-marker-alt text-danger"></i> California</span>
                                            <span class="ml-4 small-text"> <i class="fa fa-bookmark text-info"></i> Super Host</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
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
                    </div>
                </div>
        </div>
        <div class="col-md-4 col-4">
                <div class="card border-0 shadow-sm mb-3" style="position: sticky; top: 80px">
                    <div class="card-header bg-light border-0 ">
                        <div class="text-blue-700">
                            <h4>Your information</h4>
                        </div>
                    </div>
                    <div class="card-body">
{{--                        <div class="row">--}}
                            <form class="form-row" action="/product/{{$product->slug}}/instance" method="post">
                                @csrf
                                <div class="col-md-12">
                                    <div class="row justify-content-center mb-3">
                                        <div class="col-md-12" id="refresh">

{{--                                            @if(request()->cookie('data_price'))--}}

                                                @foreach(request()->session()->get('data_price') as $key=>$value)
                                                    @if($key != 'status')
                                                        <div class="row {{($key=='Total price')?'mb-2':'mb-1'}}">
                                                            <div class="col-md-6 col-6">
                                                                <span class="{{($key=='Total price')?'font-weight-bold':'font-weight-normal'}}">{{$key}}</span>
                                                            </div>
                                                            <div class="col-md-6 col-6">
                                                                <input type="hidden" name="{{$key}}" value="{{$value}}">
                                                                <span class="{{($key=='Total price')?'text-success font-weight-bold':''}} float-right">{{$value}}{{ $key !='Number of guests' && $key !='Number of adults'&&$key!='Date Start' && $key!='Date End'?'$':''}}</span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach

{{--                                            @endif--}}
                                        </div>
                                    </div>
                                </div>


    {{--                        @if(!$product->isHost())--}}

                                <div class="col-md-12">
                                    <button class="btn btn-success btn-block">
                                  <span class="text-white">
                                    {{__('Instant Booking')}}
                                  </span>
                                    </button>
                                </div>
                            </form>

{{--                        @endif--}}
{{--                    </div>--}}
                </div>
            </div>
    </div>
    @endsection




