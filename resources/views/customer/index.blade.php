@extends('layouts.theme')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
<style>
    .inputGroup {
        font-family: 'Segoe UI', sans-serif;
        max-width: 100%;
        display: flex;
        align-items: center
    }

    .inputGroup input {
        font-size: 100%;
        padding: 0.8em;
        outline: none;
        border: 2px solid rgb(200, 200, 200);
        background-color: transparent;
        border-radius: 10px;
        width: 100%;
    }

    .inputGroup label {
        font-size: 100%;
        position: absolute;
        left: 0;
        padding: 0.8em 0.8em 0.8em 0.5em;
        margin-left: 0.5em;
        pointer-events: none;
        transition: all 0.3s ease;
        color: rgb(230, 46, 46);
    }

    .inputGroup label i {
        margin: 6px 8px
    }

    .inputGroup :is(input:focus, input:valid)~label {
        transform: translateY(-80%) scale(.9);
        margin: 0em;
        margin-left: 1.3em;
        padding: 0.1em;
        background-color: #fff;
    }

    .inputGroup :is(input:focus, input:valid) {
        border-color: rgb(230, 46, 46);
    }

    .group {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        align-items: center
    }

    .input-group-top {
        margin-top: 29px;
    }

    .textOR {
        width: 70px;
        text-align: center;
        border-bottom: 1px solid #000;
        line-height: 0.1em;
        margin: 0 20px;
    }

    .textOR span {
        background: #fff;
        padding: 0 10px;
    }

    .searchBar {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
    }

    .mr-2 {
        margin-right: 20px;
    }

    @media (max-width: 320px) {

        /* สำหรับอุปกรณ์เคลื่อนที่ที่มีความกว้างไม่เกิน 320px */
        .breadcrumb-title {
            width: 100%;
            border-right: none;
            margin: 10px 0 !important;
            padding: 0 !important;
            text-align: center;
        }

        .inputGroup {
            margin: 10px 0 !important;
        }

        .btnGroupSearch {
            float: left;
        }

        .btn-group {
            width: 100%;
            display: flex;
            justify-content: end;
        }
    }


    @media (min-width: 321px) and (max-width: 480px) {

        /* สำหรับอุปกรณ์เคลื่อนที่ที่มีความกว้างระหว่าง 321px ถึง 480px */
        .breadcrumb-title {
            width: 100%;
            border-right: none;
            margin: 10px 0 !important;
            padding: 0 !important;
            text-align: center;
        }

        .inputGroup {
            margin: 10px 0 !important;
        }

        .btnGroupSearch {
            float: left;
        }

        .btn-group {
            width: 100%;
            display: flex;
            justify-content: end;
        }
    }

    @media (min-width: 481px) and (max-width: 768px) {

        /* สำหรับแท็บเล็ตและอุปกรณ์เคลื่อนที่ที่มีความกว้างระหว่าง 481px ถึง 768px */
        .breadcrumb-title {
            border-right: none;
            margin: 10px 0 !important;
            padding: 0 !important;
        }

        .inputGroup {
            margin: 10px 0 !important;
        }

        .btnGroupSearch {
            float: left;
        }

        .searchBar .divInputSearch:nth-child(2) {
            flex: 0 0 auto !important;
            width: 100% !important;
            padding: 0 5px;
        }

        .searchBar div:nth-child(3) {
            flex: 0 0 auto !important;
            width: 100% !important;
            display: flex;
            justify-content: center;
        }

        .searchBar .divInputSearch:nth-child(4) {
            flex: 0 0 auto;
            width: 49%;
            margin: 0 !important;
            padding-right: 5px;
        }

        .searchBar .divInputSearch:nth-child(5) {
            flex: 0 0 auto;
            width: 49%;
            margin: 0 !important;
            padding-left: 5px;
        }

        .btn-group {
            width: 100%;
            display: flex;
            justify-content: end;
        }
    }

    @media (min-width: 769px) and (max-width: 990px) {

        /* สำหรับหน้าจอเดสก์ท็อปที่มีความกว้างระหว่าง 769px ถึง 1024px */
        .breadcrumb-title {
            border-right: none;
            margin: 10px 0 !important;
            padding: 0 !important;
        }

        .inputGroup {
            margin: 10px 0 !important;
        }

        .btnGroupSearch {
            float: left;
        }

        .searchBar .divInputSearch:nth-child(2) {
            flex: 0 0 auto !important;
            width: 100% !important;
            padding: 0 5px;
        }

        .searchBar div:nth-child(3) {
            flex: 0 0 auto !important;
            width: 100% !important;
            display: flex;
            justify-content: center;
        }

        .searchBar .divInputSearch:nth-child(4) {
            flex: 0 0 auto;
            width: 49%;
            margin: 0 !important;
            padding-right: 5px;
        }

        .searchBar .divInputSearch:nth-child(5) {
            flex: 0 0 auto;
            width: 49%;
            margin: 0 !important;
            padding-left: 5px;
        }

        .btn-group {
            width: 100%;
            display: flex;
            justify-content: end;
        }
    }

    @media (min-width: 991px) and (max-width: 1440px) {

        /* สำหรับหน้าจอเดสก์ท็อปที่มีความกว้างมากกว่าหรือเท่ากับ 1025px */
        .breadcrumb-title {
            width: 100%;
            border-right: none;
            margin: 10px 0 !important;
            padding: 0 !important;
            text-align: center;
        }

        .inputGroup {
            margin: 10px 0 !important;
        }


        .searchBar .divInputSearch:nth-child(2) {
            flex: 0 0 auto !important;
            width: 100% !important;
            padding: 0 5px;
        }

        .searchBar div:nth-child(3) {
            flex: 0 0 auto !important;
            width: 100% !important;
            display: flex;
            justify-content: center;
        }

        .searchBar .divInputSearch:nth-child(4) {
            flex: 0 0 auto;
            width: 49%;
            margin: 0 !important;
            padding-right: 5px;
        }

        .searchBar .divInputSearch:nth-child(5) {
            flex: 0 0 auto;
            width: 49%;
            margin: 0 !important;
            padding-left: 5px;
        }

        .btnGroupSearch {
            float: left;
        }

        .btn-group {
            width: 100%;
            display: flex;
            justify-content: end;
        }
    }

    @media (min-width: 1441px) {
        /* สำหรับหน้าจอเดสก์ท็อปที่มีความกว้างมากกว่าหรือเท่ากับ 1025px */

    }

    .social-logo {
        display: inline-block;
        width: 24px;
        height: 24px;
        transition: background-image .2s;
    }

    .show-img-box {
        position: relative;
        width: 100%;
        height: 200px;
        border: 2px dashed #ccc;
        border-radius: 10px;
        /* text-align: center; */
        cursor: pointer;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center !important;
    }

    .show-img-box h1 {
        text-align: center;
    }

    .show-img-box a img {
        object-fit: contain;
    }

    .show-img-box:hover {
        background-color: #f5f5f5;
    }

    .file-preview {
        max-width: 100%;
        max-height: 100%;
        display: none;
        cursor: pointer;
        object-fit: contain;
    }

    .owl-prev {
        position: absolute;
        left: 0;
        top: 40%;
        width: 30px;
        height: 30px;
        background-color: rgb(230, 46, 46) !important;
        color: #fff !important;
        border-radius: 50% !important;
    }

    .owl-next {
        position: absolute;
        right: 0;
        top: 40%;
        width: 30px;
        height: 30px;
        background-color: rgb(230, 46, 46) !important;
        color: #fff !important;
        border-radius: 50% !important;
    }

    .owl-prev *,
    .owl-next * {
        font-size: 20px;
    }

    .infoImg {
        display: block;
        justify-content: start;
        padding: 5px;
        position: absolute;
        color: #e62e2e;
        transition: all .15s ease-in-out;
        transform: translateY(200px);
        background-color: #fff;
        width: 95%;
        border-radius: 10px;
    }

    .show-img-box:hover .infoImg {
        color: #e62e2e;
        transform: translateY(75px);
    }

    .checkbox-wrapper-35 {
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .checkbox-wrapper-35 .switch {
        display: none;
    }

    .checkbox-wrapper-35 .switch+label {
        width: 100%;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        color: #78768d;
        cursor: pointer;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-size: 12px;
        line-height: 15px;
        position: relative;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        
    }

    .checkbox-wrapper-35 .switch+label::before,
    .checkbox-wrapper-35 .switch+label::after {
        content: '';
        display: block;
    }

    .checkbox-wrapper-35 .switch+label::before {
        background-color: #05012c;
        border-radius: 500px;
        height: 15px;
        margin-right: 8px;
        -webkit-transition: background-color 0.125s ease-out;
        transition: background-color 0.125s ease-out;
        width: 25px;
    }

    .checkbox-wrapper-35 .switch+label::after {
        background-color: #fff;
        border-radius: 13px;
        box-shadow: 0 3px 1px 0 rgba(37, 34, 71, 0.05), 0 2px 2px 0 rgba(37, 34, 71, 0.1), 0 3px 3px 0 rgba(37, 34, 71, 0.05);
        height: 13px;
        left: 1px;
        position: absolute;
        top: 1px;
        -webkit-transition: -webkit-transform 0.125s ease-out;
        transition: -webkit-transform 0.125s ease-out;
        transition: transform 0.125s ease-out;
        transition: transform 0.125s ease-out, -webkit-transform 0.125s ease-out;
        width: 13px;
    }


    .checkbox-wrapper-35 .switch+label .switch-x-toggletext {
        display: block;
        font-weight: bold;
        height: 15px;
        overflow: hidden;
        position: relative;
        width: 100%;
    }

    .checkbox-wrapper-35 .switch+label .switch-x-unchecked,
    .checkbox-wrapper-35 .switch+label .switch-x-checked {
        left: 0;
        position: absolute;
        top: 0;
        -webkit-transition: opacity 0.125s ease-out, -webkit-transform 0.125s ease-out;
        transition: opacity 0.125s ease-out, -webkit-transform 0.125s ease-out;
        transition: transform 0.125s ease-out, opacity 0.125s ease-out;
        transition: transform 0.125s ease-out, opacity 0.125s ease-out, -webkit-transform 0.125s ease-out;
    }

    .checkbox-wrapper-35 .switch+label .switch-x-unchecked {
        opacity: 1;
        -webkit-transform: none;
        transform: none;
    }

    .checkbox-wrapper-35 .switch+label .switch-x-checked {
        opacity: 0;
        -webkit-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100%, 0);
    }

    .checkbox-wrapper-35 .switch+label .switch-x-hiddenlabel {
        position: absolute;
        visibility: hidden;
    }

    .checkbox-wrapper-35 .switch:checked+label::before {
        background-color: #ffb500;
    }

    .checkbox-wrapper-35 .switch:checked+label::after {
        -webkit-transform: translate3d(10px, 0, 0);
        transform: translate3d(10px, 0, 0);
    }

    .checkbox-wrapper-35 .switch:checked+label .switch-x-unchecked {
        opacity: 0;
        -webkit-transform: translate3d(0, -100%, 0);
        transform: translate3d(0, -100%, 0);
    }

    .checkbox-wrapper-35 .switch:checked+label .switch-x-checked {
        opacity: 1;
        -webkit-transform: none;
        transform: none;
    }
