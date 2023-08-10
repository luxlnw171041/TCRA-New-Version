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
                    <h4 class="mt-5 font-weight-bold">รีเซ็ตรหัสผ่าน</h4>
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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" oninput="clear_div_show_error();">

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
                                    <input id="password-confirm" type="password" class="form-control password_confirm" name="password_confirmation" required autocomplete="new-password" oninput="clear_div_show_error();">
                                </div>
                            </div>

                            <div id="div_show_error" class="form-group row mt-3 d-none">
                                <span id="text_show_error" class="text-danger"></span>
                            </div>

                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <span class="btn btn-primary float-end" style="width:50%;" onclick="update_pass();">
                                        {{ __('Reset Password') }}
                                    </span>
                                    <button id="btn_submit" type="submit" class="btn btn-primary float-end d-none" style="width:40%;">
                                        {{ __('Reset Password') }}
                                    </button>
                                    <a id="login_fail" class="d-none" href="{{ url('/login_fail') }}"></a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
    function update_pass(){

        let email = document.querySelector('#email').value ;

        let password = document.querySelector('#password').value ;
        let password_confirm = document.querySelector('.password_confirm').value ;

        if( ( password != password_confirm) ){
            // console.log("รหัสผ่านไม่ตรงกัน");
            document.querySelector('#text_show_error').innerHTML = 'รหัสผ่านไม่ตรงกัน';
            document.querySelector('#div_show_error').classList.remove('d-none');
        }else if( ( password == password_confirm) && password.length < 8 ){
            // console.log("รหัสผ่านต้องไม่ต่ำกว่า 8 ตัว");
            document.querySelector('#text_show_error').innerHTML = 'รหัสผ่านต้องไม่ต่ำกว่า 8 ตัว';
            document.querySelector('#div_show_error').classList.remove('d-none');
        }else{
            // console.log("รหัสผ่าน OK");
            document.querySelector('#text_show_error').innerHTML = '';
            document.querySelector('#div_show_error').classList.add('d-none');

            fetch("{{ url('/') }}/api/update_pass?email="+email + "&pass=" + password)
                .then(response => response.text())
                .then(result => {
                    // console.log(result);

                    if(result == "OK"){
                        document.querySelector('#btn_submit').click();
                    }else{
                        document.querySelector('#login_fail').click();
                    }

                });
        }

    }

    function clear_div_show_error(){
        document.querySelector('#text_show_error').innerHTML = '';
        document.querySelector('#div_show_error').classList.add('d-none');
    }

</script>
@endsection
