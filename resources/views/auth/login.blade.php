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

<style>
	*:not(i) {
		font-family: 'Prompt', sans-serif;
	}

	@media (max-width: 767px) {
		/* เพิ่มหรือปรับแต่ง CSS สำหรับมือถือที่มีความกว้างไม่เกิน 767px */
	}

	@media (min-width: 768px) {

		/* เพิ่มหรือปรับแต่ง CSS สำหรับแท็บเล็ตและคอมพิวเตอร์ที่มีความกว้างไม่ต่ำกว่า 768px */
		.headerLogin {
			font-weight: bold;
			margin: 0;
			color: #fff;
		}

		.detailLogin {
			font-size: 14px;
			font-weight: 100;
			line-height: 20px;
			letter-spacing: 0.5px;
			margin: 20px 0 30px;
		}


		.btnSwip {
			border-radius: 20px;
			border: 1px solid #0f72ac;
			background-color: #0f72ac;
			color: #FFFFFF;
			font-size: 12px;
			font-weight: bold;
			padding: 12px 45px;
			letter-spacing: 1px;
			text-transform: uppercase;
			transition: transform 80ms ease-in;
		}

		.btnSwip:active {
			transform: scale(0.95);
		}

		.btnSwip:focus {
			outline: none;
		}

		.btnSwip.ghost {
			background-color: transparent;
			border-color: #FFFFFF;
		}

		.formLogin {
			background-color: #FFFFFF;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			padding: 0 50px;
			height: 100%;
			text-align: center;
		}

		.inputLogin {
			background-color: #eee;
			border: none;
			padding: 12px 15px;
			margin: 8px 0;
			width: 100%;
		}

		.containerLogin {
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
				0 10px 10px rgba(0, 0, 0, 0.22);
			position: relative;
			overflow: hidden;
			width: 850px;
			max-width: 100%;
			min-height: 480px;
		}

		.form-container {
			position: absolute;
			top: 0;
			height: 100%;
			transition: all 0.6s ease-in-out;
		}

		.sign-in-container {
			left: 0;
			width: 50%;
			z-index: 2;
		}

		.containerLogin.right-panel-active .sign-in-container {
			transform: translateX(100%);
		}

		.sign-up-container {
			left: 0;
			width: 50%;
			opacity: 0;
			z-index: 1;
		}

		.containerLogin.right-panel-active .sign-up-container {
			transform: translateX(100%);
			opacity: 1;
			z-index: 5;
			animation: show 0.6s;
		}

		@keyframes show {

			0%,
			49.99% {
				opacity: 0;
				z-index: 1;
			}

			50%,
			100% {
				opacity: 1;
				z-index: 5;
			}
		}

		.overlay-container {
			position: absolute;
			top: 0;
			left: 50%;
			width: 50%;
			height: 100%;
			overflow: hidden;
			transition: transform 0.6s ease-in-out;
			z-index: 100;
		}

		.containerLogin.right-panel-active .overlay-container {
			transform: translateX(-100%);
		}

		.overlay {
			background: #2c5597;
			background: -webkit-linear-gradient(to right, #0f72ac, #2c5597);
			background: linear-gradient(to right, #0f72ac, #2c5597);
			background-repeat: no-repeat;
			background-size: cover;
			background-position: 0 0;
			color: #FFFFFF;
			position: relative;
			left: -100%;
			height: 100%;
			width: 200%;
			transform: translateX(0);
			transition: transform 0.6s ease-in-out;
		}

		.containerLogin.right-panel-active .overlay {
			transform: translateX(50%);
		}

		.overlay-panel {
			position: absolute;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			padding: 0 40px;
			text-align: center;
			top: 0;
			height: 100%;
			width: 50%;
			transform: translateX(0);
			transition: transform 0.6s ease-in-out;
		}

		.overlay-left {
			transform: translateX(-20%);
		}

		.containerLogin.right-panel-active .overlay-left {
			transform: translateX(0);
		}

		.overlay-right {
			right: 0;
			transform: translateX(0);
		}

		.containerLogin.right-panel-active .overlay-right {
			transform: translateX(20%);
		}

		.social-container {
			margin: 20px 0;
		}

		.social-container a {
			border: 1px solid #DDDDDD;
			border-radius: 50%;
			display: inline-flex;
			justify-content: center;
			align-items: center;
			margin: 0 5px;
			height: 40px;
			width: 40px;
		}

		.text-tcra {
			color: #0f72ac !important;
		}

		.iconShowPassword {
			position: absolute;
			right: 0;
			border: 0;
			z-index: 99;
			top: 20%;
		}

	}
</style>

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
		<div class="section-authentication-signin d-flex align-items-center justify-content-center">
			<div class="">
				<div class="containerLogin" id="containerLogin">
					<div class="form-container sign-up-container">
						<form class="formLogin" action="#" method="POST" action="{{ route('login') }}">
							@csrf
							<h1 class="headerLogin text-tcra">เข้าสู่ระบบ</h1>
							<!-- <input class="inputLogin" type="text" placeholder="Name" />
							<input class="inputLogin" type="email" placeholder="Email" />
							<input class="inputLogin" type="password" placeholder="Password" /> -->

							<input type="username" class="form-control inputLogin  @error('username') is-invalid @enderror" id="username" placeholder="Username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
							@error('username')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror

							<div class="input-group" id="show_hide_password">
								<input type="password" class="form-control border-end-0 inputLogin @error('password') is-invalid @enderror" id="password" name="password" value="" placeholder="Password" required autocomplete="current-password">
								<a href="javascript:;" class="input-group-text bg-transparent border-end-0 iconShowPassword"><i class='bx bx-hide'></i></a>
							</div>

							@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror

							<button class="btnSwip" type="submit">Login</button>
						</form>
					</div>
					<div class="form-container sign-in-container">
						<form class="formLogin" action="#" method="POST" action="{{ route('login') }}">
							@csrf
							<h1 class="headerLogin text-tcra">เข้าสู่ระบบ</h1>
							<!-- <input class="inputLogin" type="text" placeholder="Name" />
							<input class="inputLogin" type="email" placeholder="Email" />
							<input class="inputLogin" type="password" placeholder="Password" /> -->

							<input type="text" class="form-control inputLogin  @error('username') is-invalid @enderror" id="password" placeholder="Username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
							@error('username')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror

							<div class="input-group" id="show_hide_password">
								<input type="password" class="form-control border-end-0 inputLogin @error('password') is-invalid @enderror" id="password" name="password" value="" placeholder="Password" required autocomplete="current-password">
								<a href="javascript:;" class="input-group-text bg-transparent border-end-0 iconShowPassword"><i class='bx bx-hide'></i></a>
							</div>

							@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror

							<button class="btnSwip" type="submit">Login</button>
						</form>
					</div>
					<div class="overlay-container">
						<div class="overlay">
							<div class="overlay-panel overlay-left">
								<img src="{{asset('img/icon/iconCustomer.png')}}" class="mb-2" width="90" alt="">
								<h1 class="headerLogin">กลุ่มมิจฉาชีพ</h1>
								<p class="detailLogin">จัดการข้อมูล Black List รายชื่อกลุ่มมิจฉาชีพ <br>(เฉพาะสมาชิกสมาคม)</p>
							</div>
							<div class="overlay-panel overlay-right">
								<img src="{{asset('img/icon/iconDrivers.png')}}" class="mb-2" width="90" alt="">

								<h1 class="headerLogin">พนักงานขับรถ</h1>
								<p class="detailLogin">จัดการข้อมูลพนักงานขับรถที่มีประวัติ <br>(เฉพาะสมาชิกสมาคม)</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<style>
		</style>
		<footer class="bg-white shadow-sm border-top p-2 text-center fixed-bottom">
			<p class="mb-0">
				<img src="{{asset('img/logo/tcra.png')}}" width="20" alt="" />
				TCRA © 2021. All right reserved.
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
	
	<script>
		$(document).ready(function() {
			$("#show_hide_password a").on('click', function(event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="{{asset('theme/js/app.js')}}"></script>
	<script>
		const urlParams = new URLSearchParams(window.location.search);
		const loginParam = urlParams.get('login');
		const containerLogin = document.getElementById('containerLogin');

		if (loginParam === "customer") {
			containerLogin.classList.add("right-panel-active");
		} else if (loginParam === "drivers") {
			containerLogin.classList.remove("right-panel-active");
		}
	</script>
</body>

</html>
@endsection