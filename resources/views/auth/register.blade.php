@extends('template_auth.main')
@section('content')
<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-6 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">{{ __('Register') }}</h1>
                </div>
                <form class="user" method="POST" action="{{ route('register') }}">
                  @csrf
                  <input type="hidden" name="role" value="user">
                  <input type="hidden" name="status" value="1">
                  <div class="form-group">
                    <input type="text" name="name" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" aria-describedby="nameHelp" value="{{ old('name') }}" placeholder="Enter name Address..." required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedrole="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" value="{{ old('email') }}" placeholder="Enter Email Address..." required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedrole="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror"" id="password" placeholder="Password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedrole="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control form-control-user" id="password" placeholder="Confirm Password" required autocomplete="new-password">
                  </div>
                  
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Register') }}
                  </button>
                  <hr>
                  
                </form>
                <div class="text-center">
                  <a class="small" href="{{route('login')}}">Have Account!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>
@endsection