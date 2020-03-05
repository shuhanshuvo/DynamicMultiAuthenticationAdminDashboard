<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Vali Admin</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Vali</h1>
      </div>
      <div class="login-box" style="min-height: 600px; min-width: 580px;">
        <form class="login-form" method="POST" action="{{ route('custom.reg') }}">
          @csrf

          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>

           <div class="form-group">
            <label class="control-label">NAME</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password" placeholder="Password">
             @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
          </div>

          <div class="form-group">
            <label class="control-label">CONFIRM PASSWORD</label>
            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Password">
             @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
          </div>

          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Register</button>
          </div>
        </form>

 
      </div>
    </section>



    <!-- Essential javascripts for application to work-->
    <script src="{{asset('backend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('backend/js/popper.min.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('backend/js/plugins/pace.min.js')}}"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
      });
    </script>
  </body>
</html>