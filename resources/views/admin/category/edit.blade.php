@extends('layouts.master')

@section('title','category Dashboard')

@section('content')


<div class="container-fluid px-4">
                           <div class="mt-4">
                        <div class="card-header">
                            <h4 class="{{url('admin/category')}}"> Edit Category</h4>
                        </div>
                           <div class="card-body">

                           @if ($errors->any())
                <div class="alert alert-danger"></div>

            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                           </div>
            @endforeach
@endif


<form action="{{url('admin/update-category/'.$category->id)}}" method="POST" enctype= "multipart/form-data">

@csrf
@method('PUT')

<div class="mb-3">
    <label>Category Name</label>
        <input type="text" name="name" value="{{$category->name}}" class="form-control"></input>

</div>



<div class="mb-3">
    <label>slug</label>
        <input type="text" name="slug" class="form-control"  value="{{$category->slug}}"></input>

</div>

<div class="mb-3">
    <label>Description</label>
        <textarea name="description" id="my_summernote" rows="5"  class="form-control">{{$category->description}}"</textarea>

</div>


<div class="mb-3">
    <label>image</label>
        <input type="file" name="image"  class="form-control" ></input>

</div>

<h6>SEO tag</h6>
<div class="mb-3">
    <label>Meta Title</label>
        <input type="text" name="meta_title"  class="form-control" value="{{$category->meta_title}}"></input>

</div>


<div class="mb-3">
    <label>meta_descriptin</label>
        <textarea name="meta_descriptin" rows="3"  class="form-control">{{$category->meta_descriptin}}</textarea>

</div>


<div class="mb-3">
    <label>meta_keyword</label>
        <textarea name="meta_keyword" rows="3" class="form-control">{{$category->meta_keyword}}</textarea>

</div>


<h6>Status mode</h6>
    <div class="row">
<div class="col-md-3 mb-3">
    <label>navber_status</label>
        <input type="checkbox" name="navber_status">{{$category->navber_status == '1' ? 'checked':''}}</input>
</div>

<div class="col-md-3 mb-3">
    <label>status</label>
        <input type="checkbox" name="status">{{$category->status == '1' ? 'checked':''}}</input>

<div class="col-md-6">
    <button type="update" class= "btn btn-primary">update category</button>
    </div>
</div>
</form>

</div>
</div>
</div>
@endsection
