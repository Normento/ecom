@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Update Vendor Personal details</h3>
                            <h6 class="font-weight-normal mb-0"></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
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
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </ul>
                            </div>
                        @endif
                        <h4 class="card-title">Update vendor personal details</h4>
                        <form class="forms-sample" action="{{ route('update-vendors-personal-details') }}" method="POST"
                            id="updateAdminPasswordForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Admin Email/Username</label>
                                <input type="text" class="form-control"
                                    value="{{ Auth::guard('admin')->user()->email }} "readonly>
                            </div>
                            <div class="form-group">
                                <label for="vendor_name">Name</label>
                                <input type="text" id="vendor_name" class="form-control" name="vendor_name" placeholder="Enter vendor name"
                                    value="{{ Auth::guard('admin')->user()->name }}">
                            </div>
                            <div class="form-group">
                                <label for="vendor_address">Addresse</label>
                                <input type="text" id="vendor_address" class="form-control" name="vendor_address" placeholder="Enter vendor addresse"
                                    value="{{$vendorDetails['address']}}">
                            </div>
                            <div class="form-group">
                                <label for="vendor_city">City</label>
                                <input type="text" id="vendor_city" class="form-control" name="vendor_city" placeholder="Enter vendor city"
                                    value="{{$vendorDetails['city']}}">
                            </div>
                            <div class="form-group">
                                <label for="vendor_state">State</label>
                                <input type="text" id="vendor_state" class="form-control" name="vendor_state" placeholder="Enter vendor state"
                                    value="{{$vendorDetails['state']}}">
                            </div>
                            <div class="form-group">
                                <label for="vendor_country">Country</label>
                                <select class="form-control" name="vendor_country" id="vendor_country" style="color: #495057">
                                    <option value="">Select Your Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country['country_name']}}" @if ($country['country_name'] == $vendorDetails['country']) selected
                                        @endif>{{$country['country_name']}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="vendor_pincode">PINCODE</label>
                                <input type="text" id="vendor_pincode" class="form-control" name="vendor_pincode" placeholder="Enter vendor pincode"
                                    value="{{$vendorDetails['pincode']}}">
                            </div>
                            <div class="form-group">
                                <label for="vendor_mobile">Mobile</label>
                                <input type="text" id="vendor_mobile" class="form-control" name="vendor_mobile"
                                    placeholder="Enter your phone number"
                                    value="{{ Auth::guard('admin')->user()->mobile }}">
                            </div>
                            <div class="form-group">
                                <label for="vendor_image">Photo</label>
                                <input type="file" id="vendor_image" class="form-control" name="vendor_image">
                                @if (!empty(Auth::guard('admin')->user()->image))
                                    <a href="{{ url(Auth::guard('admin')->user()->image) }}" target="_blank"
                                        rel="noopener noreferrer">View image</a>
                                    <input type="hidden" name="current_vendor_image"
                                        value="{{ Auth::guard('admin')->user()->image }}">
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
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
