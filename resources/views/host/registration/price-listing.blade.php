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
                        @if(request()->session()->get('registration.registration_level') == 1)
                            @include('error-handler')
                        @endif
                        <form class="form-row" action="{{route('host.registration.create.price')}}" method="post">
                            @csrf
                            <div class="form-group col-md-6">
                                <label for="price">{{__('Price')}}<sup>*</sup></label>
                                <input type="number" name="price" class="form-control" placeholder="Enter price for 1 night">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="price_label">{{__('After Price label')}}<sup>*</sup></label>
                                <input type="text" name="price_label" class="form-control" placeholder="ex:night,week or day">
                            </div>
                            <hr style=" width: 100%">
                            <div class="form-group col-md-6">
                                <label for="Cleaning Fee">{{__('Cleaning Fee')}}<sup>*</sup></label>
                                <input type="number" name="cleaning_fee" class="form-control" placeholder="Enter price for cleaning fee">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="service_fee">{{__('Service Fee')}}<sup>*</sup></label>
                                <input type="number" name="service_fee" class="form-control" placeholder="Enter price service fee">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="security_fee">{{__('Security Fee')}}<sup>*</sup></label>
                                <input type="number" name="security_fee" class="form-control" placeholder="Enter price security fee">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="city_fee">{{__('City_fee')}}<sup>*</sup></label>
                                <input type="number" name="city_fee" class="form-control" placeholder="Enter price city fee">
                            </div>
                            <hr style=" width: 100%">
                            <div class="form-group col-md-6">
                                <label for="guest_fee">{{__('Guest Fee')}}<sup>*</sup></label>
                                <input type="number" name="guest_fee" class="form-control" placeholder="Enter percent guest fee">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="taxes">{{__('Taxes Fee')}}<sup>*</sup></label>
                                <input type="number" name="taxes" class="form-control" placeholder="Enter price taxes fee">
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="text-left">
                                    <button type="submit" class="btn btn-outline-secondary">Back</button>
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-green-success">Submit & Next</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

