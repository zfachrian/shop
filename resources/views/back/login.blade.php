@extends('back.templates.auth')
@section('title') Login @endsection
@section('style') @endsection
@section('script') @endsection
@section('isi') 
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Shop</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      @if ($message = Session::get('danger'))
      <div class="alert alert-danger">
          {{ $message }}
      </div>
      @endif

      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{route('loginAuth')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" name="email" placeholder="Email" value="admin@gmail.com">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" name="password" placeholder="Password" value="admin123">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@endsection