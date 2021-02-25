@extends('layouts.new-app')
@section('content')
<div class="card card-primary">
    <div class="card-header"><h4>Login</h4></div>

    <div class="card-body">
      <form method="POST" action="{{ route('login') }}" >
          @csrf
          <div class="form-group">
          <label for="email">Email</label>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="form-group">
          <div class="d-block">
              <label for="password" class="control-label">Password</label>
            <div class="float-right">
              <a class="text-small">
                Forgot Password?
              </a>
            </div>
          </div>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">                    <div class="invalid-feedback">
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          </div>
        </div>

        <div class="form-group">
          <div class="custom-control custom-checkbox">
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

              <label class="form-check-label" for="remember">
                  {{ __('Remember Me') }}
              </label>
          </div>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-lg btn-block">
              {{ __('Login') }}
          </button>
        </div>
      </form>
      <div class="text-center mt-4 mb-3">
        <div class="text-job text-muted">Login With Social</div>
      </div>
      <div class="row sm-gutters">
        <div class="col-6">
          <a class="btn btn-block btn-social btn-facebook">
            <span class="fab fa-facebook"></span> Facebook
          </a>
        </div>
        <div class="col-6">
          <a class="btn btn-block btn-social btn-twitter">
            <span class="fab fa-twitter"></span> Twitter
          </a>
        </div>
      </div>

    </div>
  </div>
  <div class="mt-5 text-muted text-center">
    Don't have an account? <a href="{{ route('register') }}">Create One</a>
  </div>
@endsection
