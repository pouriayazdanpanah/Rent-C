@component('admin.content' , ['title' => 'Products'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">listing</li>
    @endslot

    @slot('script')
        <script>
            $(function () {

                $('#search').on('keyup',function () {

                    let search = $(this).val();
                    let tr_include = "tr[id !='exclude']";

                    $(tr_include).each(function (){
                        $(this).toggle($(this).text().indexOf(search) != -1)
                    })

                });

            })
        </script>
    @endslot

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <input class="form-control mr-sm-2 mb-3 border-0 shadow-sm" type="search" id="search" placeholder="Search" aria-label="Search">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="card-title">House list</h3>
                        <div class="form-inline float-right">
{{--                            @can('show-admin')--}}
{{--                                <div class="input-group-append float-right mr-3">--}}
{{--                                    <a href="{{ route('admin.user.index',['admin' => 1]) }}" class="btn btn-outline-info btn-sm ml-3 "><i class="fas fa-user-shield"></i> Admins</a>--}}
{{--                                </div>--}}
{{--                            @endcan--}}
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-borderless table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
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
                                    <td>{{$product->title}}</td>
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
                                                <a class="text-secondary" href="{{route('admin.product.show',$product->slug)}}" ><i class="fa fa-eye "></i></a>
                                                <a class="text-secondary ml-3" href="{{route('admin.product.approve',$product->slug)}}" ><i class="fa fa-check "></i></a>
                                                <a class="text-secondary ml-3" href="{{route('admin.product.unapproved',$product->slug)}}" ><i class="fa fa-ban "></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer border-0 ">
                        {{$products->render()}}
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endcomponent
