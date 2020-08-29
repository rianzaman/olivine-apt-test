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
    <style type="text/css" media="screen">
        .login-content .login-box {
            min-height: 560px!important;
        }
        .login-content .login-box.flipped {
            min-height: 390px!important;
        }
    </style>
</head>
<body>
    <section class="material-half-bg">
      <div class="cover"></div>
  </section>
  <section class="login-content">
      <div class="logo">
        <h1>{{ env('APP_NAME') }}</h1>
    </div>
    <div class="login-box">
        <form class="login-form" method="POST" action="{{ route('register') }}">
            @csrf
            <h3 class="login-head"><i class="far fa-lg fa-fw fa-user"></i>SIGN UP</h3>
            <div class="form-group">
                <label for="name" class="text-md-right">{{ __('Name') }}</label>

                <div>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="text-md-right">{{ __('E-Mail Address') }}</label>

                <div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="text-md-right">{{ __('Password') }}</label>

                <div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="text-md-right">{{ __('Confirm Password') }}</label>

                <div>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <div class="form-group">
                <div class="utility">
                  <p class="semibold-text mb-2"><a href="javascript::void(0);" data-toggle="flip">Have account?</a></p>
              </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-sign-in-alt fa-lg fa-fw"></i>SIGN UP</button>
        </div>
    </form>
    <form class="forget-form" method="POST" action="{{ route('login') }}">
        @csrf
        <h3 class="login-head"><i class="far fa-lg fa-fw fa-user"></i>SIGN IN</h3>
        <div class="form-group">
            <label for="email" class="control-label">EMAIL</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password" class="control-label">PASSWORD</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <div class="utility">
              <p class="semibold-text mb-2"><a href="javascript::void(0);" data-toggle="flip">Don't have an account?</a></p>
          </div>
      </div>
      <div class="form-group btn-container">
        <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-sign-in-alt fa-lg fa-fw"></i>SIGN IN</button>
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