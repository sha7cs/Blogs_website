@extends('frontend.layouts.app')
@section('content')
<section class="vh-100" style="background-color: #f4f5f7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-8 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="{{ asset('storage/' . $user->profile_pic) }}" alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
              <h5 style="color:black">{{$user->name}}</h5>
              <p>Web Designer</p>
              <a href="{{ route('user.edit', $user->id) }}" class="btn btn-link text-white p-0">
                <i class="fas fa-pen"></i> Edit
              </a>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h6>Edit Information</h6>
                </div>
                <hr class="mt-0 mb-4">
                <form action="{{ route('update', $user->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="form-group mb-3">
                    <label for="name"><h6>Name</h6></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                  </div>
                  <div class="form-group mb-3">
                    <label for="email"><h6>Email</h6></label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                  </div>
                  <div class="form-group mb-3">
                    <label for="phone"><h6>Phone</h6></label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                  </div>
                  <div class="d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
                <hr class="mt-0 mb-4">
                <div class="d-flex justify-content-start">
                  <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection