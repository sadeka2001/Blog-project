@extends('layouts.master')

@section('title', 'view post')

@section('content')

    <div class="container-fluid px-4">


        <div class="card mt-4">
            <div class="card-header">
                <h4>View post<a href="{{ url('admin/add-post') }}" class="btn btn-primary btn-sm float-end"> post category</a>
                </h4>
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
                            <th>Category</th>
                            <th>Post Name</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                    </thead>

                    <tbody>
                        @foreach ($posts as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->name }}}</td>
                                <td>{{ $item->status == '1' ? 'Hidden' : 'visible' }}</td>
                                <td>
                                    <a href="{{ route('post.edit', $item->id) }}" class="btn btn-dark">Edit</a>

                                </td>

                                <td>
                                    <a href="{{ route('post.delete', $item->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
