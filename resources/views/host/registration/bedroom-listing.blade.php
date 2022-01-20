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
                            {{__('Bedrooms Info')}}
                        </span>
                    </div>
                    <div class="card-body">
                        @if(request()->session()->get('registration.registration_level') == 2)
                             @include('error-handler')
                        @endif
                        <form class="form-row" action="{{route('host.registration.create.bedroom')}}" method="post">
                            @csrf
                           <div class="col-md-12" id="create_bedroom">

                           </div>
                            <div class="col-md-12 mt-3 mb-3">
                                <div class="text-right">
                                    <button type="button" id="add_bedroom" class="btn btn-gray-700"><i class="fa fa-plus"></i> Add</button>
                                </div>
                            </div>
                            <hr style="width: 100%">
                            <div class="col-md-6">
                                <div class="text-left">
                                    <button type="submit" class="btn btn-outline-secondary">Back</button>
                                </div>
                            </div>
                            <div class="col-md-6">
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
@section('script')

    <script>
        let createNewBedroom = ({id}) =>{
            return `
            <div class="card-body bg-light form-row shadow-sm mb-3" id="bedroom-${id}">
                        <div class="form-group col-md-4">
                            <label for="type_of_bed">{{__("Bed Type")}}<sup>*</sup></label>
                            <input type="text" name="bedrooms[${id}][type_of_bed]" class="form-control" placeholder="Enter the bed type">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="number_of_bed">{{__("Number of bed")}}<sup>*</sup></label>
                            <input type="number" name="bedrooms[${id}][number_of_bed]" class="form-control" placeholder="Enter number of bed">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="number_of_guest">{{__("Number of guests")}}<sup>*</sup></label>
                            <input type="number" name="bedrooms[${id}][number_of_guests]" class="form-control" placeholder="Enter number of guest for this room">
                        </div>
                        <div class="col-md-12 mt-1 mb-2">
                            <div class="text-left">
                                <button type="submit" class="btn btn-red-danger" onclick="document.getElementById('bedroom-${id}').remove()">{{__("Delete this room")}}</button>
                            </div>
                        </div>
            </div>
                    `
        }
        var message = "You enter " + {{$product->number_of_room}} + " of room in information registration form ";
        $('#add_bedroom').on('click' , function (){

            let id = $('#create_bedroom').children().length;
{{--            {{dd($product)}}--}}
            if (id < {{$product->number_of_room}}){
                $('#create_bedroom').append(createNewBedroom({id}));
            }
            else{
                swal({
                    title: "You not add room more than "+{{$product->number_of_room}},
                    text:message ,
                    icon: "error",
                    button: "Ok!",
                });
            }

        })
        $('#add_bedroom').click();
    </script>
@endsection
