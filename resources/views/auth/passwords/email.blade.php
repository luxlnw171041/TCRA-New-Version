@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="authentication-forgot d-flex align-items-center justify-content-center">

        <div class="card forgot-box" style="width:500px;">
            <div class="card-body">
                <div class="p-4 rounded">
                    <div class="text-center">
                        <img src="{{ url('/img/icon/padlock.png') }}" width="120" alt="">
                    </div>

                    @if (session('status'))
                        <div class="alert bg-success bg-gradient mt-3 text-white" role="alert">
                            <p class="mb-0 text-white">เราได้ส่งลิงก์รีเซ็ตรหัสผ่านของคุณทางอีเมลเรียบร้อยแล้ว!</p>
                        </div>
                    @endif

                    @error('email')
                        <!-- <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> -->
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
                    <br>
                    <span class="text-secondary">หรือติดต่อเจ้าหน้าที่ TCRA</span>
                    <br>
                    <a href="mailto:thaitcra@gmail.com" class="text-info">
                        Email : thaitcra@gmail.com
                    </a>

                </div>
            </div>
        </div>

    </div>
</div>

@endsection
