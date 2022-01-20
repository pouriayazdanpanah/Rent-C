<div>
    <!--mapbox content -->
    <div style="width: 100%; height: {{$height}}px; border-radius: 5px;" class="shadow" id="map"></div>

    <script src="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css" rel="stylesheet" />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css" type="text/css"/>
    <!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>

    <!--mapbox js -->
    <script>
        mapboxgl.accessToken = '{{$access_token}}';
        mapboxgl.setRTLTextPlugin(
            'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js',
            null,
            true // Lazy load the plugin
        );
        var map = new mapboxgl.Map({
            container: 'map',
            style: '{{$layer}}',
            center: [{{$lng}} , {{$lat}}],
            zoom: 6
        });

        var geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            marker: {
                color: 'red'
            },
            mapboxgl: mapboxgl
        });

        map.addControl(geocoder);

        var marker = new mapboxgl.Marker({
            'color': '#00cd3b'
        });
        map.on('click', function(e) {
            // Use the returned LngLat object to set the marker location
            marker.setLngLat(e.lngLat).addTo(map);

            // Create variables set to the LngLat object's lng and lat properties
            lng = e.lngLat.lng;
            lat = e.lngLat.lat;
// console.log(lng,lat)
            $('.lng').val(lng);
            $('.lat').val(lat);
            console.log(lng+"-"+lat);
        });

    </script>

</div>
