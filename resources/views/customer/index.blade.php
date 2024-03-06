@extends('layouts.theme')

@section('content')
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
        white-space: nowrap;
        max-width: 90%;
        overflow: hidden;
        text-overflow: ellipsis;
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
        max-width: 90%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
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

    @media (min-width: 1441px) and (max-width: 1593px) {

        /* สำหรับหน้าจอเดสก์ท็อปที่มีความกว้างมากกว่าหรือเท่ากับ 1025px */
        .btn-group {
            margin-top: 15px;
            width: 100%;
            display: flex;
            justify-content: end;
        }
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
        height: 18px;
        margin-right: 8px;
        -webkit-transition: background-color 0.125s ease-out;
        transition: background-color 0.125s ease-out;
        width: 50px;
    }

    .checkbox-wrapper-35 .switch+label::after {
        background-color: #fff;
        border-radius: 13px;
        box-shadow: 0 3px 1px 0 rgba(37, 34, 71, 0.05), 0 2px 2px 0 rgba(37, 34, 71, 0.1), 0 3px 3px 0 rgba(37, 34, 71, 0.05);
        height: 18px;
        left: 0px;
        position: absolute;
        top: 0px;
        -webkit-transition: -webkit-transform 0.125s ease-out;
        transition: -webkit-transform 0.125s ease-out;
        transition: transform 0.125s ease-out;
        transition: transform 0.125s ease-out, -webkit-transform 0.125s ease-out;
        width: 18px;
    }


    .checkbox-wrapper-35 .switch+label .switch-x-toggletext {
        display: block;
        font-weight: bold;
        height: 18px;
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
        background-color: #e62e2e;
    }

    .checkbox-wrapper-35 .switch:checked+label::after {
        -webkit-transform: translate3d(18px, 0, 0);
        transform: translate3d(18px, 0, 0);
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
    }.gslide-media.gslide-image img{
		min-height: 100vh;
		width: auto;
		object-fit: contain;
	}ul.img-glightbox {
	display: flex;
	flex-wrap: wrap;
}
.goverlay {
	background-color: rgba(0,0,0,0.3);
}
.glightbox {
	padding-left: 0;
	margin-top:0;
	margin-bottom: 0;
	padding: 0 5px;
	flex-basis: calc(100% / 5 - 10px);
}
.gcounter {
	padding: .5rem;
}
.gcounter::after {
	content: attr(data-indicator);
	position: absolute;
	top: .5rem;
	left: .5rem;
	color: white;
	padding: 10px;
	z-index: 10000000;
	background-color: rgba(0,0,0,0.3);
	border-radius: 50px;
}
.glightbox-closing .gcounter {
	opacity:0;
}
</style>

