@extends('layouts.app', ['page' => 'Login'])

@section('content')

<div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
  <form class="form" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="card card-login card-hidden">
      <div class="card-header card-header-primary text-center">
        <h4 class="card-title">
          <img src="/img/logo_proxnet.png" alt="" height="100px">
        </h4>
        {{-- <div class="social-line">
          <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
            <i class="fa fa-facebook-square"></i>
          </a>
          <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
            <i class="fa fa-twitter"></i>
          </a>
          <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
            <i class="fa fa-google-plus"></i>
          </a>
        </div> --}}
      </div>
      <div class="card-body ">
        <p class="card-description text-center"></p>

        <span class="bmd-form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="material-icons">email</i>
              </span>
            </div>
            <input type="email" class="form-control" name="email" placeholder="Email...">
            @if ($errors->has('email'))
            <span class="invalid-feedback" style="display: block;" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
          </div>
        </span>
        <span class="bmd-form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="material-icons">lock_outline</i>
              </span>
            </div>
            <input type="password" class="form-control" name="password" placeholder="Password...">

            @if ($errors->has('password'))
            <span class="invalid-feedback" style="display: block;" role="alert">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
          </div>
        </span>

      </div>

      <div class="card-footer justify-content-center">
        <button type="submit" class="btn btn-rose btn-link btn-lg" style="color: #9c27b0">
          {{ __('Entrar') }}
        </button>
      </div>
    </div>
  </form>
</div>
@endsection


