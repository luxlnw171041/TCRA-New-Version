@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="authentication-forgot d-flex align-items-center justify-content-center">

        <div class="card forgot-box" style="width:500px;">
            <div class="card-body">
                <!-- INPUT RESET PASSWORD -->
                <!-- <div class="p-4 rounded d-none">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/padlock.png') }}" width="120" alt="">
                    </div>

                    @if (session('status'))
                        <div class="alert bg-success bg-gradient mt-3 text-white" role="alert">
                            <p class="mb-0 text-white">เราได้ส่งลิงก์รีเซ็ตรหัสผ่านของคุณทางอีเมลเรียบร้อยแล้ว!</p>
                        </div>
                    @endif

                    @error('email')
                        <div class="alert bg-danger bg-gradient mt-3" role="alert">
                            <p class="mb-0 text-white">ไม่พบอีเมลนี้ในระบบ กรุณาตรวจสอบใหม่อีกครั้ง!</p>
                        </div>
                    @enderror

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <h4 class="mt-5 font-weight-bold">ลืมรหัสผ่าน ?</h4>
                        <p class="text-muted">ป้อนอีเมลที่ลงทะเบียนของคุณเพื่อรีเซ็ตรหัสผ่าน</p>
                        <div class="my-4">
                            <label class="form-label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="example@user.com">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                {{ __('ส่งลิงก์รีเซ็ตรหัสผ่าน') }}
                            </button>
                            @php
                                $full_url = url()->full() ; 
                                $back_to = explode("?back=",$full_url)[1];
                            @endphp
                            
                            <a href="{{ urldecode($back_to) }}" class="btn btn-white btn-lg">
                                <i class="bx bx-arrow-back me-1"></i> กลับ
                            </a>
                        </div>
                    </form>
                    
                </div> -->
                <div class="p-4 rounded text-center">
                    <img src="{{ url('/img/icon/padlock.png') }}" width="120" alt="">
                    <br>
                    <h2 class="text-secondary m-4">ติดต่อเจ้าหน้าที่ TCRA</h2>
                    <h5>
                        <a href="mailto:thaitcra@gmail.com" class="text-info">
                            <i class="fa-sharp fa-solid fa-inbox-in" style="color: #ea2e2e;"></i> Email :  thaitcra@gmail.com
                        </a>
                    </h5>
                    <h5>
                        <a href="https://line.me/ti/p/Ih-sEDkHe2" class="text-info" target="bank">
                            <i class="fa-brands fa-line" style="color: #44ad53;"></i> Line : TCRA
                        </a>
                    </h5>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
