@extends('layouts.app')

@section('title', "$post->meta_title")

@section('meta_descriptin', "$post->meta_descriptin")

@section('meta_keyword', "$post->meta_keyword")

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8">


                    <div class="category-heading">
                        <h4 class="mb-0">{!! $post->name !!}</h4>
                    </div>

                    {{--  <div class="mt-3">
                        <h6>{{$post->category->name.'/'.$post->name}}</h6>
                    </div> --}}

                    <div class="card card-shadow mt-4">
                        <div class="card-body post-description">{!! $post->description !!}
                        </div>
                    </div>


                    <div class="comment-area mt-4">
                        @if (session('message'))
                        <h6 class="alert alert-warning mb-3">{{ session('message') }}</h6>
                     @endif

                     <div class="card card-body">
                            <h6 class="card-title">leave Comment </h6>

                            <form action="{{url('comments')}}" method="POST">
                                @csrf

                                <input type="hidden" name="post_slug" value="{{ $post->slug }}">
                                <textarea name="comment_body" class="form-control" rows="3" required></textarea>
                                <button type="submit" class="btn btn-primary mt-3">submit</button>
                            </form>

                        </div>

                        <div class="card card-body shadow-sm mt-3">
                            <div class="detaile area">
                                <h6 class="user-name mb-1">User one
                                    <small class="ms-3 text-primary">commented on: 28-01-2023</small>
                                </h6>
                                <p class="user-comment mb-1">Learn to use Laravel Blade's comments to hide parts of the
                                    source code and to add notes to source files.
                                    Learn to use Laravel Blade's comments to hide parts of the source code and to add notes
                                    to source files.
                                </p>
                            </div>

                            <div>
                                <a href="" class="btn btn-primary btn-sm me-2 ">Edit</a>
                                <a href="" class="btn btn-dark btn-sm me-2">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border p-2">

                        <h4>Advertised here</h4>
                    </div>



                    <div class="border p-2">

                        <h4>Advertised here</h4>
                    </div>


                    <div class="border p-2">

                        <h4>Advertised here</h4>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h4>Latest post</h4>
                        </div>

                        <div class="card-body">
                            @foreach ($latest_posts as $latest_item_posts)
                                <a href="{{ url('turorials/' . $latest_item_posts->category->slug . '/' . $latest_item_posts->slug) }}"
                                    class="text-decoration-none">
                                    <h6>{{ $latest_item_posts->name }}</h6>

                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
