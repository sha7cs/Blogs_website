@extends('backend.dashboard.layout.sidebar')
 
@section('content') 
<div id="page-wrapper"> 
    <div class="row"> 
        <div class="col-lg-12"> 
            <h1 class="page-header">Blog Post</h1> 
        </div> 
        <!-- /.col-lg-12 --> 
    </div>
    <div class="container">
        <div class="slider">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="img-fluid" style="width: 100%; height: 400px; object-fit: cover;" src="{{ asset('storage/'.$blog->image) }}"  alt="Blog Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="d-flex justify-content-center">
            <div class="card shadow-sm" style="width: 80%;">
                <div class="card-body">
                    @if(isset($blog))
                        <h2 class="card-title">{{ $blog->title }}</h2>
                        <p class="card-text">
                            {{ $blog->content }}
                        </p>
                    @else
                        <p class="card-text">
                            No content available for this blog.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
