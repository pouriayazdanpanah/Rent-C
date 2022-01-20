@extends('host.layouts.main')

@section('meta')
    <meta name="slug" content="{{ $product->slug }}">
@endsection
@section('link')
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- data picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
@endsection
@section('content')

    <div class="container-lg">

        <div class="row mb-3">
           <div class="card border-0 bg-transparent">
               <div class="card-header border-0 bg-light">
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <h4>
                                <span>{{$product->title}}</span>
                            </h4>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="text-right">
                                <a href="{{route('product',['product'=>$product->slug])}}" class="btn btn-gray-700">View Page</a>
                            </div>
                        </div>
                    </div>
               </div>
               <div class="card-body">
                   <div class="row justify-content-center">
                       <div class="col-md-8 col-12 mb-4" >

                           <div class="row mb-4">
                               <div class="col-md-12">
                                   <div class="card border-0 shadow-sm">
                                       <div class="card-body">
                                           <div class="row ">
                                               <div class="col-md-12">
                                                   <form action="{{route('host.listing.update-image',$product->slug)}}" method="Post" enctype="multipart/form-data">
                                                       @csrf
                                                       <div class="alert alert-primary" role="alert">
                                                          <div class="row justify-content-center">
                                                              <div class="col-md-12">
                                                                  <div class="text-center">
                                                                      <h1>
                                                                          <i class="fa fa-upload text-yellow-500"></i>
                                                                      </h1>
                                                                      <div class="col-md-12">
                                                                          <label>Choose your image file</label>
                                                                      </div>
                                                                      <div class="col-md-12">
                                                                          <label class="text-secondary"><em>JPG or PNG no larger than 5 MB</em></label>
                                                                      </div>
                                                                      <form>
                                                                          <label class="btn btn-gray-700 text-white" for="add-image-gallery" id="image-gallery">
                                                                              <i class="fa fa-plus"></i>
                                                                              Add Image<input type="file" class="custom-file-input" name="image" id="add-image-gallery" hidden>
                                                                          </label>
                                                                      </form>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-12">
                                                                  <div class="text-center">
                                                                      <input type="submit" class="btn btn-blue-premium" value="Upload" id="upload-image-gallery">
                                                                  </div>
                                                              </div>
                                                          </div>
                                                       </div>
                                                   </form>
                                               </div>
                                               @if(!$images->isEmpty())
                                                   @foreach($images as $image)
                                                       <div class="col-md-3 mb-3" id="{{$image->id}}">
                                                           <div class="card border-0 shadow-sm">
                                                               <img class="image card-img-top" src="{{$image->url}}" width="100%" style="border-radius: 5px">
                                                               <div class="card-body">
                                                                   <div class="text-center">
                                                                       <small><i class="fa fa-trash text-title pointer delete-image" data-id="{{$image->id}}"></i></small>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   @endforeach
                                               @else
                                                   <img class="mx-auto d-block image w-50" src="{{asset('/img/application/preview/undraw_Images_re_0kll.svg')}}" style="border-radius: 5px">
                                               @endif

                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>


                           <div class="row mb-4">
                               <div class="col-md-12 col-12">
                                   <div class="card border-0 shadow-sm">
                                       <div class="card-header border-0 bg-light">
                                           <div class="row">
                                               <div class="col-md-6 col-6">
                                                   <span class="text-blue-700">Edit listing info</span>
                                               </div>
                                               <div class="col-md-6 col-6">
                                                   <div class="float-right">
                                                       <a href="{{route('host.listing.edit-information',$product->slug)}}" class="bg-transparent border-0"><i class="fa fa-pen text-blue-700"></i></a>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
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
                                           <div class="row mb-2 ">
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

                                       </div>
                                   </div>
                               </div>
                           </div>

                           <div class="row mb-4">
                               <div class="col-md-12">
                                   <div class="card border-0 shadow-sm">
                                       <div class="card-header border-0 bg-light">
                                           <div class="row">
                                               <div class="col-md-6 col-6">
                                                   <span class="text-blue-700">Edit bed info</span>
                                               </div>
                                               <div class="col-md-6 col-6">
                                                   <div class="float-right">
                                                       <a href="{{route('host.listing.edit-bedroom',$product->slug)}}" class="bg-transparent border-0"><i class="fa fa-pen text-blue-700"></i></a>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="card-body">
                                           <!--Sleeping arrangements-->
                                           @if(!$bedInfos->isEmpty())
                                               <div class="row pb-5 ">
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
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="row mb-4">
                               <div class="col-md-12">
                                   <div class="card shadow-sm border-0">
                                       <div class="card-header border-0 bg-light">
                                           <div class="row">
                                               <div class="col-md-6">
                                                   <span class="text-blue-700">Edit features</span>
                                               </div>
                                               <div class="col-md-6">
                                                   <div class="float-right">
                                                       <a href="{{route('host.listing.edit-features',$product->slug)}}" class="bg-transparent border-0"><i class="fa fa-pen text-blue-700"></i></a>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="card-body">
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
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <!--map-->
                           <div class="row p-0">
                               <div class="col-md-12">
                                   <div class="card border-0 shadow-sm">
                                       <div class="card-header border-0 bg-light">
                                           <div class="row">
                                               <div class="col-md-6">
                                                   <span class="text-blue-700">Edit Address</span>
                                               </div>
                                               <div class="col-md-6">
                                                   <div class="float-right">
                                                       <a href="{{route('host.listing.edit-location',$product->slug)}}" class="bg-transparent border-0"><i class="fa fa-pen text-blue-700"></i></a>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="card-body">
                                           <div style="width:100%; height: 400px;" id="map"></div>
                                           <table class="table table-responsive-md">
                                               <tbody>
                                               <tr>
                                                   <td>State</td>
                                                   <td>City</td>
                                                   <td>Address</td>
                                                   <td>Zip-Code</td>
                                                   <td>Municipality_Zone</td>
                                               </tr>
                                               <tr>
                                                   <td>{{$product->address->state}}</td>
                                                   <td>{{$product->address->city}}</td>
                                                   <td>{{$product->address->formatted_address}}</td>
                                                   <td>{{$product->address->zip_code}}</td>
                                                   <td>{{$product->address->municipality_zone}}</td>
                                               </tr>
                                               </tbody>
                                           </table>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <!--end map-->
                       </div>

                       <div class="col-md-4">
                           <div class="row">
                               <div class="col-md-12">
                                   <div class="card border-0 shadow-sm mb-3" style="position: sticky; top: 80px">
                                       <div class="card-header bg-secondary border-0 ">
                                           <div class="row">
                                               <div class="col-md-6 col-6">
                                                   <div class="text-white">
                                                       <h4><span>$ </span>{{$product->price}}<small>/<sub><span>{{$product->price_label}}</span></sub></small></h4>
                                                   </div>
                                               </div>
                                               <div class="col-md-6 col-6">
                                                   <div class="text-right">
                                                       <a href="{{route('host.listing.edit-price',$product->slug)}}" class="bg-transparent border-0"><i class="fa fa-pen text-white"></i></a>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="card-body">
                                           <div class="row">
                                               <div class="col-md-12">
                                                   <table class="table table-borderless table-responsive-md">
                                                       <tbody>
                                                       <tr>
{{--                                                           {{dd($product->fees)}}--}}
                                                           <th scope="row">Cleaning Fee</th>
                                                           <td>{{$product->fees->cleaning_fee}} $</td>
                                                       </tr>
                                                       <tr>
                                                           <th scope="row">City Fee</th>
                                                           <td>{{$product->fees->city_fee}} $</td>
                                                       </tr>
                                                       <tr>
                                                           <th scope="row">Security Fee</th>
                                                           <td>{{$product->fees->security_deposit}} $</td>
                                                       </tr>
                                                       <tr>
                                                           <th scope="row">Guest Fee</th>
                                                           <td>{{$product->fees->guest_fee}} $</td>
                                                       </tr>
                                                       <tr>
                                                           <th scope="row">Service Fee</th>
                                                           <td>{{$product->fees->service_fees}} $</td>
                                                       </tr>
                                                       <tr>
                                                           <th scope="row">Taxes Fee</th>
                                                           <td>{{$product->fees->taxes}} $</td>
                                                       </tr>
                                                       </tbody>
                                                   </table>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-12">
                                   <div class="card border-0 shadow-sm">
                                       <div class="card-header border-0 bg-light">
                                           <div class="row">
                                               <div class="col-md-6">
                                                   <span class="text-blue-700">Edit Active date</span>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="card-body">
                                           <div class="row">
                                               <div class="col-md-12 mb-3">
                                                   <div class="text-center">
                                                       <span class="text-blue-700 mr-2" id="start">{{!is_null($product->bookingDate)?$product->bookingDate->arrived_at:'Not set'}}</span>
                                                       <i class="fa fa-arrow-right text-gray-800"></i>
                                                       <span class="text-blue-700 ml-2" id="end">{{!is_null($product->bookingDate)?$product->bookingDate->departed_at:'Not set'}}</span>
                                                   </div>
                                               </div>
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
                                                           <div class="mt-4">
                                                               <div class="text-center">
                                                                   <button type="button" class="btn btn-blue-premium" id="update-date">Update</button>
                                                               </div>
                                                           </div>

                                                       <!-- /.input group -->
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
        </div>
    </div>


@endsection
@section('script')
    <script src="{{asset('js/edit_single_page.js')}}"></script>

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
    <script>

        var uploadImageGallery = $('#upload-image-gallery');
        var imageGallery = $('#image-gallery');
        var addImageGallery = $('#add-image-gallery');
        uploadImageGallery.hide();


        addImageGallery.change(function (){
            imageGallery.hide();
            uploadImageGallery.show();
        })
    </script>



@endsection

