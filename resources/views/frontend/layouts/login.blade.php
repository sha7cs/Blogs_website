@extends('frontend.layouts.app')
@section('content')

<section class="vh-100 bg-light" >
<div class="container py-5 h-100">
  <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col col-xl-10">
      <div class="card" style="border-radius: 1rem;">
        <div class="row g-0">
          <div class="col-md-6 col-lg-5 col-xl-5 d-flex align-items-center order-1 order-lg-1">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                 class="img-fluid" alt="Sample image">
          </div>
          <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-2 order-lg-1">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="POST" action="/login">
                  @csrf
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <img src="frontend/img/branding/planet-logo.svg" alt="">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0"></span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input name="email" type="email" id="form2Example17" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example17">Email address</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input name="password" type="password" id="form2Example27" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                  </div>

                  <a class="small text-muted" href="#!">Forgot password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="/register"
                      style="color: #393f81;">Register here</a></p>
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection