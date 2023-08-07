@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="section-authentication-signin d-flex align-items-center justify-content-center">
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
                            <p class="mt-4">
                                กรุณาติดต่อเจ้าหน้าที่ TCRA
                                <br>
                                <a href="mailto:thaitcra@gmail.com" class="text-info">
                                    ▪ thaitcra@gmail.com
                                </a>
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
    </div>
</div>

@endsection