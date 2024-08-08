@extends('backend.dashboard.layout.sidebar')
@section('content')
<style>
.btn-primary:hover {
        background-color: #B5C18E !important;
        border-color: #B5C18E !important;
    }
    .card {
        margin-bottom: 20px;
    }
    .card-img-top {
        height: 240px; /* تغيير ارتفاع الصورة إلى 300 بيكسل */
        object-fit: cover; /* لتغطية الصورة داخل الكارد */
    }
    .sidebar-video {
        width: 100%;
        height: auto;
        max-height: 300px; /* Adjust the maximum height as needed */
        overflow: hidden;
    }
    .sidebar-video video {
        width: 100%;
        height: auto;
    }
</style>
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div>
    
    <div class="container">
    <div class="slider">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <video class="img-fluid" style="width: 900px; height: 300px;" autoplay loop muted playsinline controlsList="nodownload">
    <source src="{{ asset('Backend/motion.mp4') }}" type="video/mp4">
    Your browser does not support the video tag.
</video>


                </div>
            </div>
        </div>
    </div>
</div>

    <div class="container">
    <div class="title text-center mb-2">
  <h2 style="font-size: 1.5rem; font-weight: normal; text-align: left; margin-left: 450px; margin-right: 40px;">All Blogs : </h2>
</div>
        @if(count($blogs)>0)
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-lg-4 col-md-5">
                <div class="card h-50 shadow" style="background-color: #F1F1F1;">
                    <img class="card-img-top" src="{{ asset('storage/'.$blog->image) }}" alt="Card image cap">
                    <div class="card-body d-flex flex-column p-4">
                        <h5 class="card-title">{{$blog->title}}</h5>
                        <p class="card-text">{{Str::limit($blog->content,40)}}</p>
                        <a href="/Back-end/blogShows/{{$blog->id}}" class="btn btn-primary" style="background-color: #6B8A7A; border-color: #6B8A7A;">Read more</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <br>
    
        <div class="title text-center mb-2">
  <h2 style="font-size: 1.5rem; font-weight: normal; text-align: left; margin-left: 400px; margin-right: 40px;">You don't have blogs yet!</h2>
</div>
        @endif
    </div>
</div>


@endsection