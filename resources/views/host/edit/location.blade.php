@extends('host.layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header border-0">
                        <span class="text-blue">
                            {{__('Location')}}
                        </span>
                    </div>
                    <div class="card-body">

                            @include('error-handler')

                        <form class="form-row" action="{{route('host.listing.update-location',$product->slug)}}" method="post">
                            @method('patch')
                            @csrf
                            <div class="form-group col-md-8">
                                <label for="formatted_address">{{__('Address')}}<sup>*</sup></label>
                                <input type="text" name="formatted_address" class="form-control" value="{{$address->formatted_address}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="municipality_zone">{{__('Municipality zone')}}<small>(optional)</small></label>
                                <input type="text" name="municipality_zone" class="form-control" value="{{$address->municipality_zone}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="city">{{__('City')}}<sup>*</sup></label>
                                <input type="text" name="city" class="form-control" value="{{$address->city}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="state">{{__('State')}}<sup>*</sup></label>
                                <input type="text" name="state" class="form-control" value="{{$address->state}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="zip_code">{{__('Zip Code')}}<sup>*</sup></label>
                                <input type="number" name="zip_code" class="form-control" value="{{$address->zip_code}}">
                            </div>
                            <hr style="width: 100%">
                            <span class="mb-2">Drag and choose your location on the map</span>
                            <div class="col-md-12 mb-4" >
                                <x-mapbox :height="350" />
                            </div>

                            <div class="col-md-12">
                                <div class="d-flex justify-content-center" >
                                    <div class="spinner-border text-blue-700" role="status" id="spinner">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <input type="text" class="lng" name="lng"  hidden>
                                <input type="text" class="lat" name="lat"  hidden>
                                <input type="text" id="address_bar" name="location" dir="rtl" class="form-control"  placeholder="Address location">
                            </div>

                            <hr style="width: 100%">

                            <div class="col-md-12 mt-4">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-blue-premium shadow-sm">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#address_bar').hide();
        $('#spinner').hide();
        $(document).ajaxStart(function ()
        {
            $('#spinner').show();
            $('#address_bar').hide();
        }).ajaxStop(function ()
        {
            $('#spinner').hide();

        });
        map.on('click', function(e) {
            // Use the returned LngLat object to set the marker location
            marker.setLngLat(e.lngLat).addTo(map);

            // Create variables set to the LngLat object's lng and lat properties
            lng = e.lngLat.lng;
            lat = e.lngLat.lat;

            $('.lng').val(lng);
            $('.lat').val(lat);
            // console.log(lng,lat)
            let data = {
                lat : lat,
                lng : lng,
            }
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                    'Content-type':'application/json'
                }
            });

            $.ajax({
                type:'Post',
                url:"{{route('host.listing.update-location.find-location')}}",
                data:JSON.stringify(data),
                success : function (data){
                    if (data.status){
                        $('#address_bar').show();
                        $('#address_bar').val(data.address);

                    }
                }

            })

        })

        // $("#finder").on('click' , function (e){
        //     e.preventDefault();
        //
        //     var lng = $('.lng').val();
        //     var lat = $('.lat').val();
        //     console.log(lat , lng);
        //     let data ={
        //         lat : lat,
        //         lng : lng,
        //     }
        //     $.ajaxSetup({
        //         headers:{
        //             'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
        //             'Content-type':'application/json'
        //         }
        //     });
        //
        //     $.ajax({
        //         type:'Post',
        //         url:'/host/registration/locations',
        //         data:JSON.stringify(data),
        //         success : function (data){
        //             console.log('success')
        //         }
        //
        //     })
        // })
    </script>
@endsection
