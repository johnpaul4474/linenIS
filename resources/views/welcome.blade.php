<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

      <title>BGHMC Linen Management System</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../css/login.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  {{-- <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet"> --}}
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script>
function showPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function showConfirmPassword() {
  var x = document.getElementById("confirm_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Password match!';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Password does not match';
  }
}
</script>


</head>

<body class="css-selector">

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <h1 class="text-center login-title">BGHMC | Linen Management System</h1>
                <div class="account-wall">
                    <img class="profile-img" src="../bghmc.png" alt="" height="50" width="50">
                    <center><h5 class="text-muted">Use your HOMIS Account to Login</h5></center>
                    

                    <form class="form-signin" method="POST" action="/login">
                        @csrf
                    <input type="text" class="form-control{{ $errors->has('user_name') ? ' is-invalid' : '' }}" name="user_name" value="{{ old('user_name') }}" placeholder="Username" required autofocus >
                    @if ($errors->has('user_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                    @endif
                    <input type="password" class="form-control{{ $errors->has('user_pass') ? ' is-invalid' : '' }}" name="user_pass" placeholder="Password" required>
                    @if ($errors->has('user_pass'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_pass') }}</strong>
                                    </span>
                    @endif
                    <button class="btn btn-lg btn-primary btn-block" type="submit" >Login</button>
                    <br>
                    <a href="{{ URL::route('register') }}">
                        <button class="btn btn-lg btn-info btn-block" type="button" >
                            Register
                        </button>
                    </a>
                     
                    {{-- <label class="checkbox pull-left">
                        <input type="checkbox" value="remember-me">
                        Remember me
                    </label>
                    <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span> --}}
                    
                    </form>
                    
                    </button> 
                    
                </div>                
                    
                <p class="text-center new-account text-muted">Linen Office | Local 228</p>
                {{-- <a href="#" class="text-center new-account">Create an account </a> --}}
            </div>
            
        </div>
    </div>














    
{{-- 
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center ">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden shadow-lg p-3 mb-5 bg-white rounded my-5">
            <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12 d-none d-lg-block">
                    <img src="{{ asset('MAIN22.jpg') }}" style="width:100%;">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Welcome To <strong>Linen Inventory System</strong></h1>
                    </div>
                    @if ( $errors->has('username'))
                        <small class="text-danger">Login Failed!</small> <br>
                    @endif
                    <form method="POST" action="/login">
                        @csrf

                        <div class="form-group row">
                            <label for="user_name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="user_name" type="user_name" class="form-control{{ $errors->has('user_name') ? ' is-invalid' : '' }}" name="user_name" value="{{ old('user_name') }}" required autofocus>

                                @if ($errors->has('user_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_pass" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="user_pass" type="password" class="form-control{{ $errors->has('user_pass') ? ' is-invalid' : '' }}" name="user_pass" required>

                                @if ($errors->has('user_pass'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_pass') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>

      </div>

    </div>

  </div> --}}

  <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('js/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>
