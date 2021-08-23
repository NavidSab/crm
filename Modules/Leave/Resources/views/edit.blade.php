@extends('layouts.contentLayoutMaster')
 @section('title', $title)
@section('content')
<!-- Basic Tables start -->
<section id="multiple-column-form">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">{{ $title }}</h4>
          </div>
          <div class="card-body">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                 @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                 @endforeach
              </ul>
            </div>
          @endif
          <form class="form" action="{{ route('department.update') }}" method="post">
              @csrf
              <input type="hidden" name="department_id" value="{{ $department->id }}">
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="mb-1">
                    <label class="form-label" for="first-name-column"> Name</label>
                    <input type="text" id="first-name-column" class="form-control" placeholder="Name" name="name" required value="{{ $department->name }}">
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="mb-1">
                        <label class="form-label" for="head">Head</label>
                        <select name="head_id" class="form-select" size="5" aria-label="size 5 select" id="head" required>
                          <option selected="" disabled>select one person</option>
                          @foreach ($user as $item)                  
                          <option value="{{ $item->id }}" {{ $department->head_id == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>
                          @endforeach
                        </select>
                </div>
                </div>
            
                <div class="col-12">
                  <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Edit</button>
                  <a href="{{ route('department') }}" class="btn btn-outline-secondary waves-effect">Back </a>
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