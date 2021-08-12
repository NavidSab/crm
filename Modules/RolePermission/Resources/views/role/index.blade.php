@extends('dashboard::main.master') @section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Role Management</h2>
            </div>
            <div class="pull-right">
                {{-- @can('role-create') --}}
                <a class="btn btn-success" href="{{ route('role.create') }}">
                    Create New Role</a>
                {{-- @endcan --}}
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($roles as $key => $role)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $role->name }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('role.show',$role->id) }}">Show</a>
                {{-- @can('role-edit') --}}
                <a class="btn btn-primary" href="{{ route('role.edit',$role->id) }}">Edit</a>
                {{-- @endcan --}}
                {{-- @can('role-delete') --}}
                <form
                    style="display:inline"
                    method="post"
                    action="{{ route('role.destroy',$role->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                {{-- @endcan --}}
            </td>
        </tr>
        @endforeach
    </table>
    {!! $roles->render() !!}
@endsection