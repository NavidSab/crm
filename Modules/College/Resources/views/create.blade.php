@extends('layouts.contentLayoutMaster') @section('title', $title)
@section('content') @section('vendor-style')
<!-- vendor css files -->
<link
    rel="stylesheet"
    href="{{ asset('assets/vendors/css/forms/select/select2.min.css') }}">
<link
    rel="stylesheet"
    href="{{ asset('assets/vendors/css/pickers/pickadate/pickadate.css') }}">
<link
    rel="stylesheet"
    href="{{ asset('assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
@endsection @section('page-style')
<link
    rel="stylesheet"
    href="{{ asset('assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
<link
    rel="stylesheet"
    href="{{ asset('assets/css/plugins/forms/pickers/form-pickadate.css') }}">
@endsection
<!-- Basic Tables start -->
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title ">{{ $title }}</h4>
                </div>
                <div class="card-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong>
                        There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form class="form" action="{{ route('college.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <legend>
                                <h3 class="text-primary">Manual Method</h3>
                            </legend>
                            <hr>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-column">
                                        Name</label>
                                    <input
                                        type="text"
                                        id="first-name-column"
                                        class="form-control"
                                        placeholder="Name"
                                        name="name"
                                        required="required" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="location">
                                        Location</label>
                                    <input
                                        type="text"
                                        id="location"
                                        class="form-control"
                                        placeholder="Location"
                                        name="location"
                                        required="required" value="{{ old('location') }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="logo">
                                        Logo</label>
                                    <input
                                        type="file"
                                        id="logo"
                                        class="form-control"
                                        placeholder="Logo"
                                        name="logo"
                                        required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <legend>
                                <h3 class="text-primary">Api Method</h3>
                            </legend>
                            <hr>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="api">
                                        Api
                                    </label>
                                    <textarea name="api" class="form-control" placeholder="List your api here" id="api">@if(old('api')){{ old('api') }} @endif </textarea>
                                    <span class="help-block">
                                        <i class="fa fa-info-circle"></i>Please insert each api in one line.
                                        <br>Sample :
                                        <br>
                                        1- www.site.com/api1
                                        <br>2- www.site.com/api2
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="api_description">
                                        Description
                                    </label>
                                    <textarea name="api_description" id="api_description" class="form-control" placeholder="Description">@if(old('api_description')){{ old('api_description') }} @endif</textarea>
                                    <span class="help-block">
                                        <i class="fa fa-info-circle"></i>
                                        Please enter your details about each api and its functionality.
                                        <br>Sample :
                                        <br>
                                        1- description api1
                                        <br>2- description api2
                                    </span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <a
                                    href="{{ route('college') }}"
                                    class="btn btn-primary btn-prev waves-effect waves-float waves-light">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="14"
                                        height="14"
                                        viewbox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-arrow-left align-middle me-sm-25 me-0">
                                        <line x1="19" y1="12" x2="5" y2="12"></line>
                                        <polyline points="12 19 5 12 12 5"></polyline>
                                    </svg>
                                    <span class="align-middle d-sm-inline-block d-none">Back</span>
                                </a>
                                <button
                                    type="submit"
                                    class="btn btn-success btn-submit waves-effect waves-float waves-light">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<!-- Basic Tables end -->
@endsection @section('vendor-script')
<!-- vendor files -->
<script src="{{ asset('assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
<script src="{{ asset('assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
<script src="{{ asset('assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
<script src="{{ asset('assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
<script
src="{{ asset('assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection @section('page-script')
<!-- Page js files -->
<script src="{{ asset('assets/js/scripts/forms/form-select2.js') }}"></script>
<script src="{{ asset('assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
@endsection