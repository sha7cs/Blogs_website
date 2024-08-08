@extends('backend.dashboard.layout.sidebar')
 
@section('content') 
<style>
.btn-primary:hover {
        background-color: #B5C18E !important;
        border-color: #B5C18E !important;
    }
    .form-control:hover {
        background-color: #F5F7F8 !important;
        border-color: #B5C18E !important;
    }
    .form-control:focus {
    box-shadow: 0 0 0 0.25rem rgba(107, 138, 122, 0.25) !important;
    border-color: #B5C18E !important;
}
    </style>
<div id="page-wrapper"> 
    <div class="row"> 
        <div class="col-lg-12"> 
            <h1 class="page-header">Editting</h1> 
        </div> 
        <!-- /.col-lg-12 --> 
    </div> 
    <div class="container-fluid center-form-container"  style="background-color: #F1F1F1; padding: 2rem;">
    <h2 class="text-center mb-4"  style="color: #6B8A7A;">Edit the blog</h2>
    <form method="POST" action="/Back-end/blogsUpdate/{{$blog->id}}" enctype="multipart/form-data">
        @csrf
        @method('patch')
  <div class="form-group">
    <label for="exampleInputEmail1" class="form-label" style="color: #6B8A7A;">Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Title here!" name="title"value="{{$blog->title}}" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label" style="color: #6B8A7A;">Content</label>
    <textarea type="content" class="form-control" name="content" required>{{$blog->content}}</textarea>
  </div>
  <div class="form-group" style="color: #6B8A7A;">
  <label for="exampleInputPassword1">Image</label>
  <input type="file" name="image" class="form-control"value="{{$blog->image}}" >
  </div>
  <button href="/Back-end/blogShows/{{$blog->id}}/Edit" type="submit" class="btn btn-primary" style="background-color: #6B8A7A; border-color: #6B8A7A;">Update</button>
</form>
<form action="/Back-end/blogsDelete/{{$blog->id}}" method="POST">
@csrf
@method('DELETE')
<button type="submit" class="btn  btn-primary" style="background-color: #6B8A7A; border-color: #6B8A7A; margin-top: 20px">Delete</button>
</form>
</div>
</div> 
@endsection
