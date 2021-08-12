@extends('dashboard::main.master') @section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Permission Management</h2>
            </div>
            <div class="pull-right">
                {{-- @can('permission-create') --}}
                <a class="btn btn-success" href="{{ route('permission.create') }}">
                    Create New permission</a>
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
        @foreach ($permissions as $key => $permission)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $permission->name }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('permission.show',$permission->id) }}">Show</a>
                {{-- @can('permission-edit') --}}
                <a class="btn btn-primary" href="{{ route('permission.edit',$permission->id) }}">Edit</a>
                {{-- @endcan --}}
                {{-- @can('permission-delete') --}}
                <form
                    style="display:inline"
                    method="post"
                    action="{{ route('permission.destroy',$permission->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                {{-- @endcan --}}
            </td>
        </tr>
        @endforeach
    </table>
    {!! $permissions->render() !!}
@endsection