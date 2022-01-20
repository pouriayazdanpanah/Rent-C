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
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Last name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Arrived</th>
                                <th scope="col">Departed</th>
                                <th scope="col">Guest</th>
                                <th scope="col">House</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                @if(!is_null($product->reservation->first()))
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td><strong>{{$product->reservation->first()->user->name}}</strong></td>
                                        <td><strong>{{$product->reservation->first()->user->last_name}}</strong></td>
                                        <td>
                                            <img src="{{profileImage($product->reservation->first()->user->id)}}" width="80px" class="rounded shadow-sm">
                                        </td>
                                        <td>{{$product->reservation->first()->arrived_at}}</td>
                                        <td>{{$product->reservation->first()->departed_at}}</td>
                                        <td>{{$product->reservation->first()->guests}}</td>
                                        <td><a href="#">{{$product->reservation->first()->product->first()->title}}</a></td>

                                    </tr>
                                    @endif
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

