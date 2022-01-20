@extends('layouts.app',['title' =>'Home'])

@section('content')
    <div class="container-fluid ">

        <div class="row">

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <script>
                        swal({
                            title: "You Have Error",
                            text: "{{$error}}",
                            icon: "error",
                            button: "Ok!",
                        });
                    </script>
                @endforeach
            @endif

            <div class="col-md-9 col-12" style="position:relative;">

                <x-mapbox :height="650"/>
                <div class="text-center">

                    <button style="position: absolute; top: 90%; left: 10% ; background:#30475e  ;color: #ffffff ;width: 100px" type="button" class="btn  btn-lg  show-component" data-toggle="modal" data-target="#staticBackdrop">
                        <i class="fas fa-sliders-h"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-3 col-3 hide-component">
                <div class="card border-0 shadow p-3 " style="height: 650px;">
                    <div class="body">
                        <form  action="{{route('categories')}}" method="get">
                            <input type="text" class="lng" name="lng"  hidden>
                            <input type="text" class="lat" name="lat"  hidden>
                            <div class="text-bold">
                                <h5>Price : </h5>
                            </div>
                            <div class="form-row justify-content-center mb-4">
{{--                                <div class="col-md-5 col-5">--}}
{{--                                    <div class="text-secondary">--}}
{{--                                        <label for="bedroom">Bedroom</label>--}}
{{--                                    </div>--}}
{{--                                    <select class="form-control border-0 shadow-sm bg-light" name="bedroom">--}}
{{--                                        <option value="1 ">1</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-5 col-5">--}}
{{--                                    <div class="text-secondary">--}}
{{--                                        <label for="bathroom">Bathroom</label>--}}
{{--                                    </div>--}}
{{--                                    <select class="form-control border-0 shadow-sm bg-light" name="bathroom">--}}
{{--                                        <option value="1">1</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}

                                <div class="col-md-10 col-10 mt-4">
                                    <input type="text" class="js-range-slider"/>
                                </div>
                                <input type="text" class="price" name="price" value="4000" hidden>
                            </div>
                            <hr>
                            <div class="text-bold">
                                <h5>Property Type : </h5>
                            </div>
                            <div class="form-row justify-content-center mb-4">
                                <div class="col-md-10 col-10 mt-2">
                                    <div class="text-secondary">
                                        <label for="bathroom">Categories</label>
                                    </div>
                                    <select class="form-control border-0 shadow-sm bg-light " name="categories">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="text-bold">
                                <h5>Features : </h5>
                            </div>
                            <div class="row p-1">
                                <div class="col" style="max-height: 220px; overflow-y: auto;">

                                    @foreach($features->chunk(2) as $row)
                                            <div class="row p-3">
                                                @foreach($row as $items)
                                                <div class="col-md-6 col-6">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="{{$items->id}}" name="features[]" value="{{$items->name}},{{$items->id}}">
                                                        <label class="custom-control-label text-secondary" for="{{$items->id}}">{{$items->name}}</label>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                     @endforeach
                                </div>
                            </div>
                            <div class="text-center" style="p">
                                <input type="submit"  class="btn btn-dark btn-block mt-2" value="Show results">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-3 show-component" >
                <!-- Button trigger modal -->


                <!-- Modal -->
                <form  action="{{route('categories')}}" method="get">
                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" class="lng" name="lng"  hidden>
                                    <input type="text" class="lat" name="lat"  hidden>
                                    <div class="text-bold">
                                        <h5>Price : </h5>
                                    </div>
                                    <div class="form-row justify-content-center mb-4">
{{--                                        <div class="col-md-5 col-5">--}}
{{--                                            <div class="text-secondary">--}}
{{--                                                <label for="bedroom">Bedroom</label>--}}
{{--                                            </div>--}}
{{--                                            <select class="form-control border-0 shadow-sm bg-light" name="bedroom">--}}
{{--                                                <option value="1 ">1</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-5 col-5">--}}
{{--                                            <div class="text-secondary">--}}
{{--                                                <label for="bathroom">Bathroom</label>--}}
{{--                                            </div>--}}
{{--                                            <select class="form-control border-0 shadow-sm bg-light" name="bathroom">--}}
{{--                                                <option value="1">1</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
                                        <div class="col-md-10 col-10 mt-4">
                                            <input type="text" class="js-range-slider"/>
                                        </div>
                                        <input type="text" class="price" name="price" value="4000" hidden>
                                    </div>
                                    <hr>
                                    <div class="text-bold">
                                        <h5>Property Type : </h5>
                                    </div>
                                    <div class="form-row justify-content-center mb-4">
                                        <div class="col-md-10 col-10 mt-2">
                                            <div class="text-secondary">
                                                <label for="bathroom">Categories</label>
                                            </div>

                                            <select class="form-control border-0 shadow-sm bg-light " name="categories">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="text-bold">
                                        <h5>Features : </h5>
                                    </div>
                                    <div class="row p-1">
                                        <div class="col" style="max-height: 190px; overflow-y: auto;">
                                            @foreach($features->chunk(2) as $row)
                                                <div class="row p-3">
                                                    @foreach($row as $items)
                                                        <div class="col-md-6 col-6">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="{{$items->id+1.5}}" name="features[]" value="{{$items->name}},{{$items->id}}">
                                                                <label class="custom-control-label text-secondary" for="{{$items->id+1.5}}">{{$items->name}}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="text-center mt-2">
                                        <button type="button" class="btn btn-outline-success btn-block" data-dismiss="modal" aria-label="Close" >
                                            Set Value
                                        </button>
                                    </div>
                               </div>
                            </div>
                          </div>
                    </div>

                        <input type="submit"  class="btn btn-lg mt-2" style="position: absolute;top: -73px;left: 155px;width: 200%;background: #07689f; color: #ffffff;" value="Go To Homes">

                </form>
        </div>
    </div>
    <div  id="toast-welcome" role="alert" aria-live="assertive" aria-atomic="true" class="toast"  data-animation="true" data-autohide="true" data-delay="5000" style="position: absolute; top: 520px;
    left: 18px; z-index: 0;">
        <div class="toast-header">
            <strong class="mr-auto">We Help You</strong>
            <small>Just Now</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <div class="text-secondary">Hi Welcome</div>
            <div >For use this app please choose your location on the map</div>
        </div>
    </div>
@endsection

@section('link')
    <!-- Mapbox css link -->
    <link href="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css" type="text/css"/>
@endsection

@section('script')

    <script>
        setTimeout(() => {
            $("#toast-welcome").toast('show')
        }, 4000)

    </script>

    <!-- RangeSlider -->
    <script src="{{asset('/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <!-- RangeSlider Parameter -->
    <script>
        $(function () {
            $(".js-range-slider").ionRangeSlider({
                skin: "round",
                min     : 0,
                max     : {{$maxPrice}},
                from    : {{$minPrice}},
                to      : {{$maxPrice}},
                type    : 'double',
                step    : 1,
                prefix  : '$',
                prettify: true,
                grid: true,
                onFinish: function (data) {
                    $('.price').val(data.to);
                }
            });
        });

    </script>
@endsection

