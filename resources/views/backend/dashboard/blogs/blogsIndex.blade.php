@extends('backend.dashboard.layout.sidebar') 
 
@section('content')
<style>
  .btn-primary {
    background-color: #6B8A7A !important;
    border-color: #6B8A7A !important;
  }

  .btn-primary:hover {
    background-color: #B5C18E !important;
    border-color: #B5C18E !important;
  }

  .background-color\:red {
    background-color: #6B8A7A;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
  }
</style>
<div id="page-wrapper"> 
            <div class="row"> 
                <div class="col-lg-12"> 
                    <h1 class="page-header">Blogs</h1> 
                </div> 
                <!-- /.col-lg-12 --> 
            </div> 
<div class="container d-flex justify-content-center align-items-center"> 
  <div class="row justify-content-center"> 
    <div class="col-md-9"> 
      <div class="table-responsive">
      @if(count($blogs)>0)  
        <table class="table"> 
          <thead> 
            <tr> 
            <th scope="col">#</th>
      <th scope="col">blogs</th>
      <th scope="col">status</th>
      <th scope="col">created_at</th>
      <th scope="col">action</th>
            </tr> 
          </thead>
          <tbody> 
          @foreach ($blogs as $key=>$blog)
    <tr>
      <th scope="row">{{++$key}}</th>
      <td>{{$blog ->title}}</td>
      <td>
        @if ($blog->is_published==0)
        <span class="background-color:red">not published</span>
        @else
        <span class="background-color:red">published</span>
        @endif
      </td>
      <td style="color:black">{{$blog->created_at}}</td>
      <td> <a href="/Back-end/blogShows/{{$blog->id}}/Edit" class="btn btn-primary" >Edit</a></td>
    </tr>
    @endforeach
          </tbody> 
        </table> 
        @else
        <br>
        <div class="title text-center mb-3">
            <h2>You don't have blogs yet!</h2>
        </div>
        @endif
      </div> 
    </div> 
  </div> 
</div> 
</div> 
@endsection