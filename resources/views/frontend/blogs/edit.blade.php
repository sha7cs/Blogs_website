@extends('frontend.layouts.app')
@section('content')

<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4">Create a New Blog</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('blog.update', $blog->id) }}" enctype="multipart/form-data" class="bg-light p-4 rounded shadow">
                @csrf
                @method('patch')
                <div class="form-group mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$blog->title}}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control ckeditor" id="content" name="content" rows="5">{{$blog->content}}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control" value="{{$blog->image}}">
                    @if ($blog->image)
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-thumbnail mt-2" width="200">
                     @endif
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary" href="/front-end/blog/{{$blog->id}}">Update</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this blog post?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="front-end/blog/{{$blog->id}}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
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