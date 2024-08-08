@extends('backend.dashboard.layout.sidebar')
@section('content')
<style>
    .container {
        margin-top: 50px;
    }
    .form-group.row {
        margin-bottom: 30px;
        margin-left: 190px;
    }
    .btn-block {
        display: block;
        width: 100%;
    }
    .mt-3 {
        margin-top: 1rem;
    }
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
  .form-control:focus {
    box-shadow: 0 0 0 0.25rem rgba(107, 138, 122, 0.25) !important;
    border-color: #B5C18E !important;
}
</style>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <div class="row justify-content-center"  style="background-color: #F1F1F1; padding: 2rem;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="/Back-end/UserProfile/{{$user->id}}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="tel" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $user->phone_number }}" required autocomplete="phone_number">

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 mt-3">
                                <button href="/Back-end/UserProfile/{{$user->id}}" type="submit" class="btn btn-primary">
                                    {{ __('Update Profile') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
