@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Vendor details</h3>
                            <h6 class="font-weight-normal mb-0"><a class="btn btn-success" href="{{url('admin/admins/vendor')}}">BACK TO VENDORS</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Personal Informations</h4>
                                <div class="form-group">
                                    <label>Vendor Email/Username</label>
                                    <input type="text" class="form-control"
                                        value="{{ $vendorDetails['email'] }} "readonly>
                                </div>
                                <div class="form-group">
                                    <label for="shop_name">Name</label>
                                    <input type="text" id="shop_name" class="form-control" name="shop_name" placeholder="Enter vendor name"
                                        value="{{ $vendorDetails['name'] }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="shop_address">Email</label>
                                    <input type="text" id="shop_name" class="form-control" name="shop_address" placeholder="Enter shop addresse"
                                        value="{{$vendorDetails['email']}}"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="shop_address">Type</label>
                                    <input type="text" id="shop_name" class="form-control" name="shop_address" placeholder="Enter shop name"
                                        value="{{$vendorDetails['type']}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="shop_address">Mobile</label>
                                    <input type="text" id="shop_name" class="form-control" name="shop_address" placeholder="Enter shop addresse"
                                        value="{{$vendorDetails['mobile']}}"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="shop_city">Addresse</label>
                                    <input type="text" id="shop_city" class="form-control" name="shop_city" placeholder="Enter shop city"
                                        value="{{$vendorDetails['vendor_personal']['address']}}"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="shop_state">State</label>
                                    <input type="text" id="shop_state" class="form-control" name="shop_state" placeholder="Enter shop state"
                                        value="{{$vendorDetails['vendor_personal']['state']}}"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="shop_state">City</label>
                                    <input type="text" id="shop_state" class="form-control" name="shop_state" placeholder="Enter shop state"
                                        value="{{$vendorDetails['vendor_personal']['city']}}"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="shop_country">Country</label>
                                    <input type="text" id="shop_country" class="form-control" name="shop_country" placeholder="Enter shop country"
                                        value="{{$vendorDetails['vendor_personal']['country']}}"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="shop_pincode">PINCODE</label>
                                    <input type="text" id="shop_pincode" class="form-control" name="shop_pincode" placeholder="Enter shop pincode"
                                        value="{{$vendorDetails['vendor_personal']['pincode']}}"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="address_proof_image">Photo</label>
                                    @if (!empty($vendorDetails['image']))
                                        <a href="{{ url($vendorDetails['image']) }}" target="_blank"
                                            rel="noopener noreferrer">View image</a>
                                    @endif
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Business Informations</h4>
                                <div class="form-group">
                                    <label>Vendor Shop name</label>
                                    <input type="text" class="form-control"
                                        value="{{ $vendorDetails['vendor_business']['shop_name'] }} "readonly>
                                </div>
                                <div class="form-group">
                                    <label for="shop_name">Shop addresse</label>
                                    <input type="text" id="shop_name" class="form-control" name="shop_name" placeholder="Enter vendor name"
                                        value="{{ $vendorDetails['vendor_business']['shop_address'] }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="shop_address">Shop Country</label>
                                    <input type="text" id="shop_name" class="form-control" name="shop_address" placeholder="Enter shop name"
                                        value="{{$vendorDetails['vendor_business']['shop_country']}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="shop_address">Shop state</label>
                                    <input type="text" id="shop_name" class="form-control" name="shop_address" placeholder="Enter shop addresse"
                                        value="{{$vendorDetails['vendor_business']['shop_state']}}"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="shop_city">Shop City</label>
                                    <input type="text" id="shop_city" class="form-control" name="shop_city" placeholder="Enter shop city"
                                        value="{{$vendorDetails['vendor_business']['shop_city']}}"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="shop_state">Shop Email</label>
                                    <input type="text" id="shop_state" class="form-control" name="shop_state" placeholder="Enter shop state"
                                        value="{{$vendorDetails['vendor_personal']['email']}}"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="shop_pincode">Shop PINCODE</label>
                                    <input type="text" id="shop_pincode" class="form-control" name="shop_pincode" placeholder="Enter shop pincode"
                                        value="{{$vendorDetails['vendor_business']['shop_pincode']}}"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="shop_mobile">Shop Mobile</label>
                                    <input type="text" id="shop_mobile" class="form-control" name="shop_mobile"
                                        placeholder="Enter your phone number"
                                        value="{{ $vendorDetails['vendor_business']['shop_mobile'] }}"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="shop_website">Shop Website</label>
                                    <input type="text" id="shop_website" class="form-control" name="shop_website"
                                        placeholder="Enter your shop website url"
                                        value="{{$vendorDetails['vendor_business']['shop_website']}}"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="shop_email">Shop Email</label>
                                    <input type="email" id="shop_email" class="form-control" name="shop_email"
                                        placeholder="Enter your shop email"
                                        value="{{$vendorDetails['vendor_business']['shop_email']}}"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="business_licence_number">Business Licence Number</label>
                                    <input type="text" id="business_licence_number" class="form-control" name="business_licence_number" placeholder="Enter shop business licence number"
                                        value="{{$vendorDetails['vendor_business']['business_licence_number']}}"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="shop_gst_number">GST Number</label>
                                    <input type="text" id="shop_gst_number" class="form-control" name="gst_number" placeholder="Enter shop GST Number"
                                        value="{{$vendorDetails['vendor_business']['gst_number']}}"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="shop_pan_number">PAN Number</label>
                                    <input type="text" id="shop_pan_number" class="form-control" name="pan_number" placeholder="Enter shop PAN Number"
                                        value="{{$vendorDetails['vendor_business']['pan_number']}}"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="address_proof">Address proof</label>
                                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['address_proof']}}"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="address_proof_image">Address Proof image</label>
                                    @if (!empty($vendorDetails['vendor_business']['address_proof_image']))
                                        <a href="{{ url($vendorDetails['vendor_business']['address_proof_image']) }}" target="_blank"
                                            rel="noopener noreferrer">View image</a>
                                    @endif
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Bank Informations</h4>
                                <div class="form-group">
                                    <label for="shop_name">Account holder Name</label>
                                    <input type="text" id="shop_name" class="form-control" name="shop_name" placeholder="Enter vendor name"
                                        value="{{ $vendorDetails['vendor_bank']['account_holder_name'] }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="shop_address">Bank name</label>
                                    <input type="text" id="shop_name" class="form-control" name="shop_address" placeholder="Enter shop addresse"
                                        value="{{$vendorDetails['vendor_bank']['bank_name']}}"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="shop_address">Account Number</label>
                                    <input type="text" id="shop_name" class="form-control" name="shop_address" placeholder="Enter shop addresse"
                                        value="{{$vendorDetails['vendor_bank']['account_number']}}"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="shop_city">Bank IFSC Code</label>
                                    <input type="text" id="shop_city" class="form-control" name="shop_city" placeholder="Enter shop city"
                                        value="{{$vendorDetails['vendor_bank']['bank_ifsc_code']}}"readonly>
                                </div>
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
