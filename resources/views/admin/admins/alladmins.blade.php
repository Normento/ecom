@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Settings</h3>
                            <h6 class="font-weight-normal mb-0">Update admin details</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{$title}}</h4>
                  <div class="table-responsive pt-3">
                    <table id="section" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            Admin ID
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Type
                          </th>
                          <th>
                            Mobile
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Image
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($admins as $admin)
                        <tr>
                          <td>
                            {{$admin['id']}}
                          </td>
                          <td>
                            {{$admin['name']}}
                          </td>
                          <td>
                            {{$admin['type']}}
                          </td>
                          <td>
                            {{$admin['mobile']}}
                          </td>
                          <td>
                            {{$admin['email']}}
                          </td>
                          <td>
                            <img src="{{$admin['image']}}" alt="">
                          </td>
                          <td>
                            @if ($admin['status'] == 1)
                            <a class="updateAdminStatus" id="admin-{{$admin['id']}}" admin_id="{{$admin['id']}}" href="javascript:void(0)"><i style="font-size: 25px; color:blue" class="mdi mdi-bookmark-check" status="Active"></i>
                            </a>
                            @else
                            <a class="updateAdminStatus" id="admin-{{$admin['id']}}" admin_id="{{$admin['id']}}" href="javascript:void(0)"><i style="font-size: 25px; color:blue" class="mdi mdi-bookmark-outline" status="Inactive"></i>
                            </a>
                            @endif
                          </td>
                          <td>
                            @if ($admin['type'] == 'vendor')
                            <a href="{{route('view-vendor-details',$admin['id'])}}">
                                <i style="font-size: 25px; color:blue" class="mdi mdi-file-document"></i>
                            </a>
                            @endif
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
