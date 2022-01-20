@component('admin.content',['title'=>$product->title])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('admin.products')}}">Houses</a></li>
        <li class="breadcrumb-item active">{{$product->title}}</li>
    @endslot


    <div class="container-fluid">
        <!-- Bar -->
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row ">
                            @if(!$images->isEmpty())
                                @foreach($images as $image)
                                    <div class="col-md-3 mb-3" id="{{$image->id}}">
                                        <div class="card border-0 shadow-sm">
                                            <img class="image card-img-top" src="{{$image->url}}" width="100%" style="border-radius: 5px">
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
        <div class="row">
            <div class="col-md-12">
                <!-- Feature chart -->
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa fa-info"></i>
                            Information
                        </h3>
                        <div class="float-right d-flex">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" id="search" placeholder="Search" >
                            </div>
                        </div>
                        <div class="card-tools mr-5">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr id="exclude">
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Bed</th>
                                <th scope="col">Room</th>
                                <th scope="col">Bathroom</th>
                                <th scope="col">Guest</th>
                                <th scope="col">Views</th>

                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->categories}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->number_of_bed}}</td>
                                <td>{{$product->number_of_room}}</td>
                                <td>{{$product->number_of_bathroom}}</td>
                                <td>{{$product->number_of_guest}}</td>
                                <td>{{$product->view_count}}</td>
                                <td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body-->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!--Features Table-->
        <div class="row">
            <div class="col-md-6">
                <!-- Feature chart -->
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa fa-tag"></i>
                            Price & Fee
                        </h3>
{{--                        <div class="float-right d-flex">--}}
{{--                            <div class="input-group input-group-sm" style="width: 150px;">--}}
{{--                                <input type="text" name="table_search" class="form-control float-right" id="search" placeholder="Search" >--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="card-tools mr-5">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>

                    </div>
                    <div class="card-body">
                        @if(!is_null($product->fees))
                            <table class="table table-responsive-md">
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
                        @endif
                    </div>
                    <!-- /.card-body-->
                </div>
                <!-- /.card -->
            </div>
                <div class="col-md-6">
                    <!-- Feature chart -->
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-feather"></i>
                                Features
                            </h3>
                            {{--                        <div class="float-right d-flex">--}}
                            {{--                            <div class="input-group input-group-sm" style="width: 150px;">--}}
                            {{--                                <input type="text" name="table_search" class="form-control float-right" id="search" placeholder="Search" >--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
                            <div class="card-tools mr-5">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(!$product->features()->get()->isEmpty())
                                <div class="row mb-3 ">
                                    <div class="col-md-12 col-12">
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
                            @endif
                        </div>
                        <!-- /.card-body-->
                    </div>
                    <!-- /.card -->
                </div>
        </div>

        <div class="row">
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
    </div>
    @slot('script')
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

            $(function () {

                $('#search').on('keyup',function ()
                {
                    let search = $(this).val();
                    let tr_include = "tr[id !='exclude']";

                    $(tr_include).each(function ()
                    {
                        $(this).toggle($(this).text().indexOf(search) != -1)
                    })
                });
            });
        </script>
    @endslot
@endcomponent
