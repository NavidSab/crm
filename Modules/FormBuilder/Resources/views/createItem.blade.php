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
          <form class="form" action="{{ route('formItem.store') }}" method="post">
              @csrf
              <div class="row">
                <div class="col-md-3 col-12">
                  <div class="mb-1">
                    <label class="form-label" for="name"> Name</label>
                    <input type="hidden"  class="form-control"  name="form_id" value="{{ Request::route('id') }}">
                    <input type="text" id="name" class="form-control" placeholder="Name" name="name" required>
                  </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="type"> Type</label>
                      <input type="text" id="type" class="form-control" placeholder="type" name="type" required>
                    </div>
                  </div>
                  <div class="col-md-3 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="placeholder"> Placeholder</label>
                      <input type="text" id="placeholder" class="form-control" placeholder="placeholder" name="placeholder" required>
                    </div>
                  </div>
            
            </div> 
          
              <div class="row">
                <div class="col-6">
                    <a href="{{ route('form') }}" class="btn btn-primary">
                        Back
                      </a>
                  <button type="submit" class="btn btn-success">Create</button>
                </div>
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
@section('page-script')
<script>
$('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
});
</script>
@endsection
