<!doctype html>
<html lang="en">
    <head>
    	<title>Administrasi Skripsi</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('auth/css/style.css')}}">
    </head>

	<body>
        <section class="ftco-section">
            <div class="container">

                <!--TITLE  -->
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h2 class="heading-section">Selamat datang!</h2>
                        <p>Aplikasi ini dikembangkan untuk memanajemen proses administrasi skripsi mahasiswa/i program studi Teknologi Informasi Universitas Sumatera Utara. </p>
                    </div>
                </div>
                <!-- END TITLE SECTION -->

                <!-- LOGIN  SECTION-->
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="wrap">
                            <div class="img" style="background-image: url(auth/images/graduation.jpg);"></div>
                            <div class="login-wrap p-4 p-md-5">
                            <div class="col-md-12 text-center mb-5">
                                <h2 class="heading-section">Login untuk melanjutkan</h2>
                            </div>

                                <!-- LOGIN FORM -->
                                <form method="POST" action="{{ route('login') }}" class="signin-form">
                                @csrf
                                    <div class="form-group mt-3">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        <label class="form-control-placeholder" for="email">Email Address</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        <label class="form-control-placeholder" for="password">Password</label>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                                    </div>
                                    <div class="form-group d-md-flex">
                                        <div class="w-50 text-left">
                                            <label for="remember" class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="w-50 text-md-right">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                                <!-- END OF FORM LOGIN -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- END LOGIN SECTION -->
            </div>
        </section>

        <!-- ANY NECESSARY SCRIPT -->
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/popper.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>

	</body>
</html>