</style>
<div class="container">
    <div class="col-12 d-">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ url('/customer') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                    <div class="align-items-center searchBar">
                        <div class="breadcrumb-title pe-3" style="margin-right:50px ;">
                            <div class="w-100 d-flex justify-content-center">
                                <div>
                                     ค้นหาข้อมูลมิฉาชีพ <br>
                                <div class="checkbox-wrapper-35">
                                    <input value="private" name="switchforSearch" id="switchforSearch" type="checkbox" class="switch" value="asdas">
                                    <label for="switchforSearch">
                                        <span class="switch-x-toggletext">
                                            <span class="switch-x-unchecked"><span class="switch-x-hiddenlabel"></span>บุคคล</span>
                                            <span class="switch-x-checked"><span class="switch-x-hiddenlabel"></span>บริษัท</span>
                                        </span>
                                    </label>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-3 col-xl-2 mx-2 divInputSearch">
                            <div class="input-group">
                                <div class="inputGroup w-100">
                                    <input name="c_idno" id="c_idno" type="number" value="{{ request('c_idno') }}" autocomplete="off" oninput="clearInputName()">
                                    <label for="c_id_no"><i class="fa-solid fa-id-card"></i> รหัสบัตรประชาชน</label>
                                </div>
                            </div>
                        </div>
                        <div class="m-3">
                            <p class="textOR"><span>หรือ</span></p>
                        </div>
                        <div class="col-sm-12 col-lg-3 col-xl-2 mx-2  divInputSearch">
                            <div class="input-group">
                                <div class="inputGroup w-100">
                                    <input name="c_name" id="c_name" type="text" value="{{ request('c_name') }}" autocomplete="off" oninput="clearInputID()">
                                    <label for="c_name"><i class="fa-solid fa-user"></i> ชื่อ </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-3 col-xl-2 mx-2  divInputSearch">
                            <div class="input-group">
                                <div class="inputGroup w-100">
                                    <input name="c_surname" id="c_surname" type="text" value="{{ request('c_surname') }}" autocomplete="off" oninput="clearInputID()">
                                    <label for="c_surname"><i class="fa-solid fa-user"></i> นามสกุล </label>
                                </div>
                            </div>
                        </div>
                        <!-- <form method="GET" action="{{ url('/customer') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form> -->
                        <div class="btn-group btnGroupSearch h-100" role="group" aria-label="Button group with nested dropdown">
                            <div>
                                <button type="submit" class="btn btn-primary  h-100 m-0"><i class="fa-solid fa-magnifying-glass"></i> ค้นหา</button>
                                <!-- <button type="submit" class="btn btn-danger  h-100 m-0" onclick="clearInput()"><i class="fa-solid fa-trash"></i> ล้าง</button> -->
                                <a href="{{ url('/customer') }}" type="submit" class="btn btn-danger  h-100 m-0"><i class="fa-solid fa-trash"></i> ล้าง</a>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
