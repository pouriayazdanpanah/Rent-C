@component('admin.content',['title' => 'Features'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Performance</a></li>
        <li class="breadcrumb-item"><a href="#">Structure</a></li>
        <li class="breadcrumb-item active">Features</li>
    @endslot
    @slot('script')
       <script src="/plugins/flot/jquery.flot.js"></script>
        <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
        <script src="/plugins/flot-old/jquery.flot.resize.min.js"></script>
        <script>
            $(function () {
                var bar_data = {
                    data : {!! json_encode($data) !!},
                    bars: { show: true }
                }
                $.plot('#bar-chart', [bar_data], {
                    grid  : {
                        borderWidth: 1,
                        borderColor: '#f3f3f3',
                        tickColor  : '#f3f3f3'
                    },
                    series: {
                        bars: {
                            show: true, barWidth: 0.5, align: 'center',
                        },
                    },
                    colors: ['#3c8dbc'],
                    xaxis : {
                        ticks: {!!json_encode($ticks)!!}
                    }
                });
                /* END BAR CHART */

                /*
                 * DONUT CHART
                 * -----------
                 */

                /*
                    SEARCH BAR
                 */
                $(function () {

                    $('#search').on('keyup',function ()
                    {
                        let search = $(this).val();
                        let tr_include = "tr[id !='exclude']";

                        $(tr_include).each(function ()
                        {
                            $(this).toggle($(this).text().indexOf(search) != -1)
                        })
                    });
                });
                /*
                END SEARCH BAR
                 */
            })

        </script>
    @endslot


  <div class="container-fluid">
      <!-- Bar -->
      <div class="row">
          <div class="col-md-12">
              <!-- Feature chart -->
              <div class="card card-primary card-outline">
                  <div class="card-header">
                      <h3 class="card-title">
                          <i class="far fa-chart-bar"></i>
                          Features Chart
                      </h3>

                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-tool" data-card-widget="remove">
                              <i class="fas fa-times"></i>
                          </button>
                      </div>
                  </div>
                  <div class="card-body">
                      <div id="bar-chart" style="height: 300px;"></div>
                  </div>
                  <!-- /.card-body-->
              </div>
              <!-- /.card -->
          </div>
      </div>
      <!--Features Table-->
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Features</h3>
                      <div class="float-right d-flex">
                          <button class="btn btn-outline-primary btn-sm mr-3" data-toggle="modal" data-target="#addFeature"><i class="fas fa-plus mr-1" ></i>Add New</button>
                          <div class="input-group input-group-sm" style="width: 150px;">
                              <input type="text" name="table_search" class="form-control float-right" id="search" placeholder="Search" >
                          </div>
                      </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="modal fade" id="addFeature" tabindex="-1" aria-labelledby="addFeatureLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                              <div class="modal-header border-0">
                                  <h5 class="modal-title" id="addFeatureLabel">Add Feature</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <form action="{{route('admin.feature.store')}}" method="post">
                                  @csrf

                                  <div class="modal-body">
                                        <div class="form-group">

                                            <label for="feature">{{__('Feature name')}}</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required>
                                            @error('name')
                                            <script>
                                                $(function () {
                                                    $('#addFeature').modal('show')
                                                })
                                            </script>
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                  </div>
                                  <div class="modal-footer">
                                      <div class="text-center">
                                          <input type="submit" class="btn btn-outline-success" value="{{__('Save')}}">
                                      </div>
                                  </div>
                              </form>

                          </div>
                      </div>
                  </div>
                  <div class="card-body table-borderless table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                          <thead>
                          <tr id="exclude">
                              <th>ID</th>
                              <th>Title</th>
                              <th>view</th>
                              <th>Created Time</th>
                              <th>Action</th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($features as $feature)
                          <tr>
                                  <td>{{$feature->id}}</td>
                                  <td>{{$feature->name}}</td>
                                  <td>{{$feature->count_of_used}}</td>
                                  <td>{{$feature->created_at}}</td>
                                  <td>
                                      <div class="d-flex">
                                          {{--                                  @can('edit-permissions')--}}

                                              <button href="" class="border-0 bg-transparent " data-toggle="modal" data-target="#feature{{$feature->id}}"><i class="text-secondary fas fa-edit"></i></button>
                                              <div class="modal fade" id="feature{{$feature->id}}" tabindex="-1" aria-labelledby="feature{{$feature->id}}Label" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered">
                                                      <div class="modal-content">
                                                          <div class="modal-header border-0">
                                                              <h5 class="modal-title" id="feature{{$feature->id}}Label">Edit Feature</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                              </button>
                                                          </div>
                                                          <form action="{{route('admin.feature.update',$feature->id)}}" method="post">
                                                              @method('put')
                                                              @csrf

                                                              <div class="modal-body">
                                                                  <div class="form-group">

                                                                      <label for="feature">{{__('Feature name')}}</label>
                                                                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{$feature->name}}">
                                                                      @error('name')
                                                                      <span class="invalid-feedback">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                      @enderror
                                                                  </div>
                                                              </div>
                                                              <div class="modal-footer">
                                                                  <div class="text-center">
                                                                      <input type="submit" class="btn btn-outline-success" value="{{__('update')}}">
                                                                  </div>
                                                              </div>


                                                      </div>
                                                  </div>
                                              </div>
                                          </form>
                                          {{--                                  @endcan--}}
                                          {{--                                  @can('delete-permissions')--}}
                                          <form action="#" method="post">
                                              @method('delete')
                                              @csrf
                                              <button class="border-0 bg-transparent ml-3"><i class="text-secondary fas fa-trash-alt"></i></button>
                                          </form>
                                          {{--                                  @endcan--}}
                                      </div>
                                  </td>
                          </tr>
                          @endforeach
                          @error('name')
                          <script>
                              $(function () {
                                  $('#feature{{$feature->id}}').modal('show')
                              })
                          </script>
                          @enderror
                          </tbody>
                      </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer border-0 ">
                      {{$features->render()}}
                  </div>
              </div>
              <!-- /.card -->
          </div>
      </div>
  </div>
@endcomponent


