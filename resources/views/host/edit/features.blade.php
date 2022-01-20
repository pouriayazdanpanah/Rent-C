@extends('host.layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header border-0">
                        <span class="text-blue">
                            {{__('Features')}}
                        </span>
                    </div>
                    <div class="card-body">
                            @include('error-handler')
                        <form class="form-row" action="{{route('host.listing.update-features',$product->slug)}}" method="post">
                            @method('patch')
                            @csrf
                            <strong>{{__('Amenities')}}</strong>
                            @foreach(\App\Feature::all()->chunk(4) as $row)
                                <div class="col-md-12">
                                    <div class="row p-3">
                                        @foreach($row as $items)
                                            <div class="col-md-3 col-6">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" {{in_array($items->name,$features_value)?'checked':''}} id="{{$items->id}}" name="features[]" value="{{$items->name}},{{$items->id}}">
                                                    <label class="custom-control-label text-secondary" for="{{$items->id}}">{{$items->name}}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
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

