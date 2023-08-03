@extends('layouts.app')

@section('content')


<div class="wrapper">
    <div class="authentication-header"></div>
    <div class="authentication-forgot d-flex align-items-center justify-content-center">
        <div class="card forgot-box" style="width:500px;">
            <div class="card-body">
                <div class="p-4 rounded">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/reset-password.png') }}" width="120" alt="">
                    </div>
                    <h4 class="mt-5 font-weight-bold">รีเซตรหัสผ่าน</h4>
                    <p class="text-muted">ป้อนรหัสผ่านใหม่ของคุณ</p>
                    <div class="my-4">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus readonly>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <hr class="mt-3 mb-3">

                            <div class="form-group row">
                                <label for="password" class="col-12 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-12 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary float-end" style="width:40%;">
                                        {{ __('Reset Password') }}
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

@endsection
