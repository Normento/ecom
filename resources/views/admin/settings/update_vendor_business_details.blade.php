@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Update Vendor business details</h3>
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
                        <h4 class="card-title">Update vendor business details</h4>
                        <form class="forms-sample" action="{{ route('update-vendors-business-details') }}" method="POST"
                            id="updateAdminPasswordForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Admin Email/Username</label>
                                <input type="text" class="form-control"
                                    value="{{ Auth::guard('admin')->user()->email }} "readonly>
                            </div>
                            <div class="form-group">
                                <label for="shop_name">Name</label>
                                <input type="text" id="shop_name" class="form-control" name="shop_name" placeholder="Enter vendor name"
                                    value="{{ Auth::guard('admin')->user()->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="shop_address">Shop Name</label>
                                <input type="text" id="shop_name" class="form-control" name="shop_address" placeholder="Enter shop name"
                                    value="{{$vendorDetails['shop_name']}}">
                            </div>
                            <div class="form-group">
                                <label for="shop_address">Shop Addresse</label>
                                <input type="text" id="shop_name" class="form-control" name="shop_address" placeholder="Enter shop addresse"
                                    value="{{$vendorDetails['shop_address']}}">
                            </div>
                            <div class="form-group">
                                <label for="shop_city">Shop City</label>
                                <input type="text" id="shop_city" class="form-control" name="shop_city" placeholder="Enter shop city"
                                    value="{{$vendorDetails['shop_city']}}">
                            </div>
                            <div class="form-group">
                                <label for="shop_state">Shop State</label>
                                <input type="text" id="shop_state" class="form-control" name="shop_state" placeholder="Enter shop state"
                                    value="{{$vendorDetails['shop_state']}}">
                            </div>
                            <div class="form-group">
                                <label for="shop_country">Shop Country</label>
                                <select class="form-control" name="shop_country" id="country" style="color: #495057">
                                    <option value="">Select Your Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country['country_name']}}" @if ($country['country_name'] == $vendorDetails['shop_country']) selected
                                        @endif>{{$country['country_name']}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="shop_pincode">Shop PINCODE</label>
                                <input type="text" id="shop_pincode" class="form-control" name="shop_pincode" placeholder="Enter shop pincode"
                                    value="{{$vendorDetails['shop_pincode']}}">
                            </div>
                            <div class="form-group">
                                <label for="shop_mobile">Shop Mobile</label>
                                <input type="text" id="shop_mobile" class="form-control" name="shop_mobile"
                                    placeholder="Enter your phone number"
                                    value="{{ Auth::guard('admin')->user()->mobile }}">
                            </div>
                            <div class="form-group">
                                <label for="shop_website">Shop Website</label>
                                <input type="text" id="shop_website" class="form-control" name="shop_website"
                                    placeholder="Enter your shop website url"
                                    value="{{$vendorDetails['shop_website']}}">
                            </div>
                            <div class="form-group">
                                <label for="shop_email">Shop Email</label>
                                <input type="email" id="shop_email" class="form-control" name="shop_email"
                                    placeholder="Enter your shop email"
                                    value="{{$vendorDetails['shop_email']}}">
                            </div>
                            <div class="form-group">
                                <label for="address_proof">Address proof</label>
                                <select class="form-control" name="address_proof" id="address_proof">
                                    <option value="Passport" @if ($vendorDetails['address_proof'] == 'Passport') selected
                                    @endif>Passport</option>
                                    <option value="Voting Card" @if ($vendorDetails['address_proof'] == 'Voting Card') selected
                                    @endif>Voting Card</option>
                                    <option value="PAN" @if ($vendorDetails['address_proof'] == 'PAN') selected
                                    @endif>PAN</option>
                                    <option value="Driver Licence" @if ($vendorDetails['address_proof'] == 'Driver Licence') selected
                                    @endif>Driver Licence</option>
                                    <option value="ID Card" @if ($vendorDetails['address_proof'] == 'ID Card') selected
                                    @endif>ID Card</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="business_licence_number">Business Licence Number</label>
                                <input type="text" id="business_licence_number" class="form-control" name="business_licence_number" placeholder="Enter shop business licence number"
                                    value="{{$vendorDetails['business_licence_number']}}">
                            </div>
                            <div class="form-group">
                                <label for="shop_gst_number">GST Number</label>
                                <input type="text" id="shop_gst_number" class="form-control" name="gst_number" placeholder="Enter shop GST Number"
                                    value="{{$vendorDetails['gst_number']}}">
                            </div>
                            <div class="form-group">
                                <label for="shop_pan_number">PAN Number</label>
                                <input type="text" id="shop_pan_number" class="form-control" name="pan_number" placeholder="Enter shop PAN Number"
                                    value="{{$vendorDetails['pan_number']}}">
                            </div>
                            <div class="form-group">
                                <label for="address_proof_image">Address Proof image</label>
                                <input type="file" id="address_proof_image" class="form-control" name="address_proof_image">
                                @if (!empty($vendorDetails['address_proof_image']))
                                    <a href="{{ url($vendorDetails['address_proof_image']) }}" target="_blank"
                                        rel="noopener noreferrer">View image</a>
                                    <input type="hidden" name="current_address_proof_image"
                                        value="{{ $vendorDetails['address_proof_image'] }}">
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