<div class="container">
    <div class="col-12 d-">

        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ url('/customer') }}" accept-charset="UTF-8" class="form-inline" role="search">
                    <div class="row">
                        <div class="col-12 col-md-3" style="display: flex;align-items: center;">
                            <div class="w-100 d-flex justify-content-center">
                                <div>
                                    <span style="font-size: 18px;" class="m-0 p-0">ข้อมูลมิจฉาชีพ(เช่ารถ)</span> <br>
                                    <div class="">
                                        <input class="form-check-input" type="radio" name="switchforSearch" value="person" id="switchforSearch1" checked="" onclick="toggleDivsswitchforSearch('person')">
                                        <label class="form-check-label" for="switchforSearch1">บุคคล</label>

                                        <input class="form-check-input" type="radio" name="switchforSearch" value="company" id="switchforSearch2" onclick="toggleDivsswitchforSearch('company')">
                                        <label class="form-check-label" for="switchforSearch2">บริษัท</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="div_person" class="col-12 col-md-9">
                            <div class="row">
                                <!-- เลือกสัญชาติ -->
                                <div class="col-12 my-2">
                                    <button id="btn_input_data_thai" type="button" class="btn btn-sm btn-info" style="width:120px;" onclick="change_input_data('thai');">
                                        <img src="{{asset('img/icon/thailand.png')}}" style="width:20px;"> ไทย
                                    </button>
                                    <button id="btn_input_data_other" type="button" class="btn btn-sm btn-secondary" style="width:120px;" onclick="change_input_data('other');">
                                        <img src="{{asset('img/icon/flags.png')}}" style="width:20px;"> ต่างชาติ
                                    </button>
                                    <br><br>
                                </div>
                                <!-- ไทย -->
                                <div class="row col-12 col-md-12">
                                    <div input_for="input_data_thailand" class="col-12 col-md-4">
                                        <div class="input-group">
                                            <span id="warning_c_idno" class="text-danger d-none" style="position:absolute;bottom:-25px;font-size: 13px;">
                                                <i class="fa-solid fa-triangle-exclamation fa-beat"></i>
                                                หมายเลขบัตรประชาชนไม่ถูกต้อง
                                            </span>
                                            <span id="success_c_idno" class="text-success d-none" style="position:absolute;bottom:-25px;font-size: 12px;">
                                                <i class="fa-solid fa-shield-check"></i>
                                                หมายเลขบัตรประชาชนครบถ้วนแล้ว
                                            </span>
                                            <div class="inputGroup w-100">
                                                <input name="c_idno" id="c_idno" type="text" value="{{ request('c_idno') }}" autocomplete="off" oninput="clearInputName()">
                                                <label for="c_id_no"><i class="fa-solid fa-id-card"></i>หมายเลขบัตรประชาชน</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div input_for="input_data_thailand" class="col-12 col-md-2" style="display: flex;align-items: center;">
                                        <p class="textOR"><span>หรือ</span></p>
                                    </div>
                                    <div input_for="input_data_thailand" class="col-12 col-md-3">
                                        <div class="input-group">
                                            <div class="inputGroup w-100">
                                                <input name="c_name" id="c_name" type="text" value="{{ request('c_name') }}" autocomplete="off" oninput="clearInputID()">
                                                <label for="c_name"><i class="fa-solid fa-user"></i> ชื่อ </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div input_for="input_data_thailand" class="col-12 col-md-3">
                                        <div class="input-group">
                                            <div class="inputGroup w-100">
                                                <input name="c_surname" id="c_surname" type="text" value="{{ request('c_surname') }}" autocomplete="off" oninput="clearInputID()">
                                                <label for="c_surname"><i class="fa-solid fa-user"></i> นามสกุล </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ต่างชาติ -->
                                <div class="row col-12 col-md-12">
                                    <div input_for="input_data_other_nationalitie" class="col-12 col-md-5 d-none">
                                        <div class="input-group">
                                            <div class="inputGroup w-100">
                                                <input name="c_idno_other_nationalitie" id="c_idno_other_nationalitie" type="text" value="{{ request('c_idno_other_nationalitie') }}" autocomplete="off" oninput="clearInputName_nationalitie()">
                                                <label for="c_idno_other_nationalitie"><i class="fa-solid fa-id-card"></i>หมายเลขพาสปอร์ต (Passport)</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div input_for="input_data_other_nationalitie" class="col-12 col-md-2 d-none"  style="display: flex;align-items: center;">
                                        <p class="textOR"><span>หรือ</span></p>
                                    </div>
                                    <div input_for="input_data_other_nationalitie" class="col-12 col-md-5 d-none">
                                        <div class="input-group">
                                            <div class="inputGroup w-100">
                                                <input name="c_name_other_nationalitie" id="c_name_other_nationalitie" type="text" value="{{ request('c_name_other_nationalitie') }}" autocomplete="off" oninput="clearInputID_nationalitie()">
                                                <label for="c_name_other_nationalitie"><i class="fa-solid fa-user"></i> ชื่อ </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="div_company" class="col-12 col-md-9 d-none">
                            <br>
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <div class="input-group">
                                        <div class="inputGroup w-100">
                                            <span id="warning_commercial_registration" class="text-danger d-none" style="position:absolute;bottom:-25px;font-size: 13px;">
                                                <i class="fa-solid fa-triangle-exclamation fa-beat"></i>
                                                เลขประจำตัวผู้เสียภาษีไม่ถูกต้อง
                                            </span>
                                            <span id="success_commercial_registration" class="text-success d-none" style="position:absolute;bottom:-25px;font-size: 12px;">
                                                <i class="fa-solid fa-shield-check"></i>
                                                เลขประจำตัวผู้เสียภาษีครบถ้วนแล้ว
                                            </span>
                                            <input name="commercial_registration" id="commercial_registration" type="text" value="{{ request('commercial_registration') }}" autocomplete="off" oninput="clearInputCompanyName()">
                                            <label for="commercial_registration"><i class="fa-solid fa-id-card"></i> เลขประจำตัวผู้เสียภาษี</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2" style="display: flex;align-items: center;">
                                    <p class="textOR"><span>หรือ</span></p>
                                </div>
                                <div class="col-12 col-md-5">
                                    <div class="input-group">
                                        <div class="inputGroup w-100">
                                            <input name="c_company_name" id="c_company_name" type="text" value="{{ request('c_company_name') }}" autocomplete="off" oninput="clearInputCommercialRegistration()">
                                            <label for="c_company_name"><i class="fa-solid fa-user"></i> ชื่อบริษัท </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="btn-group btnGroupSearch float-end" role="group" aria-label="Button group with nested dropdown">
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
</div>
@if(!empty($customers))
<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="mt-3">
                                <h4>
                                    @if(!empty($customers->c_name) && !empty($customers->c_surname))
                                    {{ $customers->c_name }} {{ $customers->c_surname }}
                                    @elseif(!empty($customers->c_company_name) )
                                    {{$customers->c_company_name}}
                                    @elseif(!empty($customers->c_name_other_nationalitie) )
                                    {{$customers->c_name_other_nationalitie}}
                                    <br>
                                    <span class="text-info" style="font-size:14px;">(ต่างชาติ)</span>
                                    @endif
                                </h4>

                                @if(!empty($customers->commercial_registration))
                                <h4>
                                    {{$customers->commercial_registration}}
                                </h4>
                                @endif
                                @if(!empty($customers->c_idno_other_nationalitie))
                                <p class="text-secondary mb-1">
                                    {{$customers->c_idno_other_nationalitie}}
                                </p>
                                @endif
                                @if(!empty($customers->c_idno))
                                    <p class="text-secondary mb-1">{{ substr_replace(substr_replace(substr_replace(substr_replace($customers->c_idno, '-', 1, 0), '-', 6, 0), '-', 12, 0), '-', 15, 0) }}</p>
                                @endif
                                
                                <p class="text-muted font-size-sm">{{ thaidate("lที่ j F Y" , strtotime($customers->c_date)) }} </p>
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
                @if(Auth::user()->member_role == "admin")
                <div class="card" style="border: 1px solid red;border-radius: 10px;">
                    <div class="card-body">
                        <div class="card radius-10 bg-danger bg-gradient">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">* เห็นเฉพาะแอดมิน TCRA</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="m-2 d-flex justify-content-between align-items-center flex-wrap">
                                <span class="text-secondary mt-2">
                                    <b class="text-dark" style="font-size:22px;">ผู้ลงข้อมูล</b>
                                </span>
                            </li>
                            <hr>
                            <li class="m-2 d-flex justify-content-between align-items-center flex-wrap">
                                <span class="text-secondary">
                                    <b class="text-danger" style="font-size:18px;">บริษัท</b>
                                    <br>
                                    {{ $customers->user->member_co }}
                                </span>
                            </li>
                            <li class="m-2 d-flex justify-content-between align-items-center flex-wrap">
                                <span class="text-secondary">
                                    <b class="text-danger" style="font-size:18px;">เบอร์ติดต่อ</b>
                                    <br>
                                    {{ $customers->user->member_tel }}
                                </span>
                            </li>
                            <li class="m-2 d-flex justify-content-between align-items-center flex-wrap">
                                <span class="text-secondary">
                                    <b class="text-danger" style="font-size:18px;">เลขที่สมาชิก</b>
                                    <br>
                                    {{ $customers->user->no_member }}
                                </span>
                            </li>
                            <li class="m-2 d-flex justify-content-between align-items-center flex-wrap">
                                <div class="row">
                                    <div class="col-12">
                                        <b class="text-danger" style="font-size:18px;">หมวดหมู่สมาชิก / สถานะ</b>
                                    </div>
                                    <div class="col-6 text-center mt-2">
                                        <!-- บทบาทของสมาชิก -->
                                        @if($customers->user->member_role == "admin")
                                            <span class="btn bg-light-info text-info" style="font-size:12px;">
                                                Admin
                                            </span>
                                        @elseif($customers->user->member_role == "member")
                                            <span class="btn bg-light-success text-success" style="font-size:12px;">
                                                member
                                            </span>
                                        @elseif($customers->user->member_role == "customer")
                                            <span class="btn bg-light-danger text-danger" style="font-size:12px;">
                                                customer
                                            </span>
                                        @else
                                            <span class="btn bg-light-warning text-warning" style="font-size:12px;">
                                                driver
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-6 text-center mt-2">
                                        <!-- สถานะของสมาชิก -->
                                        @if($customers->user->member_status == "Active")
                                            <span  class="btn bg-light-success text-success" style="font-size:12px;">
                                                Active
                                            </span>
                                        @else
                                            <span class="btn bg-light-danger text-danger" style="font-size:12px;">
                                                Inactive
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                @endif
            </div>
            <style>
                 .group-danger{
                    color: #e62e2e;
                    padding: 5px;
                    border: .5px solid #e62e2e;
                }.group-warning{
                    color: #ffc107;
                    padding: 5px;
                }.group-success{
                    color: #29cc39;
                    padding: 5px;
                }.text-warning-header{
                    color: #a17a06;
                }
            </style>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">ลักษณะการกระทำความผิด</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                @php
                                    $demerit = $customers->demerit;
                                    $demeritArray = explode(',', $demerit);

                                    $groups = [
                                    'หมวดทุจริต' => ['1.ฉ้อโกงหรือยักยอกรถยนต์', '2.ลักทรัพย์หรือเปลี่ยนแปลงอุปกรณ์ภายในรถยนต์' ,'3.ความผิดในคดีอาญาอื่นๆ'],
                                    'หมวดบัญชีดำ' => ['4.ไม่บำรุงรักษารถยนต์', '5.ไม่ชำระค่าเช่า','6.อื่นๆ'],
                                    ];
                                @endphp

                                @foreach ($groups as $groupName => $groupMembers)
                                    @php
                                        $filteredMembers = array_filter($groupMembers, function ($member) use ($demeritArray) {
                                        return in_array($member, $demeritArray);
                                        });
                                    @endphp

                                    @if (count($filteredMembers) > 0)
                                        @php
                                            $groupColorClass = '';
                                            switch ($groupName) {
                                                case 'หมวดทุจริต':
                                                    $groupColorClass = 'text-danger mb-1';
                                                break;
                                                case 'หมวดบัญชีดำ':
                                                    $groupColorClass = 'text-warning-header mb-1';
                                                break;
                                            }
                                        @endphp

                                        <div class="d-block p-2 pt-0 {{ $groupColorClass }}">
                                            <b>{{ $groupName }} </b>
                                            @foreach ($filteredMembers as $index => $member)
                                            <span >{{ $member }}{{ $loop->last ? '' : ' ,' }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            @if(!empty($customers->demeritdetail))
                                <div class="col-sm-3 mt-4">
                                    <h6 class="mb-0">รายละเอียด</h6>
                                </div>
                                <div class="col-sm-9 text-secondary mt-4">
                                    {{ $customers->demeritdetail }}
                                </div>
                            @endif
                        </div>

                        <hr>

                        @php
                            $check_active_menu_1 = '';
                            $check_active_show_data_1 = '';
                            $check_active_menu_2 = '';
                            $check_active_show_data_2 = '';
                            $check_active_menu_3 = '';
                            $check_active_show_data_3 = '';
                            $check_active_menu_4 = '';
                            $check_active_show_data_4 = '';
                            $check_active_menu_5 = '';
                            $check_active_show_data_5 = '';

                            if(!empty($customers->c_pic_id_card)){
                                $check_active_menu_1 = 'active';
                                $check_active_show_data_1 = 'show active';
                            }else if(!empty($customers->c_pic_company_certificate)){
                                $check_active_menu_2 = 'active';
                                $check_active_show_data_2 = 'show active';
                            }else if(!empty($customers->c_pic_indictment)){
                                $check_active_menu_3 = 'active';
                                $check_active_show_data_3 = 'show active';
                            }else if(!empty($customers->c_pic_cap)){
                                $check_active_menu_4 = 'active';
                                $check_active_show_data_4 = 'show active';
                            }else if(!empty($customers->c_pic_other)){
                                $check_active_menu_5 = 'active';
                                $check_active_show_data_5 = 'show active';
                            }
                        @endphp

                        @if(!empty($customers->c_pic_id_card) || !empty($customers->c_pic_company_certificate) || !empty($customers->c_pic_indictment) || !empty($customers->c_pic_cap) || !empty($customers->c_pic_other))
                        <div class="row">
                            <div class="col-12">
                                <div class="">
                                    <h5 class="mb-3">หลักฐานการกระทำความผิด</h5>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <ul class="nav nav-tabs nav-danger" role="tablist">
                                    @if( !empty($customers->c_pic_id_card) )
                                    @php
                                        $c_pic_id_card_ex = explode(',', $customers->c_pic_id_card);
                                        $count_c_pic_id_card = count($c_pic_id_card_ex);
                                    @endphp
                                    <li class="nav-item" role="presentation" onclick="change_name_nav('c_pic_id_card');">
                                        <a class="nav-link {{ $check_active_menu_1 }}" data-bs-toggle="tab" href="#c_pic_id_card_{{ $customers->id }}" role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <span id="title_nav_c_pic_id_card" class="d-none">
                                                    สำเนาบัตร..({{ $count_c_pic_id_card }})
                                                </span>
                                                <div id="name_nav_c_pic_id_card" class="tab-title">
                                                    สำเนาบัตรประชาชน / PassPort ({{ $count_c_pic_id_card }})
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @endif
                                    @if( !empty($customers->c_pic_company_certificate) )
                                    @php
                                        $c_pic_company_certificate_ex = explode(',', $customers->c_pic_company_certificate);
                                        $count_c_pic_company_certificate = count($c_pic_company_certificate_ex);
                                    @endphp
                                    <li class="nav-item" role="presentation" onclick="change_name_nav('c_pic_company_certificate');">
                                        <a class="nav-link {{ $check_active_menu_2 }}" data-bs-toggle="tab" href="#c_pic_company_certificate_{{ $customers->id }}" role="tab" aria-selected="false">
                                            <div class="d-flex align-items-center">
                                                <span id="title_nav_c_pic_company_certificate" class="">
                                                    สำเนาหนังสือ..({{ $count_c_pic_company_certificate }})
                                                </span>
                                                <div id="name_nav_c_pic_company_certificate" class="tab-title d-none">
                                                    สำเนาหนังสือรับรองบริษัท ({{ $count_c_pic_company_certificate }})
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @endif
                                    @if( !empty($customers->c_pic_indictment) )
                                    @php
                                        $c_pic_indictment_ex = explode(',', $customers->c_pic_indictment);
                                        $count_c_pic_indictment = count($c_pic_indictment_ex);
                                    @endphp
                                    <li class="nav-item" role="presentation" onclick="change_name_nav('c_pic_indictment');">
                                        <a class="nav-link {{ $check_active_menu_3 }}" data-bs-toggle="tab" href="#c_pic_indictment_{{ $customers->id }}" role="tab" aria-selected="false">
                                            <div class="d-flex align-items-center">
                                                <span id="title_nav_c_pic_indictment" class="">
                                                    คำฟ้อง..({{ $count_c_pic_indictment }})
                                                </span>
                                                <div id="name_nav_c_pic_indictment" class="tab-title d-none">
                                                    คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี ({{ $count_c_pic_indictment }})
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @endif
                                    @if( !empty($customers->c_pic_cap) )
                                    @php
                                        $c_pic_cap_ex = explode(',', $customers->c_pic_cap);
                                        $count_c_pic_cap = count($c_pic_cap_ex);
                                    @endphp
                                    <li class="nav-item" role="presentation" onclick="change_name_nav('c_pic_cap');">
                                        <a class="nav-link {{ $check_active_menu_4 }}" data-bs-toggle="tab" href="#c_pic_cap_{{ $customers->id }}" role="tab" aria-selected="false">
                                            <div class="d-flex align-items-center">
                                                <span id="title_nav_c_pic_cap" class="">
                                                    หลักฐาน..({{ $count_c_pic_cap }})
                                                </span>
                                                <div id="name_nav_c_pic_cap" class="tab-title d-none">
                                                    หลักฐานการพูด-คุย ({{ $count_c_pic_cap }})
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @endif
                                    @if( !empty($customers->c_pic_other) )
                                    @php
                                        $c_pic_other_ex = explode(',', $customers->c_pic_other);
                                        $count_c_pic_other = count($c_pic_other_ex);
                                    @endphp
                                    <li class="nav-item" role="presentation" onclick="change_name_nav('c_pic_other');">
                                        <a class="nav-link {{ $check_active_menu_5 }}" data-bs-toggle="tab" href="#c_pic_other_{{ $customers->id }}" role="tab" aria-selected="false">
                                            <div class="d-flex align-items-center">
                                                <span id="title_nav_c_pic_other" class="">
                                                    อื่นๆ ({{ $count_c_pic_other }})
                                                </span>
                                                <div id="name_nav_c_pic_other" class="tab-title d-none">
                                                    อื่นๆ ({{ $count_c_pic_other }})
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                                <div class="tab-content py-3">
                                    @if( !empty($customers->c_pic_id_card) )
                                    <div class="tab-pane fade {{ $check_active_show_data_1 }}" id="c_pic_id_card_{{ $customers->id }}" role="tabpanel">
                                        <div class="owl-carousel owl-theme carouselSPhoto">
                                            @foreach($c_pic_id_card_ex as $customers_1 => $value_1)
                                                <div class="item">
                                                    <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $value_1 }}" alt="สำเนาบัตรประชาชน / PassPort" data-gallery="img_id_card-gallery_{{ $customers->id }}">
                                                        <img class="file-preview" src="{{ url('storage')}}/{{ $value_1 }}" alt="สำเนาบัตรประชาชน / PassPort">
                                                        <div class="infoImg">
                                                            <span class="m-0">สำเนาบัตรประชาชน / PassPort</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                    @if( !empty($customers->c_pic_company_certificate) )
                                    <div class="tab-pane fade {{ $check_active_show_data_2 }}" id="c_pic_company_certificate_{{ $customers->id }}" role="tabpanel">
                                        <div class="owl-carousel owl-theme carouselSPhoto">
                                            @foreach($c_pic_company_certificate_ex as $customers_2 => $value_2)
                                                <div class="item">
                                                    <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $value_2 }}" alt="สำเนาหนังสือรับรองบริษัท" data-gallery="img_company_certificate_-gallery_{{ $customers->id }}">
                                                        <img class="file-preview" src="{{ url('storage')}}/{{ $value_2 }}" alt="สำเนาหนังสือรับรองบริษัท">
                                                        <div class="infoImg">
                                                            <span class="m-0">สำเนาหนังสือรับรองบริษัท</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                    @if( !empty($customers->c_pic_indictment) )
                                    <div class="tab-pane fade {{ $check_active_show_data_3 }}" id="c_pic_indictment_{{ $customers->id }}" role="tabpanel">
                                        <div class="owl-carousel owl-theme carouselSPhoto">
                                            @foreach($c_pic_indictment_ex as $customers_3 => $value_3)
                                                <div class="item">
                                                    <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $value_3 }}" alt="คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี" data-gallery="img_indictment_gallery_{{ $customers->id }}">
                                                        <img class="file-preview" src="{{ url('storage')}}/{{ $value_3 }}" alt="คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี">
                                                        <div class="infoImg">
                                                            <span class="m-0">คำฟ้องหรือใบร้องทุกข์แจ้งความดำเนินดคี</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                    @if( !empty($customers->c_pic_cap) )
                                    <div class="tab-pane fade {{ $check_active_show_data_4 }}" id="c_pic_cap_{{ $customers->id }}" role="tabpanel">
                                        <div class="owl-carousel owl-theme carouselSPhoto">
                                            @foreach($c_pic_cap_ex as $customers_4 => $value_4)
                                            <div class="item">
                                                <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $value_4 }}" alt="ภาพหลักฐานการพูด-คุย" data-gallery="img_cap-gallery_{{ $customers->id }}">
                                                    <img class="file-preview" src="{{ url('storage')}}/{{ $value_4 }}" alt="ภาพหลักฐานการพูด-คุย">
                                                    <div class="infoImg">
                                                        <span class="m-0">หลักฐานการพูด-คุย</span>
                                                    </div>
                                                </a>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                    @if( !empty($customers->c_pic_other) )
                                    <div class="tab-pane fade {{ $check_active_show_data_5 }}" id="c_pic_other_{{ $customers->id }}" role="tabpanel">
                                        <div class="owl-carousel owl-theme carouselSPhoto">
                                            @php
                                                // ข้อความที่ต้องการตรวจสอบ
                                                $text = $customers->c_pic_other;

                                                // คำที่ต้องการตรวจสอบ
                                                $keyword = "uploads";
                                                $check_uploads = "";

                                                // ตรวจสอบว่าคำที่ต้องการอยู่ในข้อความหรือไม่
                                                if (strpos($text, $keyword) !== false) {
                                                    $check_uploads =  "Yes";
                                                } else {
                                                    $check_uploads =  "No";
                                                }
                                            @endphp
                                            
                                            @if($check_uploads == "Yes")
                                                @foreach($c_pic_other_ex as $customers_5 => $value_5)
                                                <div class="item">
                                                    <a class="glightbox show-img-box" data-type="image" href="{{ url('storage')}}/{{ $value_5 }}" alt="ภาพอื่นๆ" data-gallery="img_other_gallery_{{ $customers->id }}">
                                                        <img class="file-preview" src="{{ url('storage')}}/{{ $value_5 }}" alt="ภาพอื่นๆ">
                                                        <div class="infoImg">
                                                            <span class="m-0">อื่นๆ</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                @endforeach
                                            @else
                                            <div class="item">
                                                <a class="glightbox show-img-box" data-type="image" href="{{ url('/img/picture_old')}}/{{ $customers->c_pic_other }}" alt="ภาพอื่นๆ" data-gallery="img_other_gallery_{{ $customers->id }}">
                                                    <img class="file-preview" src="{{ url('/img/picture_old')}}/{{ $customers->c_pic_other }}" alt="ภาพอื่นๆ">
                                                    <div class="infoImg">
                                                        <span class="m-0">อื่นๆ</span>
                                                    </div>
                                                </a>
                                            </div>
                                            @endif
                                            
                                        </div>
                                    </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                        @endif

                    </div>
                </div>
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
}
if (!empty($query_params['c_name']) || !empty($query_params['c_surname'])) {
$c_name = urldecode($query_params['c_name']);
$c_surname = urldecode($query_params['c_surname']);
$text_show = $c_name . ' ' . $c_surname;
$class_show = '';
}
if (!empty($query_params['commercial_registration'])) {
$commercial_registration = urldecode($query_params['commercial_registration']);
$text_show = $commercial_registration;
$class_show = '';
}
if (!empty($query_params['c_company_name'])) {
$c_company_name = urldecode($query_params['c_company_name']);
$text_show = $c_company_name;
$class_show = '';
}
if (!empty($query_params['c_idno_other_nationalitie'])) {
$c_idno_other_nationalitie = urldecode($query_params['c_idno_other_nationalitie']);
$text_show = $c_idno_other_nationalitie;
$class_show = '';
}
if (!empty($query_params['c_name_other_nationalitie'])) {
$c_name_other_nationalitie = urldecode($query_params['c_name_other_nationalitie']);
$text_show = $c_name_other_nationalitie;
$class_show = '';
}
@endphp
<div class="text-center {{ $class_show }}" style="margin-top: 8vh;">
    <img src="{{asset('img/icon/no-results.png')}}" alt="User" class="" width="310">
    <h2 class=" mt-5">ไม่พบข้อมูลที่คุณค้นหา <span class="text-danger">"{{ $text_show }}"</span> </h2>
    <h5 class="mt-3">กรุณาปรับการค้นหาและตรวจสอบอีกครั้ง</h5>
