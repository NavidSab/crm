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
                    <form class="form" action="{{ route('college.update') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="college_id" value="{{ $college->id }}">
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
                                        required="required" value="{{ $college->name }}">
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
                                        required="required" value="{{ $college->location }}">
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
                                        >
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
                                    <textarea name="api" class="form-control" placeholder="List your api here" id="api">{{ $college->api }} </textarea>
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
                                    <textarea name="api_description" id="api_description" class="form-control" placeholder="Description">{{ $college->api_description }}</textarea>
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
                          <div class="col-12">
                            <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Edit</button>
                            <a href="{{ route('college') }}" class="btn btn-outline-secondary waves-effect">Back </a>
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
@endsection 