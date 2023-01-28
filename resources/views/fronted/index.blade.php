@extends('layouts.app')

@section('title', 'funda of blog project')

@section('meta_descriptin', 'funda of blog project')

@section('meta_keyword', 'funda of blog project')

@section('content')

    <div class="bg-danger py-4">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="owl-carousel category-carousel owl-theme">
                        @foreach ($all_categories as $all_cate_item)
                            <div class="item">
                                <a href="{{ url('turorials/' . $all_cate_item->slug) }}" class="text-decoration-none">
                                    <div class="card">
                                        <img src="{{ asset('uploads/category/' . $all_cate_item->image) }}" alt="image">
                                        <div class="card-body text-center">
                                            <h5 class="text-dark">{{ $all_cate_item->name }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="py-1 bg-gray">
        <div class="conatiner">
            <div class="border text-center p-3 ">

                <h4>Advertise here</h4>
            </div>
        </div>
    </div>

    <div class=" py-4">
        <div class="conatiner">
            <div class="row">
                <div class="col-md-12">
                    <h4>Funda of Blog Project</h4>

                    <div class="underline"></div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione dicta fugiat
                        tempore neque suscipit maiores dolorum? Libero aut fugit quae? In nobis, veritatis
                        eveniet optio quaerat soluta hic. Quam, repellat?Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Ratione dicta fugiat
                        tempore neque suscipit maiores dolorum? Libero aut fugit quae? In nobis, veritatis
                        eveniet optio quaerat soluta hic. Quam, repellat?
                    </p>
                </div>
            </div>
        </div>
    </div>



    <div class=" py-5 bg-gray">
        <div class="conatiner">
            <div class="row">
                <div class="col-md-12">
                    <h4>All Categories</h4>

                    <div class="underline">

                    </div>
                </div>

                @foreach ($all_categories as $all_cateitem)
                    <div class="col-md-3">
                        <div class="card card-body mb-3">
                            <a href="{{ url('tutorals/' . $all_cateitem->slug) }}" class="text-decoration-none">
                                <h4 class="text-dark mb-0">{{ $all_cateitem->name }}</h4>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>



    <div class=" py-5 bg-white">
        <div class="conatiner">
            <div class="row">
                <div class="col-md-12">
                    <h4>Latest Post</h4>

                    <div class="underline">

                    </div>
                </div>
                <div class="col-md-8">
                    @foreach ($latest_posts as $latest_cateitem)
                        <div class="card card-body  bg-gray shadow mb-3">
                            <a href="{{ url('tutorals/' . $latest_cateitem->slug) . '/' . $latest_cateitem->slug }}"
                                class="text-decoration-none">
                                <h4 class="text-dark mb-0">{{ $latest_cateitem->name }}</h4>
                            </a>
                            <h6>posted on:{{ $latest_cateitem->created_at->format('d:m:Y') }}</h6>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <div class="border text-center p-3 ">

                        <h4>Advertise here</h4>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>





@endsection
