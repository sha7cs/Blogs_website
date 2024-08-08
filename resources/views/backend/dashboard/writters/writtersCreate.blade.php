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
            <h1 class="page-header">Writers</h1>
        </div>
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
    <table class="table">
        <thead>
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">Name</th>
                <th scope="col">Profile Picture</th>
                <th scope="col">Blog Title</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
                <th scope="col">Publish Status</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($blogs as $blog)
    <tr>
        <td>{{ $blog->user_id }}</td>
        <td>{{ $users[$blog->user_id]->name ?? 'User Name Unavailable' }}</td>
        <td>
            @if (isset($users[$blog->user_id]) && $users[$blog->user_id]->profile_pic)
                <img src="{{ asset('storage/' . $users[$blog->user_id]->profile_pic) }}" alt="Profile Picture" width="50" height="50">
            @else
                <span>No Profile Picture</span>
            @endif
        </td>
        <td>{{ $blog->title }}</td>
        <td>{{ $blog->created_at }}</td>
        <td>
            <div class=" d-flex justify-content-end ">
                <form action="{{ route('blogs.accept', ['id' => $blog->id]) }}" method="POST" class="mr-2">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-sm btn-success blog-action" type="submit">Accept</button>
                </form>
                <form action="{{ route('blogs.reject', ['id' => $blog->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-sm btn-danger blog-action" type="submit">Reject</button>
                </form>
            </div>
        </td>

                <td>
                    @if ($blog->is_published == 0)
                    <span class="status-draft">Unpublished</span>
                    @else
                    <span class="status-published">Published</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.blog-action').click(function() {
            var blogId = $(this).data('blog-id');
            var action = $(this).data('action');
            var url = '/blogs/' + blogId + '/' + action;

            $.ajax({
                type: 'PUT',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    alert(response.message); // Show success message
                    // Optionally, update UI or redirect to another page
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Show error if any
                }
            });
        });
    });
</script>



@endsection