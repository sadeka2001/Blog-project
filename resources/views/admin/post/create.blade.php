@extends('layouts.master')

@section('title', 'add Dashboard')

@section('content')


    <div class="container-fluid px-4">
        <div class="mt-4">
            <div class="card-header">
                <h4> add post
                    <a href="{{ url('admin/post') }}" class="btn btn-primary float-end"> Back</a>
                </h4>
            </div>
            <div class="card-body">


                @if ($errors->any())
                    <div class="alert alert-danger"></div>

                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
            </div>
            @endforeach
            @endif

        </div>
        <form action="{{ url('admin/add-post') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="">category</label>
                <select name="category_id" class="form-control">

                    @foreach ($category as $cateitem)
                        <option value="{{ $cateitem->id }}">{{ $cateitem->name }}</option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label>Post Name</label>
                <input type="text" name="name" class="form-control"></input>

            </div>

            <div class="mb-3">
                <label>Slug</label>
                <input type="text" name="slug" class="form-control"></input>

            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" id="my_summernote" rows="5" class="form-control"></textarea>

            </div>

            <div class="mb-3">
                <label>Youtube Iframe Link</label>
                <input type="text" name="yt_frame" class="form-control"></input>

            </div>
            <h4>SEO tag</h4>
            <div class="mb-3">
                <label>meta_title</label>
                <input type="text" name="meta_title" class="form-control"></input>

            </div>

            <div class="mb-3">
                <label>Meta_description</label>
                <textarea name="meta_description" rows="3" class="form-control"></textarea>

            </div>

            <div class="mb-3">
                <label>Meta_keyword</label>
                <textarea name="meta_keyword" rows="3" class="form-control"></textarea>


            </div>

            <h4>status</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">

                        <label>status</label>
                        <input type="checkbox" name="status"></input>

                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">save post</button>


            </div>
    </div>
    </form>

    </div>
    </div>
    </div>
@endsection
