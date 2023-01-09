@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Update Vendor Bank details</h3>
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
                        <h4 class="card-title">Update vendor bank details</h4>
                        <form class="forms-sample" action="{{ route('update-vendors-bank-details') }}" method="POST"
                            id="updateAdminPasswordForm">
                            @csrf
                            <div class="form-group">
                                <label>Admin Email/Username</label>
                                <input type="text" class="form-control"
                                    value="{{ Auth::guard('admin')->user()->email }} "readonly>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" id="admin_name" class="form-control" name="admin_name" placeholder=""
                                    value="{{ Auth::guard('admin')->user()->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="account_holder_name">Account Holder Name</label>
                                <input type="text" id="account_holder_name" class="form-control" name="account_holder_name"
                                    placeholder="Enter your account holder name"
                                    value="{{ $vendorDetails['account_holder_name'] }}">
                            </div>
                            <div class="form-group">
                                <label for="bank_name">Bank Name</label>
                                <input type="text" id="bank_name" class="form-control" name="bank_name"
                                    placeholder="Enter your bank name"
                                    value="{{ $vendorDetails['bank_name'] }}">
                            </div>
                            <div class="form-group">
                                <label for="account_number">Account Number</label>
                                <input type="text" id="account_number" class="form-control" name="account_number"
                                    placeholder="Enter your bank account number"
                                    value="{{ $vendorDetails['account_number'] }}">
                            </div>
                            <div class="form-group">
                                <label for="bank_ifsc_code">Bank IFSC Code</label>
                                <input type="text" id="bank_ifsc_code" class="form-control" name="bank_ifsc_code"
                                    placeholder="Enter your bank ifsc code"
                                    value="{{ $vendorDetails['bank_ifsc_code'] }}">
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
