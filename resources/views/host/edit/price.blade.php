@extends('host.layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header border-0">
                        <span class="text-blue">
                            {{__('Pricing')}}
                        </span>
                    </div>
                    <div class="card-body">
                            @include('error-handler')
                        <form class="form-row" action="{{route('host.listing.update-price',$product->slug)}}" method="post">
                            @method('patch')
                            @csrf
                            <div class="form-group col-md-6">
                                <label for="price">{{__('Price')}}<sup>*</sup></label>
                                <input type="number" name="price" class="form-control" value="{{$product->price}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="price_label">{{__('After Price label')}}<sup>*</sup></label>
                                <input type="text" name="price_label" class="form-control" value="{{$product->price_label}}">
                            </div>
                            <hr style=" width: 100%">
                            <div class="form-group col-md-6">
                                <label for="Cleaning Fee">{{__('Cleaning Fee')}}<sup>*</sup></label>
                                <input type="number" name="cleaning_fee" class="form-control" value="{{$fee->cleaning_fee}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="service_fee">{{__('Service Fee')}}<sup>*</sup></label>
                                <input type="number" name="service_fees" class="form-control" value="{{$fee->service_fees}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="security_fee">{{__('Security Fee')}}<sup>*</sup></label>
                                <input type="number" name="security_deposit" class="form-control" value="{{$fee->security_deposit}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="city_fee">{{__('City_fee')}}<sup>*</sup></label>
                                <input type="number" name="city_fee" class="form-control" value="{{$fee->city_fee}}">
                            </div>
                            <hr style=" width: 100%">
                            <div class="form-group col-md-6">
                                <label for="guest_fee">{{__('Guest Fee')}}<sup>*</sup></label>
                                <input type="number" name="guest_fee" class="form-control" value="{{$fee->guest_fee}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="taxes">{{__('Taxes Fee')}}<sup>*</sup></label>
                                <input type="number" name="taxes" class="form-control" value="{{$fee->taxes}}">
                            </div>
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

