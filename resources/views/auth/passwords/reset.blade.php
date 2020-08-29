<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/backend/main.css') }}">
    <!-- Fontawesome css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/backend/fontawesome/all.min.css') }}">
    <title>Login - {{ env('APP_NAME') }}</title>
    <link rel="shortcut icon" href="{{ asset('default_resource/favicon.jpg') }}" type="image/x-icon"/>
</head>
<body>
    <section class="material-half-bg">
      <div class="cover"></div>
  </section>
  <section class="login-content">
      <div class="logo">
        <h1>{{ env('APP_NAME') }}</h1>
    </div>
    <div class="login-box" style="min-height: 430px!important;">
        <form class="login-form" method="POST" action="{{ route('password.update') }}">
            @csrf
            <h3 class="login-head"><i class="far fa-lg fa-fw fa-user"></i>RESET PASSWORD</h3>
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group row">
                <label for="email" class="control-label">E-MAIL ADDRESS</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group row">
                <label for="password" class="control-label">PASSWORD</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="control-label">CONFIRM PASSWORD</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-sign-in-alt fa-lg fa-fw"></i>RESET PASSWORD</button>
            </div>
        </form>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
    </div>
</section>
<!-- Essential javascripts for application to work-->
<script src="{{ asset('assets/js/backend/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/backend/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/backend/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/backend/main.js') }}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{ asset('assets/js/backend/plugins/pace.min.js') }}"></script>
<script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
    });
</script>
</body>
</html>