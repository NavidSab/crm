@extends('dashboard::main.master')
 @section('content')
 <div class=" container card">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit New User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('user') }}">
                Back</a>
        </div>
    </div>
</div>
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
<form action="{{ route('user.update') }}" method="post">
    @csrf
    <input type="hidden" name="user_id" value="{{ $user->id }}">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <input class="form-control" type="text" name="name" placeholder="Name"  value="{{ $user->name }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            <input class="form-control" type="text" name="email" placeholder="Email" value="{{ $user->email }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            <input class="form-control" type="password" name="password" placeholder="Password">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Confirm Password:</strong>
            <input class="form-control" type="password" name="confirm-password" placeholder="Confirm Password">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
             <select name="roles[]" class="form-control" multiple>
                  @foreach ($roles as $items )
                    <option value="{{ $items->id }}" {{ in_array($items->id,$userRole) ? 'selected' : ''}}
                        >{{ $items->name }}</option>  
                  @endforeach
             </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>
</div>
@endsection