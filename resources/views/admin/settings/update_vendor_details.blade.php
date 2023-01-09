@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Settings</h3>
                            <h6 class="font-weight-normal mb-0">Update Vendor details</h6>
                        </div>
                    </div>
                </div>
            </div>
            @if ($slug == 'personal')
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
                            <h4 class="card-title">Update personal details</h4>
                            <form class="forms-sample" action="{{ url('') }}" method="POST"
                                id="updateAdminPasswordForm" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Admin Email/Username</label>
                                    <input type="text" class="form-control"
                                        value="{{ Auth::guard('admin')->user()->email }} "readonly>
                                </div>
                                <div class="form-group">
                                    <label>Admin type</label>
                                    <input type="email" class="form-control"
                                        value="{{ Auth::guard('admin')->user()->type }} "readonly>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" id="admin_name" class="form-control" name="admin_name" placeholder=""
                                        value="{{ Auth::guard('admin')->user()->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="admin_mobile">Mobile</label>
                                    <input type="text" id="admin_mobile" class="form-control" name="admin_mobile"
                                        placeholder="Enter your phone number"
                                        value="{{ Auth::guard('admin')->user()->mobile }}">
                                </div>
                                <div class="form-group">
                                    <label for="admin_image">Photo</label>
                                    <input type="file" id="admin_image" class="form-control" name="admin_image">
                                    @if (!empty(Auth::guard('admin')->user()->image))
                                        <a href="{{ url(Auth::guard('admin')->user()->image) }}" target="_blank"
                                            rel="noopener noreferrer">View image</a>
                                        <input type="hidden" name="current_admin_image"
                                            value="{{ Auth::guard('admin')->user()->image }}">
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            @elseif ($slug == 'business')
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
                        <h4 class="card-title">Update Business details</h4>
                        <form class="forms-sample" action="{{ url('') }}" method="POST"
                            id="updateAdminPasswordForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Admin Email/Username</label>
                                <input type="text" class="form-control"
                                    value="{{ Auth::guard('admin')->user()->email }} "readonly>
                            </div>
                            <div class="form-group">
                                <label>Admin type</label>
                                <input type="email" class="form-control"
                                    value="{{ Auth::guard('admin')->user()->type }} "readonly>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" id="admin_name" class="form-control" name="admin_name" placeholder=""
                                    value="{{ Auth::guard('admin')->user()->name }}">
                            </div>
                            <div class="form-group">
                                <label for="admin_mobile">Mobile</label>
                                <input type="text" id="admin_mobile" class="form-control" name="admin_mobile"
                                    placeholder="Enter your phone number"
                                    value="{{ Auth::guard('admin')->user()->mobile }}">
                            </div>
                            <div class="form-group">
                                <label for="admin_image">Photo</label>
                                <input type="file" id="admin_image" class="form-control" name="admin_image">
                                @if (!empty(Auth::guard('admin')->user()->image))
                                    <a href="{{ url(Auth::guard('admin')->user()->image) }}" target="_blank"
                                        rel="noopener noreferrer">View image</a>
                                    <input type="hidden" name="current_admin_image"
                                        value="{{ Auth::guard('admin')->user()->image }}">
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
                </div>
            @elseif ($slug == 'bank')
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
                        <h4 class="card-title">Update bank details</h4>
                        <form class="forms-sample" action="{{ url('') }}" method="POST"
                            id="updateAdminPasswordForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Admin Email/Username</label>
                                <input type="text" class="form-control"
                                    value="{{ Auth::guard('admin')->user()->email }} "readonly>
                            </div>
                            <div class="form-group">
                                <label>Admin type</label>
                                <input type="email" class="form-control"
                                    value="{{ Auth::guard('admin')->user()->type }} "readonly>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" id="admin_name" class="form-control" name="admin_name" placeholder=""
                                    value="{{ Auth::guard('admin')->user()->name }}">
                            </div>
                            <div class="form-group">
                                <label for="admin_mobile">Mobile</label>
                                <input type="text" id="admin_mobile" class="form-control" name="admin_mobile"
                                    placeholder="Enter your phone number"
                                    value="{{ Auth::guard('admin')->user()->mobile }}">
                            </div>
                            <div class="form-group">
                                <label for="admin_image">Photo</label>
                                <input type="file" id="admin_image" class="form-control" name="admin_image">
                                @if (!empty(Auth::guard('admin')->user()->image))
                                    <a href="{{ url(Auth::guard('admin')->user()->image) }}" target="_blank"
                                        rel="noopener noreferrer">View image</a>
                                    <input type="hidden" name="current_admin_image"
                                        value="{{ Auth::guard('admin')->user()->image }}">
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin.layout.footer')
        <!-- partial -->
    </div>
@endsection
