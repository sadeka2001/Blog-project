@extends('layouts.master')

@section('title','edit Dashboard')

@section('content')


<div class="container-fluid px-4">
                           <div class="mt-4">
                        <div class="card-header">
                            <h4>edit<a href="{{url('admin/post')}}" class="btn btn-dark float-end"> Back</a></h4>
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
<form action="{{url('admin/update-post/'.$posts->id)}}" method="POST">
@method('put')
@csrf

<div class="mb-3">
<label for="">category</label>
<select name="category_id" required class="form-control">

@foreach($category as $cateitem)

<option value="{{$cateitem->id}}" {{$posts->category_id == $cateitem->id ? 'selected' : ''}}> {{$cateitem->name}}</option>

@endforeach

</select>
</div>

<div class="mb-3">
    <label>Post Name</label>
        <input type="text" name="name" value="{{$posts->name}}" class="form-control"></input>

</div>

<div class="mb-3">
    <label>Slug</label>
        <input type="text" name="slug" value="{{$posts->slug}}" class="form-control"></input>

</div>

<div class="mb-3">
    <label>Description</label>
    <textarea name="description" rows="5"  id="my_summernote" class="form-control">{!! $posts->description !!}</textarea>

</div>

<div class="mb-3">
    <label>Youtube Iframe Link</label>
        <input type="text" name="yt_frame" value="{{$posts->yt_frame}}" class="form-control"></input>

</div>
<h4>SEO tag</h4>
<div class="mb-3">
    <label>meta_title</label>
        <input type="text" name="meta_title" value="{{$posts->meta_title}}" class="form-control"></input>

</div>

<div class="mb-3">
    <label>Meta_description</label>
    <textarea name="meta_description" rows="3"  class="form-control">{!! $posts->meta_description !!}</textarea>

</div>

<div class="mb-3">
    <label>Meta_keyword</label>
    <textarea name="meta_keyword" rows="3"   class="form-control">{!! $posts->meta_keyword !!}</textarea>


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
<button type="submit" class="btn btn-primary">update post</button>


</div>
</div>
</form>

 </div>
</div>
</div>
@endsection
