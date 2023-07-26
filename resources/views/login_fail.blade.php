@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username Or Email</label>
                        
                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required  autofocus>
                        
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{asset('img/logo/tcra.png')}}" type="image/png" />
    <!--plugins-->
    <link href="{{asset('theme/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{asset('theme/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{asset('theme/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{asset('theme/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset('theme/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('theme/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset('theme/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('theme/css/icons.css')}}" rel="stylesheet">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    <title>TCRA Login</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <div class="authentication-header"></div>
        <header class="login-header shadow">
            <nav class="navbar navbar-expand-lg navbar-light bg-white rounded fixed-top rounded-0 shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{asset('')}}">
                        <img src="{{asset('img/logo/tcra.png')}}" width="50" alt="" />
                        สมาคมรถเช่าไทย
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"> <a class="nav-link active" aria-current="page" href="https://www.tcra.or.th/"><i class='bx bx-home-alt me-1'></i>Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container">
            <div class="card">
                <div class="row g-0">
                    <div class="col-xl-7">
                        <div class="card-body p-4">
                            <h1 class="text-danger display-4">
                                ข้อผิดพลาด
                            </h1>
                            <h2 class="font-weight-bold">
                                ขออภัย บัญชีของคุณถูกระงับการใช้งานชั่วคราว
                            </h2>
                            <p>
                                กรุณาติดต่อแอดมิน สมาคมรถเช่าไทย
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <center>
                            <img src="{{ url('/img/png/error_none_active.png') }}" class="img-fluid" style="width: 65%;">
                        </center>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
        <style>
        </style>
        <footer class="bg-white shadow-sm border-top p-2 text-center fixed-bottom">
            <p class="mb-0">
                <img src="{{asset('img/logo/tcra.png')}}" width="20" alt="" />
                TCRA © Power by 2B-Green
            </p>
        </footer>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="{{asset('theme/js/bootstrap.bundle.min.js')}}"></script>
    <!--plugins-->
    <script src="{{asset('theme/js/jquery.min.js')}}"></script>
    <script src="{{asset('theme/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset('theme/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('theme/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <!--Password show & hide js -->
    
    <!--app JS-->
    <script src="{{asset('theme/js/app.js')}}"></script>
</body>

</html>
@endsection