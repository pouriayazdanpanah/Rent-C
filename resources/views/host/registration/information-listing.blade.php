@extends('host.layouts.main')
@section('link')
    <script src="{{asset('/plugins/ckeditor-4-basic/ckeditor.js')}}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header border-0">
                        <span class="text-blue">
                            {{__('Information')}}
                        </span>
                    </div>
                    <div class="card-body">
                    @include('error-handler')
                            <form class="form-row" action="{{route('host.registration.create.information')}}" method="post">
                                @csrf
                                <div class="form-group col-md-12">
                                    <label for="title">{{__('Title')}}<sup>*</sup></label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter a title for list">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description">{{__('Description')}}<sup>*</sup></label>
                                    <textarea name="description" id="description" rows="10" cols="80" >Enter your description of your home</textarea>
                                    <script>
                                        CKEDITOR.replace( 'description' );
                                    </script>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="categories">{{__('Select Home Category')}}<sup>*</sup></label>
                                    <select  name="categories"  class="form-control">
                                        @foreach(\App\Categorie::all() as $category)
                                            <option value="{{$category->name}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="number_of_guest">{{__('Total number of guests')}}<sup>*</sup></label>
                                    <input type="number" name="number_of_guest" class="form-control" placeholder="Enter total number of guests">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="number_of_bed">{{__('Total number of beds')}}<sup>*</sup></label>
                                    <input type="number" name="number_of_bed" class="form-control" placeholder="Enter total number of beds">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="number_of_room">{{__('Total number of rooms')}}<sup>*</sup></label>
                                    <input type="number" name="number_of_room" class="form-control" placeholder="Enter total number of rooms">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="number_of_bathroom">{{__('Total number of bathrooms')}}<sup>*</sup></label>
                                    <input type="number" name="number_of_bathroom" class="form-control" placeholder="Enter total number of bathrooms">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="sqft">{{__('Size')}}<sup>*</sup></label>
                                    <input type="number" name="sqft" class="form-control" placeholder="Enter your home size">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="unit">{{__('Unit of measure')}}<sup>*</sup></label>
                                    <input type="text" name="unit" class="form-control" placeholder="Enter unit measure for home size">
                                </div>
                                <div class="col-md-12 mt-4">
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
