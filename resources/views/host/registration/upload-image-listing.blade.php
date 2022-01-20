@extends('host.layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header border-0">
                        <span class="text-blue">
                            {{__('Image gallery')}}
                        </span>
                    </div>
                    <div class="card-body">
                        @if(request()->session()->get('registration.registration_level') == 5)
                            @include('error-handler')
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                               <div class="row justify-content-start">
                                   @if(!$images->isEmpty())
                                       @foreach($images as $image)
                                           <div class="col-md-3 mb-3">
                                               <img class="image" src="{{$image->url}}" width="100%" style="border-radius: 5px">
                                           </div>
                                       @endforeach
                                   @else
                                       <img class="mx-auto d-block image w-50" src="{{asset('/img/application/preview/undraw_Images_re_0kll.svg')}}" style="border-radius: 5px">
                                   @endif
                               </div>
                            </div>
                            <div class="col-md-12">
                                <form action="{{route('host.registration.upload-image-gallery')}}" method="Post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="custom-file text-center mt-5">
                                        <label class="btn btn-gray-700 text-white" for="add-image-gallery" id="image-gallery">
                                            <i class="fa fa-plus"></i>
                                            Add Image<input type="file" class="custom-file-input" name="image" id="add-image-gallery" hidden>
                                        </label>
                                        <input type="submit" class="btn btn-blue-premium" value="Upload" id="upload-image-gallery">
                                    </div>
                                </form>
                            </div>
                            <hr class="mt-4" style="width: 100%">
                            <div class="col-md-12">
                                    <form class="form-row" action="{{route('host.registration.completed')}}" method="post" >
                                       @csrf
                                        <div class="col-md-6 col-6 mt-4">
                                            <div class="text-left">
                                                <button type="submit" class="btn btn-outline-secondary">Back</button>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6 mt-4">
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-green-success">Submit & Finished</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
               <div class="card border-0 shadow-sm">
                   <div class="card-img-top">
{{--                       {{dd($image_cover)}}--}}
                       <img class="mx-auto d-block image" src="{{render_image_cover_URL_attachment_id($image_cover)}}" width="100%">
                   </div>
                   <div class="card-body">
                       <div class="col-md-12">
                           @if(!is_null($image_cover))
                               <div class="float-right">
                                   <div class="btn-group dropleft">
                                       <i class="fa fa-ellipsis-v text-secondary pointer" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                       <div class="dropdown-menu border-0 shadow-sm" aria-labelledby="dropdownMenuButton">
                                           <a class="dropdown-item pointer" id="delete">Delete image</a>
                                       </div>
                                   </div>
                               </div>
                           @endif
                           <div class="row justify-content-center">
                               <div class="col-md-12">
                                   <div class="text-center mt-2">
                                       <span class="text-secondary"><em>JPG or PNG no larger than 5 MB</em></span>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-md-12">
                                   <div class="text-center mt-3">
                                       <form action="{{route('host.registration.upload-image-cover')}}" method="Post" enctype="multipart/form-data">
                                           @csrf
                                           <div class="custom-file">
                                               <label class="btn btn-success text-white" for="image-cover" id="imageFile">
                                                   Set Image Cover <input type="file" class="custom-file-input" name="image" id="image-cover" hidden>
                                               </label>
                                               <input type="submit" class="btn btn-blue-premium" value="Upload" id="submit">
                                           </div>
                                       </form>
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
    <script>
        $(document).ready(function ()
        {
            var uploadImageGallery = $('#upload-image-gallery');
            var imageGallery = $('#image-gallery');
            var submit = $('#submit');
            var file = $('#imageFile');
            var addImageGallery = $('#add-image-gallery');
            var imageCover = $('#image-cover')
            uploadImageGallery.hide();
            submit.hide();


            imageCover.change(function (){
                file.hide();
                submit.show();
            })

           addImageGallery.change(function (){
                imageGallery.hide();
                uploadImageGallery.show();
            })

            $('#delete').on('click' , function (e){
                e.preventDefault();

                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                        'Content-type':'application/json'
                    }
                });

                $.ajax({
                    type:'delete',
                    url:'/profile/personal-info/delete-image',
                    success : function (data){
                        if (data.status) {
                            $('.image').attr('src','{{asset('/img/application/profile/undraw_profile_pic_ic5t.svg')}}')
                        }
                    }

                })
            })
        })
    </script>

@endsection
