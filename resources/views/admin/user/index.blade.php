@extends('layouts.master')

@section('title', 'view user')

@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>View user</h4>
            </div>

            <div class="card-body">

                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="myDataTable">

                    <thead>
                        <tr>

                            <th>Id</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Role as</th>
                            <th>Edit</th>

                        </tr>

                    </thead>

                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role_as == '1' ? 'admin' : 'user' }}</td>
                                <td>
                                    <a href="{{ url('/admin/users/' . $item->id) }}" class="btn btn-dark">Edit</a>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
