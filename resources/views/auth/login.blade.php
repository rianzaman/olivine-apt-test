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
    <link rel="shortcut icon" href="{{ asset('default_resource/favicon.jpg') }}" type="image/x-icon"/>

    <!-- Toastr css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/backend/toastr/toastr.min.css') }}">

    <title>Login - {{ env('APP_NAME') }}</title>
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
        <form class="login-form" method="POST" action="{{ route('login') }}">
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
                  <div class="animated-checkbox">
                        <p class="semibold-text mb-2"><a href="{{ route('register') }}">Don't have an account?</a></p>
                    
                </div>
                <p class="semibold-text mb-2"><a href="javascript::void(0);" data-toggle="flip">Forgot Password?</a></p>
            </div>
        </div>
        <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-sign-in-alt fa-lg fa-fw"></i>SIGN IN</button>
        </div>
    </form>
    <form method="POST" action="{{ route('password.email') }}" class="forget-form">
        @csrf
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
        <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group btn-container">
            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-unlock fa-lg fa-fw"></i>RESET</button>
        </div>
        <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="javascript::void(0);" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
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

{{-- Toastr js --}}
<script src="{{ asset('assets/js/backend/toastr/toastr.min.js') }}"></script>

{{-- Toastr configuration js start --}}
<script type="text/javascript">
    toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>
{{-- Toastr configuration js end --}}

{{-- To show toastr message everywhere --}}
{!! Toastr::message() !!}
{{-- To show toastr message everywhere --}}

</body>
</html>