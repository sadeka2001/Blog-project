@extends('layouts.master')

@section('title','edit user')

@section('content')

<div class="container-fluid px-4">


<div class="card mt-4">
<div class="card-header">
<h4>Edit user<a href="{{url('admin/users')}}" class="btn btn-primary btn-sm float-end">Back</a></h4>
</div>

<div class="card-body">

@if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif
</div>

<div class="mb-3">
<label>Full name</label>
<p class="form-control" name=""name>{{$user->name}}</p>
</div>

  <div class="mb-3">
<label>Email</label>
<p class="form-control" name="email">{{$user->email}}</p>
</div>


<div class="mb-3">
<label>Created at</label>
<p class="form-control" name="created_at">{{$user->created_at->format('d/m/y')}}</p>
</div>

<form action="{{url('admin/update-users/'.$user->id)}}" method="POST">
@csrf

@method('put')

<div class="mb-3">
<label>Role as</label>
<select name="role_as" class="form-control" >

    <option value="1" {{$user->role_as  == '1' ? 'selected':''}}>Admin</option>
    <option value="0" {{$user->role_as  == '0' ? 'selected':''}}>User</option>
    <option value="2" {{$user->role_as  == '2' ? 'selected':''}}>Blogger</option>
</select>

<div class="mb-3 my-2">
    <button type="submit" class="btn btn-primary">Update user role</button>

</div>

</form>
</div>
</div>
</div>

@endsection