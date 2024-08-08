@extends('frontend.layouts.app')
@section('content')

<section  style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11 my-3">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5 ">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            @if ($error == 'The password2 field must match password.')
                                <li>The password and password confirmation fields do not match. Please try again.</li>
                            @else
                                <li>{{ $error }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                @endif


                <form method="POST" action="/register" class="mx-1 mx-md-4" enctype="multipart/form-data">
                @csrf
                    <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <input name="profile_pic" type="file" id="form3Example3c" class="form-control" />
                      <label class="form-label" for="form3Example3c">
                        Your Profile Pic <span class="text-muted">(optional)</span>
                    </label>
                    </div>
                  </div>


                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <input name="name" type="text" id="form3Example1c" class="form-control" value="{{ old('name') }}" />
                      <label class="form-label" for="form3Example1c">Your Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <input name="email" type="email" id="form3Example3c" class="form-control" value="{{ old('email') }}" />
                      <label class="form-label" for="form3Example3c">Your Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <input name="phone" type="text" id="form3Example1c" class="form-control" value="{{ old('phone') }}"/>
                      <label class="form-label" for="form3Example1c">Your Phone Number</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <input name="password" type="password" id="form3Example4c" class="form-control" />
                        <label class="form-label" for="form3Example4c">Password</label>
                    </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <input name="password2" type="password" id="form3Example4cd" class="form-control" />
                        <label class="form-label" for="form3Example4cd">Repeat your password</label>
                    </div>
                    </div>
                    <div id="password-error" class="text-danger d-none">Passwords do not match.</div>

                    <script>
                    const passwordInput = document.getElementById('form3Example4c');
                    const confirmPasswordInput = document.getElementById('form3Example4cd');
                    const passwordErrorDiv = document.getElementById('password-error');

                    confirmPasswordInput.addEventListener('input', () => {
                        if (passwordInput.value !== confirmPasswordInput.value) {
                        passwordErrorDiv.classList.remove('d-none');
                        } else {
                        passwordErrorDiv.classList.add('d-none');
                        }
                    });
                    </script>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" required/>
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Register</button>
                  </div>

                </form>
               
              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</section>

<script>
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>

@endsection