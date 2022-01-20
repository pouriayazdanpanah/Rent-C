@extends('host.layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header border-0">
                        <span class="text-blue">
                            {{__('Listing')}}
                        </span>
                    </div>
                    <div class="card-body">
                        @include('error-handler')
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Image</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Bed</th>
                                <th scope="col">Room</th>
                                <th scope="col">Bathroom</th>
                                <th scope="col">Guest</th>
                                <th scope="col">Views</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td><strong>{{$product->title}}</strong></td>
                                        @if($product->productSituation())
                                            <td><i class="fa fa-check-double text-blue-700"></i></td>
                                        @elseif($product->registrationLevel->passed == 1)
                                            <td><i class="fa fa-check text-gray-800"></i></td>
                                        @elseif($product->registrationLevel->passed == 0)
                                            <td><i class="fas fa-hourglass-start"></i></td>
                                        @else
                                            <td><i class="fa fa-minus-circle"></i></td>
                                        @endif

                                        <td>
                                            <img src="{{render_image_cover_URL_attachment_id($product->id)}}" width="80px" class="rounded shadow-sm">
                                        </td>
                                        <td>{{$product->categories}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->number_of_bed}}</td>
                                        <td>{{$product->number_of_room}}</td>
                                        <td>{{$product->number_of_bathroom}}</td>
                                        <td>{{$product->number_of_guest}}</td>
                                        <td>{{$product->view_count}}</td>
                                        <td>
                                           <div class="d-flex">
                                               @if($product->ProductSituation())
                                                   <a class="text-secondary" href="{{route('product',['product'=>$product->slug])}}" ><i class="fa fa-eye "></i></a>
                                               @endif
                                               @if(!$product->registrationLevel->passed == 0)
                                                    <a class="ml-3 text-secondary" href="{{route('host.listing.show',$product->slug)}}" ><i class="fa fa-pen"></i></a>
                                               @else
                                                   <a class="ml-3 text-secondary" href="{{route('host.registration.continue',$product->slug)}}" ><i class="fa fa-arrow-right"></i></a>
                                               @endif

                                                <button class="border-0 bg-transparent ml-3 delete-product" data-id="{{$product->slug}}" type="submit"><i class="fa fa-times text-title"></i></button>

                                           </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 bg-transparent">
                        <div class="pagination justify-content-center">
                            {{$products->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.delete-product').on("click",function (e){
            e.preventDefault();
           var slug = $(this).attr('data-id');
           // console.log(product_slug)
            $.ajaxSetup({
                headers : {
                    'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type' : 'application/json',
                }
            })
            $.ajax({
                type : 'delete',
                url:'listing/'+slug+'/delete_product',
                success: function (data){
                    console.log(data.status)
                    if (data.status){
                        swal({
                            title: "Deleted",
                            text: "Your product deleted",
                            icon: "info",
                        });
                        $(this).parent().parent().remove();
                    }else{
                        swal({
                            title: "Missing",
                            text: "You can't delete this house because your house rented",
                            icon: "error",
                            buttons:'Ok!'
                        });
                    }
                }
            })
        })
    </script>
@endsection

