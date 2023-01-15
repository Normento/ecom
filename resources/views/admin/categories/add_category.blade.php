@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Categories</h3>
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
                        <h4 class="card-title">Add new Category</h4>
                        <form class="forms-sample" action="{{route('addcategory')}}" method="POST"
                            id="updateAdminPasswordForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" id="section_name" class="form-control" name="category_name" placeholder="Enter Category name">
                            </div>
                            <div class="form-group">
                                <label for="section_id">Select section</label>
                                <select name="section_id" id="section_id" class="form-control">
                                    <option value="">Select section</option>
                                    @foreach ($getSection as $section)
                                    <option value="{{$section['id']}}">{{$section['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="appendCategoriesLevel">
                                @include('admin.categories.append_categories_level')

                            </div>
                            <div class="form-group">
                                <label for="category_image">Category Image</label>
                                <input type="file" id="category_image" class="form-control" name="category_image">
                            </div>
                            <div class="form-group">
                                <label for="category_discount">Category discount</label>
                                <input type="text" id="section_discount" class="form-control" name="category_discount" placeholder="Enter Category discount">
                            </div>
                            <div class="form-group">
                                <label for="category_description">Category description</label>
                                <textarea name="description" id="description" cols="10" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="url">Category url</label>
                                <input type="text" id="url" class="form-control" name="url" placeholder="Enter Category url">
                            </div>
                            <div class="form-group">
                                <label for="meta_title">Meta title</label>
                                <input type="text" id="meta_title" class="form-control" name="meta_title" placeholder="Enter Category meta_title">
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta description</label>
                                <input type="text" id="meta_description" class="form-control" name="meta_description" placeholder="Enter Category meta_description">
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">Meta keywords</label>
                                <input type="text" id="meta_keywords" class="form-control" name="meta_keywords" placeholder="Enter Category meta_keywords">
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
