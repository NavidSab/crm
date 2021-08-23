@extends('layouts.contentLayoutMaster')
 @section('title', $title)
@section('content') 

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
                    <form class="form" action="{{ route('document.update') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="document_id" value="{{ $document->id }}">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="document">
                                        Document</label>
                                    <input
                                        type="file"
                                        id="document"
                                        class="form-control"
                                        placeholder="document"
                                        name="document"
                                        >
                                </div>
                            </div>
                         
                        </div>

                        <div class="row">
                          <div class="col-12">
                            <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Edit</button>
                            <a href="{{ route('document') }}" class="btn btn-outline-secondary waves-effect">Back </a>
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