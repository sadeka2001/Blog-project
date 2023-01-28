@extends('layouts.master')

@section('title', 'category')

@section('content')


    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('admin/delete-category') }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete with post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="category_delete_id" id="category_id">
                        <h5>Are you sure to delete category with posts</h5>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-danger">Yes delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>View Category<a href="{{ url('admin/add-category') }}" class="btn btn-primary btn-sm float-end"> Add
                        category</a></h4>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif


                <div class="table-responsive">
                    <table class="table table bordered" id="myDataTable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Image</th>
                                <th>status</th>
                                <th>Edit</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $item)
                                <tr>

                                    <td>{{ $item->id }}</td>

                                    <td>{{ $item->name }}</td>

                                    <td>
                                        <img src="{{ asset('uploads/category/' . $item->image) }}" height="50px"
                                            width="50px" alt="img">
                                    </td>
                                    <td>{{ $item->status == '1' ? 'Hidden' : 'shown' }}</td>
                                    <td>
                                        <a href="{{ url('admin/edit-category/' . $item->id) }}"
                                            class="btn btn-primary">Edit</a>
                                    <td> {{-- <a href="{{ url('admin/delete-category/' . $item->id) }}" class="btn btn-danger deleteCategoryBtn">Delete</a> --}}
                                        <button type="button" class="btn btn-danger deleteCategoryBtn"
                                            value="{{ $item->id }}">Delete</button>
                                    </td>

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
@section('scripts')

    <script>
        $(document).ready(function() {
            $('.deleteCategoryBtn').click(function(e) {
                e.preventDefault();

                var category_id = $(this).val();
                $('#category_id').val('category_id');
                $('#deleteModal').modal('show');

            });
        });
    </script>
@endsection
