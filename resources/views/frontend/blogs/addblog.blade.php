@extends('frontend.layouts.app')
@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }
        .card-header {
            font-size: 1.5em;
            margin-bottom: 20px;
        }
        .form-control {
            margin-bottom: 15px;
        }
    </style>
    

    <div class="container">
        <div class="card my-4">
            <div class="card-header">
                Publish a Blog
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form method="POST" action="/front-end/addblog"  enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Title</label>
                        <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your blog title..." required maxlength="255" value="{{old('title')}}" >
                    </div> 
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Speak your mind</label>
                        <textarea name="content" class="form-control ckeditor" id="exampleFormControlTextarea1" rows="10" placeholder="What's on your mind?" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for=exampleFormControlInput2>Drop your image</label>
                        <input name ="image" type="file" class="form-control" id="exampleFormControlInput2">

                    </div>
                    <button type="submit" class="btn btn-primary">Publish</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '.ckeditor' ) )
        .then( editor => {
            console.log( 'CKEditor 5 has been initialized' );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection