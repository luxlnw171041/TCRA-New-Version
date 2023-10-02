@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="section-authentication-signin d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="card">
                <div class="row g-0">
                    <div class="col-xl-12">
                        <center>
                            <img src="{{ url('/img/png/error_none_active.png') }}" class="img-fluid" style="width: 30%;">
                        </center>
                    </div>
                    <div class="col-xl-12 text-center">
                        <div class="card-body p-4">
                            <h2 class="text-danger display-4">
                                ขออภัย ไม่สามารถเข้าสู่ระบบได้
                            </h2>
                            <h3 class="font-weight-bold">
                                กรุณาติดต่อเจ้าหน้าที่ TCRA
                            </h3>
                            <h5 class="mt-3">
                                <a href="mailto:thaitcra@gmail.com" class="text-info">
                                    <i class="fa-sharp fa-solid fa-inbox-in" style="color: #ea2e2e;"></i> Email : thaitcra@gmail.com
                                </a>
                            </h5>
                            <h5 class="mt-3">
                                <a href="https://line.me/ti/p/Ih-sEDkHe2" class="text-info" target="bank">
                                    <i class="fa-brands fa-line" style="color: #44ad53;"></i> Line : TCRA
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
</div>

@endsection