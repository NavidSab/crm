@extends('layouts.contentLayoutMaster')
 @section('title', $title)
@section('content')
@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/forms/select/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/pickers/pickadate/pickadate.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
@endsection
@section('page-style')
<link rel="stylesheet" href="{{ asset('assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/forms/pickers/form-pickadate.css') }}">
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
                    <form class="form" action="{{ route('program.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="name">
                                        Name</label>
                                    <input
                                        type="text"
                                        id="name"
                                        class="form-control"
                                        placeholder="name"
                                        name="name"
                                        required="required" >
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-check-label mb-50" for="co-op">CO-OP</label>
                                <div class="form-check form-check-success form-switch">
                                    <input name="co-op" type="checkbox" checked="" class="form-check-input" id="co-op">
                                </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-check-label mb-50" for="internship">Intership</label>
                                <div class="form-check form-check-success form-switch">
                                    <input name="internship" type="checkbox" checked="" class="form-check-input" id="internship">
                                </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-check-label mb-50" for="pgwp">PGWP</label>
                                <div class="form-check form-check-success form-switch">
                                    <input name="pgwp" type="checkbox" checked="" class="form-check-input" id="pgwp"/>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-check-label mb-50" for="CGPA">CGPA Required</label>
                                    <div class="input-group">
                                        <input name="CGPA" id="CGPA" type="text" class="touchspin-color"  data-bts-button-down-class="btn btn-success" data-bts-button-up-class="btn btn-success" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-check-label mb-50" for="average">Average</label>
                                    <div class="input-group">
                                        <input name="average" id="average" type="text" class="touchspin-color"  data-bts-button-down-class="btn btn-success" data-bts-button-up-class="btn btn-success" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-12" >
                                <div class="mb-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="intake_date"> Deadline </label>
                                        <input type="text" value="{{ old('deadline') }}" name="deadline" id="deadline" class="form-control flatpickr-basic" readonly  placeholder="YYYY-MM-DD"  />
                                      </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label for="intake">Intake Month</label>
                                    <select class="form-control" id="intake" name="intake" required>
                                    <option selected="selected" disabled>Select one month</option>
                                      <option value="Aguest">Aguest</option>
                                      <option value="September">September</option>
                                      <option value="January">January</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-12" id="intake_date_input" style="display: none">
                                <div class="mb-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="intake_date"> Intake Date </label>
                                        <input type="text" value="{{ old('intake_date') }}" name="intake_date" id="intake_date" class="form-control flatpickr-basic" readonly  placeholder="YYYY-MM-DD"  />
                                      </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label for="semester">Degree Type</label>
                                    <select class="form-control select2" id="degree_id" name="degree_id" multiple  required>
                                        @foreach ($degree as $item)                  
                                        <option value="{{ $item->id }}" {{ old('degree_id') == $item->id ? "selected" : "" }}>{{ $item->name }}</option>
                                        @endforeach       
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label for="semester">College / University</label>
                                    <select class="form-control select2" id="college_id" name="college_id"   required>
                                        @foreach ($college as $item)                  
                                        <option value="{{ $item->id }}" {{ old('college_id') == $item->id ? "selected" : "" }}>{{ $item->name }}</option>
                                        @endforeach       
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <legend>Duration</legend>
                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label for="semester">Semester</label>
                                    <select class="form-control" id="semester" name="semester" >
                                    <option selected="selected" disabled>Select one number</option>
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>
                                      <option value="8">8</option>
                                      <option value="9">9</option>
                                      <option value="10">10</option>
                                      <option value="11">11</option>
                                      <option value="12">12</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="mb-1">
                                    <label class="form-check-label mb-50" for="semesters_hours">Hour</label>
                                    <div class="input-group">
                                        <input name="semesters_hours" id="semesters_hours" type="text" class="touchspin-color"  data-bts-button-down-class="btn btn-success" data-bts-button-up-class="btn btn-success" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <legend>Fee</legend>
                        <div class="row">
                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-check-label mb-50" for="tuition_fee">Tuition fee</label>
                                    <div class="input-group input-group-lg">
                                        <input name="tuition_fee" id="tuition_fee" type="text" class="touchspin-color"  data-bts-button-down-class="btn btn-success" data-bts-button-up-class="btn btn-success" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-check-label mb-50" for="application_fee">Application fee</label>
                                    <div class="input-group input-group-lg">
                                        <input name="application_fee" id="application_fee" type="text" class="touchspin-color"  data-bts-button-down-class="btn btn-danger" data-bts-button-up-class="btn btn-danger" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-check-label mb-50" for="apply_fee">Apply fee</label>
                                    <div class="input-group input-group-lg">
                                        <input name="apply_fee" id="apply_fee" type="text" class="touchspin-color"  data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" />
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <legend> English Test</legend>
                            <div class="row">
                                {{-- <div class="col-md-2 col-12">
                                <div class="inline-spacing">
                                    <div class="custom-control custom-control-primary custom-checkbox">
                                      <input type="checkbox" class="custom-control-input english-test" id="ielts" data-id="en_1" />
                                      <label class="custom-control-label" for="ielts">IELTS</label>
                                    </div>
                                    <div class="custom-control custom-control-secondary custom-checkbox">
                                      <input type="checkbox" class="custom-control-input english-test" id="tofel"  data-id="en_2"/>
                                      <label class="custom-control-label" for="tofel">TOFEL</label>
                                    </div>
                                    <div class="custom-control custom-control-success custom-checkbox">
                                      <input type="checkbox" class="custom-control-input english-test" id="pte"  data-id="en_3"/>
                                      <label class="custom-control-label" for="pte">PTE</label>
                                    </div>
                                    <div class="custom-control custom-control-danger custom-checkbox">
                                      <input type="checkbox" class="custom-control-input english-test" id="cael"  data-id="en_4"/>
                                      <label class="custom-control-label" for="cael">CAEL</label>
                                    </div>
                                    <div class="custom-control custom-control-warning custom-checkbox">
                                      <input type="checkbox" class="custom-control-input english-test" id="duolingo"  data-id="en_5"/>
                                      <label class="custom-control-label" for="duolingo">Duolingo</label>
                                    </div>
                                </div>

                                  </div> --}}
                                  <div class="col-md-2 col-12" id="en_1" style="display: block">
                                    <div class="mb-1">
                                        <label class="form-check-label mb-50" for="score_ielts_test">IELTS</label>
                                        <div class="input-group input-group-lg">
                                            <input name="score_ielts_test" id="score_ielts_test" type="text" class="touchspin-color"  data-bts-button-down-class="btn btn-danger" data-bts-button-up-class="btn btn-danger" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12" id="en_2" style="display: block">
                                    <div class="mb-1">
                                        <label class="form-check-label mb-50" for="score_tofel_test">TOFEL</label>
                                        <div class="input-group input-group-lg">
                                            <input name="score_tofel_test" id="score_tofel_test" type="text" class="touchspin-color"  data-bts-button-down-class="btn btn-warning" data-bts-button-up-class="btn btn-warning" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12" id="en_3" style="display: block">
                                    <div class="mb-1">
                                        <label class="form-check-label mb-50" for="score_pte_test">PTE</label>
                                        <div class="input-group input-group-lg">
                                            <input name="score_pte_test" id="score_pte_test" type="text" class="touchspin-color"  data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12" id="en_4" style="display: block">
                                    <div class="mb-1">
                                        <label class="form-check-label mb-50" for="score_cael_test">CAEL</label>
                                        <div class="input-group input-group-lg">
                                            <input name="score_cael_test" id="score_cael_test" type="text" class="touchspin-color"  data-bts-button-down-class="btn btn-success" data-bts-button-up-class="btn btn-success" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12" id="en_5" style="display: block">
                                    <div class="mb-1">
                                        <label class="form-check-label mb-50" for="score_duolingo_test">Duolingo</label>
                                        <div class="input-group input-group-lg">
                                            <input name="score_duolingo_test" id="score_duolingo_test" type="text" class="touchspin-color"  data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" />
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr>
                            <legend>French Test</legend>
                            <div class="row">
                                
                                {{-- <div class="col-md-2 col-12">
                                    <div class="inline-spacing">
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                          <input type="checkbox" class="custom-control-input french-test" id="score_tcf_test"  data-id="fr_1"/>
                                          <label class="custom-control-label" for="score_tcf_test">TCF</label>
                                        </div>
                                        <div class="custom-control custom-control-secondary custom-checkbox">
                                          <input type="checkbox"  class="custom-control-input french-test" id="score_tef_test"  data-id="fr_2"/>
                                          <label class="custom-control-label" for="score_tef_test">TEF</label>
                                        </div>
                                        <div class="custom-control custom-control-success custom-checkbox">
                                          <input type="checkbox" class="custom-control-input french-test" id="score_delf_test"  data-id="fr_3"/>
                                          <label class="custom-control-label" for="score_delf_test">DELF</label>
                                        </div>
                                    </div>
    
                                      </div> --}}
                                      <div class="col-md-2 col-12" id="fr_1" style="display: block">
                                        <div class="mb-1">
                                            <label class="form-check-label mb-50" for="score_tcf_test">TCF</label>
                                            <div class="input-group input-group-lg">
                                                <input name="score_tcf_test" id="score_tcf_test" type="text" class="touchspin-color"  data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12" id="fr_2" style="display: block">
                                        <div class="mb-1">
                                            <label class="form-check-label mb-50" for="score_tef_test">TEF</label>
                                            <div class="input-group input-group-lg">
                                                <input name="score_tef_test" id="score_tef_test" type="text" class="touchspin-color"  data-bts-button-down-class="btn btn-success" data-bts-button-up-class="btn btn-success" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12" id="fr_3" style="display: block">
                                        <div class="mb-1">
                                            <label class="form-check-label mb-50" for="score_delf_test">DELF</label>
                                            <div class="input-group input-group-lg">
                                                <input name="score_delf_test" id="score_delf_test" type="text" class="touchspin-color"  data-bts-button-down-class="btn btn-danger" data-bts-button-up-class="btn btn-danger" />
                                            </div>
                                        </div>
                                    </div>

                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-6">
                                <a
                                    href="{{ route('program') }}"
                                    class="btn btn-primary btn-prev waves-effect waves-float waves-light">
                                
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
@endsection
@section('vendor-script')
<script>
$('#intake').on('change', function() {
    if (this.value != '') {
      $("#intake_date_input").show();
    } else {
      $("#intake_date_input").hide();
}
});
$('#english-test').on('change', function() {
    if (this.value != '') {
      $("#intake_date_input").show();
    } else {
      $("#intake_date_input").hide();
}
});
</script>
        <!-- vendor files -->
        <script src="{{ asset('assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
        <script src="{{ asset('assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
        <script src="{{ asset('assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
        <script src="{{ asset('assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
        <script src="{{ asset('assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
        <script src="{{ asset('assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection
@section('page-script')
        <!-- Page js files -->
        <script src="{{ asset('assets/js/scripts/forms/form-number-input.js') }}"></script>
        <script src="{{ asset('assets/js/scripts/forms/form-select2.js') }}"></script>
        <script src="{{ asset('assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
@endsection
