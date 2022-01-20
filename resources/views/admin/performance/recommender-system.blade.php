@component('admin.content',['title' => 'Recommender action'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active"><a>Recommender action</a></li>
    @endslot
    @slot('script')
        <script src="{{asset('/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
        <script>
            $(function () {
                $("input[data-bootstrap-switch]").each(function(){
                    $(this).bootstrapSwitch('state', $(this).prop('checked'));
                });
            })
        </script>
    @endslot
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-navy  card-outline ">
                    <div class="card-header">
                        <h3 class="card-title">Property weight</h3>
                    </div>
                    <div class="card-body">

                        <form action="{{route('admin.recommender-action.update')}}" method="Post">
                            @method('patch')
                            @csrf
                            <div class="form-row mb-3">
                                <label for="price" class="col-md-4 text-secondary text-center">Price Weight</label>
                                <div class="col-md-8">
                                    <select name="property_price" class="form-control">
                                        @foreach(config('propertyWeight.weight') as $weight =>$label)
                                            <option value="{{$weight}}" {{\App\PropertyWeight::Weight('price') == $weight ? 'selected' : ''}}>{{$label}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <label for="price" class="col-md-4 text-secondary text-center">Category Weight</label>
                                <div class="col-md-8">
                                    <select name="property_category" class="form-control">
                                        @foreach(config('propertyWeight.weight') as $weight =>$label)
                                            <option value="{{$weight}}" {{\App\PropertyWeight::Weight('category') == $weight ? 'selected' : ''}}>{{$label}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <label for="price" class="col-md-4 text-secondary text-center">Feature Weight</label>
                                <div class="col-md-8">
                                    <select name="property_feature" class="form-control">
                                        @foreach(config('propertyWeight.weight') as $weight =>$label)
                                            <option value="{{$weight}}" {{\App\PropertyWeight::Weight('feature') == $weight ? 'selected' : ''}}>{{$label}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mt-4">

                                <div class="col-md-12 text-center">
                                    <input type="submit" class="btn btn-primary " value="Update">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-navy  card-outline ">
                    <div class="card-header">
                        <h3 class="card-title">Recommender System Panel</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-row" action="{{route('admin.recommender-action.situation')}}" method="post">
                            @method('patch')
                            @csrf
                            <div class="col-md-3">
                                <label for="switch" class="text-secondary">ON / OFF System</label>
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" name="switch"  {{get_static_option('recommender_system_situation')=='on'?"checked":null}} data-bootstrap-switch data-off-color="maroon" data-on-color="teal">
                            </div>
                            <div class="col-md-6 text-center">
                                <input type="submit" class="btn btn-primary" value="Action">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endcomponent
