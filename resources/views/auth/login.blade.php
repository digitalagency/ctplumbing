
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
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

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="assets/themify/css/themify-icons.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700">
<link href="https://fonts.googleapis.com/css?family=Poppins:300i,400,600" rel="stylesheet">

<title>{{ config('app.SITE_TITLE','Prakash Bhandari') }}</title>
</head>
<body class="login-pg">

<div class="login-wrap">
	<div class="login">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="login-bg  hidden-xs-down">
					<div class="ovrelay overlay"></div>
					<div class="inner-section text-center">
                        @if(!empty(config('app.LOGIN_FORM_LOGO')) && file_exists('/'.config('app.LOGIN_FORM_LOGO')) ){!!"<img src=".url('/'.config('app.LOGIN_FORM_LOGO'))." alt='".config('app.SITE_ADMIN_BAR')."'>"!!}
                        @else{!!"<h1>".config('app.SITE_ADMIN_BAR')."</h1>"!!}
                        @endif



						<div class="social-media">
							<a href="#" class="facebook"><i class="ti-facebook"></i></a>
							<a href="#" class="google"><i class="ti-google"></i></a>
							<a href="#" class="twitter"><i class="ti-twitter"></i></a>
						</div>
				    </div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="login-form">
					<h2 class="title">Login</h2>
					<form method="POST" action="{{ route('login') }}">
							@csrf
						<div class="form-group">
							<input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

							@if ($errors->has('email'))
									<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('email') }}</strong>
									</span>
							@endif
						</div>

						<div class="form-group">
							<input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

							@if ($errors->has('password'))
									<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('password') }}</strong>
									</span>
							@endif
						</div>
						<button type="submit" class="btn btn-lg btn-pri btn-block mar-t-10 mar-b-20">
								{{ __('Login') }}
						</button>
					</form>
					<a class="text-right" href="{{ route('password.request') }}">
							{{ __('Forgot Password?') }}
					</a>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- footer -->
<footer class="footer">
	<div class="footer-bottom">
		<div class="container">
			<div class="copyrite text-center">
                   <p>Cityplumbltd    &copy;
                     <script type="text/javascript">
                    document.write(new Date().getFullYear());
                   </script>
                  </p>
			</div>
		</div>
	</div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
