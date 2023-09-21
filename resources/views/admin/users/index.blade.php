@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('admin.users.create') }}"> Create New User</a>
        </div>
    </div>
</div>



<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label>{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('admin.users.show',$user->id) }}">Show</a>
       <a class="btn btn-primary" href="{{ route('admin.users.edit',$user->id) }}">Edit</a>
       <a class="btn btn-danger" href="{{ route('admin.users.destroy', $user->id) }}"
          onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this user?')) document.getElementById('delete-form-{{ $user->id }}').submit();"
       >
           Delete
       </a>
       <form id="delete-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none;">
           @csrf
           @method('DELETE')
       </form>
    </td>
  </tr>
 @endforeach
</table>

{!! $data->render() !!}

@endsection