</div>
@endif

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css'><link rel="stylesheet" href="./style.css">
<script src='https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js'></script><script  src="./script.js"></script>

<script>const nav = document.createElement('div');
nav.classList.add('gcounter');
nav.dataset.indicator = '/';

const slides = GLightbox({
	onOpen: () => slides.modal.appendChild(nav),
	afterSlideChange: function(prev, next) {
		nav.dataset.indicator = `${next.index + 1} / ${slides.elements.length}`;
		nav.classList.add('gcounter-added');
	}
});
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const urlParams = new URLSearchParams(window.location.search);
        const switchforSearch = urlParams.get('switchforSearch');
        // console.log(switchforSearch);
        if (switchforSearch === "company") {
            // console.log('บริษัท');
            document.getElementById('switchforSearch2').checked = true;
            toggleDivsswitchforSearch('company')
            // console.log('บริษัท');
        }
    });

    function toggleDivsswitchforSearch(type) {
        var Search = document.querySelectorAll(".divInputSearch");

        // Search.forEach(function(div) {
        //     div.classList.toggle('d-none');
        // });

        clearInput();

        document.querySelector('#div_person').classList.add('d-none');
        document.querySelector('#div_company').classList.add('d-none');

        document.querySelector('#div_'+type).classList.remove('d-none');
        
    }


    function clearInputID() {
        document.getElementById("c_idno").value = "";
        document.getElementById('c_company_name').value = ''
        document.getElementById('commercial_registration').value = ''
        document.querySelector('#success_c_idno').classList.add('d-none');
        document.querySelector('#warning_c_idno').classList.add('d-none');
    }

    function clearInputName() {
        document.getElementById("c_name").value = "";
        document.getElementById("c_surname").value = "";
        document.getElementById('c_company_name').value = ''
        document.getElementById('commercial_registration').value = ''
        document.querySelector('#success_commercial_registration').classList.add('d-none');
        document.querySelector('#warning_commercial_registration').classList.add('d-none');
    }

    function clearInputCompanyName() {
        document.getElementById("c_idno").value = "";
        document.getElementById("c_name").value = "";
        document.getElementById("c_surname").value = "";
        document.getElementById('c_company_name').value = ''
        document.querySelector('#success_c_idno').classList.add('d-none');
        document.querySelector('#warning_c_idno').classList.add('d-none');
    }

    function clearInputCommercialRegistration() {
        document.getElementById("c_idno").value = "";
        document.getElementById("c_name").value = "";
        document.getElementById("c_surname").value = "";
        document.getElementById('commercial_registration').value = '';
        document.querySelector('#success_commercial_registration').classList.add('d-none');
        document.querySelector('#warning_commercial_registration').classList.add('d-none');

    }



    function clearInput() {
        // console.log("asd");
        document.getElementById("c_idno").value = "";
        document.getElementById("c_name").value = "";
        document.getElementById("c_surname").value = "";
        document.getElementById('c_company_name').value = ''
        document.getElementById('commercial_registration').value = ''
        document.getElementById('c_idno_other_nationalitie').value = ''
        document.getElementById('c_name_other_nationalitie').value = ''
        document.querySelector('#success_c_idno').classList.add('d-none');
        document.querySelector('#warning_c_idno').classList.add('d-none');
        document.querySelector('#success_commercial_registration').classList.add('d-none');
        document.querySelector('#warning_commercial_registration').classList.add('d-none');
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
    function change_name_nav(type){

        if(document.querySelector('#name_nav_c_pic_id_card')){
            document.querySelector('#name_nav_c_pic_id_card').classList.add('d-none');
        }
        if(document.querySelector('#name_nav_c_pic_indictment')){
            document.querySelector('#name_nav_c_pic_indictment').classList.add('d-none');
        }
        if(document.querySelector('#name_nav_c_pic_cap')){
            document.querySelector('#name_nav_c_pic_cap').classList.add('d-none');
        }
        if(document.querySelector('#name_nav_c_pic_other')){
            document.querySelector('#name_nav_c_pic_other').classList.add('d-none');
        }
        if(document.querySelector('#name_nav_c_pic_company_certificate')){
            document.querySelector('#name_nav_c_pic_company_certificate').classList.add('d-none');
        }
        // ----

        if(document.querySelector('#title_nav_c_pic_id_card')){
            document.querySelector('#title_nav_c_pic_id_card').classList.remove('d-none');
        }
        if(document.querySelector('#title_nav_c_pic_indictment')){
            document.querySelector('#title_nav_c_pic_indictment').classList.remove('d-none');
        }
        if(document.querySelector('#title_nav_c_pic_cap')){
            document.querySelector('#title_nav_c_pic_cap').classList.remove('d-none');
        }
        if(document.querySelector('#title_nav_c_pic_other')){
            document.querySelector('#title_nav_c_pic_other').classList.remove('d-none');
        }
        if(document.querySelector('#title_nav_c_pic_company_certificate')){
            document.querySelector('#title_nav_c_pic_company_certificate').classList.remove('d-none');
        }

        // เปิด text ที่ถูกเลือก
        if(document.querySelector('#name_nav_'+type)){
            document.querySelector('#name_nav_'+type).classList.remove('d-none');
        }
        if(document.querySelector('#title_nav_'+type)){
            document.querySelector('#title_nav_'+type).classList.add('d-none');
        }

    }
</script>

<script>
    var check_nationalitie = 'thai' ;
    function change_input_data(type){
        if(type == 'thai'){

            check_nationalitie = 'thai' ;

            document.querySelector('#btn_input_data_thai').classList.remove('btn-secondary');
            document.querySelector('#btn_input_data_thai').classList.add('btn-info');

            document.querySelector('#btn_input_data_other').classList.remove('btn-info');
            document.querySelector('#btn_input_data_other').classList.add('btn-secondary');

            let input_for = document.querySelectorAll('[input_for="input_data_thailand"]');
                input_for.forEach(input_for => {
                    input_for.classList.remove('d-none');
                });

            let input_for_other = document.querySelectorAll('[input_for="input_data_other_nationalitie"]');
                input_for_other.forEach(input_for_other => {
                    input_for_other.classList.add('d-none');
                });

            document.querySelector('#c_idno_other_nationalitie').value = '';
            document.querySelector('#c_name_other_nationalitie').value = '';

        }
        else{

            check_nationalitie = 'other' ;

            document.querySelector('#success_c_idno').classList.add('d-none');
            document.querySelector('#warning_c_idno').classList.add('d-none');

            document.querySelector('#btn_input_data_other').classList.add('btn-info');
            document.querySelector('#btn_input_data_other').classList.remove('btn-secondary');

            document.querySelector('#btn_input_data_thai').classList.remove('btn-info');
            document.querySelector('#btn_input_data_thai').classList.add('btn-secondary');

            let input_for = document.querySelectorAll('[input_for="input_data_thailand"]');
                input_for.forEach(input_for => {
                    input_for.classList.add('d-none');
                });

            let input_for_other = document.querySelectorAll('[input_for="input_data_other_nationalitie"]');
                input_for_other.forEach(input_for_other => {
                    input_for_other.classList.remove('d-none');
                });

            document.querySelector('#c_name').value = '';
            document.querySelector('#c_surname').value = '';
            document.querySelector('#c_idno').value = '';
        }
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let cIdnoInput = document.getElementById('c_idno');

        if(cIdnoInput){
            cIdnoInput.addEventListener('input', function() {
                document.querySelector('#warning_c_idno').classList.add('d-none');
                let inputValue = cIdnoInput.value;
                let formattedValue = formatCIDNO(inputValue);
                cIdnoInput.value = formattedValue;

                let check_input_13 = cIdnoInput.value.replaceAll('-','');
                    // console.log(check_input_13.length);
                if (check_input_13.length == 13) {
                    // console.log('ครบ 13');
                    document.querySelector('#success_c_idno').classList.remove('d-none');
                    document.querySelector('#warning_c_idno').classList.add('d-none');
                }else{
                    // console.log('ยังไม่ครบ 13 หรือเกิน');
                    document.querySelector('#warning_c_idno').classList.remove('d-none');
                    document.querySelector('#success_c_idno').classList.add('d-none');
                }
            });

            cIdnoInput.addEventListener('keydown', function(event) {
                if (event.key === 'Backspace') {
                    // ตรวจสอบถ้าผู้ใช้กดปุ่ม Backspace ให้ลบตัวอักษรหรือเครื่องหมาย "-"
                    let inputValue = cIdnoInput.value;
                    let caretPosition = cIdnoInput.selectionStart;

                    if (caretPosition > 0 && (inputValue[caretPosition - 1] === '-' || inputValue[caretPosition] === '-')) {
                        let newValue = inputValue.substring(0, caretPosition - 1) + inputValue.substring(caretPosition);
                        cIdnoInput.value = newValue;
                        cIdnoInput.setSelectionRange(caretPosition - 1, caretPosition - 1);
                    }
                }
            });
        }

        function formatCIDNO(input) {
            let formattedValue = '';
            let characterCount = 0;

            for (let i = 0; i < input.length; i++) {
                if (/[0-9]/.test(input[i])) {
                    characterCount++;
                    if (characterCount === 1) {
                        formattedValue += input[i] + '-';
                    } else if (characterCount === 5) {
                        formattedValue += input[i] + '-';
                    } else if (characterCount === 10) {
                        formattedValue += input[i] + '-';
                    } else if (characterCount === 12) {
                        formattedValue += input[i] + '-';
                    } else {
                        formattedValue += input[i];
                    }
                }
            }

            return formattedValue;
        }
    });

</script>

<script>
    commercial_registration.addEventListener('input', function() {
        document.querySelector('#warning_commercial_registration').classList.add('d-none');

        let check_input_13 = commercial_registration.value.replaceAll('-','');
            // console.log(check_input_13.length);
        if (check_input_13.length == 13) {
            // console.log('ครบ 13');
            document.querySelector('#success_commercial_registration').classList.remove('d-none');
            document.querySelector('#warning_commercial_registration').classList.add('d-none');
        }else{
            // console.log('ยังไม่ครบ 13 หรือเกิน');
            document.querySelector('#warning_commercial_registration').classList.remove('d-none');
            document.querySelector('#success_commercial_registration').classList.add('d-none');
        }
    });
</script>

<script>
    function clearInputName_nationalitie(){
        document.querySelector('#c_name_other_nationalitie').value = '';
    }

    function clearInputID_nationalitie(){
        document.querySelector('#c_idno_other_nationalitie').value = '';
    }
</script>
@endsection