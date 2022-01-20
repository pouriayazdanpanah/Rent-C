@extends('layouts.app',['title' => 'Categories'])
@section('link')
    <!--owl-carosel-->
    <link rel="stylesheet" href="{{asset('plugins/owl-carousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/owl-carousel/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
        <link href="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col scroll col-responsive" >
                <div class="row justify-content-start mb-5">
                    <div class="col-md-12">
                        <div class="border-bottom mb-3">
                            <h5 class="hr-title-min">Categories:</h5>
                        </div>
                        <div class="owl-carousel">
                            @foreach($categories as $category)
                                <div class="item">
                                    <button class="btn btn-light shadow-sm  mb-1">{{$category->name}}</button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-around" >
                    @foreach($recommendedProducts as $product)
{{--                        {{dd($product)}}--}}
                        @if($product["id"] != 0)
                            <div class="col-md-5 mb-5 container-responsive" >
                                <div class="card h-100 border-0 mb-5">
                                    <div class="zoom">
                                        <a href="{{route('product', $product['slug'])}}">
                                            <img class="card-img-top shadow-sm rounded" src=" {{render_image_cover_URL_attachment_id($product['id'])}}" alt="" style="height: 250px;">
                                        </a>
                                    </div>
                                    <div class="bg-white p-2 shadow-sm" style="position: absolute ; top: 75%; left:3.5% ; z-index: 0 ;width: 93%; height: 120px; border-radius: 10px;">
                                        <div class="container">
                                            <div class="row ">
                                                <div class="col-md-10 col-10">
                                                    <div class="text-secondary">
                                                        <span>{{$product['number_of_bed']}} Bed . {{$product['number_of_bathroom']}} Bath</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-2" >
                                                    <div class="favorite">
                                                        <div class="float-right">
                                                            {!! render_btn($product['slug'] ,auth()->user()->id) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-md-12">
                                                  <span>
                                                    <a href="{{route('product', $product['slug'])}}" class="card-link text-dark">
                                                        <h5><strong>{{$product['title']}}</strong></h5>
                                                    </a>
                                                  </span>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col">
                                              <span class="text-success">
                                                <h5>${{$product['price']}}<sub class="text-secondary"> / night</sub></h5>
                                              </span>
                                                </div>
                                            </div>
                                            <div class="row">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
                <button class="btn btn-blue-premium shadow-sm rounded-pill fix-button-map hide-button-map" data-toggle="modal" data-target="#staticBackdrop" id="map-button">
                    <i class="fa fa-map"></i>
                    Map
                </button>
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h5 class="modal-title" id="staticBackdropLabel">Map</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="responsive-map">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 hide-map" id="desktop-map">

            </div>
        </div>

    </div>
@endsection
@section('script')

    <script src="{{asset('js/categories.js')}}"></script>
    <!--owl-carosel-->

    <script src="{{asset('plugins/owl-carousel/js/owl.carousel.min.js')}}"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            margin:10,
            loop:false,
            autoWidth:true,
            items:4
        })
    </script>
    <script>
        width = window.innerWidth;
        desktop_element= $('#desktop-map');
        responsive_element = $('#responsive-map');
        if (width >= 1536 || width >=1366){
            desktop_element.append( `<x-mapbox-items/>`)
        }
        if (width < 1536 || width <1366){
            responsive_element.append( `<x-mapbox-items/>`)
        }

    </script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
    <!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>

    <script type="text/javascript">
        mapboxgl.accessToken = "pk.eyJ1IjoicG91c3BhcmtlciIsImEiOiJja2gweXhvNjMwOWY0MnhxZmJybHhtNzhxIn0.lPwI2EFr7P0dOVtPjMzXUg";
        mapboxgl.setRTLTextPlugin(
            'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js',
            null,
            true // Lazy load the plugin
        );
    </script>
    <script type="text/javascript">
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/outdoors-v11',
            center:[{{$geolocation['lat']}},{{$geolocation['lng']}}],
            zoom: 9
        });
        var geojson =  {type: 'FeatureCollection',
            features:[
                @foreach($recommendedProducts as $product)
                    @if($product['id'] != 0)
                        {
                            type: 'Feature',
                            geometry: {
                                type: 'Point',
                                coordinates: [{{$product['lng']}},{{$product['lat']}}]
                            },
                            properties: {
                                title :'',
                                description: '<div class="card border-0" >\n' +
                                    '        <img src=" {{render_image_cover_URL_attachment_id($product['id'])}}" class="card-img-top" alt="...">\n' +
                                    '        <div class="card-body">\n' +

                                    '                <div class="row justify-content-center">\n' +
                                    '                    <div class="col-md-12 mb-2">\n' +
                                    '                        <div class="text-secondary">\n' +
                                    '                            <span>2 Bed . 3Bath</span>\n' +
                                    '                        </div>\n' +
                                    '                    </div>\n' +
                                    '                </div>\n' +
                                    '                <div class="row mb-1">\n' +
                                    '                    <div class="col-md-12">\n' +
                                    '              <span>\n' +
                                    '                <h6>{{$product["title"]}}</h6>\n' +
                                    '              </span>\n' +
                                    '                    </div>\n' +
                                    '                </div>\n' +
                                    '                <div class="row ">\n' +
                                    '                    <div class="col">\n' +
                                    '              <span>\n' +
                                    '                <h5>${{$product["price"]}}<sub class="text-secondary">/night</sub></h5>\n' +
                                    '              </span>\n' +
                                    '                    </div>\n' +
                                    '                </div>\n' +

                                    '            </div>\n' +

                                    '      </div>'
                            }
                        },
                     @endif
                @endforeach

            ]
        };

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
        var size = 100;

        // implementation of CustomLayerInterface to draw a pulsing dot icon on the map
        // see https://docs.mapbox.com/mapbox-gl-js/api/#customlayerinterface for more info
        var pulsingDot = {
            width: size,
            height: size,
            data: new Uint8Array(size * size * 4),

// get rendering context for the map canvas when layer is added to the map
            onAdd: function () {
                var canvas = document.createElement('canvas');
                canvas.width = this.width;
                canvas.height = this.height;
                this.context = canvas.getContext('2d');
            },

// called once before every frame where the icon will be used
            render: function () {
                var duration = 1100;
                var t = (performance.now() % duration) / duration;

                var radius = (size / 2) * 0.3;
                var outerRadius = (size / 2) * 0.7 * t + radius;
                var context = this.context;

// draw outer circle
                context.clearRect(0, 0, this.width, this.height);
                context.beginPath();
                context.arc(
                    this.width / 2,
                    this.height / 2,
                    outerRadius,
                    0,
                    Math.PI * 2
                );
                context.fillStyle = 'rgba(128,168,243' + (1 - t) + ')';
                context.fill();

// draw inner circle
                context.beginPath();
                context.arc(
                    this.width / 2,
                    this.height / 2,
                    radius,
                    0,
                    Math.PI * 2
                );
                context.fillStyle = 'rgb(55,123,255)';
                context.strokeStyle = 'white';
                context.lineWidth = 2 + 4 * (1 - t);
                context.fill();
                context.stroke();

// update this image's data with data from the canvas
                this.data = context.getImageData(
                    0,
                    0,
                    this.width,
                    this.height
                ).data;

// continuously repaint the map, resulting in the smooth animation of the dot
                map.triggerRepaint();

// return `true` to let the map know that the image was updated
                return true;
            }
        };

        map.on('load', function () {
            map.addImage('pulsing-dot', pulsingDot, { pixelRatio: 2 });

            map.addSource('points', {
                'type': 'geojson',
                'data': {
                    'type': 'FeatureCollection',
                    'features': [
                        {
                            'type': 'Feature',
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [{{$geolocation['lat']}},{{$geolocation['lng']}}]
                            }
                        }
                    ]
                }
            });
            map.addLayer({
                'id': 'points',
                'type': 'symbol',
                'source': 'points',
                'layout': {
                    'icon-image': 'pulsing-dot'
                }
            });
        });

    </script>

@endsection