@if(!empty($customers))
<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="mt-3">
                                <h4>{{ $customers->c_name }} {{ $customers->c_surname }}</h4>
                                <p class="text-secondary mb-1">{{ substr_replace(substr_replace(substr_replace(substr_replace($customers->c_idno, '-', 1, 0), '-', 6, 0), '-', 12, 0), '-', 15, 0) }}</p>
                                <p class="text-muted font-size-sm">{{ thaidate("lที่ j F Y" , strtotime($customers->c_date)) }} <br> เวลา {{ thaidate("H:i" , strtotime($customers->c_date)) }} น.</p>
                                <!-- <button class="btn btn-primary">Follow</button>
                                        <button class="btn btn-outline-primary">Message</button> -->
                            </div>
                        </div>
                        <!-- <hr class="my-4">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                            </svg>Website</h6>
                                        <span class="text-secondary">https://codervent.com</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github me-2 icon-inline">
                                                <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                            </svg>Github</h6>
                                        <span class="text-secondary">codervent</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info">
                                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                            </svg>Twitter</h6>
                                        <span class="text-secondary">@codervent</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger">
                                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                            </svg>Instagram</h6>
                                        <span class="text-secondary">codervent</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary">
                                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                            </svg>Facebook</h6>
                                        <span class="text-secondary">codervent</span>
                                    </li>
                                </ul> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">ลักษณะการกระทำความผิด</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $customers->demerit }}
                            </div>
                            <div class="col-sm-3 mt-4">
                                <h6 class="mb-0">รายละเอียด</h6>
                            </div>
                            <div class="col-sm-9 text-secondary mt-4">
                                {{ $customers->demeritdetail }}
                            </div>
                        </div>

                    </div>
                </div>
                @if(!empty($customers->c_pic_id_card) || !empty($customers->c_pic_lease) || !empty($customers->c_pic_execution) || !empty($customers->c_pic_cap) || !empty($customers->c_pic_other))
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="d-flex align-items-center mb-3">หลักฐานกระทำความผิด</h5>
                                <div class="owl-carousel owl-theme carouselSPhoto">
                                    @if(!empty($customers->c_pic_id_card))
                                    <div class="item">
                                        <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $customers->c_pic_id_card }}" alt="ภาพบัตรประชาชน">
                                            <img class="file-preview" src="{{ url('storage')}}/{{ $customers->c_pic_id_card }}" alt="ภาพบัตรประชาชน">
                                            <div class="infoImg">
                                                <span class="m-0">ภาพบัตรประชาชน</span>
                                            </div>
                                        </a>
                                    </div>
                                    @endif
                                    @if(!empty($customers->c_pic_lease))
                                    <div class="item">
                                        <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $customers->c_pic_lease }}" alt="ภาพใบบังคับคดี">
                                            <img class="file-preview" src="{{ url('storage')}}/{{ $customers->c_pic_lease }}" alt="ใบบังคับคดี">
                                            <div class="infoImg">
                                                <span class="m-0">ใบบังคับคดี</span>
                                            </div>
                                        </a>
                                    </div>
                                    @endif
                                    @if(!empty($customers->c_pic_execution))
                                    <div class="item">
                                        <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $customers->c_pic_execution }}" alt="ภาพสัญญาเช่า">
                                            <img class="file-preview" src="{{ url('storage')}}/{{ $customers->c_pic_execution }}" alt="สัญญาเช่า">
                                            <div class="infoImg">
                                                <span class="m-0">สัญญาเช่า</span>
                                            </div>
                                        </a>
                                    </div>
                                    @endif
                                    @if(!empty($customers->c_pic_cap))
                                    <div class="item">
                                        <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $customers->c_pic_cap }}" alt="ภาพหลักฐานการพูด-คุย">
                                            <img class="file-preview" src="{{ url('storage')}}/{{ $customers->c_pic_cap }}" alt="ภาพหลักฐานการพูด-คุย">
                                            <div class="infoImg">
                                                <span class="m-0">หลักฐานการพูด-คุย</span>
                                            </div>
                                        </a>
                                    </div>
                                    @endif
                                    @if(!empty($customers->c_pic_other))
                                    <div class="item">
                                        <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $customers->c_pic_other }}" alt="ภาพอื่นๆ">
                                            <img class="file-preview" src="{{ url('storage')}}/{{ $customers->c_pic_other }}" alt="ภาพอื่นๆ">
                                            <div class="infoImg">
                                                <span class="m-0">อื่นๆ</span>
                                            </div>
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@else
    @php
        $text_show = '';
        $class_show = 'd-none';

        $full_url = url()->full();
        $query_params = request()->query();

        if (!empty($query_params['c_idno'])) {
            $c_idno = urldecode($query_params['c_idno']);
            $text_show = $c_idno;
            $class_show = '';
        } elseif (!empty($query_params['c_name']) || !empty($query_params['c_surname'])) {
            $c_name = urldecode($query_params['c_name']);
            $c_surname = urldecode($query_params['c_surname']);
            $text_show = $c_name . ' ' . $c_surname;
            $class_show = '';
        }
    @endphp
        <div class="text-center {{ $class_show }}" style="margin-top: 8vh;">
            <img src="{{asset('img/icon/no-results.png')}}" alt="User" class="" width="310">
            <h2 class=" mt-5">ไม่พบข้อมูลที่คุณค้นหา <span class="text-danger">"{{ $text_show }}"</span> </h2>
            <h5 class="mt-3">กรุณาปรับการค้นหาและตรวจสอบอีกครั้ง</h5>
        </div>
@endif
<script>
    function clearInputID() {
        document.getElementById("c_idno").value = "";
    }

    function clearInputName() {
        document.getElementById("c_name").value = "";
        document.getElementById("c_surname").value = "";
    }

    function clearInput() {
        console.log("asd");
        document.getElementById("c_idno").value = "";
        document.getElementById("c_name").value = "";
        document.getElementById("c_surname").value = "";
    }


    $(function() {
        // Owl Carousel
        var owl = $(".carouselSPhoto");
        owl.owlCarousel({
            margin: 10,
            loop: false,
            nav: true,
            // autoWidth: true,
            // items: 4,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                900: {
                    items: 2
                },
                1000: {
                    items: 3
                },
                2000: {
                    items: 4
                }
            }
        });
    });
</script>

<script>
    /* glightbox
     */
    var glightbox = GLightbox({
        loop: true,
        selector: ".glightbox",
        openEffect: "zoom",
        closeEffect: "fade",
        startAt: 0,
        closeOnOutsideClick: false,
        zoomable: true,
        height: "auto",
        width: "100vw",
        height: "100vh"
    });

    feather.replace();
</script>
@endsection