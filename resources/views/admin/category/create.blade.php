@extends('layouts.master')

@section('title', 'add')

@section('content')


    <div class="container-fluid px-4">
        <div class="mt-4">
            <div class="card-header">
                <h4 class=""> Add Category</h4>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger"></div>

                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
            </div>
            @endforeach
            @endif


            <form action="{{ url('admin/add-category') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Category Name</label>
                    <input type="text" name="name" class="form-control"></input>

                </div>



                <div class="mb-3">
                    <label>slug</label>
                    <input type="text" name="slug" class="form-control"></input>

                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" id="my_summernote" rows="5" class="form-control"></textarea>

                </div>


                <div class="mb-3">
                    <label>image</label>
                    <input type="file" name="image" class="form-control"></input>

                </div>

                <h6>SEO tag</h6>
                <div class="mb-3">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" class="form-control"></input>

                </div>


                <div class="mb-3">
                    <label>meta_descriptin</label>
                    <textarea name="meta_descriptin" rows="3" class="form-control"></textarea>

                </div>


                <div class="mb-3">
                    <label>meta_keyword</label>
                    <textarea name="meta_keyword" rows="3" class="form-control"></textarea>

                </div>


                <h6>Status mode</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>navber_status</label>
                        <input type="checkbox" name="navber_status"></input>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>status</label>
                        <input type="checkbox" name="status"></input>

                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">save category</button>
                        </div>
                    </div>
            </form>

        </div>
    </div>
    </div>
@endsection
