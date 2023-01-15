@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Brands</h3>
                            <h6 class="font-weight-normal mb-0"></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    @if (Session::has('error_message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error :</strong>{{ Session::get('error_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success :</strong>{{ Session::get('success_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                  <h4 class="card-title">Brands</h4>
                  <a style="max-width:150px; float:right;display:inline-block" href="{{route('addbrand')}}" class="btn btn-primary btn-block">Add brands</a>
                  <div class="table-responsive pt-3">
                    <table id="section" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($brands as $brand)
                          <td>
                            {{$brand['id']}}
                          </td>
                          <td>
                            {{$brand['name']}}
                          </td>
                          <td>
                            @if ($brand['status'] == 1)
                            <a class="updateBrandStatus" id="brand-{{$brand['id']}}" brand_id="{{$brand['id']}}" href="javascript:void(0)"><i style="font-size: 25px; color:#0000ff" class="mdi mdi-bookmark-check" status="Active"></i>
                            </a>
                            @else
                            <a class="updateBrandStatus" id="brand-{{$brand['id']}}" brand_id="{{$brand['id']}}" href="javascript:void(0)"><i style="font-size: 25px; color:#0000ff" class="mdi mdi-bookmark-outline" status="Inactive"></i>
                            </a>
                            @endif
                          </td>
                          <td>
                            <a href="{{route('editbrand',$brand['id'])}}">
                                <i style="font-size: 25px; color:blue" class="mdi mdi-pencil-box"></i>
                            </a>
                            <a href="javascript:void(0)" class="ComfirmDelete" module="brand" moduleid="{{$brand['id']}}">
                                <i style="font-size: 25px; color:blue" class="mdi mdi-file-excel-box"></i>
                            </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin.layout.footer')
        <!-- partial -->
    </div>
@endsection
